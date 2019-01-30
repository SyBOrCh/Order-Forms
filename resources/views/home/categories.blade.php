@extends('layouts.app')

@section('content')
    <div class="container">
        
        <h1 class="text-center mb-4">Categories</h1>
        
        <div class="container mx-auto flex flex-wrap w-full justify-center">
        @foreach ($categories as $category => $items)
        <div class="w-1/4 mb-4 px-2 pt-2 mx-2">
           <div class="text-center card" style="max-width: 15rem;">
             <div style="overflow:hidden; height: 200px;">
                <img class="card-img-top {{ $currentOrder->contains(\App\Item::where('category', $category)->first()) ? 'grey-out' : '' }}" style="max-height: 190px; overflow:hidden;" src="{{ asset('img/categories/' . str_slug($category) . '.png') }}" >
             </div>
             <div class="card-body text-center">
                <a 
                  href="/categories/{{ str_slug($category) }}" 
                  class="btn btn-primary {{ $currentOrder->contains(\App\Item::where('category', $category)->first()) ? 'disabled' : '' }}"
                >{{ title_case($category) }}</a>
             </div>
           </div>
           </div>
        @endforeach
        </div>
    </div>
@endsection
