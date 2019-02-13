@php
    $labs = ['syborch' => ['4W19', '4W35'], 'medchem' => ['4E33', '4E65']];
@endphp

@switch ($item->type)
    @case ('Labbutler (halogen rich, 1)')
        @include('items.butler_lab', ['lab' => $labs[auth()->user()->group][0]])
    @break

    @case ('Labbutler (halogen poor, 1)')
        @include('items.butler_lab', ['lab' => $labs[auth()->user()->group][0]])
    @break

    @case ('Labbutler (halogen rich, 2)')
        @include('items.butler_lab', ['lab' => '4W35'])
    @break

    @case ('Labbutler (halogen poor, 2)')
        @include('items.butler_lab', ['lab' => '4W35'])
    @break

    @default
    @break
@endswitch
