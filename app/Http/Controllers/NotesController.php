<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Note;
use Illuminate\Support\Facades\Auth;


class NotesController extends Controller
{
    function fetchNotes()
    {
        $email = Auth()->user()->email;
        $notes = Note::where('email',$email)->get();

        return view('dashboard', ['notes' => $notes]);
    }
}
