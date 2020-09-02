<div class="row">
        <div class="col-lg-6 margin-tb">            
              <h2>Student's Result</h2> 
              
        </div>
        <div class="col-lg-6 margin-tb">
              
               @can('result-edit')
<a class="btn btn-primary" target="_blank" href="/result/{{ $result_id }}/edit/">Publish/Unpublish results</a>
               @endcan

        </div>
</div>
<table class="table table-hover  {{ $result_class }} ">
  <thead>
    <tr>
      <th>Student name</th>     
      <th>Fullname</th>
      <th>Sex</th>
      <th>University</th>
      <th>Department</th>      
    </tr>
    </thead>
  <tbody>
    <tbody>   

        @foreach($student_result_list as $data)
            <tr>
                    <td>
                      <a href="/student/{{ $data->id }}" target="_blank">
                        {{ $data->name }}
                      </a>
                    </td>
                    <td> {{ $data->fullname }} </td> 
                    <td> {{ $data->sex }} </td>
                    <td> {{ $data->university->name }} </td>
                    <td> {{ $data->department->name }} </td>

            </tr>
          @endforeach
     </tbody>          
</table>