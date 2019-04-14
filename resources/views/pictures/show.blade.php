@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h2>
            تصاویر
        </h2>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('pictures.show_fields')
                    <a href="{!! route('pictures.index') !!}" class="btn btn-default">برگشت</a>
                </div>
            </div>
        </div>
    </div>
@endsection
