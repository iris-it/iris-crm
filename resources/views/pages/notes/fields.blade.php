<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('title', trans('app.note:title') . ' :') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('private', trans('app.note:private') . ' :') !!}
            {!! Form::checkbox('private', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-9">
        <div class="form-group">
            {!! Form::label('body', trans('app.note:body') . ' :') !!}
            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</div>

@section('scripts')
    @parent
    <script type="text/javascript">
        $(document).ready(function () {
            $('#body').trumbowyg({
                svgPath: '/build/svg/icons.svg'
            });
        });
    </script>
@endsection
