<select class="form-control bg-dark text-white" name="country" id="countryList">
    <option value="" disabled selected>-- Select Country --</option>

    @foreach($countries as $count)
                <option value="{{ $count->id }}" {{ $count->id == Auth::user()->address->country_id ? "selected":"" }}>{{ $count->name }}</option>
    @endforeach
</select>

