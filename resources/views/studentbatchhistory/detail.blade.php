<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Student Batch history details</h3>
                <?php //var_dump($batch_history);?>
            </div>            
        </div>
</div>
<table class="table table-hover">
  <thead>
    <tr>
      <th>Subject</th>
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
              /*
              print '=>'.$requested_user;
              print '<='.$responded_user;

              var_dump($requested_user[0]->id);

              print '=>'.$requested_user;
              */
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