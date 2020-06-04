<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::all();

        return view('genres.index',compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Genre::class);

        return view('genres.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Genre::class);

        $data = $this->validated($request);

        Genre::create($data);

        return redirect()->route('genres.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        $this->authorize('update', $genre);

        return view('genres.form', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $genre)
    {
        $this->authorize('update', $genre);

        $data = $this->validated($request, $genre);

        $genre->update($data);
        return redirect()->route('genres.index', $genre);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        $this->authorize('delete', $genre);

        $genre->delete();
        return redirect()->route('genres.index');
    }

    protected function validated(Request $request, Genre $genre = null)
    {
        $rules = [
            'name' => 'required|min:5|max:100|unique:genres',

        ];

        if($genre)
            $rules['name'] .= ',name,' . $genre->id;

        return $request->validate($rules);

    }
}
