<table class="table table-responsive" id="users-table">
    <thead>
        <tr>
            <th>نام</th> 
            <th colspan="3">عملیات</th>
        </tr>
    </thead>
    <tbody>
    @foreach($roles as $role)
        <tr> 
            <td>{!! $role->name !!}</td>
            
            
           

            <td>
                {!! Form::open(['route' => ['Role.destroy', $role->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                
                    <a href="{!! route('Role.edit', [$role->id]) !!}" class='btn btn-default btn-xs'><i class="pe-7s-config"></i></a>
                    {!! Form::button('<i class="pe-7s-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('آیا مطمعن هستید؟')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>