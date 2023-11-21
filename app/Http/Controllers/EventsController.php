<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Event;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('created_at', 'asc')->get();
        return view('events', ['events'=>$events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $event = new Event;
        return view('eventsForm', ['event' => $event]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Podstawowa walidacja formularza:
        $this->validate($request, [
            'description' => 'required|min:10|max:500',
        ]);
        if (\Auth::user() == null) {
            return view('home'); // jeśli użytkownik nie jest zalogowany
        }
        $event = new Event();
        $event->user_id = \Auth::user()->id; // ID aktualnie zalogowanego usera
        $event->title = $request->title;
        $event->description = $request->description;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->place = $request->place;
        if ($event->save()) {
            return redirect('events');
        }
        return view('events');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        //Sprawdzenie czy użytkownik jest autorem komentarza
        if (\Auth::user()->id != $event->user_id) {
            return back()->with(['success' => false, 'message_type' => 'danger',
                'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']);
        }
        return view('eventsEditForm', ['event'=>$event]);
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
        $event = Event::find($id);
        //Sprawdzenie czy użytkownik jest autorem komentarza
        if (\Auth::user()->id != $event->user_id) {
            return back()->with(['success' => false, 'message_type' => 'danger',
                'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']);
        }
        $event->message = $request->message;
        if($event->save()) {
            return redirect()->route('events');
        }
        return "Wystąpił błąd.";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Znajdź komentarz o danych id:
        $event = Event::find($id);
        //Sprawdź czy użytkownik jest autorem komentarza:
        if (\Auth::user()->id != $event->user_id) {
            return back();
        }
        if ($event->delete()) {
            return redirect()->route('events');
        } else
            return back();
    }

    public function storeComment(Request $request, $eventId)
    {
        $validatedData = $request->validate([
            'content' => 'required|string',
        ]);

        $event = Event::findOrFail($eventId);

        $comment = new Comment($validatedData);
        $comment->user_id = \Auth::user()->id;
        $event->comments()->save($comment);

        return redirect()->back()->with('status', 'Komentarz został dodany pomyślnie!');
    }

}
