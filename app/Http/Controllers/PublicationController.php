<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications = publication::all();
        return view('Publications.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Publications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|min:5|max:250',
            'descripcion' => 'required',
            'puntuacion' => 'required',
        ]);

        $publication = new Publication();
        $publication->titulo = $request->titulo;
        $publication->descripcion = $request->descripcion;
        $publication->puntuacion = $request->puntuacion;
        $publication->save();


        /*$publication = Publication::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'puntuacion' => $request->puntuacion,
        ]);*/

        return redirect('publication');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        return view('Publications.show', compact('publication'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $publication)
    {
        return view('Publications.edit', compact('publication'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publication $publication)
    {
        $request->validate([
            'titulo' => 'required|min:5|max:250',
            'descripcion' => 'required',
            'puntuacion' => 'required',
        ]);

        $publication->titulo = $request->titulo;
        $publication->descripcion = $request->descripcion;
        $publication->puntuacion = $request->puntuacion;
        $publication->save();

      /*  Publication::where('id', $publication->id)
            ->update($request->execpt(['_method', '_token'])); */

        return redirect('/publication');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {
        $publication->delete();
        return redirect('publication');
    }
}
