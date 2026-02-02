<div>
    @foreach ($fields as $field)
        @php
            $name = $field['name']; $label = $field['label'] ?? ucfirst(str_replace('_', ' ', $field['name'])); $required = $field['required'] ?? false; $type = $field['type'] ?? 'text'; $val = old($name, $model->{$name} ?? '');
        @endphp
        <div>
            <label for="{{ $name }}">
                {{ $label }}
                @if ($required)
                    <span>*</span>
                @endif
            </label>
            <div>
                @switch($type)
                    @case('select')
                        <select name="{{ $name }}" id="{{ $name }}">
                            <option value=""></option>
                            @foreach ($field['options'] ?? [] as $optValue => $optLabel)
                                <option value="{{ $optValue }}" @selected($val == $optValue)>{{ $optLabel }}</option>
                            @endforeach
                        </select>
                        @break
                    @case('textarea')
                        <textarea name="{{ $name }}" id="{{ $name }}">{{ $val }}</textarea>
                        @break
                    @default
                        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ $val }}">
                @endswitch

                @error($name)
                    <p>{{ $message }}</p>
                @enderror
            </div>
        </div>
    @endforeach
</div>
