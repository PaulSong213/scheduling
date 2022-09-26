<?php

namespace App\Http\Livewire;

use App\Models\Events;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;


class EventsShow extends Component
{
    use WithFileUploads;
    use WithPagination;

    // public $events;
    public $event_name, $venue, $purpose, $date, $event_filename, $event_id;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
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
        $validatedData['event_filename'] = $t;
        Events::create($validatedData);
        session()->flash('message', 'Event added successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
    public function updateEvents()
    {

        $t =  $this->event_filename->storePublicly('public');


        $validatedData = $this->validate();
        $validatedData['event_filename'] = $t;

        Events::where('id', $this->event_id)->update([
            'event_name' => $validatedData['event_name'],
            'date' => $validatedData['date'],
            'purpose' => $validatedData['purpose'],
            'venue' => $validatedData['venue'],
            'event_filename' => $validatedData['event_filename'],

        ]);
        session()->flash('message', 'Update event successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInput()
    {
        $this->event_name = "";
        $this->date = "";
        $this->purpose = "";
        $this->venue = "";
        $this->event_filename = "";
    }
    public function editEvent(int $event_id)
    {
        $event = Events::find($event_id);
        if ($event) {
            $this->event_id = $event->id;
            $this->event_name = $event->event_name;
            $this->date = $event->date;
            $this->purpose = $event->purpose;
            $this->venue = $event->venue;
            $this->event_filename = $event->event_filename;
        } else {
            return redirect()->to('/events');
        }
    }

    public function deleteEvent(int $event_id)
    {
        $this->event_id = $event_id;
    }
    public function destroyEvents()
    {
        Events::find($this->event_id)->delete();
        session()->flash('message', 'Event deleted successfully');
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
        $events = Events::where('event_name', 'like', '%' . $this->search . '%')->orderBy('id', 'DESC')->paginate(5);

        return view('livewire.events-show', ['events' => $events]);
    }
}
