<table class="table table-responsive" id="categories-table">
    <thead>
        <tr>
            <th>عنوان</th>
        <th>Slag</th>
        <th>مادر</th>
            <th colspan="3">عملیات</th>
        </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{!! $category->title !!}</td>
            <td>{!! $category->slag !!}</td>
            <td>
			
			{!! $category->parent_id !!}
			
			</td>
            <td>
                {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('categories.show', [$category->id]) !!}" class='btn btn-default btn-xs'><i class="pe-7s-look"></i></a>
                    <a href="{!! route('categories.edit', [$category->id]) !!}" class='btn btn-default btn-xs'><i class="pe-7s-edit"></i></a>
                    {!! Form::button('<i class="pe-7s-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('آیا مطمعن هستید؟')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>