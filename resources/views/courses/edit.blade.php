@extends('layouts.app')

@section('title', $title)

@section('content')
<h1>{{ $title }}</h1>
<form method="post" action="/course/{{$courses_data->id}}">
<table class="table table-hover">
  <thead>
    <tr>

      <th>Course</th>
  <!--<th>Author</th>-->
      <th>Duration</th>
      <th>status</th>
      <th>University</th>
      <th>Department</th>
      <th>Created On</th>
      <th>Updated On</th>      
      <th>Option</th>
    </tr>
  </thead>
  <tbody>


        <tr>
            <input type="hidden" id="author_id" name="author_id" value= "{{$courses_data->author_id}}">

            <input type="hidden" id="university_id" name="university_id" value= "{{ $courses_data->university->id }}">

            @csrf
            @method('put')
            <td>
              <input type="text" class="form-control" name="name" placeholder="Enter university value" value="{{$courses_data->name}}">
            </td>



            <td>
              <input type="text" class="form-control" name="duration" placeholder="Enter course duration" value="{{$courses_data->duration}}">
            </td>

            <td>
              <select class="form-control" id="status" name="status">
                @if($courses_data->status =='yes')
                <option value="yes" selected>Active</option>
                <option value="no">Inactive</option>
                @else
                <option value="yes">Active</option>
                <option value="no" selected>Inactive</option>
                @endif
              </select>
            </td>

            <td> {{ $courses_data->university->name }} </td> 

            <td> 
              {!! Form::select('department_id',$departments_box,$courses_data->department->id,array('class' => 'form-control','single')) !!} 

            </td>          

            <td>
              {{date('d-m-Y H:i:s', strtotime($courses_data->created_at))}}
            </td>

            <td>
              {{date('d-m-Y H:i:s', strtotime($courses_data->updated_at))}}
            </td>

            <td>
              <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </td>


        </tr>




  </tbody>
</table>

  </form>

  <form class="form-horizontal" method="post" action="/course/{{$courses_data->id}}">
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

  <div class="form-group"> <div class="col-md-4"><a href="/course" role="button" class="btn btn-primary">Show courses</a></div></div>


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
