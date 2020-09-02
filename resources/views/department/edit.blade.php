@extends('layouts.app')

@section('title', $title)

@section('content')
<h1>{{ $title }}</h1>



<form method="post" action="/departments/{{$departmentid}}">
<table class="table table-hover">
  <thead>
    <tr>

      <th>Department</th>
      <th>University</th>
      <th>Author On</th>
      <th>Updated On</th>
      <th>Option</th>
    </tr>
  </thead>
  <tbody>

    <tr>
            <input type="hidden" id="author_id" name="author_id" value= "1">
            @csrf
            @method('put')

            @foreach($department_data as $department)

            <td>
              <input type="text" class="form-control" name="name" placeholder="Enter university value" value="{{$department->deponame}}">
            </td>

            <td>
              <select class="form-control" id="university_id" name="university_id">
              @foreach($all_university_list as $university_list)
                {{$university_list->id}}<=>{{$department->id}}
                @if($university_list->id==$department->id)
                  <option value="{{$university_list->id}}" selected>{{$university_list->name}}</option>
                @else
                  <option value="{{$university_list->id}}">{{$university_list->name}}</option>
                @endif
              @endforeach
              </select>
            </td>

            <td>
                {{date('d-m-Y H:i:s', strtotime($department->created_at))}}
            </td>

            <td>              
               {{date('d-m-Y H:i:s', strtotime($department->updated_at))}}
            </td>

            @endforeach

            <td>
              <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </td>


        </tr>







  </tbody>
</table>

  </form>

@can('department-delete')
  <form class="form-horizontal" method="post" action="/departments/{{$departmentid}}">
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
@endcan
  <div class="form-group"> <div class="col-md-4"><a href="/departments" role="button" class="btn btn-primary">Show Departments</a></div></div>


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
