@props([
    'pos' => 'relative',
    'size' => '',
    'mode' => 'primary',
    'target' => null,
    'loading' => true,
    'disabled' => false,
    'anchor' => false,
])

@php
    $hasIcon = isset($icon);
    $iconPos = $hasIcon ? ($icon->attributes->has('right') && $icon->attributes->get('right') ? 'right' : 'left') : 'left';
    if (empty($target) && $attributes->has('wire:click')) {
        $target = $attributes->wire('click')->value();
    }

    // TODO: needs to add .prevent to wire attribute if tag is anchor

    $attr = [];

    if ($anchor) {
        $attr = ['role' => 'button', 'href' => '#'];
        if ($disabled) {
            $attr['aria-disabled'] = 'true';
            $attr['class'] = 'disabled';
        }
    } else {
        $attr = ['type' => 'button', 'disabled' => $disabled];
    }

    $attr['id'] = $attributes->has('id') ? $attributes->get('id') : 'loading-btn-' . Str::random(5);
@endphp

<{{ $anchor ? 'a' : 'button' }}
    {{ $attributes->class([
            'btn',
            'btn-' . strtolower($mode) => $mode,
            'position-relative' => strtolower($pos) == 'relative',
            'position-absolute' => strtolower($pos) == 'absolute',
            'btn-sm' => strtolower($size) == 'sm',
            'btn-lg' => strtolower($size) == 'lg',
        ])->merge($attr) }}>

    @if ($hasIcon && $iconPos == 'left')
        <span
            {{ $icon->attributes->merge([
                'class' => $slot->isNotEmpty() ? 'me-1' : '',
                'wire:loading.class' => $loading ? 'd-none' : false,
                'wire:target' => $loading && !empty($target) ? $target : false,
            ]) }}>
            {{ $icon }}
        </span>
        @if ($loading && !empty($target))
            <x-spinner target="{{ $target }}" mat="{{ $slot->isNotEmpty() ? 'e' : 'none' }}" size="sm" />
        @endif
    @endif

    {{ $slot }}

    @if ($hasIcon && $iconPos == 'right')
        <span
            {{ $icon->attributes->merge([
                'class' => $slot->isNotEmpty() ? 'ms-1' : '',
                'wire:loading.class' => $loading ? 'd-none' : false,
                'wire:target' => $loading && !empty($target) ? $target : false,
            ]) }}>
            {{ $icon }}
        </span>
        @if ($loading && !empty($target))
            <x-spinner target="{{ $target }}" mat="{{ $slot->isNotEmpty() ? 's' : 'none' }}" size="sm" />
        @endif
    @endif

    </{{ $anchor ? 'a' : 'button' }}>
