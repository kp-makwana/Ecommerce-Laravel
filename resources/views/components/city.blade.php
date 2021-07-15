<select id="CityList" name="city" class="bg-dark text-white form-control">
    <option value="" disabled selected>-- Select City --</option>
    @foreach($cities as $city)
        <option
            value="{{ $city->id }}" {{ $city->id == Auth::user()->address->city_id ? "selected":"" }}> {{ ucfirst($city->name) }}</option>
    @endforeach
</select>
