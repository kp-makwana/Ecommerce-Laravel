<select id="state-dd" name="state" class="bg-dark text-white form-control">
    @foreach($getStates as $states)
        <option value="{{ $states->id }}"> {{ $states->name }}</option>
    @endforeach
</select>
