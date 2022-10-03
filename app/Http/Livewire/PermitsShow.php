<?php

namespace App\Http\Livewire;

use App\Models\Permits;
use Dotenv\Util\Str;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PermitsShow extends Component
{
    public $permits, $viewPermit;
    public $currentPermit, $newStatus, $newScheduledDate, $message, $current_cellphone_number;
    public $typeOfPermit, $nameOfResident, $processingFee, $date, $permitID;
    public $status, $scheduled_date, $decline_reason;
    protected function rules()
    {
        return [
            'typeOfPermit' => '',
            'nameOfResident' => '',
            'processingFee' => '',
            'status' => '',
            'scheduled_date' => '',
            'decline_reason' => '',

        ];
    }


    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function editPermit(int $permitID, String $current_cellphone_number)
    {
        $this->currentPermit = Permits::find($permitID)->toArray();
        $this->current_cellphone_number = $current_cellphone_number;
    }
    public function view(int $permitID)
    {
        $this->viewPermit = DB::table('permits')
        ->join('users', 'users.id', '=', 'permits.user_id')
        ->select('users.*', 'permits.*')
        ->where('permits.id', '=', $permitID)
        ->get();
    }
    public function schedulePermit()
    {
        $this->currentPermit['status'] = "scheduled";
        $this->currentPermit['scheduled_date'] = date('Y-m-d H:i:s',  strtotime($this->newScheduledDate));
        $this->currentPermit['created_at'] = date('Y-m-d H:i:s',  strtotime($this->currentPermit['created_at']));
        $this->currentPermit['updated_at'] = date('Y-m-d H:i:s',  strtotime($this->currentPermit['updated_at']));

        Permits::where('id', $this->currentPermit['id'])->update(
            $this->currentPermit
        );
        session()->flash('message', 'Permit has been scheduled successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        redirect()->route('sendSMS', ['sms' => $this->message, 'number' => "+" . $this->current_cellphone_number, 'redirectRoute' => '/permits']);
    }

    public function resetInput()
    {
        $this->newScheduledDate = "";
    }
    public function resetModal()
    {
        $this->viewPermit = null;
    }
    public function declinePermit()
    {
        $this->currentPermit['status'] = "declined";
        $this->currentPermit['decline_reason'] = $this->message;
        $this->currentPermit['created_at'] = date('Y-m-d H:i:s',  strtotime($this->currentPermit['created_at']));
        $this->currentPermit['updated_at'] = date('Y-m-d H:i:s',  strtotime($this->currentPermit['updated_at']));
        Permits::where('id', $this->currentPermit['id'])->update(
            $this->currentPermit
        );
        session()->flash('message', 'Permit has been denied.');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        redirect()->route('sendSMS', ['sms' => $this->message, 'number' => "+" . $this->current_cellphone_number, 'redirectRoute' => '/home']);
    }

    public function render()
    {
        $this->permits = DB::table('permits')
            ->join('users', 'users.id', '=', 'permits.user_id')
            ->select('users.*', 'permits.*')
            ->where('permits.status', '=', 'pending')
            ->get();
        return view('livewire.permits-show', [$this->permits]);
    }
}
