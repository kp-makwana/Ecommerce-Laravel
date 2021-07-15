<select name="sorting" class="bg-dark text-white form-control" id="sorting">
    @foreach(config('constants.orderBy') as $key => $value)
        <option value="{{ $key }}" {{ ($key == $sorting) ?"selected":"" }} {{ ($key == '0') ? "disabled":"" }}>{{ ucfirst($value) }}</option>
    @endforeach
</select>
