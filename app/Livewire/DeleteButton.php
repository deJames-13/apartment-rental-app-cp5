<?php

namespace App\Livewire;

use Mary\Traits\Toast;
use Livewire\Component;
use Illuminate\Http\Request;

class DeleteButton extends Component
{
  use Toast;
  public $label = "Delete";
  public $redirect = null;
  public $detail = null;
  public $id = null;
  public $controller = null;
  public function mount($controller,  $redirect)
  {
    $this->controller = $controller;
    $this->redirect = $redirect;
  }
  public function delete()
  {
    $this->id = $this->detail[0];

    $request = new Request();
    $request->setMethod('DELETE');
    $request->request->add(['id' => $this->id]);
    app($this->controller)->destroy($request);

    $this->dispatch('refresh-record');
    $this->toast(
      type: 'success',
      title: 'Deleted successfully',
      description: null,
      position: 'toast-top toast-end',
      icon: 'o-information-circle',
      css: 'alert-error',
      timeout: 3000,
    );
  }
  public function render()
  {
    return view('components.delete-button');
  }
}
