<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyListing;
use App\Models\Unit;

use App\Models\LeaseTransaction;
use Illuminate\Support\Facades\DB;

class ChartsController extends Controller
{
  // Chart data create for chartJS
  // format
  // {
  //   labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
  //   datasets: [
  //     {
  //       label: 'My First dataset',
  //       backgroundColor: 'rgb(255, 99, 132)',
  //       borderColor: 'rgb(255, 99, 132)',
  //       data: [0, 10, 5, 2, 20, 30, 45],
  //     },
  // ]

  // Chart for  property listing
  public function propertyListing()
  {

    $data = [
      'type' => 'pie',
      'data' => [
        'labels' => ['Apartment', 'Condominium', 'House', 'Townhouse', 'Commercial', 'Industrial'],
        'datasets' => [
          [
            'label' => 'Number of Properties',
            'data' => [
              PropertyListing::where('type', 'Apartment')->count(),
              PropertyListing::where('type', 'Condominium')->count(),
              PropertyListing::where('type', 'House')->count(),
              PropertyListing::where('type', 'Townhouse')->count(),
              PropertyListing::where('type', 'Commercial')->count(),
              PropertyListing::where('type', 'Industrial')->count(),
            ],
          ],
        ],
      ],
    ];
    return  $data;
  }

  // Chart for  units
  public function units()
  {

    $data = [
      'type' => 'bar',
      'data' => [
        'labels' => ['Available', 'Unavailable', 'Inactive'],
        'datasets' => [
          [
            'label' => 'Unit Status',
            'backgroundColor' => 'rgb(255, 99, 132)',
            'borderColor' => 'rgb(255, 99, 132)',
            'data' => [
              Unit::where('status', 'available')->count(),
              Unit::where('status', 'unavailable')->count(),
              Unit::where('status', 'inactive')->count(),
            ],
          ],
        ],
      ],
    ];
    return  $data;
  }

  // chart for lease transaction
  public function leaseTransaction()
  {

    $transactions = LeaseTransaction::select(
      DB::raw('YEAR(start_date) as year'),
      DB::raw('MONTH(start_date) as month'),
      DB::raw('SUM(rent_amount) as revenue')
    )
      ->groupBy('year', 'month')
      ->orderBy('year', 'asc')
      ->orderBy('month', 'asc')
      ->get();

    $labels = $transactions->map(function ($transaction) {
      return $transaction->month . '/' . $transaction->year;
    });

    $data = [
      'type' => 'line',
      'data' => [
        'labels' => $labels,
        'datasets' => [
          [
            'label' => 'Revenue from Lease Transactions',
            'backgroundColor' => 'rgb(255, 99, 132)',
            'borderColor' => 'rgb(255, 99, 132)',
            'data' => $transactions->pluck('revenue'),
          ],
        ],
      ],
    ];
    return $data;
  }
}
