<div class="box box-primary">
    <div class="box-body">

        <h4 class="box-title pull-left"> {{trans('app.general:invoices')}}</h4>
        <br>
        <hr>
        <ul class="nav nav-pills">
            @foreach($office->invoices as $invoice)
                <li class="nav-item">
                    <a class="nav-link" href="" @click="{{VueHelper::format('showTab', $invoice->id, $invoice)}}" data-toggle="tab">{{$invoice->topic}}</a>
                </li>
            @endforeach
        </ul>

        @foreach ($office->invoices as $invoice)

            <office-sub-tab title="{{trans('app.general:invoice')}}" id="{{$invoice->id}}" type="invoice">

                <label class="h4 text-purple" slot="topic-field"> {{trans('app.general:topic')}} : </label>
                <label class="h4 text-purple" slot="phase-field"> {{trans('app.general:phase')}} :  </label>
                <label class="h4 text-purple" slot="deadline-field">  {{trans('app.general:deadline')}} : </label>
                <label class="h4 text-purple" slot="description-field">  {{trans('app.general:description')}} : </label>
                <label class="h4 text-purple" slot="htprice-field">  {{trans('app.general:ht-price')}} : </label>
                <label class="h4 text-purple" slot="ttcprice-field">  {{trans('app.general:ttc-price')}} : </label>
                <label class="h4 text-purple" slot="special-conditions-field">  {{trans('app.general:special-conditions')}} : </label>
                <label class="h4 text-purple" slot="converted-field">  {{trans('app.invoice:converted')}} : </label>
                <label class="h4 text-purple" slot="created-at-field">  {{trans('app.general:created-at')}} : </label>
                <label class="h4 text-purple" slot="updated-at-field">  {{trans('app.general:updated-at')}} : </label>


            </office-sub-tab>

        @endforeach

    </div>
</div>
