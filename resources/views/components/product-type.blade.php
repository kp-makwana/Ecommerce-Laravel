<select id="product_type" name="product_type"
        class="bg-dark text-white form-control">
    <option value="" selected disabled>-- Select Product Type --</option>
    @foreach($product_types as $product_type)
        <option
            value="{{ $product_type->id }}">{{ ucfirst($product_type->name) }}</option>
    @endforeach
</select>
