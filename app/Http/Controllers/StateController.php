<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\State;
use Gate;
use App\User;

class StateController extends Controller
{
    public function __Construct()
    {
    	$this->middleware('permission:state-list|state-create|state-edit|state-delete', ['only' => ['index','show']]);

        $this->middleware('permission:state-create', ['only' => ['create','store']]);

        $this->middleware('permission:state-edit', ['only' => ['edit','update']]);

        $this->middleware('permission:state-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $states = State::all()->sortBy("state");//dd($univs);
        $data = [
            'title' => 'States List',
            'states_data' => $states ,

        ];
        return view('states.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Create State',
        ];
        return view('states.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = request()->validate([
          'state' => ['required','unique:state','min:3'],
          'author_id' => 'required',
        ],
        [
          'state.required' => 'You have to choose State',
          'state.min'=> 'State Should be Minimum of 3 Character', // custom message
          'state.unique'=> 'The State has already been taken',
      ]);
       State::create($validatedData);
       return redirect('states');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        $data = [
            'title' => 'Individual State page',
            'states_data' => $state ,
            //'author_name' => $name,
        ];
        return view('states.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        $data = [
            'title' => 'Edit State page',
            'states_data' => $state ,

        ];
        return view('states.edit', $data);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        $validatedData = request()->validate([
            'state' => ['required','unique:state','min:3'],
            'author_id' => 'required',
        ],
        [
          'state.required' => 'You have to choose State',
          'state.min'=> 'State Should be Minimum of 3 Character', // custom message
          'state.unique'=> 'The state has already been taken',
      ]);
        $state->update($validatedData);

        return redirect('states');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        $state->delete();
        return redirect('states');

    }
}
