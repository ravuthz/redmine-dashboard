<div class="{{ $col }}">
    <div class="x_panel {{ $type or '' }}">
        <div class="x_title">
            <h2>{{ $title }}</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                    </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content {{ $content_class or '' }}">
            @if(isset($div))
                <div id="{{ $div['id'] }}" class="{{ $div['class'] }}">{{ $slot  }}</div>
            @else
                {{ $slot  }}
            @endif
        </div>
    </div>
</div>