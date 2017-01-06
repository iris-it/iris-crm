<div class="box box-primary">
    <div class="box-body">

        <h4 class="box-title pull-left"> {{trans('app.general:invoices')}}</h4>
        <br>
        <hr>

        @foreach ($office->invoices as $invoice)

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="invoice-head-{{$invoice->id}}">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#invoice-{{$invoice->id}}" aria-expanded="true" aria-controls="invoice-{{$invoice->id}}">
                                {{$invoice->topic}}
                            </a>
                        </h4>
                    </div>
                    <div id="invoice-{{$invoice->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="invoice-head-{{$invoice->id}}">
                        <div class="panel-body">
                            <!-- Topic Field -->
                            <div class="form-group col-sm-6">
                                <label class="h4 text-purple">{{trans('app.general:topic')}} : </label>
                                <span class="h4 text-bold">{{$invoice->topic}}</span>
                            </div>

                            <!-- Phase Field -->
                            <div class="form-group col-sm-6">
                                <label class="h4 text-purple">{{trans('app.general:phase')}} : </label>
                                <span class="h4 text-bold">{{$invoice->phase}}</span>
                            </div>

                            <!-- Deadline Field -->
                            <div class="form-group col-sm-6">

                                <label class="h4 text-purple">{{trans('app.general:deadline')}} : </label>
                                <span class="h4 text-bold">{{$invoice->deadline}}</span>
                            </div>

                            <!-- Description Field -->
                            <div class="form-group col-sm-6">
                                <label class="h4 text-purple">{{trans('app.general:description')}} : </label>
                                <span class="h4 text-bold">{{$invoice->description}}</span>
                            </div>

                            <!-- HT Price Field -->
                            <div class="form-group col-sm-6">
                                <label class="h4 text-purple">{{trans('app.general:ht-price')}} : </label>
                                <span class="h4 text-bold">{{$invoice->ht_price}}</span>
                            </div>

                            <!-- TTC Price Field -->
                            <div class="form-group col-sm-6">
                                <label class="h4 text-purple">{{trans('app.general:ttc-price')}} : </label>
                                <span class="h4 text-bold">{{$invoice->ttc_price}}</span>
                            </div>

                            <!-- Special Conditions Field -->
                            <div class="form-group col-sm-6">
                                <label class="h4 text-purple">{{trans('app.general:special-conditions')}} : </label>
                                <span class="h4 text-bold">{{$invoice->special_conditions}}</span>
                            </div>

                            <hr>

                            <!-- Is Converted Field  -->
                            <div class="form-group col-sm-6">
                                <label class="h4 text-purple">{{trans('app.invoice:converted')}} : </label>
                                <span class="h4 text-bold">{{($invoice->converted)? 'Oui' : 'Non'}}</span>
                            </div>

                            <!-- Created At Field -->
                            <div class="form-group col-sm-6">
                                <label class="h4 text-purple">{{trans('app.general:created-at')}} : </label>
                                <span class="h4 text-bold">{{$invoice->created_at}}</span>
                            </div>

                            <!-- Updated At Field -->
                            <div class="form-group col-sm-6">
                                <label class="h4 text-purple">{{trans('app.general:updated-at')}} : </label>
                                <span class="h4 text-bold">{{$invoice->updated_at}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach

    </div>
</div>
