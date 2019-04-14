<table class="table table-responsive" id="tags-table">
    <thead>
        <tr>
            <th>برچسب</th>
            <th colspan="3">عملیات</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tags as $tags)
        <tr>
            <td>{!! $tags->tag !!}</td>
            <td>
                {!! Form::open(['route' => ['tags.destroy', $tags->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tags.show', [$tags->id]) !!}" class='btn btn-default btn-xs'><i class="pe-7s-look"></i></a>
                    <a href="{!! route('tags.edit', [$tags->id]) !!}" class='btn btn-default btn-xs'><i class="pe-7s-edit"></i></a>
                    {!! Form::button('<i class="pe-7s-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('آیا مطمعن هستید؟')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>