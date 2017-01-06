<!-- Account Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name',  trans('app.general:name') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Website Field -->
<div class="form-group col-sm-6">
    {!! Form::label('website', trans('app.general:website') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('website', null, ['class' => 'form-control']) !!}
</div>

<!-- Activity Sector Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activity_sector', trans('app.general:activity-sector') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('activity_sector', null, ['class' => 'form-control']) !!}
</div>

<!-- Workforce Field -->
<div class="form-group col-sm-6">
    {!! Form::label('workforce', trans('app.general:workforce') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('workforce', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', trans('app.general:type') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Ape Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ape_number', trans('app.general:ape-number') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('ape_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Siret Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('siret_number', trans('app.general:siret-number') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('siret_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_number', trans('app.general:phone-number') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_active', trans('app.general:is-active') . ' :', ['class' => 'h4 text-purple']) !!}
    <select class="form-control" id="is_active" name="is_active">
        <option value=1>{{trans('app.general:yes')}}</option>
        <option value=0>{{trans('app.general:no')}}</option>
    </select>
</div>

<div class="form-group col-sm-6">
    <br>
    <label>
        {!! Form::checkbox('is_main', 1, null, ['class' => 'checkbox']) !!}
        <span class="checkbox-label"> {{trans('app.office:is-main')}}</span>
    </label>
</div>


@include('pages.accounts.partials.address_form', ['title' => trans('app.general:delivery-address'), 'type' => 'delivery', 'id' => 'deliveryAddress'])


<div class="col-sm-12">
    <div class="form-group col-sm-6">
        <button type="button" id="btn-duplicate" class="btn btn-info btn-flat" data-source="deliveryAddress" data-dest="billingAddress"><i class="fa fa-files-o"></i> {{trans('app.address:use-same-btn')}}</button>
    </div>
</div>


@include('pages.accounts.partials.address_form', ['title' => trans('app.general:billing-address'), 'type' => 'billing', 'id' => 'billingAddress'])


<!-- Free Label Field -->
<div class="form-group col-sm-6">
    {!! Form::label('free_label', trans('app.general:free-input') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('free_label', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! action('AccountController@index') !!}" class="btn btn-default">{{trans('app.general:cancel')}}</a>
</div>

@section('scripts')
    @parent
    <script type="text/javascript">

        $(document).ready(function () {

            $('#btn-duplicate').click(function() {

                var source = $('#' + $(this).data('source'));
                var dest = $('#' + $(this).data('dest'));

                dest.find('#name').val(source.find('#name').val());
                dest.find('#street_label').val(source.find('#street_label').val());
                dest.find('#street_detail').val(source.find('#street_detail').val());
                dest.find('#zipcode').val(source.find('#zipcode').val());
                dest.find('#city').val(source.find('#city').val());
                dest.find('#country').val(source.find('#country').val());

            });

        });


    </script>


@endsection