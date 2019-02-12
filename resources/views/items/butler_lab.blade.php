<div class="card mb-2 mx-auto text-left" style="width: 30rem;">
    <div class="card-body">
        <div class="input-group mb-3">
            <input 
                type="number" 
                class="form-control form-control-lg" 
                aria-label="Recipient's username" 
                aria-describedby="basic-addon2" 
                value="0" 
                name="quantity[{{ $item->id }}]
            ">
            <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2">{{ $item->type }}</span>
            </div>
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" name="location[{{ $item->id }}]" value="{{ $lab }}" readonly>
            <input type="text" class="form-control" name="notes[{{ $item->id }}]" placeholder="Zuurkasten/fume hoods: ...">
        </div>
    </div>
</div>
