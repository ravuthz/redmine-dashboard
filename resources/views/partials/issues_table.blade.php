@component('components.xpanel')
    @slot('title')
        Transaction Summary
        <small>Monthly progress</small>
    @endslot
    @slot('content_class')
        scroll-height-270
    @endslot
    <table id="{{ $table_id }}" class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Project</th>
            <th>Subject</th>
        </tr>
        </thead>
        <tbody>
        @foreach($issue_records as $issue)
            <tr>
                <td>{{ $issue->id  }}</td>
                <td>{{ $issue->project->name }}</td>
                <td>{{ $issue->subject  }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endcomponent