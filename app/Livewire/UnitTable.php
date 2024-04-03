<?php

namespace App\Livewire;

use App\Models\Unit;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class UnitTable extends PowerGridComponent
{
  use WithExport;
  public $showTrash = false;
  protected function getListeners(): array
  {
    return array_merge(
      parent::getListeners(),
      [
        'refresh-record' => '$refresh',
        'pg:show-trash' => 'handleShowTrash',
      ]
    );
  }
  public function setUp(): array
  {
    $this->showCheckBox();

    return [
      Exportable::make('export')
        ->striped()
        ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
      Header::make()->showSearchInput(),
      Footer::make()
        ->showPerPage()
        ->showRecordCount(),
    ];
  }

  public function datasource(): Builder
  {
    // return Unit::query();
    $page = request()->get('page', 1);
    $user = auth()->user();
    $landlord_id = auth()->id();

    if ($page === 'trashed') {
      return Unit::onlyTrashed()->whereHas('propertyListing', function ($query) use ($landlord_id) {
        $query->where('landlord_id', $landlord_id);
      });
    } else {
      return Unit::whereHas('propertyListing', function ($query) use ($landlord_id) {
        $query->where('landlord_id', $landlord_id);
      });
    }
  }

  public function relationSearch(): array
  {
    return [];
  }

  public function fields(): PowerGridFields
  {
    return PowerGrid::fields()
      ->add('id')
      ->add('property_id')
      ->add('room_number')
      ->add('floor_number')
      ->add('no_of_bedroom')
      ->add('no_of_bathroom')
      ->add('status')
      ->add('created_at');
  }

  public function columns(): array
  {
    return [
      Column::make('Id', 'id'),
      Column::make('Property id', 'property_id'),
      Column::make('Room number', 'room_number')
        ->sortable()
        ->searchable(),

      Column::make('Floor number', 'floor_number')
        ->sortable()
        ->searchable(),

      Column::make('No of bedroom', 'no_of_bedroom')
        ->sortable()
        ->searchable(),

      Column::make('No of bathroom', 'no_of_bathroom')
        ->sortable()
        ->searchable(),

      Column::make('Status', 'status')
        ->sortable()
        ->searchable(),

      Column::make('Created at', 'created_at_formatted', 'created_at')
        ->sortable(),

      Column::make('Created at', 'created_at')
        ->sortable()
        ->searchable(),

      Column::action('Action')
    ];
  }

  public function filters(): array
  {
    return [];
  }


  #[\Livewire\Attributes\On('edit')]
  public function edit($rowId)
  {
    return redirect()->to('/units/edit/' . $rowId);
  }

  #[\Livewire\Attributes\On('view')]
  public function view($rowId)
  {
    return redirect()->to('/units/' . $rowId);
  }
  #[\Livewire\Attributes\On('delete')]
  public function delete($rowId)
  {
    // emit a livewire delete event for property
    $this->dispatch('delete-unit', $rowId);
  }
  #[\Livewire\Attributes\On('restore')]
  public function restore($rowId)
  {
    $unit = Unit::onlyTrashed()->find($rowId);
    $unit->restore();
    return redirect()->to('/dashboard/units/');
  }

  #[\Livewire\Attributes\On('showTrash')]
  public function handleShowTrash()
  {
    $this->showTrash = !$this->showTrash;
  }

  public function actions(Unit $row): array
  {
    $buttons = [];
    if (auth()->user()->role === 'landlord') {
      $buttons[] =
        Button::add('edit')
        ->slot('Edit: ' . $row->id)
        ->id()
        ->class('btn btn-outline btn-sm rounded border-primary bg-info dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
        ->dispatch('edit', ['rowId' => $row->id]);
    }
    if ($row->trashed()) {
      $buttons[] = Button::add('restore')
        ->slot('Restore: ' . $row->id)
        ->id()
        ->class('btn btn-outline btn-sm rounded border-primary bg-green-400 dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
        ->dispatch('restore', ['rowId' => $row->id]);
    } else {
      $buttons[] = Button::add('delete')
        ->slot('Delete: ' . $row->id)
        ->id()
        ->class('btn btn-outline btn-sm rounded border-primary bg-red-400 dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
        ->dispatch('delete', ['rowId' => $row->id]);
    }

    return $buttons;
  }


  /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
