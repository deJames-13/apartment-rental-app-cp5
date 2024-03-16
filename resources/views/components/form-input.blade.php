<div>
    <x-input label='{{ $label }}' name='{{ $field }}' value="{{ old($field) }}" type='{{ $type }}'
        id='{{ $id }}' placeholder="{{ $placeholder }}" />
    @error($field)
        <p class="text-xs text-error">
            {{ $message }}
        </p>
    @enderror
</div>
