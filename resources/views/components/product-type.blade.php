<select id="product_type" name="product_type"
        class="form-control">
    <option value="" selected disabled>-- Select Product Type --</option>
    @foreach($product_types as $product_type)
        <option
            value="{{ $product_type->id }}" {{ ($product_type->id == $selectedType) ? "selected" : "" }}>{{ ucfirst($product_type->name) }}</option>
    @endforeach
</select>
