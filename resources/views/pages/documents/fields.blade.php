<!-- Document Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('document_name', trans('app.general:name') . " :" )!!}
    {!! Form::text('document_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Version Field -->
<div class="form-group col-sm-6">
    {!! Form::label('version', trans('app.document:version') . " :" ) !!}
    {!! Form::text('version', null, ['class' => 'form-control']) !!}
</div>

<!-- Document Upload Field -->
<div class="form-group col-sm-6">
    {!! Form::label('document_upload', trans('app.document:file') . " :" ) !!}
    {!! Form::text('document_upload', null, ['class' => 'form-control']) !!}
</div>

<!-- Authorizations Field -->
<div class="form-group col-sm-6">
    {!! Form::label('authorizations', trans('app.document:authorizations') . " :" ) !!}
    {!! Form::text('authorizations', null, ['class' => 'form-control']) !!}
</div>

<!-- Writers Field -->
<div class="form-group col-sm-6">
    {!! Form::label('writers', trans('app.document:writers') . " :" ) !!}
    {!! Form::text('writers', null, ['class' => 'form-control']) !!}
</div>

<!-- Readers Field -->
<div class="form-group col-sm-6">
    {!! Form::label('readers', trans('app.document:readers') . " :" )!!}
    {!! Form::text('readers', null, ['class' => 'form-control']) !!}
</div>

<!-- Document State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('document_state', trans('app.document:state') . " :" ) !!}
    {!! Form::text('document_state', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('documents.index') !!}" class="btn btn-default">Cancel</a>
</div>
