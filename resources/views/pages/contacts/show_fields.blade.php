<div class="box box-primary">
    <div class="box-body">
        <h4 class="box-title">{{trans('app.general:general-info')}}</h4>
        <hr>
        <!-- Civility Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('civility', trans('app.contact:civility') . ' :', ['class' => 'h4 text-purple']) !!}
             <span class="h4 text-bold">{!! $contact->civility !!}</span>
        </div>

        <!-- Lastname Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('lastname', trans('app.contact:lastname') . ' :', ['class' => 'h4 text-purple']) !!}
             <span class="h4 text-bold">{!! $contact->lastname !!}</span>
        </div>

        <!-- Firstname Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('firstname',  trans('app.contact:firstname') . ' :', ['class' => 'h4 text-purple']) !!}
             <span class="h4 text-bold">{!! $contact->firstname !!}</span>
        </div>

        <!-- Post Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('post', trans('app.contact:post') . ' :', ['class' => 'h4 text-purple']) !!}
             <span class="h4 text-bold">{!! $contact->post !!}</span>
        </div>

        <!-- Email Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('email', trans('app.contact:email') . ' :', ['class' => 'h4 text-purple']) !!}
             <span class="h4 text-bold">{!! $contact->email !!}</span>
        </div>

        <!-- Phone Number Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('phone_number',  trans('app.contact:phone') . ' :', ['class' => 'h4 text-purple']) !!}
             <span class="h4 text-bold">{!! $contact->phone_number !!}</span>
        </div>

        <!-- Avatar Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('avatar', trans('app.contact:avatar') . ' :', ['class' => 'h4 text-purple']) !!}
             <span class="h4 text-bold">{!! $contact->avatar !!}</span>
        </div>

        <!-- Free Label Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('free_label',  trans('app.general:free-input') . ' :', ['class' => 'h4 text-purple']) !!}
             <span class="h4 text-bold">{!! $contact->free_label !!}</span>
        </div>
    </div>
</div>

<div class="box box-primary">
    <div class="box-body">
        <h4 class="box-title">{{trans('app.general:address')}}</h4>
        <hr>
        <!-- Address Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('address', trans('app.general:address') . ' :', ['class' => 'h4 text-purple']) !!}
             <span class="h4 text-bold">{!! $contact->address !!}</span>
        </div>

        <!-- Zipcode Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('zipcode', trans('app.general:zipcode') . ' :', ['class' => 'h4 text-purple']) !!}
             <span class="h4 text-bold">{!! $contact->zipcode !!}</span>
        </div>

        <!-- City Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('city',  trans('app.general:city') . ' :', ['class' => 'h4 text-purple']) !!}
             <span class="h4 text-bold">{!! $contact->city !!}</span>
        </div>

        <!-- Country Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('country', trans('app.general:country') . ' :', ['class' => 'h4 text-purple']) !!}
             <span class="h4 text-bold">{!! $contact->country !!}</span>
        </div>

    </div>
</div>

<div class="box box-primary">
    <div class="box-body">

        <!-- Account Name Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('account_name_id', trans('app.contact:account-name') . ' :', ['class' => 'h4 text-purple']) !!}
            @if($contact->account || $contact->lead)
                @if($contact->account)
                     <span class="h4 text-bold">{!! $contact->account->name !!}</span>
                @elseif($contact->lead)
                     <span class="h4 text-bold">{!! $contact->lead->name !!}</span>
                @endif
            @else
                 <span class="h4 text-bold">{{trans('app.general:undefined')}}</span>
            @endif
        </div>

        <!-- Contact Owner Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('contact_owner',  trans('app.contact:owner') . ' :', ['class' => 'h4 text-purple']) !!}
            @if($contact->user)
                 <span class="h4 text-bold">{!! $contact->user->name !!}</span>
            @else
                 <span class="h4 text-bold">{{trans('app.general:undefined')}}</span>
            @endif
        </div>


        <!-- Created At Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('created_at',  trans('app.general:created-at') . ' :', ['class' => 'h4 text-purple']) !!}
             <span class="h4 text-bold">{!! $contact->created_at !!}</span>
        </div>

        <!-- Updated At Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('updated_at',  trans('app.general:updated-at') . ' :', ['class' => 'h4 text-purple']) !!}
             <span class="h4 text-bold">{!! $contact->updated_at !!}</span>
        </div>
    </div>
</div>
