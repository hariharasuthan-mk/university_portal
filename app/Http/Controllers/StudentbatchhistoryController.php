<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Studentbatchhistory;
use App\Studentbatch;

class StudentbatchhistoryController extends Controller
{
    
    public function __Construct()
    {
    	
    	
    	$this->middleware('permission:studentbatchhistory-list|studentbatchhistory-create|studentbatchhistory-edit|studentbatchhistory-delete', ['only' => ['index','show']]);

        $this->middleware('permission:studentbatchhistory-create', ['only' => ['create','store']]);

        $this->middleware('permission:studentbatchhistory-edit', ['only' => ['edit','update']]);

        $this->middleware('permission:studentbatchhistory-delete', ['only' => ['destroy']]);
    	/**/
    }

    public function index()
    {	
    	print '<br/>';
    	return view('studentbatches.show');
    }

    /**
     * Display the specified resource.
     *
     * 
     */
    public function show(Studentbatchhistory $studentbatchhistory)
    {
    	
	

    return view('studentbatches.show');
    }

    public function create()
   	{
   	 return view('studentbatches.show');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        //dd($input);

if($request->input('batchhistory_status')=="approved"){
$studentbatch_history  = new Studentbatchhistory;
        
$studentbatch_history->requested    = $request->input('requested');
$studentbatch_history->responded    = $request->input('responded');
$studentbatch_history->depo_id      = $request->input('depo_id');
$studentbatch_history->batch_id     = $request->input('batch_id');
$studentbatch_history->batch_status = $request->input('batchhistory_status');
$studentbatch_history->subject      = $request->input('subject');
$studentbatch_history->body         = $request->input('body');
$studentbatch_history->save();

$studentbatch  = new Studentbatch;

$student_batch = Studentbatch::find($id=$request->input('batch_id'));
$student_batch->status = 'yes';
$student_batch->save();
}
else{
$studentbatch_history  = new Studentbatchhistory;
        
$studentbatch_history->requested    = $request->input('requested');
$studentbatch_history->responded    = $request->input('responded');
$studentbatch_history->depo_id      = $request->input('depo_id');
$studentbatch_history->batch_id     = $request->input('batch_id');
$studentbatch_history->batch_status = $request->input('batchhistory_status');
$studentbatch_history->subject      = $request->input('subject');
$studentbatch_history->body         = $request->input('body');
$studentbatch_history->save();

}


return redirect()->route('studentbatchs.index')
                        ->with('success','Studentbatch history created successfully.');        

    }
    
    /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\State  $state
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
       
      
       return view('studentbatches.show', $data);
     }
	


}
