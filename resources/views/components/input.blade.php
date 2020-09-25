<div class="form-group">
    @if ($type !== 'hidden')
        <label for="{{ $field }}">{{ $label }}</label>
    @endif
    <input type="{{ $type }}" name="{{ $field }}" id="{{ $field }}" class="form-control" value="{{ $value }}" autocomplete="off" @if ($required === 'true') required @endif>
</div>