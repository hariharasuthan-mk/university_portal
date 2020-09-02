@extends('layouts.app')

@section('title', $title)

@section('content')

<?php
//var_dump($batch_data);
//var_dump($batch_data['depo_name']);
   
        if($batch_data->status=="no"){
          $tr_class   = 'table-warning';
          $msg_status = 'Not yet approved';
        }else{
          $tr_class   = 'table-success';
          $msg_status = 'Approved';
        }

?>
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> {{ $title }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('studentbatchs.index') }}"> Back</a>
            </div>
        </div>
</div>
<table class="table table-hover">
  <thead>
    <tr>
      <th>Title</th>
      <th>Status</th>
      <th>University</th>
      <th>Department</th>
      <th>Requested On</th>
      <th>Updated On</th>
    </tr>
  </thead>
  <tbody>
    <tr class="{{ $tr_class }}">
            <td> {{ $batch_data->batchname }} </td>
            <td> {{ $msg_status }} </td>
            <td> {{ $university }}</td>
            <td> {{ $department }} </td>
            <td>
              {{ date('d-m-Y H:i:s', strtotime($batch_data->created_at)) }}
            </td>

            <td>
              {{ date('d-m-Y H:i:s', strtotime($batch_data->updated_at)) }}
            </td>
        </tr>
  </tbody>
</table>
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>More Details</h3>
                <?php //var_dump($batch_history);?>
            </div>            
        </div>
</div>
<table class="table table-hover">
  <thead>
    <tr>
      <th>Subeject</th>
      <th>Comment</th>
      <th>Status</th>
      <th>Requested By</th>
      <th>Requested To</th>
      <th>Requested On</th>
      <th>Updated On</th>
    </tr>
  </thead>
  <tbody>
        @foreach($batch_history as $data)
        <?php
        //print $data->detail_status;
        //$arr_batch_status[$data->detail_status];
        ?>
        <tr >
            <td> {{ $data->comment }} </td>
            <td> {{ $data->body }} </td>
            <td>               
              <?php              
              //var_dump($arr_batch_status);
              //print $arr_batch_status[$data->detail_status];
              $requested_user = \App\Studentbatch::get_user_detail($data->requested);
              $responded_user = \App\Studentbatch::get_user_detail($data->responded);

              $requested = $requested_user[0]->name;
              $responded = $responded_user[0]->name;
              ?>
              {{ $arr_batch_status[$data->detail_status] }}

            </td>
            <td> 
             {{ $requested }}
             </td>

            <td>{{ $responded }}</td>

            <td>
              {{date('d-m-Y H:i:s', strtotime($data->detail_updatedon))}}
            </td>

            <td>
              {{date('d-m-Y H:i:s', strtotime($data->detail_updatedon))}}
            </td>
        </tr>
        @endforeach
  </tbody>
</table>

@endsection
