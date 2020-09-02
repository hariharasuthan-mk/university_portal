@extends('layouts.app')

@section('title', $title)

@section('content')

<?php   
 if($batch_data->status=="no"){
          $tr_class   = 'table-Danger';
          $msg_status = 'Not yet approved';
}else{
          $tr_class   = 'table-Dark';
          $msg_status = 'Approved';
}
if($student_result_status =='yes'){
          $result_class   = 'bg-success';   
}                         
else{
          $result_class   = 'bg-warning';
}
?>
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> {{ $title }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('studentbatchs.index') }}"> Back</a>
            </div>
        </div>
</div>

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
@endif

<table class="table table-hover">
  <thead>
    <tr>
      <th>Batch Title</th>
      <th>Course</th>
      <th>Status</th>
      <th>University</th>
      <th>Department</th>
      <th>Requested On</th>
      <th>Updated On</th>
    </tr>
  </thead>
  <tbody>
    <tr class="{{ $tr_class }}">
            <td> {{ $batch_data->batchname }} </td>
            <td> 
      <a href="/course/{{ $batch_data->course->id }}" target="-blank">
              {{ $batch_data->course->name }}
      </a>  </td>
            <td> {{ $msg_status }} </td>
            <td> {{ $university }}</td>
            <td> {{ $department }} </td>
            <td>
              {{ date('d-m-Y H:i:s', strtotime($batch_data->created_at)) }}              
            </td>

            <td>
              {{ date('d-m-Y H:i:s', strtotime($batch_data->updated_at)) }}
            </td>
        </tr>
  </tbody>
</table>
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
@include('student.list')
@include('studentbatchhistory.detail')
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
@if ($file_obj)
    @include('Files.show_file')
@else
  @can('files-create')
    @include('Files.add_form')
  @endcan    
@endif
@can('studentbatchhistory-create')
  @if ($batch_data->status=="no")
    @include('studentbatchhistory.add_form')
  @endif
@endcan
@if ( ($batch_data->status=="yes") && ($result_flag == false))
  @can('result-create')
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
    @include('results.add_form')
  @endcan
@endif
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
  @if ( ($batch_data->status=="yes") && ($result_flag == true))
    @include('results.show')
  @endif
@endsection
