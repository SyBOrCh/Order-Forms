@extends('layouts.app')

@section('content')
    <div class="container text-center">
        @if ($order->isOpen())
        <h1 class="mb-2">Current order</h1>


        <form action="/orders/{{ $order->id }}/submit" method="POST">
            @csrf
            <button class="btn btn-primary">Submit form(s) &rarr;</button>
        </form>
        @else
        <h1 class="mb-2">Order from {{ $order->updated_at->format('d-m-Y h:m') }}</h1>
        @endif

        <div class="row">
        @foreach ($items as $action => $items)
            <div class="col-md-12">
            <h3 class="mb-4 mt-4">{{ title_case($action) }}</h3>
            @foreach ($items as $item)
                <div class="card mb-2 mx-auto text-left" style="width: 30rem;">
                  <div class="card-body flex justify-between">

                    <div class="{{ $item->type == 'Liquid nitrogen tank' ? 'w-1/2' : 'w-1/3' }}">
                        <strong>{{ $item->pivot->quantity }}&times;</strong> {{ $item->type }}
                    </div>

                    @if ($order->isOpen())

                    @if ($item->type !== 'Liquid nitrogen tank')
                    <div class="w-1/3">
                        <form class="d-inline" action="{{ $order->path() }}/items/{{ $item->id }}/increase" method="POST">
                            @csrf
                            <button class="btn btn-sm btn-success">&plus; 1</button>
                        </form>

                        <form class="d-inline" action="{{ $order->path() }}/items/{{ $item->id }}/decrease" method="POST">
                            @csrf
                            <button class="btn btn-sm btn-primary">&minus; 1</button>
                        </form>
                    </div>
                    @endif

                    <form action="{{ $order->path() }}/items/{{ $item->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-danger">&times; remove</button>
                    </form>

                    @endif
                </div>
                @if ($item->pivot->notes)
                <div class="w-full text-center p-1">
                    <em>Notes:</em> <br> {{ $item->pivot->notes }}
                </div>
                @endif

                @if ($item->pivot->location)
                <div class="w-full text-center p-1">
                    <em>Location:</em> <br> {{ $item->pivot->location }}
                </div>
                @endif

            </div>
            @endforeach
            </div>
        @endforeach
        </div>

        </form>
    </div>
@endsection
