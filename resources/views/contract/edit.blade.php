@extends('layouts.admin')

@section('content')
<div class="container container-content">
  <h2>Edit Contract</h2>
  <form method="post" action="{{ route('contract.store') }}"> <!-- menampilkan beda form pada saat mengeclik submit-->

    {{ csrf_field() }}

    <div class="form-group">
      <label for="company_name">Company Name:</label>
      <input type="text" class="form-control" id="company_name" placeholder="Enter Company Name" name="company_name" required value="$company->company_name">
    </div>

    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Contract Name" name="name" required value="$company->name">
    </div>
    
    <div class="form-group">
      <label for="notes" required>Notes:</label>
      <input type="text" class="form-control" id="notes" placeholder="Enter Notes" name="notes" value="$company->notes">
    </div>
    
    <div class="form-group">
      <label for="end_time" required>End Time:</label>
      <input type="datetime-local" class="form-control" id="end_time" name="end_time" value="$company->end_time">
    </div>

    <div class="form-group">
      <label for="artist">Artist:</label>
      <select id = "artist_id" name="artist_id" required autofocus>
        @foreach($artist as $a)
          @if($a->id == $contract->artist_id)
          <option selected value = "{{ $a->id }}">{{ $a->name }}</option>
          @else
          <option value = "{{ $a->id }}">{{ $a->name }}</option>
          @endif
        @endforeach
      </select>
    </div>
    
    @if($type == "admin")
    <div class="form-group">
      <label for="manager">Manager:</label>
      <select id = "manager_id" name="manager_id" required autofocus>
        @foreach($manager as $m)
          @if($a->id == $contract->manager_id)
          <option selected value = "{{ $m->id }}">{{ $a->name }}</option>
          @else
          <option value = "{{ $m->id }}">{{ $a->name }}</option>
          @endif
        @endforeach
      </select>
    </div>
    @elseif($type == "manager")
      <input type="text" class="form-control" id="manager_id" name="time" hidden="true" value="{{ Auth::user()->id }}">
    @endif
    
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

@endsection