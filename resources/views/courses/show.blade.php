@extends('layouts.app')

@section('title', $title)

@section('content')
<h1>{{ $title }}</h1>

<table class="table table-hover">
  <thead>
    <tr>
      <th>Course</th>
      <th>Status</th>
      <th>Duration</th>      
      <th>University</th>
      <th>Department</th>
      <th>Author On</th>
      <th>Updated On</th>
    </tr>
  </thead>
  <tbody>
        <tr>
            <td> {{ $courses_data->name }}     </td>
            <td> {{ $courses_data->status }}   </td>
            <td> {{ $courses_data->duration }} </td>  
            <td> {{ $courses_data->university->name }} </td> 
            <td> {{ $courses_data->department->name }} </td>  
                      
            <td>
              {{date('d-m-Y H:i:s', strtotime($courses_data->created_at))}}
            </td>

            <td>
              {{date('d-m-Y H:i:s', strtotime($courses_data->updated_at))}}
            </td>
        </tr>
  </tbody>
</table>

<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <a class="btn btn-primary" href="/course" role="button">Go to Coure List</a>
  </div>
</div>

@endsection
