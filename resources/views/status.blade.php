@extends('layouts.app')

@section('title', 'Download Status')

@section('content')
    <h1 class="mt-5">Download Status</h1>
    <p>Status: {{ $result['status'] }}</p>
    @if(isset($result['download_url']))
        <p><a href="{{ $result['download_url'] }}">Download</a></p>
    @endif
    @if(isset($result['message']))
        <p>Message: {{ $result['message'] }}</p>
    @endif
@endsection