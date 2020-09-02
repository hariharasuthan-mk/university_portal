@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $title }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('universities.index') }}"> Back</a>
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

<form method="post" action="{{ route('universities.store') }}" enctype="multipart/form-data">
<table class="table table-hover">
  <thead>
    <tr>
      <th>Title</th>
      <th>Option</th>
    </tr>
  </thead>
  <tbody>


        <tr>
            <input type="hidden" id="author_id" name="author_id" value= "{{ $loggedin_userid }}">
            @csrf

            <td>
              <input type="text" class="form-control" name="name" placeholder="University" value="">
            </td>

            <td>
              <!--<button type="submit" class="btn btn-primary btn-sm">Create</button>-->
              <input type="submit" class="btn btn-secondary" value="Add New">
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
      <a class="btn btn-primary" href="/universities" role="button">Show Universities</a>
    </div>
  </div>

 



@endsection
