<?php

namespace App\Http\Livewire;

use App\Models\Events;
use Livewire\Component;
use Livewire\WithFileUploads;
class EventsShow extends Component
{
    use WithFileUploads;
    
    public $events;
    public $event_name, $venue, $purpose, $date, $event_filename;
    
    protected function rules()
    {
        return [
            'event_name' => '',
            'venue' => '',
            'purpose' => '',
            'date' => '',
            'event_filename' => '',

        ];
    }
    
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }


    public function saveEvents()
    {
       
    $t =  $this->event_filename->storePublicly('public');   
        

        $validatedData = $this->validate();
        $validatedData['event_filename']= $t;
        Events::create($validatedData);
        session()->flash('message', 'Event added successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInput(){
        $this->event_name = "";
        $this->date = "";
        $this->purpose = "";
        $this->venue = "";
        $this->event_filename = "";

    }

    public function render()
    {
        $this->events = Events::all();
        
        return view('livewire.events-show', [$this->events]);
    }
}
