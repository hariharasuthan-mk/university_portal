@extends('layouts.app')

@section('title', $title)

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $title }}</h2>
            </div>
            <div class="pull-right">
                @can('university-create')
                <a class="btn btn-success" href="{{ route('universities.create') }}"> Create New University</a>
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
      <!--<th>#</th>-->
      <th>University</th>
      <th>Author</th>
  <!--<th>Status</th>-->
      <th>Operations</th>
    </tr>
  </thead>
  <tbody>
    @foreach($university_data as $university)
        <tr>
            <!--<th>{{ $loop->index }}</th>-->
            <td><a href="universities/{{$university->id}}"> 
              {{ $university->name }}</a></td>
            <th>{{ $university->authorby }}</th>
            <!--
            <td>
              <span class="label label-success">{{ $university->status }}</span>
            </td>
            -->
            <td>
               
               <form action="{{ route('universities.destroy',$university->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('universities.show',$university->id) }}">Show</a>
                    @can('university-edit')
                    <a class="btn btn-primary" href="{{ route('universities.edit',$university->id) }}">Edit</a>
                    @endcan

                    @csrf
                    @method('DELETE')
                    @can('university-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
            </td>
        </tr>
    @endforeach    

  </tbody>
  
</table>
<div>{{ $university_data->links() }}</div>
@endsection
