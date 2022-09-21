<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Officials;

class OfficialsShow extends Component
{

    public $first_name,$last_name, $position,$position_level,
    $department,$civilStatus,
     $birthdate, $cellphone_number, $email,
     $profile_filename,  $userType,  $address,  $password;
    

    protected function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'position' => 'required',
            'position_level' => 'required',
            'department' => 'required',
            'civilStatus' => 'required',
            'birthdate' => 'required',
            'cellphone_number' => 'required|numeric',
            'email' => 'required',
            'profile_filename' => 'required',
            'address' => 'required',
           

        ];
    }
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveOfficials()
    {
        $validatedData = $this->validate();
        Officials::create($validatedData);
        session()->flash('message', 'Officials added successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
    public function resetInput()
    {
        $this->first_name = "";
        $this->last_name = "";
        $this->position = "";
        $this->position_level = "";
        $this->department = "";
        $this->civilStatus = "";
        $this->birthdate = "";
        $this->cellphone_number = "";
        $this->profile_filename = "";
        $this->address = "";
        $this->password = "";
    }

    public function render()
    {
        return view('livewire.officials-show');
    }
}
