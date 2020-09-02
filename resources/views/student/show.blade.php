@extends('layouts.app')

@section('title', $title)

@section('content')
<h1>{{ $title }}</h1>

<table class="table table-hover">
  <thead>
    <tr>
      <th>Name</th>
      <th>Fullname</th>
      <th>Sex</th>      
      <th>University</th>
      <th>Department</th>
      <th>Author On</th>
      <th>Updated On</th>
    </tr>
  </thead>
  <tbody>
        <tr>
            <td> {{ $student_data->name }}     </td>
            <td> {{ $student_data->fullname }}   </td>
            <td> {{ $student_data->sex }} </td>  
            <td> {{ $student_data->university->name }} </td> 
            <td> {{ $student_data->department->name }} </td>  
                      
            <td>
              {{date('d-m-Y H:i:s', strtotime($student_data->created_at))}}
            </td>

            <td>
              {{date('d-m-Y H:i:s', strtotime($student_data->updated_at))}}
            </td>
        </tr>
  </tbody>
</table>


<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <a class="btn btn-primary" href="/student" role="button">Go to Student List</a>
  </div>
</div>


@endsection
