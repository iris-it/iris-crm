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

@if($account->offices->count() < 1)
    <div class="form-group col-sm-10 text-center">
        <h3 class="box-title animated flash">{{trans('app.account:no-offices-title')}}</h3>
        <h4 class="animated fadeIn">{{trans('app.account:no-offices-desc')}}</h4>
        <div class="col-sm-12 text-center">
            <a class="btn btn-app bg-purple btn-flat animated pulse" style="font-size: 15px;" href="{{action('OfficeController@create', $account->id)}}">
                <i class="fa fa-building"></i> {{trans('app.general:create')}}
            </a>
        </div>
    </div>

@else
    <div class="box box-primary">
        <div class="box-body">
            <h4 class="box-title">{{trans('app.general:offices')}}</h4>
            <hr>
            @foreach($account->offices as $office)
                <button type="button" class="btn btn-block btn-info btn-flat">{{$office->name}}</button>
            @endforeach


        </div>
    </div>
@endif

