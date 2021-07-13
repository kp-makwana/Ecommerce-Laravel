<select name="sorting" class="bg-dark text-white form-control" id="sorting">
    <option value="" disabled>SortBy</option>
    @foreach(config('constants.orderBy') as $key => $value)
        <option value="{{ $key }}" {{ ($key == $sorting) ?"selected":"" }}>{{ $value }}</option>
    @endforeach
</select>
