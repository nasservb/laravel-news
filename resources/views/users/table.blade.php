<table class="table table-responsive" id="users-table">
    <thead>
        <tr>
            <th>نام</th>
        <th>ایمیل</th> 
        <th>نقش</th>
            <th colspan="3">عملیات</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $users)
        <tr> 
            <td>{!! $users->name !!}</td>
            <td>{!! $users->email !!}</td> 
            
            <td>
            @php 
               
                foreach( Auth::user($users->id)->roles as $role)
                {                      
                    echo  '<span class="btn">'.$role->name.'</span>' ;                 
                }
 

            @endphp 
            </td>

            <td>
                {!! Form::open(['route' => ['users.destroy', $users->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                
                    <a href="{!! route('users.edit', [$users->id]) !!}" class='btn btn-default btn-xs'><i class="pe-7s-edit"></i></a>
                    {!! Form::button('<i class="pe-7s-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('آیا مطمعن هستید؟')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>