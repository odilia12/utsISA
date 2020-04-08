@extends('layouts.admin')

@section('content')
<div class="container container-content">
  <h2>Create New Schedule</h2>
  <form method="post" action="{{ route('contract_store') }}"> <!-- menampilkan beda form pada saat mengeclik submit-->

    {{ csrf_field() }}

    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Schedule Name" name="name" required value="{{ $contract->name }}">
    </div>
    
    <div class="form-group">
      <label for="note" required>Note:</label>
      <input type="text" class="form-control" id="note" placeholder="Enter Note" name="note" value="{{ $contract->name }}">
    </div>
    
    <div class="form-group">
      <label for="time" required>Time:</label>
      <input type="datetime-local" class="form-control" id="time" name="time" value="{{ $contract->name }}">
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
          @if($m->id == $contract->manager_id)
          <option selected value = "{{ $m->id }}">{{ $m->name }}</option>
          @else
          <option value = "{{ $m->id }}">{{ $m->name }}</option>
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