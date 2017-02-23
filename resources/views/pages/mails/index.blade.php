@extends('layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('invoices') !!}
@endsection

@section('content')

    <section class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div id="mailbox-react">
                    <!-- Does it react ? -->
                </div>
            </div>
        </div>
    </section>

@endsection