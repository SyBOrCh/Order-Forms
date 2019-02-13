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
                @if ($category === 'Lab Butler')
                  @include('items.lab_butler')
                @else
                <div class="card mb-2 mx-auto text-left" style="width: 30rem;">
                  <div class="card-body">
                    <div class="input-group mb-3">
                      @if ($category == 'Liquid Nitrogen')
                        @include('items.liquid_nitrogen')
                      @else
                        <input 
                            type="number" 
                            class="form-control form-control-lg" 
                            aria-label="Recipient's username" 
                            aria-describedby="basic-addon2" 
                            value="0" 
                            name="quantity[{{ $item->id }}]
                        ">
                      @endif

                      <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">{{ $item->type }}</span>
                      </div>
                    </div>

                    <div class="input-group mb-3">
                      @switch ($category)
                        @case('Lab Butler')
                          // already handled above
                        @break
                        @case('Waste Containers')
                          @include('items.waste_containers')
                        @break
                        @case('Gasses')
                          @include('items.gasses')
                        @break
                        @case('Solid Waste')
                          @include('items.waste_containers')
                        @break
                        @case('General Waste')
                          @include('items.waste_containers')
                        @break
                        @default
                        <input type="text" class="form-control" name="notes[{{ $item->id }}]"
                        placeholder="Add some notes (optional)">
                        @endswitch
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            </div>
        @endforeach
        </div>

        </form>
    </div>
@endsection
