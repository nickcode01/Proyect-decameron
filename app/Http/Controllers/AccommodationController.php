<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Accommodation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccommodationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $accommodations = Accommodation::paginate(5);
        return view('accommodation.index')
                ->with('accommodations',$accommodations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('accommodation.form');
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


        $accommodation = Accommodation::create($request->only('name','nit','city','num_accommodation','address'));

        Session::flash('mensaje', 'Registro creado con éxito');
        return redirect()->route('accommodation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function show(Accommodation $accommodation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function edit(Accommodation $accommodation)
    {
        //
        return view('accommodation.form')
        ->with('accommodation',$accommodation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accommodation $accommodation)
    {
        //
        $request->validate([
            'name' =>'required|max:15',
            'room_id' =>'required|gte:5'
        ]);


        $accommodation->name = $request['name'];


        $accommodation->room_id = $request['room_id'];

        $accommodation->save();

        Session::flash('mensaje', 'Registro Editado con éxito');
        return redirect()->route('accommodation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accommodation $accommodation)
    {
        //
        $accommodation->delete();
        Session::flash('mensaje', 'Registro Eliminado con éxito');
        return redirect()->route('accommodation.index');
    }
}
