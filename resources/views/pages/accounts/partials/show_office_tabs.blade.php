<div class="col-xs-3">
    <div class="box box-primary">
        <div class="box-body">
            <h4 class="box-title pull-left">
                <u>{{$office->name}} :</u>
            </h4>
            <br>
            <hr>
            <ul class="nav nav-pills nav-stacked">
                <li class="nav-item active"><a class="nav-link" href="#informations-{{$office->id}}" data-toggle="tab"><i class="fa fa-info-circle"></i> {{trans('app.general:general-info')}}</a></li>
                <li class="nav-item"><a class="nav-link" href="#contacts-{{$office->id}}" data-toggle="tab"><i class="fa fa-address-card"></i> {{trans('app.general:contacts')}}</a></li>
                <li class="nav-item"><a class="nav-link" href="#notes-{{$office->id}}" data-toggle="tab"><i class="fa fa-pencil-square"></i> {{trans('app.general:notes')}}</a></li>
                <li class="nav-item"><a class="nav-link" href="#quotes-{{$office->id}}" data-toggle="tab"><i class="fa fa-file-text"></i> {{trans('app.general:quotes')}}</a></li>
                @if(!$account->is_lead)
                    <li class="nav-item"><a class="nav-link" href="#invoices-{{$office->id}}" data-toggle="tab"><i class="fa fa-file-archive-o"></i> {{trans('app.general:invoices')}}</a></li>
                @endif
            </ul>
        </div>
    </div>

</div>
<div class="col-xs-9">
    <div class="tab-content ">
        <div class="tab-pane fade in active" id="informations-{{$office->id}}">
            @include('pages.accounts.partials.show_office_information')
        </div>
        <div class="tab-pane fade in" id="contacts-{{$office->id}}">
            @include('pages.accounts.partials.show_office_contacts')
        </div>
        <div class="tab-pane fade in" id="notes-{{$office->id}}">
            @include('pages.accounts.partials.show_office_notes')
        </div>
        <div class="tab-pane fade in" id="quotes-{{$office->id}}">
            @include('pages.accounts.partials.show_office_quotes')
        </div>
        @if(!$account->is_lead)
            <div class="tab-pane fade in" id="invoices-{{$office->id}}">
                @include('pages.accounts.partials.show_office_invoices')
            </div>
        @endif
    </div>
</div>


<!-- //TODO Selector tab in tab with Jquery like the current one but nested see : assets/js/legacy.js -->
