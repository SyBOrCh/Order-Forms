<div class="flex justify-around w-full">
  <div class="w-2/3 mr-2">
    <select name="location[{{ $item->id }}]" class="form-control">
      @if (auth()->user()->group === 'syborch')
        <option value="4W33 (fixatie compleet)">4W33</option>
        <option value="4W35 (fixatie compleet)">4W35</option>
        <option value="4E22 (fixatie compleet)">4E22</option>
      @elseif (auth()->user()->group === 'medchem')
        <option value="E33 (toilet-kant, fixatie compleet)">E33 (toilet-side)</option>
        <option value="E33 (kluisjes-kant, fixatie compleet)">E33 (locker-side)</option>
        <option value="E65 (toilet-kant, fixatie compleet)">E65 (toilet-side)</option>
        <option value="E65 (kluisjes-kant, fixatie compleet)">E65 (locker-side)</option>
      @endif
    </select>
  </div>

  <div class="w-2/3">
    <input 
        type="text" 
        class="form-control" 
        name="notes[{{ $item->id }}]"
        placeholder="Add some notes (optional)">
  </div>
</div>
