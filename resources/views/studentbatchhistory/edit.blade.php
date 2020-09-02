@extends('layouts.app')

@section('title', $title)

@section('content')
<h1>{{ $title }}</h1>
<form method="post" action="/states/{{$states_data->id}}">
<table class="table table-hover">
  <thead>
    <tr>

      <th>State</th>
      <th>Author</th>      
      <th>Updated On</th>
      <th>Option</th>
    </tr>
  </thead>
  <tbody>


        <tr>
            <input type="hidden" id="author_id" name="author_id" value= "1">
            @csrf
            @method('put')
            <td>
              <input type="text" class="form-control" name="state" placeholder="States" value="{{$states_data->state}}">
            </td>
            

            <td>
              {{date('d-m-Y H:i:s', strtotime($states_data->created_at))}}
            </td>

            <td>
              {{date('d-m-Y H:i:s', strtotime($states_data->updated_at))}}
            </td>

            <td>
              <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </td>


        </tr>




  </tbody>
</table>

  </form>

  <form class="form-horizontal" method="post" action="/states/{{$states_data->id}}">
    @csrf
    @method('delete')
    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="submit"></label>
      <div class="col-md-4">
        <button id="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
      </div>
    </div>
  </form>

<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <a class="btn btn-primary" href="{{ route('states.index') }}" role="button">Go to State List</a>
  </div>
</div>

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
