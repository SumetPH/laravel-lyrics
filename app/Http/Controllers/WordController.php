<?php

namespace App\Http\Controllers;

use App\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $word = new Word;
        $word->lyrics_id = $request->lyrics_id;
        $word->word = $request->word;
        $word->type = $request->type;
        $word->translate = $request->translate;
        if ($word->save()) {
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'Save error!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $word = Word::find($id);
        return view('word.edit')->with('word', $word);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $word = Word::find($id);
        $word->word = $request->word;
        $word->type = $request->type;
        $word->translate = $request->translate;
        if ($word->save()) {
            return redirect('/lyrics/' . $word->lyrics_id);
        } else {
            return redirect()->back()->with('error', 'Save error!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $word = Word::find($id);
        if ($word->delete()) {
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'Delete error!');
        }
    }
}
