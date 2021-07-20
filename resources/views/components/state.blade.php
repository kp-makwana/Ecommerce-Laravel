<select id="stateList" name="state" class="form-control">
    <option value="" disabled selected>-- Select State --</option>
    @foreach($getStates as $states)
        <option
            value="{{ $states->id }}" {{ $states->id == Auth::user()->address->state_id ? "selected":"" }}> {{ ucfirst($states->name) }}</option>
    @endforeach
</select>
