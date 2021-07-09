<select id="category" name="category" class="bg-dark text-white form-control">
    <option value="" selected disabled>-- Select Category --</option>
    @foreach($categories as $category)
        <option
            value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</select>
