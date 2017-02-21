@component('components.xpanel')
    @slot('type')
        tile
    @endslot
    @slot('title')
        {{ $title }}
    @endslot
    @slot('content_class')
        scroll-height-270
    @endslot
    <table id="{{ $table_id  }}" class="table table-striped">
        <thead>
        <tr>
            <th>Project</th>
            <th class="text-right">Number</th>
        </tr>
        </thead>
        <tbody>
        @if (!empty($items))
            @foreach($items as $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td class="fs15 fw700 text-right">{{ $item['number'] }}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endcomponent