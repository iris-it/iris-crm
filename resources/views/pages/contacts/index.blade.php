@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left text-purple">{{trans('app.general:contacts')}}
            @if($contacts->count() > 0)
                ({{$contacts->count()}})
            @endif
        </h1>
        <h1 class="pull-right">
            <a class="btn btn-app create-button bg-blue btn-flat pull-right" href="#" @click="{{VueHelper::format('showModal', 'createContactModal', []) }}">
            <i class="fa fa-address-card"></i> {{trans('app.general:create')}}
            </a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @if($contacts->count() > 0)
            <div class="box box-primary">
                <div class="box-body">
                    @include('pages.contacts.table')
                </div>
            </div>
        @else
            <div class="form-group col-sm-10 text-center">
                <h3 class="box-title animated flash">{{trans('app.contact:no-contacts-title')}}</h3>
                <h4 class="animated fadeIn">{{trans('app.contact:no-contacts-desc')}}</h4>
                <div class="col-sm-12 text-center">
                    <br>
                    <a class="btn btn-app bg-blue btn-flat create-button animated pulse" href="#" @click="{{VueHelper::format('showModal', 'createContactModal', []) }}">
                    <i class="fa fa-address-card"></i> {{trans('app.general:create')}} </a>
                </div>
            </div>
        @endif


        <modal id="createContactModal" title="{{trans('app.contact:new')}}">
            {!! Form::open(['action' => 'ContactController@create', 'method' => 'GET']) !!}

            <div class="form-group col-sm-12 text-center">
                {!! Form::label('accountSelect',  trans('app.contact:accounts-select')) !!}
                <br>
                {!! Form::select('account_id', $accounts, ['class' => 'form-control']) !!}
            </div>

            <!-- Submit Field -->
            <div class="form-group col-sm-12 text-center">
                {!! Form::submit( trans('app.general:continue'), ['id' => 'leadSelect', 'class' => 'btn btn-primary']) !!}
                <a href="{!! action('ContactController@index') !!}" class="btn btn-default">{{trans('app.general:cancel')}}</a>
            </div>

            {!! Form::close() !!}
        </modal>

    </div>
@endsection

@section('scripts')
    @parent
    <script type="text/javascript">

        $(document).ready(function () {

            $('#accountSelect').change(function () {

                $('#leadSelect').val(0);

            });

            $('#leadSelect').change(function () {

                $('#accountSelect').val(0);

            });

        });


    </script>


@endsection