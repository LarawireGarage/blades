@props(['list' => [], 'showError' => true, 'view' => 'components.pagination.bs-pagination', 'position' => 'bottom'])
@if (
    $list instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator ||
        $list instanceof \Illuminate\Contracts\Pagination\Paginator ||
        $list instanceof \Illuminate\Pagination\LengthAwarePaginator ||
        $list instanceof \Illuminate\Pagination\Paginator)
    {{ $list->links(!empty($view) ? $view : 'livewire::bootstrap', ['position' => $position]) }}
@else
    @env(['local'])
    @if ($showError == 'true')
        <div class="text-right text-muted font-italic">
            <small> <u>{{ 'Supplied List Not Supported Pagination' }}</u> </small>
        </div>
    @endif
    @endenv
@endif
