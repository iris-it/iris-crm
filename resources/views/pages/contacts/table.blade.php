<table class="table table-striped table-responsive" id="contacts-table">
    <thead>
    <th class="h4 text-purple text-uppercase">{{trans('app.general:name')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.contact:account-name')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.contact:post')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.contact:owner')}}</th>
    <th class="h4 text-purple text-uppercase" colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($contacts as $contact)
        <tr>
            <td class="text-bold">{!! $contact->firstname !!} {!! $contact->lastname !!}</td>
            @if($contact->account || $contact->lead)
                @if($contact->account)
                    <td class="text-bold">{!! $contact->account->name !!}</td>
                @elseif($contact->lead)
                    <td class="text-bold">{!! $contact->lead->name !!}</td>
                @endif
            @else
                <td class="text-bold">{{trans('app.general:undefined')}}</td>
            @endif
            <td class="text-bold">{!! $contact->post !!}</td>
            @if($contact->user)
                <td class="text-bold">{!! $contact->user->name !!}</td>
            @else
                <td class="text-bold">{{trans('app.general:undefined')}}</td>
            @endif
            <td>
                {!! Form::open(['route' => ['contacts.destroy', $contact->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('contacts.show', [$contact->id]) !!}" class='btn btn-info btn-flat'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('contacts.edit', [$contact->id]) !!}" class='btn bg-purple btn-flat'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-flat', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>