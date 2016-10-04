<div class="box box-primary">
    <div class="box-body">
        <!-- Topic Field -->
        <h4 class="box-title">{{trans('app.general:general-info')}}</h4>
        <hr>
        <div class="form-group col-sm-6">
            {!! Form::label('topic', trans('app.general:topic') . " :", ['class' => 'h4 text-purple']) !!}
             <span class="h4 text-bold">{!! $quote->topic !!}</span>
        </div>

        <!-- Phase Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('phase',  trans('app.general:phase') . " :" , ['class' => 'h4 text-purple']) !!}
             <span class="h4 text-bold">{!! $quote->phase !!}</span>
        </div>

        <!-- Deadline Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('deadline', trans('app.general:deadline') . " :" , ['class' => 'h4 text-purple'])!!}
             <span class="h4 text-bold">{!! $quote->deadline !!}</span>
        </div>


        <!-- Description Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('description', trans('app.general:description') . " :" , ['class' => 'h4 text-purple']) !!}
             <span class="h4 text-bold">{!! $quote->description !!}</span>
        </div>

        <!-- Special Conditions Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('special_conditions', trans('app.general:special-conditions') . " :" , ['class' => 'h4 text-purple']) !!}
             <span class="h4 text-bold">{!! $quote->special_conditions !!}</span>
        </div>

    </div>
</div>
<div class="box box-primary">
    <div class="box-body">
        <h4 class="box-title">{{trans('app.general:linked-items')}}</h4>
        <hr>
        <div class="form-group col-sm-6">
            {!! Form::label('products_list', trans('app.quote:products-list') . " :", ['class' => 'h4 text-purple'])!!}
            @if($quote->products()->count() > 0 )
                <ul class="fa-ul">
                    @foreach($quote->products as $product)
                        <li>  <span class="h4 text-bold"><i class="fa fa-check fa-li"></i>{{$product->product_name}} (<span class="text-purple">{{$product->ht_price}} €</span>)</span></li>
                    @endforeach
                </ul>
            @else
                 <span class="h4 text-bold">{{trans('app.general:none')}}</span>
            @endif

        </div>

        <div class="form-group col-sm-6">
            {!! Form::label('services_list', trans('app.quote:services-list') . " :", ['class' => 'h4 text-purple']) !!}

            @if($quote->services()->count() > 0 )
                <ul class="fa-ul">
                    @foreach($quote->services as $service)
                        <li>  <span class="h4 text-bold"><i class="fa fa-check fa-li"></i>{{$service->service_name}} (<span class="text-purple">{{$service->ht_price}} €</span>)</span></li>
                    @endforeach
                </ul>
            @else
                 <span class="h4 text-bold">{{trans('app.general:none')}}</span>
            @endif

        </div>

    </div>
</div>

<div class="box box-primary">
    <div class="box-body">
        <h4 class="box-title">{{trans('app.general:address')}}</h4>
        <hr>
        <!-- Address Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('address', trans('app.general:address') . " :" , ['class' => 'h4 text-purple']) !!}
             <span class="h4 text-bold">{!! $quote->address !!}</span>
        </div>

        <!-- Zipcode Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('zipcode', trans('app.general:zipcode') . " :" , ['class' => 'h4 text-purple']) !!}
             <span class="h4 text-bold">{!! $quote->zipcode !!}</span>
        </div>

        <!-- City Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('city', trans('app.general:city') . " :" , ['class' => 'h4 text-purple']) !!}
             <span class="h4 text-bold">{!! $quote->city !!}</span>
        </div>

        <!-- Country Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('country', trans('app.general:country') . " :" , ['class' => 'h4 text-purple']) !!}
             <span class="h4 text-bold">{!! $quote->country !!}</span>
        </div>
    </div>
</div>


<div class="box box-primary">
    <div class="box-body">
        <!-- Created At Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('created_at', trans('app.general:created-at') . " :" , ['class' => 'h4 text-purple']) !!}
             <span class="h4 text-bold">{!! $quote->created_at !!}</span>
        </div>

        <!-- Updated At Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('updated_at', trans('app.general:updated-at') . " :" , ['class' => 'h4 text-purple']) !!}
             <span class="h4 text-bold">{!! $quote->updated_at !!}</span>
        </div>

        <!-- Account Name Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('account_name', trans('app.contact:account-name') . " :", ['class' => 'h4 text-purple']) !!}
            @if($quote->account)
                 <span class="h4 text-bold">{!! $quote->account->name !!}</span>
            @else
                 <span class="h4 text-bold">{{trans('app.general:undefined')}}</span>
            @endif
        </div>

        <!-- Contact Name Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('contact_name', trans('app.contact:name') . " :" , ['class' => 'h4 text-purple']) !!}

            @if($quote->contact)
                 <span class="h4 text-bold">{!! $quote->contact->firstname !!} {!! $quote->contact->lastname !!}</span>
            @else
                 <span class="h4 text-bold">{{trans('app.general:undefined')}}</span>
            @endif
        </div>


        <!-- Contact Owner Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('contact_owner', trans('app.contact:owner') . " :" , ['class' => 'h4 text-purple']) !!}
            @if($quote->user)
                 <span class="h4 text-bold">{!! $quote->user->name !!}</span>
            @else
                 <span class="h4 text-bold">{{trans('app.general:undefined')}}</span>
            @endif
        </div>
    </div>
</div>


