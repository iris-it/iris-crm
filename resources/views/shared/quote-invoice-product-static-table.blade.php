@extends('layouts.base')

@section('content')

    <div style="position: absolute; top: 150px;left: 50px;">
        <table class="table table-striped table-responsive" id="products-table">
            <thead>
            <th class="h4 text-purple text-uppercase">Désignation</th>
            <th class="h4 text-purple text-uppercase">Description</th>
            <th class="h4 text-purple text-uppercase">Quantités</th>
            <th class="h4 text-purple text-uppercase">Unités</th>
            <th class="h4 text-purple text-uppercase">Prix Unitaire HT</th>
            <th class="h4 text-purple text-uppercase">TVA</th>
            <th class="h4 text-purple text-uppercase">Taxe(s) %</th>
            <th class="h4 text-purple text-uppercase">Prix HT</th>
            <th class="h4 text-purple text-uppercase">Prix TTC</th>
            </thead>
            <tbody>
            @foreach($content as $row)
                <tr class="print-table-row">
                    <td class="text-bold">{{ $row->name }}</td>
                    <td class="text-bold">{{ $row->description }}</td>
                    <td class="text-bold">{{ $row->quantity }}</td>
                    <td class="text-bold">{{ $row->sale_unit }}</td>
                    <td class="text-bold">{{ $row->ht_price }}</td>
                    <td class="text-bold">{{ $row->taxes }}</td>
                    <td class="text-bold">{{ $row->vat }}</td>
                    <td class="text-bold">{{ $row->total_ht_price }}</td>
                    <td class="text-bold">{{ $row->total_ttc_price }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <hr/>
        <dl class="dl-horizontal pull-right">
            @foreach($taxes as $key => $tax)
                <dt>Tva {{$key}}%</dt>
                <dd><span>{{$tax}}</span>€</dd>
            @endforeach
            <hr/>
            <dt>Sous Total</dt>
            <dd><span id="table-sub-total">{{$totals['subtotal']}}</span>€</dd>
            <dt>Taxes</dt>
            <dd><span id="table-vat">{{$totals['taxes']}}</span>€</dd>
            <dt>TVA</dt>
            <dd><span id="table-vat">{{$totals['vat']}}</span>€</dd>
            <dt>Total</dt>
            <dd><span id="table-total">{{$totals['total']}}</span>€</dd>
        </dl>
    </div>

@endsection
