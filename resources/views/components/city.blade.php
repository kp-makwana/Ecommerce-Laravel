<select id="CityList" name="city" class="form-control {{ $class }}">
    <option value="" disabled selected>-- Select City --</option>
    @foreach($cities as $city)
        <option
            value="{{ $city->id }}" {{ $city->id == ($selectId ?? Auth::user()->address->city_id) ? "selected":"" }}> {{ ucfirst($city->name) }}</option>
    @endforeach
</select>
