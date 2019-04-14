<table class="table table-responsive" id="newsMetas-table">
    <thead>
        <tr>
            <th>کلید</th>
        <th>مقدار</th>
        <th>خبر</th>
            <th colspan="3">عملیات</th>
        </tr>
    </thead>
    <tbody>
    @foreach($newsMetas as $newsMeta)
        <tr>
            <td>{!! $newsMeta->meta_key !!}</td>
            <td>{!! $newsMeta->meta_value !!}</td>
            <td>{!! $newsMeta->news_id !!}</td>
            <td>
                {!! Form::open(['route' => ['newsMetas.destroy', $newsMeta->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('newsMetas.show', [$newsMeta->id]) !!}" class='btn btn-default btn-xs'><i class="pe-7s-look"></i></a>
                    <a href="{!! route('newsMetas.edit', [$newsMeta->id]) !!}" class='btn btn-default btn-xs'><i class="pe-7s-edit"></i></a>
                    {!! Form::button('<i class="pe-7s-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('آیا مطمعن هستید؟')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>