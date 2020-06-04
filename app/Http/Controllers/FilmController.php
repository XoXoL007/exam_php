<?php

namespace App\Http\Controllers;

use App\Film;
use App\Genre;
use App\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations;

class FilmController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $films = Film::all();

        return view('films.index', compact('user', 'films'));
    }

    public function create()
    {
        $this->authorize('create', Film::class);
        return view('films.form', [
            'films' => [],
            'genres' => Genre::all()->toArray(),
            'actors' => Actor::all()->toArray()
        ]);
    }

    public function store(Request $request)
    {

        $this->authorize('create', Film::class);

        $data = $this->validated($request);


        $cover_url = null;
        $trailer_url = null;
        $film_url = null;

        if($data['cover_url'] ?? false){
            /** @var UploadedFile $fileCover */
            $fileCover = $data['cover_url'];
            $fileCover->storeAs('public/movies/cover', $name = Str::random() . '.' . $fileCover->extension());
            $data['cover_url'] = "movies/cover/" . $name;
        }

        if($data['trailer_url'] ?? false){
            /** @var UploadedFile $fileTrailer */
            $fileTrailer = $data['trailer_url'];
            $fileTrailer->storeAs('public/movies/trailer', $name = Str::random() . '.' . $fileTrailer->extension());
            $data['trailer_url'] = "movies/trailer/" . $name;
        }

        if($data['film_url'] ?? false){
            /** @var UploadedFile $fileFilm */
            $fileFilm = $data['film_url'];
            $fileFilm->storeAs('public/movies/film', $name = Str::random() . '.' . $fileFilm->extension());
            $data['film_url'] = "movies\\film\\" . $name;
        }

        $film = auth()->user()->films();

        $film = $film->create($data);

        foreach($data['genres'] as $id){
            $genre = Genre::on()->findOrFail($id);
            $film->genre()->create($genre);
        }



        return redirect('/films');
    }


    public function show(Film $film)
    {
        $this->authorize('view', $film);

        return view('films.show', compact('film'));
    }


    public function edit(Film $film)
    {
        //
    }


    public function update(Request $request, Film $film)
    {
        //
    }


    public function destroy(Film $film)
    {
        //
    }

    protected function validated(Request $request, Film $film = null)
    {

        $rules = [
            'title' => 'required|min:10|max:150|unique:films',
            'decryption' => 'nullable',
            'cover_url' => 'nullable|file',
            'trailer_url' => 'nullable|file',
            'film_url' => 'nullable|file',
            'quality_id' => 'required|quality',
            'release_year_id' => 'required|release_year',
            'genres' => 'required|array'

        ];

        if($film)
            $rules['title'] .= ',title,' . $film->id;

        return $request->validate($rules, [
            'quality_id' => 'Качество не действительно',
            'release_year_id' => 'Год не действителен',
            ''
        ]);

    }

}
