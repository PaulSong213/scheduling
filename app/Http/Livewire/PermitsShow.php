<?php

namespace App\Http\Livewire;

use App\Models\Permits;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
class PermitsShow extends Component
{
    public $permits;
    public $typeOfPermit, $nameOfResident, $processingFee, $date;




    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function savePermits()
    {
    }

    public function render()
    {
        $this->permits = DB::table('permits')
            ->join('users', 'users.id', '=', 'permits.user_id')
            ->select('users.*', 'permits.*')
            ->get();
        return view('livewire.permits-show', [$this->permits]);
    }
}
