<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div id="{{ $id }}" class="tile-stats">
        <div class="icon"><i class="{{ $icon or 'fa fa-caret-square-o-right' }}"></i></div>
        <div class="count">{{ $count or '0' }}</div>
        <h3>{{ $title }}</h3>
        <p>{{ $content  }}</p>
    </div>
</div>