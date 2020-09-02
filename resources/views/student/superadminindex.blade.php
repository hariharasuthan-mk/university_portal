@extends('layouts.app')

@section('title', $title)

@section('content')
<?php //var_dump($data); ?>
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $title }}</h2>
            </div>
            <div class="pull-right">
                @can('student-create')
                <a class="btn btn-success" href="{{ route('student.create') }}"> Create New Student</a>
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
      <th>Studentname</th>
      <th>Fullname</th>
      <th>Sex</th>
      <th>University</th>
      <th>Department</th>
      <th>Option</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $student)
        <tr>
            <!--<th>{{ $loop->iteration }}</th>-->
            <th>
              <a href="student/{{$student->id}}">
              {{ $student->name }}
              </a>
           </th>
           <td>           
              {{ $student->fullname }}          
           </td>           
           <td>           
              {{ $student->sex }}          
           </td>
           <td>
               {{ $student->university->name }}  
           </td>
           <td>           
               {{ $student->department->name }}
           </td>

           <td>
                 <form action="{{ route('student.destroy',$student->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('student.show',$student->id) }}">Show</a>
                    @can('student-edit')
                    <a class="btn btn-primary" href="{{ route('student.edit',$student->id) }}">Edit</a>
                    @endcan

                    @csrf
                    @method('DELETE')
                    @can('student-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
            </td>
        </tr>
    @endforeach

  </tbody>
</table>

<div>{{ $data->links() }}</div>
@endsection
