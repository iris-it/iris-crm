<!-- Product Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', trans('app.general:name') . " :", ['class' => 'h4 text-purple'] ) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_active', trans('app.general:is-active') . ' :', ['class' => 'h4 text-purple']) !!}
    <select class="form-control" id="is_active" name="is_active">
        <option value=1>{{trans('app.general:yes')}}</option>
        <option value=0>{{trans('app.general:no')}}</option>
    </select>
</div>


<!-- Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category', trans('app.product:category') . " :", ['class' => 'h4 text-purple'] ) !!}
    {!! Form::text('category', null, ['class' => 'form-control']) !!}
</div>

<!-- Ht Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ht_price', trans('app.product:ht-price') . " :", ['class' => 'h4 text-purple'] ) !!}
    {!! Form::text('ht_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Taxes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('taxes', trans('app.product:active-taxes') . " :", ['class' => 'h4 text-purple']) !!}
    <div>
        <select name="taxes[]" id="taxes" class="form-control" multiple>
            @foreach($taxes as $tax)
                <option value="{{$tax->id}}" {{(!isset($product)) ?: ((!in_array($tax->id, $product->taxes->pluck('id')->toArray()) ?: "selected"))}}>{{$tax->name}} : {{$tax->value}} %</option>
            @endforeach
        </select>
    </div>

</div>

<!-- Stock Disponibility Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock_disponibility', trans('app.product:stock-dispo') . " :", ['class' => 'h4 text-purple']) !!}
    {!! Form::text('stock_disponibility', null, ['class' => 'form-control']) !!}
</div>

<!-- Stock Disponibility Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sale_unit', trans('app.product:sale-unit') . " :", ['class' => 'h4 text-purple']) !!}
    {!! Form::text('sale_unit', null, ['class' => 'form-control']) !!}
</div>

<!-- Sale Datestart Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sale_datestart', trans('app.product:date-start') . " :", ['class' => 'h4 text-purple']) !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        {!! Form::text('sale_datestart', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sale Dateend Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sale_dateend', trans('app.product:date-end') . " :", ['class' => 'h4 text-purple']) !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        {!! Form::text('sale_dateend', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Product Notice Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_notice', trans('app.product:notice') . " :", ['class' => 'h4 text-purple']) !!}
    {!! Form::text('product_notice', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', trans('app.general:description') . " :", ['class' => 'h4 text-purple']) !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Product Avatar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_avatar', trans('app.product:avatar') . ' :', ['class' => 'h4 text-purple']) !!}
    @if(isset($product))
        @include('shared.partials.image_cropper',['base_image' => asset($product->product_avatar), 'input_file_name' => 'product_avatar', 'input_crop_option'=> 'crop_options'])
    @else
        @include('shared.partials.image_cropper',['base_image' => '', 'input_file_name' => 'product_avatar', 'input_crop_option'=> 'crop_options'])
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! action('ProductController@index') !!}" class="btn btn-default">{{trans('app.general:cancel')}}</a>
</div>

