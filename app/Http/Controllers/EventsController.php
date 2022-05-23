<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Events;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreEventsRequest;
use App\Http\Requests\UpdateEventsRequest;

class EventsController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except'=>['index', 'showEvent', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user = User::
        $events = Events::paginate(4);
        return view('pages.home', compact('events'));
    }

    public function addEvent(){
        return view('pages.add-event');
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
     * @param  \App\Http\Requests\StoreEventsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventsRequest $request)
    {
        $validate = $request->validate([
            'title' => 'required|unique:events|max:255',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
            'dateTime' => 'required',
        ]);

        if(request()->hasFile('image')){
            $path = $request->file('image')->store('public/images'); //Storing in folder
            $fileName = str_replace('public/', '', $path);
        }

        Events::create([
            'title' =>request('title'),
            'description' =>request('description'),
            'image' =>$fileName,
            'dateTime'=>request('dateTime'),
            'user_id' =>Auth::id(),
        ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function show(Events $events)
    {
        $events = Events::paginate(6);
        return view('pages.events', compact('events'));
    }
    public function showEvent(Events $event)
    {
        $date_arr= explode(" ", $event->dateTime);
        $date= $date_arr[0];
        $time= $date_arr[1];
        return view('pages.show-event', compact('event','date','time'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function edit(Events $event)
    {
        if(Gate::denies('edit-event', $event)){
            return view('pages.denies');
        }
        return view('pages.edit-event', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventsRequest  $request
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventsRequest $request, Events $event)
    {
        if($event->image){
            File::delete(storage_path('app/public/'.$event->image));
        }
        if(request()->hasFile('image')){
            $path = $request->file('image')->store('public/images');
            $fileName = str_replace('public/', '', $path);
            Events::where('id', $event->id)->update(['image'=>$fileName]);
        }
        Events::where('id', $event->id)->update($request->only(['title', 'description', 'dateTime']));
        return redirect('/event/'.$event->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function destroy(Events $event)
    {
        if(Gate::denies('delete-event', $event)){
            return view('pages.denies');
        }
        $event->delete();

        return redirect('/');
    }
}
