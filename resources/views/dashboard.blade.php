@extends('template.master')
@section('content')
<h3>Selamat datang, {{ Auth::user()->name }}</h3>
@endsection
