<table class="table table-responsive" id="pictures-table">
    <thead>
        <tr>
            <th>مسیر</th>
        <th>تصویر کوچک دارد؟</th>
        <th>تصویر کوچک</th> 
        <th>خبر</th>
            <th colspan="3">عملیات</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pictures as $picture)
        <tr>
            <td>{!! $picture->path !!}</td>
            <td>{!! $picture->has_thumbnail !!}</td>
            <td>{!! $picture->thumbnail_path !!}</td> 
            <td>{!! $picture->item_id !!}</td>
            <td>
                {!! Form::open(['route' => ['pictures.destroy', $picture->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pictures.show', [$picture->id]) !!}" class='btn btn-default btn-xs'><i class="pe-7s-look"></i></a>
                    <a href="{!! route('pictures.edit', [$picture->id]) !!}" class='btn btn-default btn-xs'><i class="pe-7s-edit"></i></a>
                    {!! Form::button('<i class="pe-7s-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('آیا مطمعن هستید؟')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>