<!-- Civility Field -->
<div class="form-group col-sm-6">
    {!! Form::label('civility', trans('app.contact:civility') . ' :') !!}
    <p>{!! $contact->civility !!}</p>
</div>

<!-- Lastname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lastname', trans('app.contact:lastname') . ' :') !!}
    <p>{!! $contact->lastname !!}</p>
</div>

<!-- Firstname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('firstname',  trans('app.contact:firstname') . ' :') !!}
    <p>{!! $contact->firstname !!}</p>
</div>

<!-- Post Field -->
<div class="form-group col-sm-6">
    {!! Form::label('post', trans('app.contact:post') . ' :') !!}
    <p>{!! $contact->post !!}</p>
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', trans('app.contact:email') . ' :') !!}
    <p>{!! $contact->email !!}</p>
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_number',  trans('app.contact:phone') . ' :') !!}
    <p>{!! $contact->phone_number !!}</p>
</div>

<!-- Account Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_name_id', trans('app.contact:account-name') . ' :') !!}
    @if($contact->account || $contact->lead)
        @if($contact->account)
            <p>{!! $contact->account->name !!}</p>
        @elseif($contact->lead)
            <p>{!! $contact->lead->name !!}</p>
        @endif
    @else
        <p>{{trans('app.general:undefined')}}</p>
    @endif
</div>

<!-- Contact Owner Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_owner',  trans('app.contact:owner') . ' :') !!}
    @if($contact->user)
        <p>{!! $contact->user->name !!}</p>
    @else
        <p>{{trans('app.general:undefined')}}</p>
    @endif
</div>

<!-- Avatar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('avatar', trans('app.contact:avatar') . ' :') !!}
    <p>{!! $contact->avatar !!}</p>
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', trans('app.general:address') . ' :') !!}
    <p>{!! $contact->address !!}</p>
</div>

<!-- Zipcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('zipcode', trans('app.general:zipcode') . ' :') !!}
    <p>{!! $contact->zipcode !!}</p>
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city',  trans('app.general:city') . ' :') !!}
    <p>{!! $contact->city !!}</p>
</div>

<!-- Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country', trans('app.general:country') . ' :') !!}
    <p>{!! $contact->country !!}</p>
</div>

<!-- Free Label Field -->
<div class="form-group col-sm-12">
    {!! Form::label('free_label',  trans('app.general:free-input') . ' :') !!}
    <p>{!! $contact->free_label !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-12">
    {!! Form::label('created_at',  trans('app.general:created-at') . ' :') !!}
    <p>{!! $contact->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-12">
    {!! Form::label('updated_at',  trans('app.general:updated-at') . ' :') !!}
    <p>{!! $contact->updated_at !!}</p>
</div>

