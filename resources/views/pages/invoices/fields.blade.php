<!-- Topic Field -->
<div class="form-group col-sm-6">
    {!! Form::label('topic',trans('app.general:topic') . " :" )  !!}
    {!! Form::text('topic', null, ['class' => 'form-control']) !!}
</div>

<!-- Account Name Field -->
<div class="form-group col-sm-6">
    <label for="account_name_id">{{trans('app.contact:account_name')}} :</label>
    {!! Form::select('account_name_id', $accounts, null, ['class' => 'form-control']) !!}
</div>

<!-- Phase Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phase', trans('app.general:phase') . " :" )  !!}
    {!! Form::text('phase', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact Name Field -->
<div class="form-group col-sm-6">
    <label for="contact_name_id">{{trans('app.contact:name')}} :</label>
    {!! Form::select('contact_name_id', $contacts, null, ['class' => 'form-control']) !!}
</div>

<!-- Deadline Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deadline', trans('app.general:deadline') . " :" )  !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        {!! Form::text('deadline', null, ['class' => 'form-control', 'id' => 'deadline']) !!}
    </div>
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', trans('app.general:description') . " :" )  !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- products -->

<div class="form-group col-sm-6">
    {!! Form::label('products_list', trans('app.invoice:products-list') . " :") !!}
    <hr>
    <div>
        @if(isset($invoice))
            {!! Form::select('products[]', $products, array_pluck($invoice->products, 'id'), ['multiple', 'id'=> 'products_list', 'style' => 'height: 306px'] ) !!}
        @else
            {!! Form::select('products[]', $products, null, ['multiple', 'id'=> 'products_list', 'style' => 'height: 306px']) !!}
        @endif
    </div>
</div>

<!-- services -->
<div class="form-group col-sm-6">
    {!! Form::label('services_list', trans('app.invoice:services-list') . " :") !!}
    <hr>
    <div>
        @if(isset($invoice))
            {!! Form::select('services[]', $services, array_pluck($invoice->services, 'id'), ['multiple', 'id'=> 'services_list', 'style' => 'height: 306px'] ) !!}
        @else
            {!! Form::select('services[]', $services, null, ['multiple', 'id'=> 'services_list', 'style' => 'height: 306px']) !!}
        @endif
    </div>
</div>


<!-- Special Conditions Field -->
<div class="form-group col-sm-6">
    {!! Form::label('special_conditions', trans('app.general:special-conditions') . " :" )  !!}
    {!! Form::text('special_conditions', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', trans('app.general:address') . " :" )  !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Zipcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('zipcode', trans('app.general:zipcode') . " :" ) !!}
    {!! Form::text('zipcode', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', trans('app.general:city') . " :" ) !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country', trans('app.general:country') . " :" ) !!}
    {!! Form::text('country', null, ['class' => 'form-control']) !!}
</div>

<!-- Quote Field -->
<div class="form-group col-sm-6">
    <label for="quote_id">{{trans('app.general:quote')}} :</label>
    {!! Form::select('quote_id', $quotes, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! action('InvoiceController@index') !!}" class="btn btn-default">{{trans('app.general:cancel')}}</a>
</div>

