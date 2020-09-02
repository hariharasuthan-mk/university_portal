@extends('layouts.app')

@section('title', $title)

@section('content')
<h1>{{ $title }}</h1>

<table class="table table-hover">
  <thead>
    <tr>
      <th>Department</th>
      <th>University</th>
      <th>Author On</th>
      <th>Updated On</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    @foreach($department_data as $department)
    <td>{{$department->deponame}}</td>
    <td>{{$department->univname}}</td>
    <td>
      {{date('d-m-Y H:i:s', strtotime($department->created_at))}}
    </td>

    <td>
      {{date('d-m-Y H:i:s', strtotime($department->updated_at))}}
    </td>
    @endforeach
  </tr>

  </tbody>
</table>

<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <a class="btn btn-primary" href="/departments" role="button">Go to Departments List</a>
  </div>
</div>

@endsection
