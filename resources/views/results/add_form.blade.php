<form action="{{ route('result.store') }}" method="POST" enctype="multipart/form-data">
    @csrf     

    {{ Form::hidden('requested', $batchhis_request, array('id' => 'requested')) }}

    {{ Form::hidden('status', 'no', array('id' => 'status')) }}
        
    {{ Form::hidden('batch_id', $batch_data->id, array('id' => 'status')) }}

    {{ Form::hidden('responded', $batchhis_responded, array('id' => 'responded')) }} 

    {{ Form::hidden('course_id', $batch_data->course->id, array('id' => 'course_id'))
    }}



<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add Student's Result</h2>
            </div>            
        </div>

</div>
<div class="row">
        <div class="col-lg-2 margin-tb">
            Choose Student List           
        </div>
        <div class="col-lg-5 margin-tb">
          {!! Form::select('result_student_list[]',$box_student_list,[],array('class' => 'form-control','multiple')) !!}         
        </div>
        <div class="col-lg-5 margin-tb">
          <textarea class="form-control" style="height:100px" name="body" placeholder="Add Your Comments"></textarea>
        </div>  
</div>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
         <button type="submit" class="btn btn-primary">Add Results</button>
  </div>
</div>  
</form>