<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Officials;
use Livewire\WithFileUploads;
class OfficialsShow extends Component
{

    use WithFileUploads;
    public $first_name,$last_name, $position,$position_level,
    $department,$civilStatus,
     $birthdate, $cellphone_number, $email,
     $profile_filename,  $userType,  $address,  $password;
    

    protected function rules()
    {
        return [
            'first_name' => '',
            'last_name' => '',
            'position' => '',
            'position_level' => '',
            'department' => '',
            'civilStatus' => '',
            'birthdate' => '',
            'cellphone_number' => '',
            'email' => '',
            'profile_filename' => '',
            'userType' => '',
            'address' => '',
            'password' => '',

           

        ];
    }
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveOfficials()
    {
        $t =  $this->profile_filename->storePublicly('public');
        
        $a =  "admin";   

        $validatedData = $this->validate();
        $validatedData['userType']= $a;
        $validatedData['profile_filename']= $t;
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
        $this->officials = Officials::all();
        return view('livewire.officials-show', [$this->officials]);
    }
}
