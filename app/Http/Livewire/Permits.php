<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Permits extends Component
{
    public $typeOfPermit, $nameOfResident, $processingFee, $date;

    protected function rules(){
        return[
            'typeOfPermit' => 'required',
            'nameOfResident' =>'required',
            'processingFee' =>'required',
            'date' => 'required',
        ];
    }

    

    public function updated($fields){
        $this->validateOnly($fields);
    }

    public function savePermits(){

    }

    public function render()
    {
        return view('livewire.permits');
    }
}
