@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $title }}</h2>
            </div>
            <div class="pull-right">
                @can('department-create')
                <a class="btn btn-success" href="{{ route('departments.create') }}"> Create New Departement</a>
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
      <th>Depatrtment</th>
      <th>University</th>
      <th>Option</th>
    </tr>
  </thead>
  <tbody>
    @foreach($department_data as $department)
        <tr>
            <!--<th>{{ $loop->iteration }}</th>-->
            <th>
              <a href="departments/{{$department->dep_id}}">
              {{ $department->deponame }}
              </a>
           </th>
           <td>
           <!--<a href="universities/{{$department->id}}">-->
              {{ $department->name }}
           <!--</a>-->
          </td>

            <td>
                 <form action="{{ route('departments.destroy',$department->dep_id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('departments.show',$department->dep_id) }}">Show</a>
                    @can('department-edit')
                    <a class="btn btn-primary" href="{{ route('departments.edit',$department->dep_id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('department-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
            </td>
        </tr>
    @endforeach



  </tbody>
</table>

<div>{{ $department_data->links() }}</div>
@endsection
