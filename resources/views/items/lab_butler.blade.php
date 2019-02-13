
@switch ($item->type)
    @case ('Labbutler (halogen rich, 1)')
        
        @if (auth()->user()->group === 'syborch')
            @include('items.butler_lab', ['lab' => '4W19'])
        @else
            @include('items.butler_lab', ['lab' => '4E33'])
        @endif

    @break
    
    @case ('Labbutler (halogen poor, 1)')
        
        @if (auth()->user()->group === 'syborch')
            @include('items.butler_lab', ['lab' => '4W19'])
        @else
            @include('items.butler_lab', ['lab' => '4E33'])
        @endif

    @break

    @case ('Labbutler (halogen rich, 2)')
        
        @if (auth()->user()->group === 'syborch')
            @include('items.butler_lab', ['lab' => '4W35'])
        @else
            @include('items.butler_lab', ['lab' => '4E65'])
        @endif

    @break

    @case ('Labbutler (halogen poor, 2)')
        
        @if (auth()->user()->group === 'syborch')
            @include('items.butler_lab', ['lab' => '4W35'])
        @else
            @include('items.butler_lab', ['lab' => '4E65'])
        @endif

    @break

    @default
        'default pass'
    @break  
@endswitch
