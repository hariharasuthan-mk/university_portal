<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Result;

class ResultController extends Controller
{

    public function __Construct()
    {   
        /*
        $this->studentbatch        = new Studentbatch();
        $this->studentbatchhistory = new Studentbatchhistory();
        $this->department          = new Department();
        $this->universitymember    = new Universitymember();
        $this->file                = new File();
        $this->student             = new Student();
        $this->result              = new Result();
        */

        $this->middleware('permission:result-list|result-create|result-edit|result-delete', ['only' => ['index','show']]);

        $this->middleware('permission:result-create', ['only' => ['create','store']]);

        $this->middleware('permission:result-edit', ['only' => ['edit','update']]);

        $this->middleware('permission:result-delete', ['only' => ['destroy']]);
        /**/
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        dd("hello");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $input = $request->all();

        $input['finallist']    = $request->input('result_student_list');
        $input['batch_id']     = $request->input('batch_id');
        $input['author_id']    = $request->input('requested');
        $input['body']         = $request->input('body');
        $input['requested_to'] = $request->input('requested');
        $input['publish']      = $request->input('status');
        $input['course_id']    = $request->input('course_id');
        $id =  $request->input('batch_id');  

        //var_dump($input);dd("hello");     

        $result   = Result::create($input);
        $lastInsertedId = $result->id;

        //var_dump($input);var_dump($lastInsertedId);dd("hello");        
        return redirect()->route('studentbatchs.show', ['id' => $id])
                          ->with('success','Result has added & waiting for approval to publish');

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
    public function edit(Result $result)
    {
        /*
        print $result->batch_id ;
        print $result->body ;
        var_dump($result->finallist) ;
        //$result->course->name;

        //dd("dfd");
        */
        $data = [
            'title' => 'Result for batch-'.$result->batch->batchname,
            'result_data' => $result ,
        ];
        return view('results.edit', $data);
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
        /*
        var_dump($request->status);
        var_dump($request->batch_id);
        dd('hello');
        */

        $obj = Result::find($id); // new Department;

        if($request->status=="yes"){
        $msg = "Result has published";
        }
        else{
        $msg = "Result has unpublished";
        }       

        $obj->publish = $request->status;
        $obj->save();


        return redirect()->route('studentbatchs.show', ['id' => $request->batch_id])
                          ->with('success',$msg);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
