@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('organization'))

@section('content')

    <section class="content">


        <div class="row">
            <div class="col-md-12">
                <div class="box box-widget widget-user">
                    <div class="widget-user-header bg-black" style="background: url('http://lorempixel.com/1920/128/nature') center center;">
                        <h3 class="widget-user-username">{{$organization->name}}</h3>
                        <h5 class="widget-user-desc">{{ trans('organization.info-created') }} : {{$organization->created_at->diffForHumans()}}</h5>
                    </div>
                    <div class="widget-user-image">
                        <i class="fa fa-building fa-5x"></i>
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">{{$users->count()}}</h5>
                                    <span class="description-text">{{ trans('usersmanagement.info-user-number') }}</span>
                                </div>
                            </div>
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">{{$groups->count()}}</h5>
                                    <span class="description-text">{{ trans('usersmanagement.info-group-number') }}</span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <a class="btn btn-primary btn-flat" href="{{action('OrganizationController@edit')}}">{{ trans('organization.edit') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#orgainfo">{{ trans('organization.infotab-label') }}</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="orgainfo" class="tab-pane active cont">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <td style="width:20%; font-size:15px;"><b>{{ trans('organization.infotab-address') }}</b></td>
                                    <td>{{$organization->address}}, {{$organization->address_comp}}</td>
                                </tr>
                                <tr>
                                    <td style="width:20%; font-size:14px;"><b>{{ trans('organization.infotab-mail') }}</b></td>
                                    <td>{{$organization->email}}</td>
                                </tr>
                                <tr>
                                    <td style="width:20%; font-size:14px;"><b>{{ trans('organization.infotab-phone') }}</b></td>
                                    <td>{{$organization->phone}}</td>
                                </tr>
                                <tr>
                                    <td style="width:20%; font-size:14px;"><b>{{ trans('organization.infotab-website') }}</b></td>
                                    <td>{{$organization->website}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection