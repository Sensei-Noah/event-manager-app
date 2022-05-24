<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Signup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreSignupRequest;
use App\Http\Requests\UpdateSignupRequest;

class SignupController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['except'=>['index','store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Events $event)
    {
        return view('pages.signup.show-signup', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSignupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSignupRequest $request, Events $event)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required', // TODO: FIX multiple emails but need to allow sign in to multiple events
            'phone_number' => 'required|string|min:8|max:11',
            'event_id' => 'required',
        ]);

        Signup::create([
            'name' => request('name'),
            'email' => request('email'),
            'phone_number' => request('phone_number'),
            'event_id' => request('event_id'),
        ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Signup  $signup
     * @return \Illuminate\Http\Response
     */
    public function show(Signup $signup)
    {
        $signup = Signup::paginate(6);
        return view('pages.signup.all-signup', compact('signup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Signup  $signup
     * @return \Illuminate\Http\Response
     */
    public function edit(Signup $signup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSignupRequest  $request
     * @param  \App\Models\Signup  $signup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSignupRequest $request, Signup $signup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Signup  $signup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Signup $signup)
    {
        //
    }
}
