@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h2>
            Status
        </h2>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('statuses.show_fields')
                    <a href="{!! route('statuses.index') !!}" class="btn btn-default">برگشت</a>
                </div>
            </div>
        </div>
    </div>
@endsection
