<?php

namespace App\Http\Controllers;

use App\Note;
use App\User;
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
            $param = '';
            if($request['private'] == 'yes') {
                $param = 'PRIVATE';
            }
            else {
                $param = 'PUBLIC';
            }
            $note = Note::create( $request->all() );
            $note->scope = $param;
            $note->save();
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

    public function newTech(Request $req)
    {
        return view('/techniciens/create');
    }

    public function registerTech(Request $req, User $user)
    {

        $this->validate($req, [
            'name' => 'required|max:255|min:4',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required_with:password|same:password',
        ]);
        $params['name'] = $req['name'];
        $params['email'] = $req['email'];
        $params['password'] = bcrypt($req['password']);

        $note = User::create( $params );

        $response = $user->sendMail($req);

        flash()->success('Opération réussie!', 'Technicien '.$params['name'].' créé avec succés.');
        return redirect('/new-user');
    }


}
