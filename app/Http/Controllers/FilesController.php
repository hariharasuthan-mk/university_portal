<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{   

    function __construct()
    {   
        $this->file                = new File();

        $this->middleware('permission:files-list|files-create|files-edit|files-delete', ['only' => ['index','show']]);

        $this->middleware('permission:files-create', ['only' => ['create','store']]);

        $this->middleware('permission:files-edit', ['only' => ['edit','update']]);

        $this->middleware('permission:files-delete', ['only' => ['destroy']]);
        
    }

    public function createForm(){
        return view('Files.file-upload');         
    }

    public function pdfDownload($id){
    $obj     = File::where('batch_id',$id)->pluck('file_path')->toArray();    
    $file    = public_path().Storage::url($obj[0]);
    $headers = array('Content-Type' => 'application/pdf');
    return response()->download($file,"Download.pdf",$headers);
    }


    public function fileDownload(){

        
/*
$file    = Storage::url('public/studentfiles/1598177065_sample.pdf');
$headers = array('Content-Type' => 'application/pdf');
return response()->download($file,"My file Pdf",$headers);
*/

//$file= public_path(). "/studentfiles/1598177065_sample.pdf";

$newfilepath = public_path().'/studentfiles/1598257663_sample.pdf';

$newfilepath = Storage::url('/studentfiles/1598257663_sample.pdf');
var_dump($newfilepath);

//$file    = Storage::url($newfilepath);
$headers = ['Content-Type' => 'application/pdf',];
return response()->download($newfilepath, 'filename.pdf', $headers);
dd("exit");

        $data = [
                'title' => 'Download Files',
                'file_path' => $newfilepath ,             
                            
        ];

        return view('Files.file-download',$data);
    

//$file_path = Storage::download('public/studentfiles/1598177065_sample.pdf');
//$file_path = Storage::url('public/studentfiles/1598177065_sample.pdf');
//$file_path = asset('public/studentfiles/1598177065_sample.pdf');
/*
$data = [
                'title' => 'Download Files',
                'file_path' => $file_path ,             
                'id' => $id,               
        ];
return view('Files.file-download', $data);
*/
//$file_path = Storage::download('public/studentfiles/1598177065_sample.pdf');

//return $file_path;

    }

    public function fileUpload(Request $req){
        $req->validate([
        'file' => 'required|mimes:pdf|max:20000'
        ]);

        $fileModel = new File;

        if($req->file()) {

            //dd($req->file());    
            $fileName = time().'_'.$req->file->getClientOriginalName();
            
            $filePath = $req->file('file')->storeAs('studentfiles', $fileName, 'public');


            //var_dump($filePath);dd('hello');

            $fileModel->name = time().'_'.$req->file->getClientOriginalName();

            $fileModel->file_path     = $filePath;
            $fileModel->author_by     = $req->author_by;
            $fileModel->assigned_to   = $req->assigned_to; 
            $fileModel->batch_id      = $req->batch_id;

            $fileModel->save();

            //'/studentfiles/' . $filePath;
            //$fileModel->file_path   = '/storage/';

            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);


        }
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Files $files,$id)
    {
        //
        $file_path = 'fdgfdg';

        /*
        $file_path = File::temporaryUrl('studentfiles/1598175366_sample.pdf', now()->addMinutes(10));
        */


        $data = [
                'title' => 'Download Files',
                'file_path' => $file_path ,             
                'id' => $id,               
        ];

        return view('Files.file-download');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        

       
    }

    public function fileedit($id)
    {
        //var_dump($file);dd("hello");
        $data = File::where('id',$id)
                ->first(); 
        $data = [
            'title' => 'Edit file page',
            'file_data' => $data ,            
            'id'    => $id,
        ];
        return view('Files.file-edit', $data);
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
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        //$res=File::where('id',$id)->delete();  
        //$res=File::where('id',$id)
        
        //unlink(public_path('studentfiles/1598280388_sample.pdf')); 

        //$res=File::where('id',$id);

        
        //var_dump($data->file_path);

        $data = File::where('id',$id)
                ->first();
        //dd(public_path().Storage::url($data->file_path));
        unlink(public_path().Storage::url($data->file_path));
        File::where('id',$id)->delete(); 
        return redirect('studentbatchs');//dd("deleted");

    }
}
