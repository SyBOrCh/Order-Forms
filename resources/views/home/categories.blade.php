@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Categories</h1>
        
        <div class="row justify-content-md-center">
        @foreach ($categories as $category => $items)
           <div class="text-center px-2 pt-2 card col mx-2" style="max-width: 15rem;">
             <div style="overflow:hidden; height: 200px;">
                <img class="card-img-top" style="max-height: 190px; overflow:hidden;" src="{{ asset('img/categories/' . str_slug($category) . '.png') }}" >
             </div>
             <div class="card-body text-center">
               <a href="/categories/{{ str_slug($category) }}" class="btn btn-primary">{{ title_case($category) }}</a>
             </div>
           </div>
        @endforeach
        </div>
    </div>
@endsection
