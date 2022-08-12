<?php

namespace App\Http\Controllers;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\Accommodation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rooms = Room::paginate(5);
        return view('room.index')
                ->with('rooms',$rooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('room.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' =>'required|max:15',
            'nit' =>'required|gte:50'
        ]);


        $room = Room::create($request->only('name','nit','city','num_room','address'));

        Session::flash('mensaje', 'Registro creado con éxito');
        return redirect()->route('room.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
        return view('room.form')
        ->with('room',$room);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
        $request->validate([
            'name' =>'required|max:15',
            'nit' =>'required|gte:5'
        ]);


        $room->name = $request['name'];
        $room->nit = $request['nit'];
        $room->city = $request['city'];
        $room->num_room = $request['num_room'];
        $room->address = $request['address'];
        $room->save();

        Session::flash('mensaje', 'Registro Editado con éxito');
        return redirect()->route('room.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
        $room->delete();
        Session::flash('mensaje', 'Registro Eliminado con éxito');
        return redirect()->route('room.index');
    }
}
