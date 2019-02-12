@if (auth()->user()->group === 'syborch')
    @include('items.butler_lab', ['lab' => '4W19'])
    @include('items.butler_lab', ['lab' => '4W35'])
@elseif (auth()->user()->group === 'medchem')
    @include('items.butler_lab', ['lab' => '4E33'])
    @include('items.butler_lab', ['lab' => '4E65'])
@endif
