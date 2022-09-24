<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Officials;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
class OfficialsShow extends Component
{

    use WithFileUploads;
    public $first_name,$last_name, $position,$position_level = 1,
    $department,$civilStatus = "Single",
     $birthdate, $cellphone_number, $email,
     $profile_filename,  $userType,  $address,  $password,$confirm_password;
    

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
            'email' => 'unique:officials|unique:users',
            'profile_filename' => '',
            'userType' => '',
            'address' => '',
            'password' => '',
            'confirm_password' => 'same:password'
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
        $validatedData['position_level']= $this->position_level;
        $validatedData['cellphone_number']= '+639'.$this->cellphone_number;
        $validatedData['password']=  Hash::make($this->password);
        $validatedData['civilStatus']=  $this->civilStatus;
        if(!$validatedData['department']){
            $validatedData['department']=  "-";
        }
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
        $this->confirm_password = "";
    }

    public function render()
    {
        $this->officials = Officials::all();
        return view('livewire.officials-show', [$this->officials]);
    }
}
