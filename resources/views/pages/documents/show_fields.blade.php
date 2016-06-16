
<!-- Document Name Field -->
<div class="form-group">
    {!! Form::label('document_name', trans('app.general:name') . " :" ) !!}
    <p>{!! $document->document_name !!}</p>
</div>

<!-- Version Field -->
<div class="form-group">
    {!! Form::label('version', trans('app.document:version') . " :" ) !!}
    <p>{!! $document->version !!}</p>
</div>

<!-- Document Upload Field -->
<div class="form-group">
    {!! Form::label('document_upload', trans('app.document:file') . " :" ) !!}
    <p>{!! $document->document_upload !!}</p>
</div>

<!-- Authorizations Field -->
<div class="form-group">
    {!! Form::label('authorizations', trans('app.document:authorizations') . " :" ) !!}
    <p>{!! $document->authorizations !!}</p>
</div>

<!-- Writers Field -->
<div class="form-group">
    {!! Form::label('writers', trans('app.document:writers') . " :" ) !!}
    <p>{!! $document->writers !!}</p>
</div>

<!-- Readers Field -->
<div class="form-group">
    {!! Form::label('readers', trans('app.document:readers') . " :" ) !!}
    <p>{!! $document->readers !!}</p>
</div>

<!-- Document State Field -->
<div class="form-group">
    {!! Form::label('document_state', trans('app.document:state') . " :" ) !!}
    <p>{!! $document->document_state !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', trans('app.general:created-at') . " :" ) !!}
    <p>{!! $document->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', trans('app.general:updated-at') . " :" ) !!}
    <p>{!! $document->updated_at !!}</p>
</div>

