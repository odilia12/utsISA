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
            window.location.href = "{{ route('contract.index') }}";
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

  <h2>Contract: {{ $contract->name }}

    @if($type == "manager" || $type == "admin")
      <a href="{{ route('contract.edit', $contract->id) }}"><i class="far fa-edit"></i></a> | 
      <a href="#" onclick="alertDelete('{{route('contract.destroy', $contract->id)}}')"><i class="fas fa-trash"></i></a>
    @endif
  </h2>
    
  <hr>

  <div align="center">
    @if($type == "manager" || $type == "admin")
      <p>For: {{ $contract->usersArtist->name }}</p> 
    @endif

    <p>End Date: {{ date('d-m-Y',strtotime($contract->end_date)) }}</p>
    <p>Notes: {{ $contract->notes }}</p>

    <p>By: {{ $contract->company_name }}</p>

    @if($type == "artist" || $type == "admin")
      <p>Post By: {{ $contract->usersManager->name }}</p>
    @endif

    @if($contract->status == 2){
      <p>Status: not approved</p>
    }
    @elseif($contract->status == 1){
      <p>Status: approved</p>
    }
    @else{
      <p>Status: not approved</p>
    }
    @endif

    <p>Created At: {{ date('d-m-Y',strtotime($contract->created_at)) }}</p>
    <p>Update At: {{ date('d-m-Y',strtotime($contract->update_at)) }}</p>
    
  </div>
</div>
@endsection