@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $title }}</h2>
            </div>
            <div class="pull-right">
                @can('studentbatch-create')
                <a class="btn btn-success" href="{{ route('studentbatchs.create') }}"> Create New studentbatch</a>
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
      <th>#</th>
      <th>Batchname</th>      
      <th>Status</th>
      <th>Requested On</th>
      <th>Updated On</th>

    </tr>
  </thead>
  <tbody>

    <?php
    //var_dump($studentbatchs_data);
    ?>
    @foreach($studentbatchs_data as $studentbatch)
        <tr>
            <th>{{ $loop->iteration }}</th>
            <td>
                <a href="{{ route('studentbatchs.show',$studentbatch->id) }}">
                    {{ $studentbatch->batchname }}
                </a>
                
            </td>
             <td>
                @if($studentbatch->batchstatus=="no")       
                Not yet approved
                @else
                Approved
                @endif      
            </td>                       
            <td>
              {{date('d-m-Y H:i:s', strtotime($studentbatch->requestedon))}}
            </td>            
            <td>
              {{date('d-m-Y H:i:s', strtotime($studentbatch->updatedon))}}
            </td>

            
           
        </tr>
    @endforeach

    
    @if(sizeof($studentbatchs_data)<=0)
    <tr><td colspan="5"><center>No Request</center></td></tr> 
    @endif   
     
    
    

  </tbody>
</table>

@endsection
