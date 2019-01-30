@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Orders</h1>

        <div class="bg-white p-4 rounded-lg shadow-lg">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Date</th>
                  <th scope="col">User</th>
                  <th scope="col">Details</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($orders as $order)
                <tr>
                  <th scope="row">{{ $order->id }}</th>
                  <td>{{ $order->updated_at->format('d-m-Y') }} ({{ ($order->updated_at->diffForHumans()) }})</td>
                  <td>{{ $order->user->name }}</td>
                  <td><a href="/orders/{{ $order->id }}">View details</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>    
    </div>
@endsection
