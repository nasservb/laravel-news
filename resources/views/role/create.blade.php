@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h2>
            تعریف نقش جدید
        </h2>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'role.store']) !!}



<!-- Name Field -->
<div class="form-group col-sm-12">
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'نام نقش:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('ذخیره', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('role.index') !!}" class="btn btn-default">انصراف</a>
</div>
 

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
