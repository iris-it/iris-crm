<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $document->id !!}</p>
</div>

<!-- Document Name Field -->
<div class="form-group">
    {!! Form::label('document_name', 'Document Name:') !!}
    <p>{!! $document->document_name !!}</p>
</div>

<!-- Version Field -->
<div class="form-group">
    {!! Form::label('version', 'Version:') !!}
    <p>{!! $document->version !!}</p>
</div>

<!-- Document Upload Field -->
<div class="form-group">
    {!! Form::label('document_upload', 'Document Upload:') !!}
    <p>{!! $document->document_upload !!}</p>
</div>

<!-- Authorizations Field -->
<div class="form-group">
    {!! Form::label('authorizations', 'Authorizations:') !!}
    <p>{!! $document->authorizations !!}</p>
</div>

<!-- Writers Field -->
<div class="form-group">
    {!! Form::label('writers', 'Writers:') !!}
    <p>{!! $document->writers !!}</p>
</div>

<!-- Readers Field -->
<div class="form-group">
    {!! Form::label('readers', 'Readers:') !!}
    <p>{!! $document->readers !!}</p>
</div>

<!-- Document State Field -->
<div class="form-group">
    {!! Form::label('document_state', 'Document State:') !!}
    <p>{!! $document->document_state !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $document->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $document->updated_at !!}</p>
</div>

