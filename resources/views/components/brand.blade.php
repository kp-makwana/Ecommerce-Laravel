<select id="brands" name="brands"
        class="form-control">
    <option value="" selected disabled>-- Select brands --</option>
    @foreach($brands as $brand)
        <option
            value="{{ $brand->id }}" {{ ($brand->id == $selectedBrand) ? "selected":"" }}>{{ ucfirst($brand->name) }}</option>
    @endforeach
</select>
