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


        <!-- Free Label Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('free_label',  trans('app.general:free-input') . ' :', ['class' => 'h4 text-purple']) !!}
             <span class="h4 text-bold">{!! $contact->free_label !!}</span>
        </div>
    </div>
</div>

