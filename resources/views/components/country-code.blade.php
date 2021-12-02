<select id="country_code" name="country_code"
        class="form-control">
    @foreach($country as $count)
        <option
            value="{{ $count->country_code }}" {{ $count->country_code == Auth::user()->country_code ? "selected":"" }}>
            +{{ $count->country_code }}</option>
    @endforeach
</select>
