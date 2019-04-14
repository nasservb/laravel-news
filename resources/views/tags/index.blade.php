@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h2 class="pull-right">برچسب</h2>
        <h2 class="pull-left">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('tags.create') !!}">افزودن</a>
        </h2>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('tags.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

