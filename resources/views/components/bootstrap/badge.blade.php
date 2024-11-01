@props([
    'pill' => false,
    'text' => '',
    'overlay' => false,
    'overlayX' => 'end',
    'overlayY' => 'top',
])

<span
    {{ $attributes->class([
        'badge',
        'rounded-pill' => $pill,
        'position-absolute' => $overlay,
        'position-relative' => !$overlay,
        'top-0' => $overlay && strtolower($overlayY) == 'top',
        'top-50' => $overlay && strtolower($overlayY) == 'middle',
        'top-100' => $overlay && strtolower($overlayY) == 'bottom',
        'start-0' => $overlay && strtolower($overlayX) == 'start',
        'start-50' => $overlay && strtolower($overlayX) == 'middle',
        'start-100' => $overlay && strtolower($overlayX) == 'end',
        'translate-middle' => $overlay,
    ]) }}>
    {{ $text ?? '' }}
    {{ $slot }}
</span>
