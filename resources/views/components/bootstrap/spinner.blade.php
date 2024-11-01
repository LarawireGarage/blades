@props(['type'=>'border','target' => '', 'mat' => 'none', 'size' => 'sm'])

<div {{ $attributes->class([
    'spinner-'.$type,
    'spinner-'.$type.'-sm' => strtolower($size) == 'sm',
    'mr-2' => in_array($mat, ['e', 'end']),
    'ml-2' => in_array($mat, ['s', 'start']),
    'mx-0' => in_array($mat, ['none', 'false', false, 0]),
]) }}
    @if (!empty($target)) wire:loading wire:target='{{ $target }}' @endif role="status">
    <span class="sr-only">Loading...</span>
</div>
