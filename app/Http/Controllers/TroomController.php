<?php

namespace App\Http\Controllers;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\Accommodation;
use App\Models\Troom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $trooms = Troom::paginate(5);
        return view('troom.index')
                ->with('trooms',$trooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('troom.form');
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


        $troom = Troom::create($request->only('name','nit','city','num_troom','address'));

        Session::flash('mensaje', 'Registro creado con éxito');
        return redirect()->route('troom.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Troom  $troom
     * @return \Illuminate\Http\Response
     */
    public function show(Troom $troom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Troom  $troom
     * @return \Illuminate\Http\Response
     */
    public function edit(Troom $troom)
    {
        //
        return view('troom.form')
        ->with('troom',$troom);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Troom  $troom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Troom $troom)
    {
        //
        $request->validate([
            'name' =>'required|max:15',
            'nit' =>'required|gte:5'
        ]);


        $troom->name = $request['name'];
        $troom->nit = $request['nit'];
        $troom->city = $request['city'];
        $troom->num_room = $request['num_room'];
        $troom->address = $request['address'];
        $troom->save();

        Session::flash('mensaje', 'Registro Editado con éxito');
        return redirect()->route('troom.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Troom  $troom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Troom $troom)
    {
        //
        $troom->delete();
        Session::flash('mensaje', 'Registro Eliminado con éxito');
        return redirect()->route('troom.index');
    }
}
