<!-- Topic Field -->
<div class="form-group col-sm-6">
    {!! Form::label('topic', trans('app.general:topic') . " :" ) !!}
    <p>{!! $quote->topic !!}</p>
</div>

<!-- Account Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_name', trans('app.contact:account-name') . " :" ) !!}
    @if($quote->account)
        <p>{!! $quote->account->name !!}</p>
    @else
        <p>{{trans('app.general:undefined')}}</p>
    @endif
</div>

<!-- Phase Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phase',  trans('app.general:phase') . " :" ) !!}
    <p>{!! $quote->phase !!}</p>
</div>

<!-- Contact Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_name', trans('app.contact:name') . " :" ) !!}

    @if($quote->contact)
        <p>{!! $quote->contact->firstname !!} {!! $quote->contact->lastname !!}</p>
    @else
        <p>{{trans('app.general:undefined')}}</p>
    @endif
</div>

<!-- Deadline Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deadline', trans('app.general:deadline') . " :" ) !!}
    <p>{!! $quote->deadline !!}</p>
</div>

<!-- Contact Owner Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_owner', trans('app.contact:owner') . " :" ) !!}
    @if($quote->user)
        <p>{!! $quote->user->name !!}</p>
    @else
        <p>{{trans('app.general:undefined')}}</p>
    @endif
</div>

<div class="form-group col-sm-6">
    {!! Form::label('products_list', trans('app.quote:products-list') . " :") !!}
    @if($quote->products()->count() > 0 )
        <ul class="fa-ul">
            @foreach($quote->products as $product)
                <li><i class="fa fa-check fa-li"></i>{{$product->product_name}} (<span class="text-purple">{{$product->ht_price}} €</span>)</li>
            @endforeach
        </ul>
    @else
        <p>{{trans('app.general:none')}}</p>
    @endif

</div>

<div class="form-group col-sm-6">
    {!! Form::label('services_list', trans('app.quote:services-list') . " :") !!}

    @if($quote->services()->count() > 0 )
        <ul class="fa-ul">
            @foreach($quote->services as $service)
                <li><i class="fa fa-check fa-li"></i>{{$service->service_name}} (<span class="text-purple">{{$service->ht_price}} €</span>)</li>
            @endforeach
        </ul>
    @else
        <p>{{trans('app.general:none')}}</p>
    @endif

</div>


<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', trans('app.general:description') . " :" ) !!}
    <p>{!! $quote->description !!}</p>
</div>

<!-- Special Conditions Field -->
<div class="form-group col-sm-6">
    {!! Form::label('special_conditions', trans('app.general:special-conditions') . " :" ) !!}
    <p>{!! $quote->special_conditions !!}</p>
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', trans('app.general:address') . " :" ) !!}
    <p>{!! $quote->address !!}</p>
</div>

<!-- Zipcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('zipcode', trans('app.general:zipcode') . " :" ) !!}
    <p>{!! $quote->zipcode !!}</p>
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', trans('app.general:city') . " :" ) !!}
    <p>{!! $quote->city !!}</p>
</div>

<!-- Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country', trans('app.general:country') . " :" ) !!}
    <p>{!! $quote->country !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', trans('app.general:created-at') . " :" ) !!}
    <p>{!! $quote->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', trans('app.general:updated-at') . " :" ) !!}
    <p>{!! $quote->updated_at !!}</p>
</div>

