<select id="brands" name="brands"
        class="bg-dark text-white form-control">
    <option value="" selected disabled>-- Select brands --</option>
    @foreach($brands as $brand)
        <option
            value="{{ $brand->id }}">{{ $brand->name }}</option>
    @endforeach
</select>
