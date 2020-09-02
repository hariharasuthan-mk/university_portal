<div class="container mt-5">
        <form action="{{route('fileUpload')}}" method="post" enctype="multipart/form-data">
          <h3 class="text-center mb-5">Upload File </h3>
            @csrf

            {{ Form::hidden('author_by', $requested_user[0]->id, array('id' => 'author_by')) }}

            {{ Form::hidden('assigned_to', $responded_user[0]->id, array('id' => 'assigned_to')) }}

            {{ Form::hidden('batch_id', $batch_data->id, array('id' => 'batch_id')) }}

            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
            @endif

          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">Select file</label>
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                Upload File
            </button>
        </form>
    </div>