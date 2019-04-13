<table class="table table-responsive" id="newsMetas-table">
    <thead>
        <tr>
            <th>Meta Key</th>
        <th>Meta Value</th>
        <th>News Id</th>
            <th colspan="3">Action</th>
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
                    <a href="{!! route('newsMetas.show', [$newsMeta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('newsMetas.edit', [$newsMeta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>