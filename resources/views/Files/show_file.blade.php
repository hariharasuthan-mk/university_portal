<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
<h2>File Attachments <small>(it is the single pdf file with all student certificates)</small></h2>
            </div>            
        </div>
</div>

<table class="table table-hover">
  <thead>
    <tr>
      <th>Operations</th>    
      <th>Uploaded By</th>      
      <th>Uploaded On</th>    

    </tr>
    </thead>
  <tbody>
    <td>
          @can('files-list') 
          <a class="btn btn-outline-success" href="/downloads/{{$batch_data->id}}" >Download</a>
          @endcan
          @can('files-delete')
          @if ($batch_data->status=="no")
          <form action="/upload-file/{{ $file_obj->file_id }}" method="POST">
                    @csrf
                    @method('DELETE')                    
                    <button type="submit" class="btn btn-danger">Delete</button>                  
          </form>
          @endif
          @endcan
    </td>   
    <td>
     {{ $file_obj->name }}
    </td>   
    <td>{{date('d-m-Y H:i:s', strtotime($file_obj->files_requestedon))}}</td>    
  </tbody>
</table>