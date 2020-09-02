@extends('layouts.app')

@section('title', $title)

@section('content')
<h1>{{ $title }}</h1>

<table class="table table-hover">
  <thead>
    <tr>
      <th>University</th>
      <!--<th>Author</th>-->
      <th>Author On</th>
      <th>Updated On</th>
    </tr>
  </thead>
  <tbody>
        <tr>
            <td> {{ $universities_data->name }} </td>
        <!--<td>{{ $universities_data->author_id }}</td>-->
            <td>
              {{date('d-m-Y H:i:s', strtotime($universities_data->created_at))}}
            </td>

            <td>
              {{date('d-m-Y H:i:s', strtotime($universities_data->updated_at))}}
            </td>
        </tr>
  </tbody>
</table>

<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <a class="btn btn-primary" href="/universities" role="button">Go to University List</a>
  </div>
</div>

@endsection
