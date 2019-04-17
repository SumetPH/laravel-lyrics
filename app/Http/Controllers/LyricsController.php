<?php

namespace App\Http\Controllers;

use App\Lyrics;
use App\Word;
use Illuminate\Http\Request;

class LyricsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lyrics = Lyrics::all();
        return view('lyrics.index')->with('lyrics', $lyrics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lyrics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lyrics = new Lyrics;
        $lyrics->title = $request->title;
        $lyrics->youtube = $request->youtube;
        $lyrics->lyrics = $request->lyrics;
        if ($lyrics->save()) {
            return redirect('/lyrics');
        } else {
            return redirect()->back()->with('error', 'Save error!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lyrics = Lyrics::find($id);
        $words = Lyrics::find($id)->words;
        $data = [
            'lyrics' => $lyrics,
            'words' => $words,
        ];
        return view('lyrics.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lyrics = Lyrics::find($id);
        return view('lyrics.edit')->with('lyrics', $lyrics);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lyrics = Lyrics::find($id);
        $lyrics->title = $request->title;
        $lyrics->youtube = $request->youtube;
        $lyrics->lyrics = $request->lyrics;
        if ($lyrics->save()) {
            return redirect('/lyrics');
        } else {
            return redirect()->back()->with('error', 'Save error!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lyrics::destroy($id);
        Word::where('lyrics_id', $id)->delete();
        return redirect()->back();
    }
}
