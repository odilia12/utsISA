@extends('layouts.admin') <!-- nama folder nama file nya -->

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>

<script>
  function alertDelete(url)
  {
    if(confirm('Are you sure want to delete this ?!')==true)
    {
      alert("Delete success");
      $.ajax({
        type: "POST",
        url : url,
        data: {_token: '{{csrf_token()}}' },
          success: function (data) {
            window.location.href = "{{ route('schedule.index') }}";
          }
      });
    }
    else
    {
      alert("Denied by User");
    }
  }
</script>

@section('content')
<div class="card shadow mb-4 container-content">
  <div class="card-header py-3">
    <h2 class="m-0 font-weight-bold text-primary">LIST SCHEDULE</h3>
    <br>
  </div>
  
  <div class="table-responsive">
    <table class="table table-bordered table-stripped" id="dataTable" width="100%" cellspacing="0">
      <thead>
      <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>NOTE</th>
        <th>TIME</th>
        <th>ARTIST</th>
        <th>MANAGER</th>
        <th>CREATE_AT</th>
        <th>UPDATE_AT</th>
        <th>CONTROL</th>
      </tr>
      </thead>
      <tbody>
        @foreach($schedule as $d)
        <tr>
          <td>{{ $d->id }}</td>
          <td>{{ $d->name }}</td>
          <td>{{ $d->note }}</td>
          <td>{{ date('d-m-Y',strtotime($d->time)) }}</td>
          <td>{{ $d->usersArtist->name }}</td>
          <td>{{ $d->usersManager->name }}</td>
          <td>{{ date('d-m-Y H:i:s',strtotime($d->created_at)) }}</td>
          <td>{{ date('d-m-Y H:i:s',strtotime($d->updated_at)) }}</td>
          <td>
            <a href="{{ route('schedule.show', $d->id) }}"><i class="far fa-eye"></i></a> | 
            <a href="{{ route('schedule.edit', $d->id) }}"><i class="far fa-edit"></i></a> | 
            <a href="#" onclick="alertDelete('{{route('schedule.destroy', $d->id)}}')"><i class="fas fa-trash"></i></a>
          </td> 
        </tr>  
        @endforeach    
      </tbody>
    </table>
  </div>
</div>
@endsection

