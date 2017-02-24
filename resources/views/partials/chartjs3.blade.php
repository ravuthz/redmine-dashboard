@component('components.xpanel')
    @slot('title')
        {{ $chart_label }}
    @endslot
    <div id="{{ $chart_id }}" class="fixed-height-270"></div>
@endcomponent