<?php

namespace App\Http\Controllers;

use App\Song;
use App\Category;

use Illuminate\Http\Request;

class SongsController extends Controller
{
    public function index()
    {
        $songs = Song::where('category_id', 5)->get();
        return view('welcome', ['songs' => $songs]);
        // return $songs;

    }
    public function indiepage()
    {
        $songs = Song::where('category_id', 1)->get();
        return view('indie', ['songs' => $songs]);
    }

    public function poppage()
    {
        $songs = Song::where('category_id', 3)->get();
        return view('pop', ['songs' => $songs]);
    }

    public function rockpage()
    {
        $songs = Song::where('category_id', 4)->get();
        return view('rock', ['songs' => $songs]);
    }

    public function hiphoppage()
    {
        $songs = Song::where('category_id', 2)->get();
        return view('hiphop', ['songs' => $songs]);
    }

    public function show($id)
    {
        $song = Song::find($id);
        return view('song', ['song' => $song]);
    }


    public function new()
    {
        $categories = Category::all();
    }

    public function store(Request $request)
    {
        $song = Song::create($request->all());
        return redirect("/edit/{$song['id']}");
    }

    public function edit($id)
    {
        $song = Song::find($id);
        $category = Song::find($id)->category;
        $categories = Category::all();
    }

    public function update(Request $request, $id)
    {
        Song::find($id)->update($request->all());
        return $this->edit($id);
    }

}
