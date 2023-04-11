<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $sorting;
    public function mount(){
        $this->sorting="default";

    }
    public function render()
    {
        return view('livewire.counter');
    }
}
