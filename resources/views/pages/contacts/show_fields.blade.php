
<!-- Civility Field -->
<div class="form-group">
    {!! Form::label('civility', trans('app.contact:civility') . ' :') !!}
    <p>{!! $contact->civility !!}</p>
</div>

<!-- Lastname Field -->
<div class="form-group">
    {!! Form::label('lastname', trans('app.contact:lastname') . ' :') !!}
    <p>{!! $contact->lastname !!}</p>
</div>

<!-- Firstname Field -->
<div class="form-group">
    {!! Form::label('firstname',  trans('app.contact:firstname') . ' :') !!}
    <p>{!! $contact->firstname !!}</p>
</div>

<!-- Post Field -->
<div class="form-group">
    {!! Form::label('post', trans('app.contact:post') . ' :') !!}
    <p>{!! $contact->post !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', trans('app.contact:email') . ' :') !!}
    <p>{!! $contact->email !!}</p>
</div>

<!-- Phone Number Field -->
<div class="form-group">
    {!! Form::label('phone_number',  trans('app.contact:phone') . ' :') !!}
    <p>{!! $contact->phone_number !!}</p>
</div>

<!-- Account Name Field -->
<div class="form-group">
    {!! Form::label('account_name', trans('app.contact:account-name') . ' :') !!}
    <p>{!! $contact->account_name !!}</p>
</div>

<!-- Contact Owner Field -->
<div class="form-group">
    {!! Form::label('contact_owner',  trans('app.contact:owner') . ' :') !!}
    <p>{!! $contact->contact_owner !!}</p>
</div>

<!-- Avatar Field -->
<div class="form-group">
    {!! Form::label('avatar', trans('app.contact:avatar') . ' :') !!}
    <p>{!! $contact->avatar !!}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', trans('app.general:address') . ' :') !!}
    <p>{!! $contact->address !!}</p>
</div>

<!-- Zipcode Field -->
<div class="form-group">
    {!! Form::label('zipcode', trans('app.general:zipcode') . ' :') !!}
    <p>{!! $contact->zipcode !!}</p>
</div>

<!-- City Field -->
<div class="form-group">
    {!! Form::label('city',  trans('app.general:city') . ' :') !!}
    <p>{!! $contact->city !!}</p>
</div>

<!-- Country Field -->
<div class="form-group">
    {!! Form::label('country', trans('app.general:country') . ' :') !!}
    <p>{!! $contact->country !!}</p>
</div>

<!-- Free Label Field -->
<div class="form-group">
    {!! Form::label('free_label',  trans('app.general:free-input') . ' :') !!}
    <p>{!! $contact->free_label !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at',  trans('app.general:created-at') . ' :') !!}
    <p>{!! $contact->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at',  trans('app.general:updated-at') . ' :') !!}
    <p>{!! $contact->updated_at !!}</p>
</div>

