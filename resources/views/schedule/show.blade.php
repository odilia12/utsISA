@extends('layouts.admin')

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>

<script>
  function alertDelete(id)
  {
    if(confirm('Are you sure want to delete this ?!')==true)
    {
      alert("Delete success");
      $.ajax({
        type: "POST",
        id : id,
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
<div class="container container-content">

  <h2>Schedule: {{ $schedule->name }}

    @if($type == "manager" || $type == "admin")
      <a href="{{ route('schedule.edit', $schedule->id) }}"><i class="far fa-edit"></i></a> | 
      <a href="#" onclick="alertDelete('{{route('schedule.destroy', $schedule->id)}}')"><i class="fas fa-trash"></i></a>
    @endif
  </h2>
    
  <hr>

  <div align="center">
    @if($type == "manager" || $type == "admin")
      <p>For: {{ $schedule->usersArtist->name }}</p> 
    @endif

    <p>Time: {{ date('d-m-Y',strtotime($schedule->time)) }}</p>
    <p>Note: {{ $schedule->note }}</p>

    @if($type == "artist" || $type == "admin")
      <p>By: {{ $schedule->usersManager->name }}</p>
    @endif

    <p>Created At: {{ date('d-m-Y',strtotime($schedule->created_at)) }}</p>
    <p>Update At: {{ date('d-m-Y',strtotime($schedule->update_at)) }}</p>
    
  </div>
</div>
@endsection