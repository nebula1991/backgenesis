<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function all()
    {
        return response()->json(Event::get());
    }   
    
    public function index()
    {
        return response()->json(Event::paginate(10));
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
        return response()->json(Event::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $event = Event::find($id);

        if (!$event) {
            return response()->json([
                'message' => 'Evento no encontrado'
            ], 404);
        }
        return response()->json($event);
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
        $event->update($request->all());
        return response()->json($event);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return response()->json('ok');
    }
}
