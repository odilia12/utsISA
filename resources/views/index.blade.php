@extends('layouts.admin')

@section('content')
    <header class="masthead">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Welcome To Our Website!</div>
                <div class="intro-heading text-uppercase">It's Nice To Meet You {{ Auth::user()->name }}</div>
            </div>
        </div>
    </header>
@endsection