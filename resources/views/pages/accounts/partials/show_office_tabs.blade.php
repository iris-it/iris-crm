<div class="row">
    <div class="col-xs-3">
        <ul class="nav nav-tabs tabs-left">
            <li class="active"><a href="#informations-{{$office->id}}" data-toggle="tab"><i class="fa fa-building"></i> informations</a></li>
            <li class><a href="#contacts-{{$office->id}}" data-toggle="tab"><i class="fa fa-users"></i> Contacts</a></li>
            <li class><a href="#notes-{{$office->id}}" data-toggle="tab"><i class="fa fa-pencil"></i> Notes</a></li>
            <li class><a href="#quotes-{{$office->id}}" data-toggle="tab"><i class="fa fa-file-text"></i> Devis</a></li>
            <li class><a href="#invoices-{{$office->id}}" data-toggle="tab"><i class="fa fa-archive"></i> Factures</a></li>
        </ul>
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
                @include('pages.accounts.partials.show_office_information')
            </div>
            <div class="tab-pane fade in" id="invoices-{{$office->id}}">
                @include('pages.accounts.partials.show_office_information')
            </div>
        </div>
    </div>
</div>

<!-- //TODO Selector tab in tab with Jquery like the current one but nested see : assets/js/legacy.js -->
