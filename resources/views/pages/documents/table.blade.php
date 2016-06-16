<table class="table table-responsive" id="documents-table">
    <thead>
        <th>{{trans('app.general:name')}}</th>
        <th>{{trans('app.document:version')}}</th>
        <th>{{trans('app.document:authorizations')}}</th>
        <th>{{trans('app.document:writers')}}</th>
        <th>{{trans('app.document:state')}}</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($documents as $document)
        <tr>
            <td>{!! $document->document_name !!}</td>
            <td>{!! $document->version !!}</td>
            <td>{!! $document->authorizations !!}</td>
            <td>{!! $document->writers !!}</td>
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