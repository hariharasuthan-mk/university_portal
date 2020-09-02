<form action="{{ route('studentbatchhistory.store') }}" method="POST">
      @csrf

        <?php
        //var_dump($batch_data);print '<br/>';//var_dump($batch_data->requested);
        //var_dump($depo_id);var_dump($batch_data->id);
        $batch_id = $batch_data->id;
        //var_dump($depo_id);var_dump($batch_data->id);

        //var_dump($responded);
        
        ?> 

        {{ Form::hidden('requested', $batchhis_request , array('id' => 'requested')) }}

        {{ Form::hidden('responded', $batchhis_responded, array('id' => 'responded')) }}          

        {{ Form::hidden('depo_id', $depo_id, array('id' => 'depo_id')) }}       
        
        {{ Form::hidden('batch_id', $batch_id, array('id' => 'batch_id')) }}

        <div class="row">

          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>                
            
{!! Form::select('batchhistory_status',$arr_batchhistory_status, array('class' => 'form-control','single')) !!}

            </div>
          </div>  

          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Subject:</strong>
                <p><input type="text" name="subject" id="subject" value=""></p>
            </div>
        </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Comments/Body:</strong>
                <textarea class="form-control" style="height:150px" name="body" placeholder="Add Your Comments"></textarea>
            </div>
          </div>
          
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
          </div>
            
         </div>
  </form>