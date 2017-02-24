<div class="{{ $col }}">
    <div class="x_panel {{ $type or '' }}">
        <div class="x_title">
            {{ $title }}
            <div class="clearfix"></div>
        </div>
        <div class="x_content {{ $content_class or '' }}">
            {{ $slot }}
        </div>
    </div>
</div>