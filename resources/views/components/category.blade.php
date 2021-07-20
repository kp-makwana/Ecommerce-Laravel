<select id="category" name="category" class="form-control">
    <option value="" selected disabled>-- Select Category --</option>
    @foreach($categories as $category)
        <option class="col-md-12"
            value="{{  $category->id }}" {{ ($category->id == $selectedCategory) ? "selected" : "" }}>{{ ucfirst($category->name) }}</option>
    @endforeach
</select>
