@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h2>
           متا
        </h2>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'newsMetas.store']) !!}

                        @include('news_metas.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
