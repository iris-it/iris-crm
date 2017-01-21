<table class="table table-striped table-responsive" id="products-table">
    <thead>
    <th class="h4 text-purple text-uppercase">{{trans('app.general:name')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.product:created_at')}}</th>
    <th class="h4 text-purple text-uppercase">{{ trans('app.product:updated_at') }}</th>

    <th class="h4 text-purple text-uppercase" colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($templates as $template)
        <tr>
            <td class="text-bold">{!! $template->name !!}</td>
            <td class="text-bold">{!! $template->created_at !!}</td>
            <td class="text-bold">{!! $template->updated_at !!}</td>

            <td>
                {!! Form::open(['action' => ['TemplateController@destroy', $template->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! action('TemplateController@show', [$template->id]) !!}" class='btn btn-info btn-flat'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! action('TemplateController@edit', [$template->id]) !!}" class='btn bg-blue btn-flat'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-flat', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
