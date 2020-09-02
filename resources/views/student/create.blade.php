@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $title }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('student.index') }}"> Back</a>
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


<form method="post" action="{{ route('student.store') }}" enctype="multipart/form-data">
<table class="table table-hover">
  <thead>
    <tr>      
      <th>University</th>
      <th>Department</th>
      <th>Name</th>
      <th>Fullname</th>
      <th>Sex</th>
      <th>Operations</th>
    </tr>
  </thead>
  <tbody>


        <tr>
          <td>
              <select class="form-control" id="university" name="university">
                @foreach($university_data as $university)
                <option value="{{ $university->id }}">{{ $university->name }}</option>
                @endforeach
              </select>
          </td>

<input type="hidden" id="author_id" name="author_id" value="{{$loggedin_userid}}">
<input type="hidden" id="department" name="department" value="">


            @csrf

          <td>
              {!! Form::select('depo_id',array('Select Department'), array('class' => 'form-control','single')) !!}
          </td>

          <td>
              <input type="text" class="form-control" name="name" placeholder="Studentname" value="" required>
          </td>

          <td>
              <input type="text" class="form-control" name="fullname" placeholder="Fullname" value="" required>
          </td>

          <td>
              {!! Form::select('sex',$arr_sex=array('male'=>'Male','female'=>"Female"), array('class' => 'form-control','single')) !!}
          </td>
            

          <td>
              <input type="submit" class="btn btn-secondary" value="Add New Student">
          </td>

        </tr>

        <tr>
          <td></td>
          <td colspan="2"></td>
        </tr>


  </tbody>
</table>
</form>

  <div class="form-group">
    <label class="col-md-4 control-label" for="submit"></label>
    <div class="col-md-4">
      <a class="btn btn-primary" href="/student" role="button">Show Students</a>
    </div>
  </div>


@endsection
