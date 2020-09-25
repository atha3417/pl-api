<div class="form-group">
    <label for="{{ $field }}">{{ $label }}</label><br>
    <select name="{{ $field }}[]" id="{{ $field }}" class="w-100" multiple>
        @foreach ($options as $option)
            <option value="{{ $option['name'] }}">{{ $option['name'] }}</option>
        @endforeach
    </select>
</div>