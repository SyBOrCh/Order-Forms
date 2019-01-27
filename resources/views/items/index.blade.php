@extends('layouts.app')

@section('content')
    <h1>Items view</h1>
    <ul>
        @foreach ($items as $item)
            <li>{{ $item->type }}</li>
        @endforeach
    </ul>
@endsection
