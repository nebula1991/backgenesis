<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('admin.events.index');
    }


        
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
   
            // Validamos los datos
            $request->validate([
                'title' => 'required|string|max:255',
                'units' => 'required',
                'price' => 'required',
                'start' => 'required|date',
                'end' => 'nullable|date|after_or_equal:start',
            ]);

                    // Ajustar las fechas a la zona horaria correcta
            $startDate = Carbon::parse($request->start)->setTimezone(config('app.timezone'));
            $endDate = $request->end ? Carbon::parse($request->end)->setTimezone(config('app.timezone')) : null;

            // Guardamos el evento
            $evento = Event::create([
                'title' => $request->title,
                'units' => $request->units,
                'price' => $request->price,
                'start' => $startDate,
                'end' => $endDate,
            ]);

            return response()->json($evento);
 
 
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $event = Event::all();
        return response()->json($event);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $event = Event::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'units' => 'required',
            'price' => 'required',
            'start' => 'required|date',
            'end' => 'nullable|date|after_or_equal:start',
        ]);

             // Ajustar las fechas a la zona horaria correcta
             $startDate = Carbon::parse($request->start)->setTimezone(config('app.timezone'));
             $endDate = $request->end ? Carbon::parse($request->end)->setTimezone(config('app.timezone')) : null;
               
             // Actualizar el evento
             $event->update([
                'title' => $request->title,
                'units' => $request->units,
                'price' => $request->price,
                'start' => $startDate,
                'end' => $endDate,
            ]);

         
            // Retornar una respuesta exitosa
            return response()->json(['success' => true, 'message' => 'Evento actualizado con éxito']);  
            }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        $event->delete();

        return response()->json(['success' => true, 'message' => 'Evento eliminado']);
    }
}
