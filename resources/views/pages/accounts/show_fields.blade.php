<div class="box box-primary">
    <div class="box-body">
        <!-- Account Name Field -->
        <h4 class="box-title">{{trans('app.general:general-info')}}</h4>
        <hr>
        <div class="form-group col-sm-6">
            {!! Form::label('name', trans('app.general:name') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">  {!! $account->name !!}</span>
        </div>

        <!-- Free Label Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('converted', trans('app.account:converted-field') . ' :', ['class' => 'h4 text-purple']) !!}
            @if($account->converted)
                <span class="h4 text-bold"> {!! trans('app.account:converted') !!}</span>
            @else
                <span class="h4 text-bold"> {!! trans('app.account:unconverted') !!}</span>
            @endif
        </div>


    </div>
</div>


<div class="box box-primary">
    <div class="box-body">

    </div>
</div>
