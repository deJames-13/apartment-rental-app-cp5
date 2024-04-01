<?php

namespace App\Livewire;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
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

final class UnitJoinedTable extends PowerGridComponent
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
    return DB::table('units');
  }

  public function fields(): PowerGridFields
  {
    return PowerGrid::fields()
      ->add('id')
      ->add('property_id')
      ->add('unit_code')
      ->add('room_number')
      ->add('floor_number')
      ->add('no_of_bedroom')
      ->add('no_of_bathroom')
      ->add('unit_thumbnail')
      ->add('date_posted')
      ->add('date_available_from')
      ->add('description')
      ->add('heading')
      ->add('status')
      ->add('deleted_at')
      ->add('created_at')
      ->add('updated_at');
  }

  public function columns(): array
  {
    return [
      Column::make('Id', 'id'),
      Column::make('Property id', 'property_id'),
      Column::make('Unit code', 'unit_code')
        ->sortable()
        ->searchable(),

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

      Column::make('Unit thumbnail', 'unit_thumbnail')
        ->sortable()
        ->searchable(),

      Column::make('Date posted', 'date_posted')
        ->sortable()
        ->searchable(),

      Column::make('Date available from', 'date_available_from')
        ->sortable()
        ->searchable(),

      Column::make('Description', 'description')
        ->sortable()
        ->searchable(),

      Column::make('Heading', 'heading')
        ->sortable()
        ->searchable(),

      Column::make('Status', 'status')
        ->sortable()
        ->searchable(),

      Column::make('Deleted at', 'deleted_at_formatted', 'deleted_at')
        ->sortable(),

      Column::make('Deleted at', 'deleted_at')
        ->sortable()
        ->searchable(),

      Column::make('Created at', 'created_at_formatted', 'created_at')
        ->sortable(),

      Column::make('Created at', 'created_at')
        ->sortable()
        ->searchable(),

      Column::make('Updated at', 'updated_at_formatted', 'updated_at')
        ->sortable(),

      Column::make('Updated at', 'updated_at')
        ->sortable()
        ->searchable(),

    ];
  }

  public function filters(): array
  {
    return [];
  }

  // #[\Livewire\Attributes\On('edit')]
  // public function edit($rowId): void
  // {
  //   // $this->js('alert('.$rowId.')');
  // }

  // public function actions($row): array
  // {
  //   return [];
  // }

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
