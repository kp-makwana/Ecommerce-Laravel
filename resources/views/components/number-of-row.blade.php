<select name="no_of_record" id="no_of_record" class="bg-dark text-white form-control" id="no_of_row">
    {{ $no_of_row }}
    @foreach(config('constants.num_of_raw') as $key => $value)
        <option value="{{ $key }}" {{ ($no_of_row == $key) ? "selected":"" }}>{{ $value }}</option>
    @endforeach
</select>
