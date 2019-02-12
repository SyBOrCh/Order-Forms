@if (auth()->user()->group === 'syborch')
    <input type="text" name="location[{{ $item->id }}]" value="4W19" readonly>
@elseif(auth()->user()->group === 'medchem')
    <input type="text" name="location[{{ $item->id }}]" value="4E26" readonly>
@endif

<input 
  type="number" 
  class="form-control form-control-lg" 
  aria-label="Recipient's username" 
  aria-describedby="basic-addon2" 
  value="1" 
  name="quantity[{{ $item->id }}]" 
  readonly>
