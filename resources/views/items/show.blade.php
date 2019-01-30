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
                      @if ($category == 'Liquid Nitrogen')
                        <input type="number" class="form-control form-control-lg" aria-label="Recipient's username" aria-describedby="basic-addon2" value="1" name="quantity[{{ $item->id }}]
                        " readonly>
                        @else
                        <input type="number" class="form-control form-control-lg" aria-label="Recipient's username" aria-describedby="basic-addon2" value="0" name="quantity[{{ $item->id }}]
                        ">
                      @endif
                      <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">{{ $item->type }}</span>
                      </div>
                    </div>

                    <div class="input-group mb-3">
                      @switch ($category)
                        @case('Lab Butler')
                          <input type="text" class="form-control" name="notes[{{ $item->id }}]"
                          placeholder="Zuurkasten/fume hoods: 7, 9, 12">
                        @break
                        @case('Gasses')
                          <div class="flex justify-around w-full">
                            <div class="w-1/3 mr-2">
                            <select name="location[{{ $item->id }}]" class="form-control">
                              <option value="4W33 (fixatie compleet)">4W33</option>
                              <option value="4W35 (fixatie compleet)">4W35</option>
                              <option value="4E22 (fixatie compleet)">4E22</option>
                            </select>
                            </div>
                            <div class="w-2/3">
                              <input type="text" class="form-control" name="notes[{{ $item->id }}]"
                              placeholder="Add some notes (optional)">
                            </div>
                          </div>
                        @break
                        @default
                        <input type="text" class="form-control" name="notes[{{ $item->id }}]"
                        placeholder="Add some notes (optional)">
                        @endswitch
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
