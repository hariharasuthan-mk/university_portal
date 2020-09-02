@extends('layouts.app')

@section('title', $title)

@section('content')

<?php
//var_dump($file_data);
/*
print $file_data->author_by;
print $file_data->assigned_to;
print $file_data->batch_id;
print $file_data->id;
print $file_data->file_path;
print $file_data->file_path;
dd("hello");
*/
?>
<h1>{{ $title }}</h1>
<form method="post" action="/fileUpload/{{$id}}">
<table class="table table-hover">
  <thead>
    <tr>

      <th>File</th>         
      <th>Created On</th>
      <th>Updated On</th>      
      <th>Option</th>

    </tr>
  </thead>
  <tbody>
        @csrf

            {{ Form::hidden('author_by',  $file_data->author_by , array('id' => 'author_by')) }}

            {{ Form::hidden('assigned_to',  $file_data->assigned_to , array('id' => 'assigned_to')) }}

            {{ Form::hidden('batch_id', $file_data->batch_id , array('id' => 'batch_id')) }}

        <tr>           
            <td>
              <a class="btn btn-outline-success" href="/downloads/{{$file_data->batch_id}}" target="_blank">Download</a>
            </td>
            
            <td>
              {{date('d-m-Y H:i:s', strtotime($file_data->created_at))}}
            </td>

            <td>
              {{date('d-m-Y H:i:s', strtotime($file_data->updated_at))}}
            </td>

            <td>
              <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </td>


        </tr>




  </tbody>
</table>

  </form>

<form action="{{ route('states.destroy',$state->id) }}" method="POST">                

                    @csrf
                    @method('DELETE')
                    @can('state-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
</form>

  <div class="form-group"> <div class="col-md-4"><a href="/studentbatchs" role="button" class="btn btn-primary">Show studentbatchs</a></div></div>


  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

@endsection
