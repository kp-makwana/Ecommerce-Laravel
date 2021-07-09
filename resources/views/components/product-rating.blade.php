<select id="rating" name="rating"
        class="bg-dark text-white form-control">
    <option value="" selected disabled>-- SortBy Rating --</option>
    @foreach($ratings as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
</select>
