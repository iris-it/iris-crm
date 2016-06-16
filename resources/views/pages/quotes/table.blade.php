<table class="table table-responsive" id="quotes-table">
    <thead>
        <th>{{trans('app.general:topic')}}</th>
        <th>{{trans('app.contact:account-name')}}</th>
        <th>{{trans('app.general:phase')}}</th>
        <th>{{trans('app.contact:name')}}</th>
        <th>{{trans('app.general:deadline')}}</th>
        <th>{{trans('app.contact:owner')}}</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($quotes as $quote)
        <tr>
            <td>{!! $quote->topic !!}</td>
            <td>{!! $quote->account_name !!}</td>
            <td>{!! $quote->phase !!}</td>
            <td>{!! $quote->contact_name !!}</td>
            <td>{!! $quote->deadline !!}</td>
            <td>{!! $quote->contact_owner !!}</td>
            <td>
                {!! Form::open(['route' => ['quotes.destroy', $quote->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('quotes.show', [$quote->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('quotes.edit', [$quote->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>