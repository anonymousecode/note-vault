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
        $notes = Note::where('email',$email)->paginate(14);

        return view('dashboard', ['notes' => $notes]);
    }

    function save(Request $request){
        $email = Auth::user()->email;
        $note = new Note();
        $note->email = $email;
        $note->title = $request->input('title');
        $note->content = $request->input('content');
        $status = $note->save();
        if($status){
            return redirect()->route('dashboard')->with('success', 'Note saved successfully!');
        } else {
            return redirect()->route('dashboard')->with('error', 'Failed to save note.');
        }

    }

    function delete($id){

        $note = Note::find($id);
        if($note){
            $note->delete();
            return redirect()->route('dashboard')->with('success', 'Note deleted successfully!');
        } else {
            return redirect()->route('dashboard')->with('error', 'Note not found.');
        }
    }
}
