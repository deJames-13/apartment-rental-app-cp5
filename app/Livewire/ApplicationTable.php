<?php

namespace App\Livewire;

use Illuminate\Support\Carbon;
use App\Mail\ApplicationSuccess;
use App\Mail\PendingApplication;
use App\Models\LeaseApplication;
use App\Mail\ApplicationRejected;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class ApplicationTable extends PowerGridComponent
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
    $page = request('page', 1);

    $query = LeaseApplication::query()->with(['tenant', 'landlord']);

    if ($page === 'trash') {
      $query->onlyTrashed();
    } else if (auth()->user()->role === 'landlord') {
      $query->where('landlord_id', auth()->user()->id);
    } elseif (auth()->user()->role === 'tenant') {
      $query->where('tenant_id', auth()->user()->id);
    }

    return $query;
  }

  public function relationSearch(): array
  {
    return [];
  }

  public function fields(): PowerGridFields
  {
    $powerGridFields = PowerGrid::fields()
      ->add('id')
      ->add('property_id')
      ->add('unit_id')
      ->add('rent_amount')
      ->add('status')
      ->add('title')
      ->add('notes')
      ->add('tenant_id_card')
      ->add('tenant_signature')
      ->add('created_at');

    if (auth()->user()->role === 'landlord') {
      $powerGridFields->add('tenant.name');
    } elseif (auth()->user()->role === 'tenant') {
      $powerGridFields->add('landlord.name');
    }

    return $powerGridFields;
  }

  public function columns(): array
  {
    $columns = [
      Column::make('Id', 'id'),
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
      // Column::make('Tenant id card', 'tenant_id_card')
      //   ->sortable()
      //   ->searchable(),
      // Column::make('Tenant signature', 'tenant_signature')
      //   ->sortable()
      //   ->searchable(),
      Column::make('Created at', 'created_at_formatted', 'created_at')
        ->sortable(),
      Column::make('Created at', 'created_at')
        ->sortable()
        ->searchable(),
      Column::action('Action')
    ];

    if (auth()->user()->role === 'landlord') {
      array_splice($columns, 1, 0, [Column::make('Tenant Name', 'tenant.username')]);
    } elseif (auth()->user()->role === 'tenant') {
      array_splice($columns, 1, 0, [Column::make('Landlord Name', 'landlord.username')]);
    }


    return $columns;
  }

  public function filters(): array
  {
    return [];
  }

  // for tenant edit and delete
  #[\Livewire\Attributes\On('edit')]
  public function edit($rowId)
  {
    return redirect()->to('/applications/edit/' . $rowId);
  }

  #[\Livewire\Attributes\On('delete')]
  public function delete($rowId): void
  {
    $application = LeaseApplication::find($rowId);
    $application->delete();
  }

  #[\Livewire\Attributes\On('approve')]
  public function approve($rowId): void
  {
    $application = LeaseApplication::with('propertyListing')->find($rowId);
    $application->status = 'accepted';
    $application->propertyListing->status = 'unavailable';
    Mail::to(auth()->user()->email)->send(new ApplicationSuccess(auth()->user()));
    $application->propertyListing->save();
    $application->save();
  }

  #[\Livewire\Attributes\On('reject')]
  public function reject($rowId): void
  {
    $application = LeaseApplication::find($rowId);
    $application->status = 'rejected';
    Mail::to(auth()->user()->email)->send(new ApplicationRejected(auth()->user()));
    $application->save();
  }

  #[\Livewire\Attributes\On('restore')]
  public function restore($rowId)
  {
    $application = LeaseApplication::onlyTrashed()->find($rowId);
    $application->restore();
    return redirect()->to('/dashboard/applications/');
  }

  #[\Livewire\Attributes\On('showTrash')]
  public function handleShowTrash()
  {
    $this->showTrash = !$this->showTrash;
  }

  public function actions(LeaseApplication $row): array
  {
    $buttons = [
      Button::add('edit')
        ->slot('Edit: ' . $row->id)
        ->id()
        ->class('btn btn-outline btn-sm rounded border-primary bg-info dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
        ->dispatch('edit', ['rowId' => $row->id])
    ];
    if (auth()->user()->role === 'landlord') {
      if ($row->status === 'rejected') {
        $buttons[] = Button::add('approve')
          ->slot('Approve: ' . $row->id)
          ->id()
          ->class('btn btn-outline btn-sm rounded border-primary bg-success dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
          ->dispatch('approve', ['rowId' => $row->id]);
      } else if ($row->status === 'approved' || $row->status === 'accepted') {
        $buttons[] = Button::add('reject')
          ->slot('Reject: ' . $row->id)
          ->id()
          ->class('btn btn-outline btn-sm rounded border-primary bg-red-400 dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
          ->dispatch('reject', ['rowId' => $row->id]);
      } else if ($row->status === 'pending') {
        $buttons[] = Button::add('approve')
          ->slot('Approve: ' . $row->id)
          ->id()
          ->class('btn btn-outline btn-sm rounded border-primary bg-success dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
          ->dispatch('approve', ['rowId' => $row->id]);
        $buttons[] = Button::add('reject')
          ->slot('Reject: ' . $row->id)
          ->id()
          ->class('btn btn-outline btn-sm rounded border-primary bg-red-400 dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
          ->dispatch('reject', ['rowId' => $row->id]);
      }
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
