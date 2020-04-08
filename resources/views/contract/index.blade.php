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
            window.location.href = "{{ route('contract_index') }}";
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
    <h2 class="m-0 font-weight-bold text-primary">LIST Contract</h3>
    <br>
  </div>
  
  <div class="table-responsive">
    <table class="table table-bordered table-stripped" id="dataTable" width="100%" cellspacing="0">
      <thead>
      <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>NAME</th>
        <th>NOTE</th>
        <th>END DATE</th>
        <th>ARTIST</th>
        <th>MANAGER</th>
        <th>CREATE_AT</th>
        <th>UPDATE_AT</th>
        <th>CONTROL</th>
      </tr>
      </thead>
      <tbody>
        @foreach($contract as $d)
        <tr>
          <td>{{ $d->id }}</td>
          <td>{{ $d->company_name }}</td>
          <td>{{ $d->name }}</td>
          <td>{{ $d->notes }}</td>
          <td>{{ date('d-m-Y',strtotime($d->time)) }}</td>
          <td>{{ $d->usersArtist->name }}</td>
          <td>{{ $d->usersManager->name }}</td>
          <td>{{ date('d-m-Y H:i:s',strtotime($d->created_at)) }}</td>
          <td>{{ date('d-m-Y H:i:s',strtotime($d->updated_at)) }}</td>
          <td><a href="{{ route('contract_show', $d->id) }}"><i class="far fa-eye"></i></a> | 
            <a href="{{ route('contract_edit', $d->id) }}"><i class="far fa-edit"></i></a> | 
            <a href="#" onclick="alertDelete('{{route('contract_destroy', $d->id)}}')"><i class="fas fa-trash"></i></a></td> <!-- ada link di sini tetepi tidak tau link nya ( kalau dollar d itu dari foreach di atas itu lo) ( kalau editkonten dapat nya dari web.php yang name nya editkonten ( $d dapat dari data base yang di foreach kalau id ambil dari id yang di atas yang ada di function alretdelete. Kalau deletekonten di ambil dari web.php-->
        </tr>  
        @endforeach    
      </tbody>
    </table>
  </div>
</div>
@endsection

