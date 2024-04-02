<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Arr;

class MyChart extends Component
{
  public $chart = 'pie';
  public array $data = [
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
  public function mount()
  {
  }
  public function randomize()
  {
    Arr::set($this->data, 'data.datasets.0.data', [fake()->randomNumber(2), fake()->randomNumber(2), fake()->randomNumber(2)]);
  }

  public function switch($type)
  {
    Arr::set($this->data, 'type', $type);
  }
  public function render()
  {
    return view('components.my-chart');
  }
}
