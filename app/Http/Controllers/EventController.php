<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
       
        $events = Event::all();
        
       

        // if ($request->ajax()) {
        //     $events = Event::all();
            return response()->json($events);
        // }

        //   // Devolver una vista con los eventos
        //   return view('admin.events.index', [
        //     'events' => $events
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'units'  => 'required|integer|min:1',
            'unit_price'=> 'required', 
            'start_date' => 'required|date', 
            'end_date'=> 'required|date|after_or_equal:start'
        ]);

        $event = Event::create([
            'units'  => $request->units,
            'unit_price'=> $request->unit_price, 
            'start_date' => $request->start_date,
            'end_date'=> $request->end_date
        ]);

        // Responder con el evento creado
        return response()->json(['success' => true, 'event' => $event]);

        // return redirect()->route('admin.events.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'units'  => 'required',
            'unit_price'=> 'required', 
            'start_date' => 'required', 
            'end_date'=> 'required'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
