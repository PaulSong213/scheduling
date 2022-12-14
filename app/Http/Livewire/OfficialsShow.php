<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Officials;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Hash;

class OfficialsShow extends Component
{

    use WithFileUploads;
    use WithPagination;
    public $first_name, $last_name, $position, $position_level = 1,
        $department, $civilStatus = "Single",
        $birthdate, $cellphone_number, $email,
        $profile_filename,  $userType,  $address,  $password, $confirm_password;


    public  $official_id;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
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
        //$t =  $this->profile_filename->storePublicly('public');

        $a =  "admin";
        if(!$this->position_level)$this->position_level = 1;
        $validatedData = $this->validate();
        $validatedData['userType'] = $a;
        $validatedData['profile_filename'] = $this->profile_filename;
        $validatedData['userType'] = $a;
        $validatedData['position_level'] = $this->position_level;
        $validatedData['cellphone_number'] = '+639' . $this->cellphone_number;
        $validatedData['password'] =  Hash::make($this->password);
        $validatedData['civilStatus'] =  $this->civilStatus;
        if (!$validatedData['department']) {
            $validatedData['department'] =  "-";
        }
        Officials::create($validatedData);
        session()->flash('message', 'Official added successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
    public function updateOfficial()
    {

        //$q =  $this->profile_filename->storePublicly('public');
        $b =  "admin";

        $validatedData = $this->validate();
        $validatedData['userType'] = $b;

        Officials::where('id', $this->official_id)->update([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'position' => $validatedData['position'],
            'position_level' => $validatedData['position_level'],
            'department' => $validatedData['department'],
            'civilStatus' => $validatedData['civilStatus'],
            'birthdate' => $validatedData['birthdate'],
            'cellphone_number' => $validatedData['cellphone_number'],
            'email' => $validatedData['email'],
            'profile_filename' => $validatedData['profile_filename'],
            'userType' => $validatedData['userType'],
            'address' => $validatedData['address'],
        ]);
        session()->flash('message', 'Updated Official successfully');
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
    public function editOfficial(int $official_id)
    {
        $official = Officials::find($official_id);
        if ($official) {
            $this->official_id = $official->id;
            $this->first_name = $official->first_name;
            $this->last_name =  $official->last_name;
            $this->email =  $official->email;
            $this->position =  $official->position;
            $this->position_level =  $official->position_level;
            $this->department =  $official->department;
            $this->civilStatus = $official->civilStatus;
            $this->birthdate =  $official->birthdate;
            $this->cellphone_number =  $official->cellphone_number;
            $this->profile_filename =  $official->profile_filename;
            $this->address =  $official->address;
            $this->password =  $official->password;
        } else {
            return redirect()->to('/officials');
        }
    }

    public function deleteOfficial(int $official_id)
    {
        $this->official_id = $official_id;
    }
    public function destroyOfficial()
    {
        Officials::find($this->official_id)->delete();
        session()->flash('message', 'Official deleted successfully');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $officials = Officials::where('first_name', 'like', '%' . $this->search . '%')
        ->orWhere('last_name', 'like', '%' . $this->search . '%')
        ->orderBy('id', 'DESC')->paginate(5);
        return view('livewire.officials-show', ['officials' => $officials]);
    }
}
