@extends('layouts.app')

@section('content')
    <h1>Orders</h1>
    <ul>
        @foreach ($orders as $order)
            <li>{{ $order->id }}</li>
        @endforeach
    </ul>
@endsection
