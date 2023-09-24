@extends('layouts.app')

@section('content')
<div class="right-panel p-4">
    <h2 class="pb-4">SETTINGS</h2>
    <ul class="main-links">
    @if(Auth::user()->role == "athelet")
        <li><a href="{{ route('setting.athlete_account') }}">Account</a></li>
    @else
    <li><a href="{{ route('setting.club_account') }}">Account</a></li>
    @endif
        <li><a href="{{ route('setting.password_security') }}">PASSWORD & SECURITY</a></li>
        @if(Auth::user()->role == "club" )
        <li><a href="{{ route('setting.opration') }}">OPRATION</a></li>
        @endif
        <li><a href="">Wallet</a></li>
    </ul>
</div>
@endsection
