@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tags
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tags, ['route' => ['tags.update', $tags->id], 'method' => 'patch']) !!}

                        @include('tags.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection