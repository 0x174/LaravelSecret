<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;

class NotesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'note' => 'required',
            'email' => 'nullable|email'
        ]);

        $note = new Note(
            $request->only('note', 'email')
        );

        $note->storeEncrypted($key = str_random(8));

        return response()->json([
            'url' => $note->url($key)
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note, Request $request)
    {
        $note = $note->read($request->key);

        return view('show', compact('note'));
    }
}
