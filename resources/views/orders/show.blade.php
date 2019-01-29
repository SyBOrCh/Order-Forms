@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1 class="mb-2">Current order</h1>

        <form action="/orders/{{ $order->id }}/submit" method="POST">
            @csrf
            <button class="btn btn-primary">Submit form(s) &rarr;</button>
        </form>
        
        <div class="row">
        @foreach ($items as $action => $items)
            <div class="col-md-12">
            <h3 class="mb-4 mt-4">{{ title_case($action) }}</h3>
            @foreach ($items as $item)
                <div class="card mb-2 mx-auto text-left" style="width: 30rem;">
                  <div class="card-body flex justify-between">
                    {{ $item->type }} ({{ $item->pivot->quantity }}&times;)
                    <div>
                        <form class="d-inline" action="{{ $order->path() }}/items/{{ $item->id }}/increase" method="POST">
                            @csrf
                            <button class="btn btn-sm btn-success">&plus; 1</button>
                        </form>

                        <form class="d-inline" action="{{ $order->path() }}/items/{{ $item->id }}/decrease" method="POST">
                            @csrf
                            <button class="btn btn-sm btn-primary">&minus; 1</button>
                        </form>

                    </div>
                    <form action="{{ $order->path() }}/items/{{ $item->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-danger">&times; remove</button>
                    </form>
                </div>
            </div>
            @endforeach
            </div>
        @endforeach
        </div>

        </form>
    </div>
@endsection
