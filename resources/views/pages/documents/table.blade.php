<table class="table table-responsive" id="documents-table">
    <thead>
        <th>Document Name</th>
        <th>Version</th>
        <th>Document Upload</th>
        <th>Authorizations</th>
        <th>Writers</th>
        <th>Readers</th>
        <th>Document State</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($documents as $document)
        <tr>
            <td>{!! $document->document_name !!}</td>
            <td>{!! $document->version !!}</td>
            <td>{!! $document->document_upload !!}</td>
            <td>{!! $document->authorizations !!}</td>
            <td>{!! $document->writers !!}</td>
            <td>{!! $document->readers !!}</td>
            <td>{!! $document->document_state !!}</td>
            <td>
                {!! Form::open(['route' => ['documents.destroy', $document->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('documents.show', [$document->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('documents.edit', [$document->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>