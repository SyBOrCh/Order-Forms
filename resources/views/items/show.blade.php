@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1>{{ $category }}</h1>
        
        <form action="/orders/{{ $order->id }}/items" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">&plus; Add to order</button>
        
        <div class="row">
        @foreach ($items as $action => $items)
            <div class="col-md-6">
            <h3 class="mb-4 mt-4">{{ title_case($action) }}</h3>
            @foreach ($items as $item)
                <div class="card mb-2 mx-auto text-left" style="width: 30rem;">
                  <div class="card-body">
                    <div class="input-group mb-3">
                      <input type="number" class="form-control form-control-lg" aria-label="Recipient's username" aria-describedby="basic-addon2" value="0" name="quantity[{{ $item->id }}]
                      ">
                      <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">{{ $item->type }}</span>
                      </div>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
        @endforeach
        </div>

        </form>
    </div>
@endsection
