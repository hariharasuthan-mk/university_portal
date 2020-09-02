@extends('layouts.app')

@section('title', $title)

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $title }}</h2>
            </div>
            <div class="pull-right">
                @can('course-create')
                <a class="btn btn-success" href="{{ route('course.create') }}"> Create New Coure</a>
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
      <th>Course</th>
      <th>Status</th> 
      <th>Universityname</th>  
      <th>Department</th> 
      <!--<th>Status</th>-->    
      <th>Operations</th>
    </tr>
  </thead>
  <tbody>
    @foreach($courses as $course)
        <tr>
            <!--<th>{{ $loop->index }}</th>-->
            <td><a href="course/{{$course->id}}"> 
              {{ $course->name }}</a></td>
            <th>{{ $course->status }}</th> 
            <th>{{ $course->university->name }}</th> 
            <th>{{ $course->department->name }}</th> 
            <!--<td>{{ $course->status }}</td>-->                     
            <td>               
               <form action="{{ route('course.destroy',$course->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('course.show',$course->id) }}">Show</a>
                    @can('course-edit')
                    <a class="btn btn-primary" href="{{ route('course.edit',$course->id) }}">Edit</a>
                    @endcan

                    @csrf
                    @method('DELETE')
                    @can('course-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
            </td>
        </tr>
    @endforeach    

  </tbody>
  
</table>

@endsection
