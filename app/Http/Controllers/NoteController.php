<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        return Note::orderBy('created_at', 'desc')->get();
    }

    public function store(Request $request)
    {
        $storedNote = Note::create([
            'title' =>  $request->input('title'),
            'note'  =>  $request->input('note')
        ]);

        return $storedNote;
    }

    public function show($id)
    {
        $selectedNote = Note::where('id', $id)->first();

        return json_encode($selectedNote->note);
    }

    public function update(Request $request, $id)
    {
        Note::where('id', $id)->update([
            'note'  =>  $request->input('note')
        ]);
    }
}
