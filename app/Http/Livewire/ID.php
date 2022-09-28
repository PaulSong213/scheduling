<?php

namespace App\Http\Livewire;

use App\Models\Credentials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ID extends Component
{
    public $credentials ,$viewID;
    public $currentCredential, $newStatus, $newScheduledDate, $message, $current_cellphone_number;
    public $typeOfPermit, $nameOfResident, $processingFee, $date, $permitID;
    public $status, $scheduled_date, $decline_reason;

    public function editID(int $permitID, String $current_cellphone_number)
    {
        $this->currentCredential = Credentials::find($permitID)->toArray();
        $this->current_cellphone_number = $current_cellphone_number;
    }

    public function view(int $permitID)
    {
        $this->viewID = DB::table('credentials')
        ->join('users', 'users.id', '=', 'credentials.user_id')
        ->select('users.*', 'credentials.*')
        ->where('credentials.id', '=', $permitID)
        ->get();
    }
    public function scheduleID()
    {
        $this->currentCredential['status'] = "scheduled";
        $this->currentCredential['scheduled_date'] = date('Y-m-d H:i:s',  strtotime($this->newScheduledDate));
        $this->currentCredential['created_at'] = date('Y-m-d H:i:s',  strtotime($this->currentCredential['created_at']));
        $this->currentCredential['updated_at'] = date('Y-m-d H:i:s',  strtotime($this->currentCredential['updated_at']));

        Credentials::where('id', $this->currentCredential['id'])->update(
            $this->currentCredential
        );
        session()->flash('message', 'Credential has been scheduled successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        redirect()->route('sendSMS', ['sms' => $this->message, 'number' => "+" . $this->current_cellphone_number, 'redirectRoute' => '/home']);
    }
    public function resetInput()
    {
        $this->newScheduledDate = "";
    }
    public function declineBrgyID()
    {
        $this->currentCredential['status'] = "declined";
        $this->currentCredential['decline_reason'] = $this->message;
        $this->currentCredential['created_at'] = date('Y-m-d H:i:s',  strtotime($this->currentCredential['created_at']));
        $this->currentCredential['updated_at'] = date('Y-m-d H:i:s',  strtotime($this->currentCredential['updated_at']));
        Credentials::where('id', $this->currentCredential['id'])->update(
            $this->currentCredential
        );
        session()->flash('message', 'Credential has been declined');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        redirect()->route('sendSMS', ['sms' => $this->message, 'number' => "+" . $this->current_cellphone_number, 'redirectRoute' => '/home']);
    }


    public function render()
    {
        $this->credentials = DB::table('credentials')
        ->join('users', 'users.id', '=', 'credentials.user_id')
        ->select('users.*', 'credentials.*')
        ->where('credentials.credential_type', '=', 'Barangay ID')
        ->where('credentials.status', '=', 'pending')
        ->get();
    return view('livewire.i-d');
    }
}
