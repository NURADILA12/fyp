@extends('layouts.apm');
@section('content')

pelajar dashboard
<form id="logoutForm" action="{{ route('logout') }}" method="POST" class="mt-auto">
    @csrf
    <button type="submit" class="btn logout-btn">
      <i class="bi bi-box-arrow-right"></i> Logout
    </button>
  </form>
  @endsection