<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicationController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$publications = publication::all();
        $publications = Auth::user()->publications;
        return view('admin.posts.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
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
            'imagen' => 'required',
            'caraceristicas' => 'required',
            'puntuacion' => 'required',
        ]);

        $publication = new Publication();
        $publication->user_id = Auth::id();
        $publication->titulo = $request->titulo;
        if($imagen = $request->file('imagen')) {
            $rutaGuardarImg = 'Imagen/';
            $imagenPublicacion = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenPublicacion);
            $publication['imagen'] = "$imagenPublicacion";
        };
        $publication->caraceristicas = $request->caraceristicas;
        $publication->puntuacion = $request->puntuacion;
        $publication->save();

        return redirect('/admin/publication')->with('info', 'Publicacion creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        return view('admin.posts.show', compact('publication'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $publication)
    {
        return view('admin.posts.edit', compact('publication'));
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
            'caraceristicas' => 'required',
            'puntuacion' => 'required',
        ]);

        $publication->user_id = Auth::id();
        $publication->titulo = $request->titulo;
        if($imagen = $request->file('imagen')) {
            $rutaGuardarImg = 'Imagen/';
            $imagenPublicacion = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenPublicacion);
            $publication['imagen'] = "$imagenPublicacion";
        };
        $publication->caraceristicas = $request->caraceristicas;
        $publication->puntuacion = $request->puntuacion;
        $publication->save();


        return redirect()->route('publication.show', $publication->id )->with('info', 'Publicacion actualizada');
        
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
        return redirect('/admin/publication')->with('delete', 'Publicacion borrada');
    }

}
