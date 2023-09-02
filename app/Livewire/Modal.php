<?php

namespace App\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public $modalId;
    public $isOpen = false;

    protected $listeners = [
        'show' => 'openModal',
        'close' => 'closeModal',
    ];

    public function openModal($id)
    {
        dd($id);
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.modal');
    }
}
