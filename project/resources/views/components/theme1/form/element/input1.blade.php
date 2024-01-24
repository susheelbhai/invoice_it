<div class="mb-3 col-md-6">
    @if ($type == 'text' || $type == 'number' || $type == 'password' || $type == 'file' || $type == 'email')
        <label for="{{ $name }}" class="form-label">
            {{ $label }}
            {!! $required == 'required' ? "<span class='text-danger'>*</span>" : '' !!}
        </label>
        <input class="form-control" type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
            placeholder="{{ $placeholder }}" value="{{ $value }}" {{ $required }} {{ $attributes }}>
    @endif

    @if ($type == 'select')
        <label class="form-label">
            {{ $label }}
            {!! $required == 'required' ? "<span class='text-danger'>*</span>" : '' !!}
        </label>
        <select name="{{ $name }}" id="{{ $name }}" class="form-control wide" {{ $attributes }}>
            <option value="">Choose...</option>
            @foreach ($options as $i)
                <option value="{{ $i->id }}" {{ $i->id == $value ? 'selected' : '' }}>{{ $i->name }}
                </option>
            @endforeach
        </select>
    @endif
    @if ($type == 'select2_single')

        <label class="form-label">
            {{ $label }}
            {!! $required == 'required' ? "<span class='text-danger'>*</span>" : '' !!}
        </label>

        <select name="{{ $name }}" id="{{ $name }}" class="js-states select2_single form-control"
            {{ $attributes }}>
            @foreach ($options as $i)
                <option value="{{ $i->id }}" {{ $i->id == $value ? 'selected' : '' }}>{{ $i->name }}
                </option>
            @endforeach
        </select>
        

    @endif
    @if ($type == 'select2_multiple')

        <label class="form-label">
            {{ $label }}
            {!! $required == 'required' ? "<span class='text-danger'>*</span>" : '' !!}
        </label>

        <select id="multiple" class="js-states form-control" multiple>
            @foreach ($options as $i)
            <option value="{{ $i->sku }}" {{ $i->id == $value ? 'selected' : '' }}>{{ $i->name }}
            </option>
        @endforeach
        </select>

        <select name="{{ $name }}" id="{{ $name }}" class="form-control wide" {{ $attributes }}>
            <option value="">Choose...</option>
            @foreach ($options as $i)
                <option value="{{ $i->id }}" {{ $i->id == $value ? 'selected' : '' }}>{{ $i->name }}
                </option>
            @endforeach
        </select>
    @endif

    @error($name)
        <x-form.validation-error :value="$message" />
    @enderror
</div>
