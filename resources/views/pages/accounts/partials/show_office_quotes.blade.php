<div class="box box-primary">
    <div class="box-body">

        <h4 class="box-title pull-left"> {{trans('app.general:quotes')}}</h4>
        <br>
        <hr>

        @foreach ($office->quotes as $quote)

            {{--{{trans('app.general:quote')}} ???? --}}

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="quote-head-{{$quote->id}}">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#quote-{{$quote->id}}" aria-expanded="true" aria-controls="quote-{{$quote->id}}">
                                {{$quote->topic}}
                            </a>
                        </h4>
                    </div>
                    <div id="quote-{{$quote->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="quote-head-{{$quote->id}}">
                        <div class="panel-body">
                            <!-- Topic Field -->
                            <div class="form-group col-sm-6">
                                <label class="h4 text-purple">{{trans('app.general:topic')}} : </label>
                                <span class="h4 text-bold">{{$quote->topic}}</span>
                            </div>

                            <!-- Phase Field -->
                            <div class="form-group col-sm-6">
                                <label class="h4 text-purple">{{trans('app.general:phase')}} : </label>
                                <span class="h4 text-bold">{{$quote->phase}}</span>
                            </div>

                            <!-- Deadline Field -->
                            <div class="form-group col-sm-6">

                                <label class="h4 text-purple">{{trans('app.general:deadline')}} : </label>
                                <span class="h4 text-bold">{{$quote->deadline}}</span>
                            </div>

                            <!-- Description Field -->
                            <div class="form-group col-sm-6">
                                <label class="h4 text-purple">{{trans('app.general:description')}} : </label>
                                <span class="h4 text-bold">{{$quote->description}}</span>
                            </div>

                            <!-- HT Price Field -->
                            <div class="form-group col-sm-6">
                                <label class="h4 text-purple">{{trans('app.general:ht-price')}} : </label>
                                <span class="h4 text-bold">{{$quote->ht_price}}</span>
                            </div>

                            <!-- TTC Price Field -->
                            <div class="form-group col-sm-6">
                                <label class="h4 text-purple">{{trans('app.general:ttc-price')}} : </label>
                                <span class="h4 text-bold">{{$quote->ttc_price}}</span>
                            </div>

                            <!-- Special Conditions Field -->
                            <div class="form-group col-sm-6">
                                <label class="h4 text-purple">{{trans('app.general:special-conditions')}} : </label>
                                <span class="h4 text-bold">{{$quote->special_conditions}}</span>
                            </div>

                            <hr>

                            <!-- Created At Field -->
                            <div class="form-group col-sm-6">
                                <label class="h4 text-purple">{{trans('app.general:created-at')}} : </label>
                                <span class="h4 text-bold">{{$quote->created_at}}</span>
                            </div>

                            <!-- Updated At Field -->
                            <div class="form-group col-sm-6">
                                <label class="h4 text-purple">{{trans('app.general:updated-at')}} : </label>
                                <span class="h4 text-bold">{{$quote->updated_at}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
</div>
