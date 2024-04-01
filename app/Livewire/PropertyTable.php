<?php

namespace App\Livewire;

use App\Models\PropertyListing;
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

final class PropertyTable extends PowerGridComponent
{
  use WithExport;
  protected function getListeners(): array
  {
    return array_merge(
      parent::getListeners(),
      [
        'refresh-record' => '$refresh'
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
    $user = auth()->user();
    $landlord_id = auth()->id();
    return PropertyListing::where('landlord_id', $landlord_id);
  }

  public function relationSearch(): array
  {
    return [];
  }

  public function fields(): PowerGridFields
  {
    return PowerGrid::fields()
      ->add('id')
      ->add('Landlord', 'landlord_id')
      ->add('Tenant', 'tenant_id')

      ->add('type')
      ->add('property_name')
      ->add('default_price')
      ->add('no_of_floors')
      ->add('no_of_units')
      ->add('status')
      ->add('created_at');
  }

  public function columns(): array
  {
    return [
      Column::make('Id', 'id'),
      Column::make('Type', 'type')
        ->sortable()
        ->searchable(),

      Column::make('Property name', 'property_name')
        ->sortable()
        ->searchable(),

      Column::make('Default price', 'default_price')
        ->sortable()
        ->searchable(),

      Column::make('No of floors', 'no_of_floors')
        ->sortable()
        ->searchable(),

      Column::make('No of units', 'no_of_units')
        ->sortable()
        ->searchable(),

      Column::make('Status', 'status')
        ->sortable()
        ->searchable(),

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
    return redirect()->to('/properties/edit/' . $rowId);
  }

  #[\Livewire\Attributes\On('view')]
  public function view($rowId)
  {
    return redirect()->to('/properties/' . $rowId);
  }
  #[\Livewire\Attributes\On('delete')]
  public function delete($rowId)
  {
    // emit a livewire delete event for property
    $this->dispatch('delete-property', $rowId);
  }

  public function actions(PropertyListing $row): array
  {
    return [
      Button::add('edit')
        ->slot('Edit: ' . $row->id)
        ->id()
        ->class('btn btn-outline btn-sm rounded border-primary bg-info dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
        ->dispatch('edit', ['rowId' => $row->id]),

      Button::add('view')
        ->slot('View: ' . $row->id)
        ->id()
        ->class('btn btn-outline btn-sm rounded border-base-content bg-base-content dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
        ->dispatch('view', ['rowId' => $row->id]),
      Button::add('delete')
        ->slot('Delete: ' . $row->id)
        ->id()
        ->class('btn btn-outline btn-sm rounded border-red-400 bg-red-400 dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
        ->dispatch('delete', ['rowId' => $row->id]),
    ];
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
