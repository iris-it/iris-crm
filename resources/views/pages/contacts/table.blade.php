<table class="table table-striped table-responsive" id="contacts-table">
    <thead>
    <th class="h4 text-purple text-uppercase">{{trans('app.general:name')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.contact:post')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.contact:account')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.contact:office')}}</th>
    <th class="h4 text-purple text-uppercase" colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($contacts as $contact)
        <tr>
            <td class="text-bold">{!! $contact->firstname !!} {!! $contact->lastname !!}</td>

            <td class="text-bold">{!! $contact->post !!}</td>

            <td class="text-bold"><a href="{{action('AccountController@show', $contact->office->account->id)}}"> {!! $contact->office->account->name !!} </a></td>

            <td class="text-bold">{!! $contact->office->name !!}</td>

            <td>
                {!! Form::open(['action' => ['ContactController@destroy', $contact->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! action('ContactController@show', [$contact->id]) !!}" class='btn btn-info btn-flat'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! action('ContactController@edit', [$contact->id]) !!}" class='btn bg-blue btn-flat'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-flat', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
