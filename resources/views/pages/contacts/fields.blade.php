<!-- Civility Field -->
<div class="form-group col-sm-6">
    {!! Form::label('civility', trans('app.contact:civility') . ' :') !!}
    {!! Form::text('civility', null, ['class' => 'form-control']) !!}
</div>

<!-- Lastname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lastname', trans('app.contact:lastname') . ' :') !!}
    {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
</div>

<!-- Firstname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('firstname', trans('app.contact:firstname') . ' :') !!}
    {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
</div>

<!-- Post Field -->
<div class="form-group col-sm-6">
    {!! Form::label('post', trans('app.contact:post') . ' :') !!}
    {!! Form::text('post', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', trans('app.contact:email') . ' :') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_number', trans('app.contact:phone') . ' :') !!}
    {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Account Name Field -->

<div class="form-group col-sm-6">
    <label for="account_name">{{trans('app.contact:account_name')}} :</label>
    {!! Form::select('account_name', $accounts, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    <label for="account_name">{{trans('app.contact:account_name')}} :</label>
    {!! Form::select('account_name', $leads, null, ['class' => 'form-control']) !!}
</div>

<!-- Contact Owner Field -->
<div class="form-group col-sm-6">
    <label for="contact_owner">{{trans('app.contact:owner')}} :</label>
    {!! Form::select('contact_owner', $users, null, ['class' => 'form-control']) !!}
</div>
<!-- Avatar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('avatar', trans('app.contact:avatar') . ' :') !!}
    {!! Form::text('avatar', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', trans('app.general:address') . ' :') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Zipcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('zipcode', trans('app.general:zipcode') . ' :') !!}
    {!! Form::text('zipcode', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', trans('app.general:city') . ' :') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country', trans('app.general:country') . ' :') !!}
    {!! Form::text('country', null, ['class' => 'form-control']) !!}
</div>

<!-- Free Label Field -->
<div class="form-group col-sm-6">
    {!! Form::label('free_label', trans('app.general:free-input') . ' :') !!}
    {!! Form::text('free_label', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('contacts.index') !!}" class="btn btn-default">Cancel</a>
</div>
