@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $title }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('departments.index') }}"> Back</a>
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


<form method="post" action="{{ route('departments.store') }}" enctype="multipart/form-data">
<table class="table table-hover">
  <thead>
    <tr>
      <th>Department</th>
      <th>University</th>
    </tr>
  </thead>
  <tbody>


        <tr>
            <input type="hidden" id="author_id" name="author_id" value= "{{$loggedin_userid}}">
            @csrf

            <td>
              <input type="text" class="form-control" name="name" placeholder="Department" value="" required>
            </td>

            <td>
              <select class="form-control" id="university_id" name="university_id">
                @foreach($university_data as $university)
                <option value="{{ $university->id }}">{{ $university->name }}</option>
                @endforeach
              </select>
            </td>

            <td>
              <input type="submit" class="btn btn-secondary" value="Add New Department">
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
      <a class="btn btn-primary" href="/departments" role="button">Show Departments</a>
    </div>
  </div>


@endsection
