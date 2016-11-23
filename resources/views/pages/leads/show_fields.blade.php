<div class="box box-primary">
    <div class="box-body">
        <!-- Account Name Field -->
        <h4 class="box-title">{{trans('app.general:general-info')}}</h4>
        <hr>
        <div class="form-group col-sm-6">
            {!! Form::label('name', trans('app.general:name') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">  {!! $lead->name !!}</span>
        </div>


    </div>
</div>

@if($lead->offices->count() < 1)
    <div class="form-group col-sm-10 text-center">
        <h3 class="box-title animated flash">{{trans('app.account:no-offices-title')}}</h3>
        <h4 class="animated fadeIn">{{trans('app.account:no-offices-desc')}}</h4>
        <div class="col-sm-12 text-center">
            <a class="btn btn-app bg-blue btn-flat animated pulse" style="font-size: 15px;" href="{{action('OfficeController@create', $lead->id)}}">
                <i class="fa fa-building"></i> {{trans('app.general:create')}}
            </a>
        </div>
    </div>

@else
    <div class="box box-primary">
        <div class="box-body">
            <h4 class="box-title">{{trans('app.general:offices')}}</h4>
            <hr>
            <table class="table table-bordered text-center">
                <tbody>
                <tr>
                    @foreach($lead->offices as $office)
                        <td>
                            <button type="button" class="btn btn-lg btn-block btn-info btn-flat" @click="{{VueHelper::format('showTab', $office->name, $office->load('addresses'))}}">{{$office->name}}</button>
                        </td>
                    @endforeach

                </tr>
                </tbody>
            </table>

            @foreach($lead->offices as $office)
                <office-tabcontent id="{{$office->name}}" title="{{$office->name}}">

                    {!! Form::label('name', trans('app.general:name') . ' :', ['slot' => 'name-field', 'class' => 'h4 text-purple']) !!}

                    {!! Form::label('type',trans('app.general:type') . ' :', ['slot' => 'type-field','class' => 'h4 text-purple']) !!}

                    {!! Form::label('activity_sector', trans('app.general:activity-sector') . ' :', ['slot' => 'activity-sector-field', 'class' => 'h4 text-purple']) !!}

                    {!! Form::label('workforce', trans('app.general:workforce') . ' :', ['slot' => 'workforce-field', 'class' => 'h4 text-purple']) !!}

                    {!! Form::label('siret_number', trans('app.general:siret-number') . ' :', ['slot' => 'siret-field', 'class' => 'h4 text-purple']) !!}

                    {!! Form::label('ape_number', trans('app.general:ape-number') . ' :', ['slot' => 'ape-field', 'class' => 'h4 text-purple']) !!}

                    {!! Form::label('phone_number', trans('app.general:phone-number') . ' :', ['slot' => 'phone-field', 'class' => 'h4 text-purple']) !!}

                    {!! Form::label('website', trans('app.general:website') . ' :', ['slot' => 'website-field', 'class' => 'h4 text-purple']) !!}

                    {!! Form::label('is_active', trans('app.general:is-active') . ' :', ['slot' => 'is-active-field', 'class' => 'h4 text-purple']) !!}

                    {!! Form::label('is_active', trans('app.office:is-main') . ' :', ['slot' => 'is-main-field', 'class' => 'h4 text-purple']) !!}

                    {!! Form::label('created_at', trans('app.general:created-at') . ' :', ['slot' => 'created-at-field', 'class' => 'h4 text-purple']) !!}

                    {!! Form::label('updated_at',  trans('app.general:updated-at') . ' :', ['slot' => 'updated-at-field', 'class' => 'h4 text-purple']) !!}

                    {!! Form::label('name', trans('app.address:name') . ' :', ['slot' => 'address-name-field', 'class' => 'h4 text-purple']) !!}

                    {!! Form::label('street_label', trans('app.address:street-label') . ' :', ['slot' => 'street-label-field', 'class' => 'h4 text-purple']) !!}

                    {!! Form::label('street_detail', trans('app.address:street-detail') . ' :', ['slot' => 'street-detail-field', 'class' => 'h4 text-purple']) !!}

                    {!! Form::label('zipcode', trans('app.general:zipcode') . ' :', ['slot' => 'zipcode-field', 'class' => 'h4 text-purple']) !!}

                    {!! Form::label('city', trans('app.general:city') . ' :', ['slot' => 'city-field', 'class' => 'h4 text-purple']) !!}

                    {!! Form::label('country', trans('app.general:country') . ' :', ['slot' => 'country-field', 'class' => 'h4 text-purple']) !!}

                </office-tabcontent>

            @endforeach
        </div>
    </div>
@endif

