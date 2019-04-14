<table class="table table-responsive" id="statuses-table">
    <thead>
        <tr>
            <th>Title</th>
        <th>Description</th>
            <th colspan="3">عملیات</th>
        </tr>
    </thead>
    <tbody>
    @foreach($statuses as $status)
        <tr>
            <td>{!! $status->title !!}</td>
            <td>{!! $status->description !!}</td>
            <td>
                {!! Form::open(['route' => ['statuses.destroy', $status->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('statuses.show', [$status->id]) !!}" class='btn btn-default btn-xs'><i class="pe-7s-look"></i></a>
                    <a href="{!! route('statuses.edit', [$status->id]) !!}" class='btn btn-default btn-xs'><i class="pe-7s-edit"></i></a>
                    {!! Form::button('<i class="pe-7s-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('آیا مطمعن هستید؟')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>