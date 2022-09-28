<?php

namespace App\Http\Livewire;

use App\Models\Credentials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Home extends Component
{
    public $search = '';


    public function render()
    {
        $credentials = DB::table('credentials')
            ->join('users', 'credentials.user_id', '=', 'users.id')
            ->select('credentials.*', 'users.*')
            ->where('credentials.status', '!=', 'pending')
            ->where('credentials.credential_type', 'like', '%' . $this->search . '%')
            ->orWhere('users.first_name', 'like', '%' . $this->search . '%')
            ->orWhere('users.last_name', 'like', '%' . $this->search . '%')
            ->get();
        $permits = DB::table('permits')
            ->join('users', 'users.id', '=', 'permits.user_id')
            ->where('permits.status', '!=', 'pending')
            ->where('permits.business_name', 'like', '%' . $this->search . '%')
            ->orWhere('users.last_name', 'like', '%' . $this->search . '%')
            ->orWhere('users.first_name', 'like', '%' . $this->search . '%')
            ->get();

        return view('livewire.home')
            ->with('credentials', $credentials)
            ->with('permits', $permits);
    }
}
