<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Arr;

class MyChart extends Component
{
  public $title = 'My Chart';
  public $charts = ['pie'];
  public array $chartData = [
    'type' => 'pie',
    'data' => [
      'labels' => ['Mary', 'Joe', 'Ana'],
      'datasets' => [
        [
          'label' => '# of Votes',
          'data' => [12, 19, 3],
        ]
      ]
    ]
  ];
  public function mount(
    $title = 'My Chart',
    $charts = ['pie', 'line', 'bar', 'doughnut'],
    $data = [
      'type' => 'pie',
      'data' => [
        'labels' => ['Mary', 'Joe', 'Ana'],
        'datasets' => [
          [
            'label' => '# of Votes',
            'data' => [12, 19, 3],
          ]
        ]
      ]
    ]
  ) {
    $this->title = $title;
    $this->charts = $charts;
    $this->chartData = $data;
  }
  public function randomize()
  {
    Arr::set($this->chartData, 'data.datasets.0.data', [fake()->randomNumber(2), fake()->randomNumber(2), fake()->randomNumber(2)]);
  }

  public function switch()
  {
    $currentIndex = array_search($this->chartData['type'], $this->charts);
    $nextIndex = ($currentIndex + 1) % count($this->charts);
    Arr::set($this->chartData, 'type', $this->charts[$nextIndex]);
  }
  public function render()
  {
    return view('components.my-chart');
  }
}
