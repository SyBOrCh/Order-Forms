<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>

    <div class="container">
        <p>
            Beste medewerker, 
            <br><br> Graag zou ik onderstaande acties en/of artikelen aanvragen.
            <br><br> Bij voorbaat dank.
            <br><br> Met vriendelijke groet, 
            <br><br>{{ auth()->user()->name }} 
            <br>(O|2 gebouw)
            <br>Organisatie: VU algemeen, <br> Faculteit der Exacte Wetenschappen
            <br>Budgetnummer: {{ auth()->user()->budgetnumber }}
        </p>

        <div class="row">
            @foreach ($items as $action => $items)
            <div class="col-md-12">
                <h3 class="mb-4 mt-4">{{ $translator::toNL(title_case($action)) }}</h3>
                @foreach ($items as $item)
                <ul>
                    <li>{{ $item->pivot->quantity }}&times; {{ $translator::toNL($item->type) }}</li>
                </ul>
                @endforeach
            </div>
            @endforeach
        </div>
        
        @if ($items->where('category', 'gasses')->count() > 0)
        <p>
            <u>Met betrekking tot de gassen:</u><br>
            <em>
                Alle gasflessen worden besteld bij leverancier <strong>Praxair</strong>. De afleverlocatie: <strong>4W-G</strong> kast(en), graag met complete fixatie. Zouden alle lege gasflessen ook meteen opgehaald kunnen worden? 
            </em>
        </p>
        @endif

    </div>
</body>
</html>
