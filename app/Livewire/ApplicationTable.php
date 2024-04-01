<?php

namespace App\Livewire;

use App\Models\LeaseApplication;
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

final class ApplicationTable extends PowerGridComponent
{
  use WithExport;

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
    if ($user->role === 'landlord') {
      return LeaseApplication::query()->where('landlord_id', $user->id);
    }
    if ($user->role === 'tenant') {
      return LeaseApplication::query()->where('tenant_id', $user->id);
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
      ->add('tenant_id')
      ->add('landlord_id')
      ->add('property_id')
      ->add('unit_id')
      ->add('rent_amount')
      ->add('status')
      ->add('title')
      ->add('notes')
      ->add('tenant_id_card')
      ->add('tenant_signature')
      ->add('created_at');
  }

  public function columns(): array
  {
    return [
      Column::make('Id', 'id'),
      Column::make('Tenant id', 'tenant_id'),
      Column::make('Landlord id', 'landlord_id'),
      Column::make('Property id', 'property_id'),
      Column::make('Unit id', 'unit_id'),
      Column::make('Rent amount', 'rent_amount')
        ->sortable()
        ->searchable(),

      Column::make('Status', 'status')
        ->sortable()
        ->searchable(),

      Column::make('Title', 'title')
        ->sortable()
        ->searchable(),

      Column::make('Notes', 'notes')
        ->sortable()
        ->searchable(),

      Column::make('Tenant id card', 'tenant_id_card')
        ->sortable()
        ->searchable(),

      Column::make('Tenant signature', 'tenant_signature')
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
  public function edit($rowId): void
  {
    $this->js('alert(' . $rowId . ')');
  }

  public function actions(LeaseApplication $row): array
  {
    return [
      Button::add('edit')
        ->slot('Edit: ' . $row->id)
        ->id()
        ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
        ->dispatch('edit', ['rowId' => $row->id])
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
