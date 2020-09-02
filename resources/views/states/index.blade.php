@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $title }}</h2>
            </div>
            <div class="pull-right">
                @can('state-create')
                <a class="btn btn-success" href="{{ route('states.create') }}"> Create New State</a>
                @endcan
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
      <th>#</th>
      <th>Title</th>
      <th>Operations</th>
    </tr>
  </thead>
  <tbody>
    @foreach($states_data as $state)
        <tr>
            <th>{{ $loop->iteration }}</th>
            <td><a href="states/{{$state->id}}"> {{ $state->state }}</a></td>
            <td>
               
               <form action="{{ route('states.destroy',$state->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('states.show',$state->id) }}">Show</a>
                    @can('state-edit')
                    <a class="btn btn-primary" href="{{ route('states.edit',$state->id) }}">Edit</a>
                    @endcan

                    @csrf
                    @method('DELETE')
                    @can('state-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
            </td>
        </tr>
    @endforeach
    <!--
    <form method="post" action="states/create">
        <tr>
            <th>#</th>
            <td><input type="text" class="form-control" name="state" placeholder="States" value=""></td>
            <td><input type="hidden" name="author_by" value= "1"></td>
            <td>
            {{ csrf_field() }}
            <input type="submit" class="btn btn-secondary" value="Add New">
            </td>
        </tr>
    </form>
   -->
    @error('state') {{ $message }} @enderror

  </tbody>
</table>

@endsection
