<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index()
    {
        $events = auth()->user()->accessableEvents();
        
        return view('events.index', compact('events'));
    }

    public function show(Event $event)
    {
        $this->authorize('update', $event);
        
        return view('events.show', compact('event'));
    }

    public function store()
    {
        $event = auth()->user()->events()->create($this->validateRequest());

        return redirect($event->path());
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Event $event)
    {
        $this->authorize('update', $event);

        $event->update($this->validateRequest());

        return redirect($event->path());
    }
        
    public function create()
    {
        return view('events.create');
    }

    public function destroy(Event $event)
    {
        $this->authorize('manage', $event);

        $event->delete();

        return redirect('/events');
    }

    protected function validateRequest()
    {
        return request()->validate([
            'title' => 'sometimes|required',
            'description' => 'sometimes|required',
            'notes' => 'nullable'
        ]);
    }
}
