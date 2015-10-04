<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TechnicienController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function notes()
    {
        $notes = Note::with('technicien')->get();
        return view('/techniciens/notes', ['notes' => $notes]);
    }
    public function handleAction(Request $request)
    {
        $action = $request->input('_action');

        if( $action == 'addNote' )
        {
            Note::create( $request->all() );
            return response(['status' => 'success']);
        }
        else if( $action == "deleteNote")
        {
            $note = Note::find($request->input('id'));
            $note->delete();
            return response(['status' => 'success']);
        }
        else
        {
            return response(['status' => 'error']);
        }


    }


}
