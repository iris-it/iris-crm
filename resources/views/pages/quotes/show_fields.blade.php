<div class="box box-primary">
    <div class="box-body">
        <h4 class="box-title">{{trans('app.general:general-info')}}</h4>
        <hr>

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




