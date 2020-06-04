<?php

namespace App\Http\Controllers;

use App\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ActorController extends Controller
{
    public function index()
    {
        $actors = Actor::all();

        return view('actors.index', compact('actors'));
    }


    public function create()
    {

        $this->authorize('create', Actor::class);

        return view('actors.form');
    }

    public function store(Request $request)
    {

        $this->authorize('create', Actor::class);

        $data = $this->validated($request);

        $photo_url = null;

        if($data['photo_url'] ?? false){
            /** @var UploadedFile $file */
            $file = $data['photo_url'];
            $file->storeAs('public/photo_actors', $name = Str::random() . ' . ' . $file->extension());
            $data['photo_url'] = "photo_actors/" . $name;
        }

        if($data['actors'] ?? false){
            $data->actors()->create($data['actors']);
        }

        Actor::create($data);

        return redirect()->route('actors.index');
    }

    public function show(Actor $actor)
    {
        $this->authorize('view', $actor);

        return view('actors.show', compact('actor'));
    }

    public function edit(Actor $actor)
    {
        $this->authorize('update', $actor);

        return view('actors.form', compact('actor'));
    }

    public function update(Request $request, Actor $actor)
    {
        $this->authorize('update', $actor);

        $data = $this->validated($request, $actor);

        $actor->update($data);
        return redirect()->route('actors.show', $actor);
    }

    public function destroy(Actor $actor)
    {
        $this->authorize('delete', $actor);

        $actor->delete();
        return redirect()->route('actors.index');
    }

    protected function validated(Request $request, Actor $actor = null)
    {
        $rules = [
            'name' => 'required|min:5|max:100|unique:actors',
            'photo_url' => 'nullable|file',
            'decrypt_info' => 'nullable',
        ];

        if($actor)
            $rules['name'] .= ',name,' . $actor->id;

        return $request->validate($rules);

    }
}
