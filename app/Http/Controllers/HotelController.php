<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $hotels = Hotel::paginate(5);
        return view('hotel.index')
                ->with('hotels',$hotels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('hotel.form');
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


        $hotel = Hotel::create($request->only('name','nit','city','num_room','address'));

        Session::flash('mensaje', 'Registro creado con éxito');
        return redirect()->route('hotel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        //
        return view('hotel.form')
        ->with('hotel',$hotel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        //
        $request->validate([
            'name' =>'required|max:15',
            'nit' =>'required|gte:5'
        ]);


        $hotel->name = $request['name'];
        $hotel->nit = $request['nit'];
        $hotel->city = $request['city'];
        $hotel->num_room = $request['num_room'];
        $hotel->address = $request['address'];
        $hotel->save();

        Session::flash('mensaje', 'Registro Editado con éxito');
        return redirect()->route('hotel.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        //
        $hotel->delete();
        Session::flash('mensaje', 'Registro Eliminado con éxito');
        return redirect()->route('hotel.index');
    }
}
