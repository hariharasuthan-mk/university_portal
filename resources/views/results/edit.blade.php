@extends('layouts.app')

@section('title', $title)

@section('content')
<h1>{{ $title }}/Course-{{ $result_data->course->name }} </h1>
<form method="post" action="/result/{{$result_data->id}}">
<table class="table table-hover">
  <thead>
    <tr>
      <th>Comment</th>
      <th>Updated On</th>
      <th>Publish Status</th>
      <th>Operations</th>
    </tr>
  </thead>
  <tbody>
    @csrf
    @method('put')

    {{ Form::hidden('batch_id', $result_data->batch_id) }}

        <tr>
            <td>
              {{ $result_data->body }}
            </td>
            <td>              
              {{date('d-m-Y H:i:s', strtotime($result_data->created_at))}}
            </td>
            <td>
              <select class="form-control" id="status" name="status">
                @if($result_data->publish =='yes')
                <option value="yes" selected>Publish</option>
                <option value="no">Unpublish</option>
                @else
                <option value="yes">Publish</option>
                <option value="no" selected>Unpublish</option>
                @endif
              </select>             
            </td>
            <td>
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            </td>
        </tr>




  </tbody>
</table>

  </form>

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
