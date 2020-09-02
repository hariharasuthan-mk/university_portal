@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Student Batch</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('studentbatchs.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('studentbatchs.store') }}" method="POST">
      @csrf

        {{ Form::hidden('status', 'no', array('id' => 'status')) }} 

        {{ Form::hidden('requested', $loggedin_userid, array('id' => 'requested')) }}
       
        {{ Form::hidden('status', 'no', array('id' => 'status')) }}

        {{ Form::hidden('department', ) }} 

        {{ Form::hidden('responded', '11', array('id' => 'responded')) }} 
        
        

        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Batchname:</strong>
                <input type="text" name="batchname" class="form-control" placeholder="Batchname">
            </div>
        </div>        
        
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Subject:</strong>
                <p><input type="text" name="subject" id="subject" ></p>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Requesting University:</strong> 

            {!! Form::select('university',
            $university_select,array('class' => 'form-control','single')) !!}              
            
            </div>
        </div>

        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Department:</strong>

                 {!! Form::select('depo_id',array("Select Department"),array('class' => 'form-control','single')) !!}   
            
            </div>
        </div>
       
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Requesting with the below SNO:</strong>  

                {!! Form::select('sno_select',array("Select SNO"),array('class' => 'form-control','single')) !!}             
            
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>                
            {!! Form::select('batchhistory_status',
            $batch_select_box,$selected_status, array('class' => 'form-control','single')) !!}
            </div>
        </div>

        

        

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Comments/Body:</strong>
                <textarea class="form-control" style="height:150px" name="body" placeholder="Add Your Comments"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>


    </form>


@endsection

