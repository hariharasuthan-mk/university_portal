@extends('layouts.app')

@section('title', $title)

@section('content')
<h1>{{ $title }}</h1>

<table class="table table-hover">
  <thead>
    <tr>
      <th>Title</th>
      <!--<th>Author</th>-->
      <th>Author On</th>
      <th>Updated On</th>
    </tr>
  </thead>
  <tbody>
        <tr>
            <td> {{ $states_data->state }} </td>
        <!--<td>{{ $states_data->author_id }}</td>-->
            <td>
              {{date('d-m-Y H:i:s', strtotime($states_data->created_at))}}
            </td>

            <td>
              {{date('d-m-Y H:i:s', strtotime($states_data->updated_at))}}
            </td>
        </tr>
  </tbody>
</table>

<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <a class="btn btn-primary" href="{{ route('studentbatchs.index') }}" role="button">Go to studentbatch</a>
  </div>
</div>
@endsection
