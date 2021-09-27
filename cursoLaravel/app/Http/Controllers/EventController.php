<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    public function index() 
    {

        $search = request('search');

        if($search) {

            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();

        } else {
            $events = Event::all();
        }        
    
        return view('welcome',['events' => $events, 'search' => $search]);

    }

    

    public function create() 
    {
        return view('events.create');
    }

    public function store(Request $request) 
    {
        // AINDA PRECISA COLOCAR UMA VERIFICAÇÂO PARA SALVAR NO BANCO COM AVISO DE CAMPOS VAZIOS
        $event = new Event;

        $event->title = $request->title;
        $event->description = $request->description;
        $event->place = $request->place;
        $event->private = $request->private;
        $event->items = $request->items;
        
        // img upload

        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $event->image = $imageName;

            $event->items = $request->items;

            $event->date = $request->date;

        }

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect('/')->with('msg', "Evento criado com Sucesso!!");
    }

    public function show($id) {

        $event = Event::findOrFail($id);

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]);
        
    }
}
