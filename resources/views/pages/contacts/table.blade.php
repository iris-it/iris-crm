<table class="table table-responsive" id="contacts-table">
    <thead>
    <th>{{trans('app.general:name')}}</th>
    <th>{{trans('app.contact:account-name')}}</th>
    <th>{{trans('app.contact:post')}}</th>
    <th>{{trans('app.contact:owner')}}</th>
    <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($contacts as $contact)
        <tr>
            <td>{!! $contact->firstname !!} {!! $contact->lastname !!}</td>
            @if($contact->boundable)
                <td>{!! $contact->boundable->name !!}</td>
            @else
                {{trans('app.general:undefined')}}
            @endif
            <td>{!! $contact->post !!}</td>
            @if($contact->user)
                <td>{!! $contact->user->name !!}</td>
            @else
                {{trans('app.general:undefined')}}
            @endif
            <td>
                {!! Form::open(['route' => ['contacts.destroy', $contact->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('contacts.show', [$contact->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('contacts.edit', [$contact->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>