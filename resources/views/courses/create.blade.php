@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $title }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('course.index') }}"> Back</a>
            </div>
        </div>
</div>

@if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif

<form method="post" action="{{ route('course.store') }}" enctype="multipart/form-data">
<table class="table table-hover">
  <thead>
    <tr>
      <th>University Belongs to</th>
      <th>Department</th>
      <th>Title</th>
      <th>Duration</th>            
      <th>Status</th>
      <th>Option</th>
    </tr>
  </thead>
  <tbody>


        <tr>
            <input type="hidden" id="author_id" name="author_id" value= "{{ $loggedin_userid }}">
            
            <input type="hidden" id="university_id" name="university_id" value= "{{$university_belongsto}}">

            @csrf
            
            <td>
              {{ $university_name }}
            </td>

            <td>
            {!! Form::select('department_id',$departments_box,
            array('class' => 'form-control','single')) !!}  
            </td>

            <td>
    <input type="text" class="form-control" name="name" placeholder="Course" value="">
            </td>

            <td>
    <input type="text" class="form-control" name="duration" placeholder="Duration" value="">
            </td>            

            <td>              
              {!! Form::select('status',
            $status_select,array('class' => 'form-control','single')) !!}
            </td> 
                        

            <td>
              <!--<button type="submit" class="btn btn-primary btn-sm">Create</button>-->
              <input type="submit" class="btn btn-secondary" value="Add New">
            </td>


        </tr>

        


  </tbody>
</table>
</form>

  <div class="form-group">
    <label class="col-md-4 control-label" for="submit"></label>
    <div class="col-md-4">
      <a class="btn btn-primary" href="/course" role="button">Show course</a>
    </div>
  </div>

 



@endsection
