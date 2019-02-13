<div class="w-full mb-3">
  <input 
    type="text" class="form-control" 
    name="notes[{{ $item->id }}]"
    placeholder="Add some notes (optional)">
</div>
<div class="flex justify-between w-full items-center">
  <div class="mr-4">
    <span class="text-lg">Location:</span>
  </div>
  <div class="w-2/5">
    @group('syborch')
      <input name="location[{{ $item->id }}]" class="text-center inline form-control" value="4W40" readonly>
    @elsegroup('medchem')
      <input name="location[{{ $item->id }}]" class="text-center inline form-control" value="4E28" readonly>
    @endgroup
  </div>
</div>
