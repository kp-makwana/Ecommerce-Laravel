<select id="rating" name="rating"
        class="form-control">
    <option value="0" selected disabled>-- SortBy Rating --</option>
    @foreach($ratings as $key => $value)
        <option value="{{ $key }}" {{ ($selectedRating == $key) ? "selected":"" }}>{{ $value }}</option>
    @endforeach
</select>
