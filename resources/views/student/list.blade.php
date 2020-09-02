<h2>Student List for {{ $batch_data->course->name }}</h2>
<table class="table table-hover">
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
    
    @foreach($student_list as $data)
    <tr>
            <td>
              <a href="/student/{{ $data->id }}" target="_blank">
                {{ $data->name }}
              </a>
            </td>
            <td> {{ $data->fullname }} </td> 
            <td> {{ $data->sex }} </td>            
            <td> {{ $data->univ_name }} </td>
            <td> {{ $data->depo_name }} </td> 
    </tr>
    @endforeach
  </tbody>
</table>