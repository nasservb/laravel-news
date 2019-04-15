@section('css')

<link href="{!!  URL::asset('css/selectize.bootstrap3.css') !!}" rel="stylesheet" type="text/css"> 

 @endsection

<!-- Name Field -->
<div class="form-group col-sm-12">
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>


@if (!isset($users))
<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>
@endif


 </div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Remember Token Field -->
<div class="form-group col-sm-6">
    {!! Form::label('', 'تکرار رمز عبور:') !!}
    {!! Form::password('confirm_password', null, ['class' => 'form-control']) !!}
</div>



<!-- Remember Token Field -->
<div class="form-group col-sm-6">
    {!! Form::label('', 'نقش ها:') !!}

    <!-- Tag Field -->
       
    <select  name="roles[]" class="form-control" multiple id="input-role" >
                                            
        @foreach($roles as   $role )
            @if ( isset($users) &&  Auth::user($users->id)->hasRole($role))
                <option  selected value="{{ $role->name }}">{{ $role->name }}</option> 
            @else     
                <option   value="{{ $role->name }}">{{ $role->name }}</option> 
            @endif

        @endforeach
                    
    </select>
    
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">انصراف</a>
</div>


@section('scripts')

<script src="{!!  URL::asset('js/selectize.min.js') !!}"></script>

<script>
   
	$(document).ready(function () {
		$('#input-role').selectize({ create: false  });   
	});

</script>
@endsection