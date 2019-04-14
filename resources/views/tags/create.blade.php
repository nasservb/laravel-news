@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h2>
            برچسب
        </h2>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'tags.store']) !!}

                        @include('tags.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
