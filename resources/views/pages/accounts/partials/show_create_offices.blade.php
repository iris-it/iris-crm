<div class="form-group col-sm-10 text-center">
    <h3 class="box-title animated flash">{{trans('app.account:no-offices-title')}}</h3>
    <h4 class="animated fadeIn">{{trans('app.account:no-offices-desc')}}</h4>
    <div class="col-sm-12 text-center">
        <a class="btn btn-app bg-blue btn-flat animated pulse" style="font-size: 15px;"
           href="{{action('OfficeController@create', $account->id)}}">
            <i class="fa fa-building"></i> {{trans('app.general:create')}}
        </a>
    </div>
</div>

