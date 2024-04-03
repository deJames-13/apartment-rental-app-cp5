<?php

namespace App\Livewire;

use App\Models\LeaseInfo;
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

final class LeasesTable extends PowerGridComponent
{
  use WithExport;
  public $showTrash = false;
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
    $page = request('page', 1);

    $query = LeaseInfo::with('unit.propertyListing');

    if ($page === 'trashed') {
      $query->onlyTrashed()->whereHas('unit.propertyListing', function ($query) {
        $query->where('landlord_id', auth()->id());
      });
    } else if (auth()->user()->role === 'landlord') {
      $query->whereHas('unit.propertyListing', function ($query) {
        $query->where('landlord_id', auth()->id());
      });
    }

    return $query;
  }

  public function relationSearch(): array
  {
    return [];
  }

  public function fields(): PowerGridFields
  {
    return PowerGrid::fields()
      ->add('id')
      ->add('unit_id')
      ->add('lease_type')
      ->add('lease_application_fee')
      ->add('lease_fee')
      ->add('security_deposit')
      ->add('short_term_rent')
      ->add('long_term_rent')
      ->add('termination_amount')
      ->add('is_termination_allowed')
      ->add('is_sub_leasing_allowed')
      ->add('status')
      ->add('created_at');
  }

  public function columns(): array
  {
    return [
      Column::make('Id', 'id'),
      Column::make('Unit id', 'unit_id'),
      Column::make('Lease type', 'lease_type')
        ->sortable()
        ->searchable(),

      Column::make('Lease application fee', 'lease_application_fee')
        ->sortable()
        ->searchable(),

      Column::make('Lease fee', 'lease_fee')
        ->sortable()
        ->searchable(),

      Column::make('Security deposit', 'security_deposit')
        ->sortable()
        ->searchable(),

      Column::make('Short term rent', 'short_term_rent')
        ->sortable()
        ->searchable(),

      Column::make('Long term rent', 'long_term_rent')
        ->sortable()
        ->searchable(),

      Column::make('Termination amount', 'termination_amount')
        ->sortable()
        ->searchable(),

      Column::make('Is termination allowed', 'is_termination_allowed')
        ->sortable()
        ->searchable(),

      Column::make('Is sub leasing allowed', 'is_sub_leasing_allowed')
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
    return redirect()->to('/leases/edit/' . $rowId);
  }

  #[\Livewire\Attributes\On('view')]
  public function view($rowId)
  {
    return redirect()->to('/leases/' . $rowId);
  }
  #[\Livewire\Attributes\On('delete')]
  public function delete($rowId)
  {
    // emit a livewire delete event for lease
    $this->dispatch('delete-lease', $rowId);
  }

  #[\Livewire\Attributes\On('restore')]
  public function restore($rowId)
  {
    // Retrieve the record and restore it
    $application = LeaseInfo::onlyTrashed()->find($rowId);
    $application->restore();
    return redirect()->to('/dashboard/leases/');
  }

  #[\Livewire\Attributes\On('showTrash')]
  public function handleShowTrash()
  {
    $this->showTrash = !$this->showTrash;
  }

  public function actions(LeaseInfo $row): array
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
