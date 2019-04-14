@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h2>
            تصاویر
        </h2>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'pictures.store']) !!}

                        @include('pictures.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
