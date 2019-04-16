<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>

<!-- Picture Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('picture_id', 'Picture Id:') !!}
    {!! Form::number('picture_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Pictures Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pictures', 'Pictures:') !!}
    {!! Form::text('pictures', null, ['class' => 'form-control']) !!}
</div>

<!-- Tag Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tag', 'Tag:') !!}
    {!! Form::text('tag', null, ['class' => 'form-control']) !!}
</div>

<!-- Categories Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categories', 'Categories:') !!}
    {!! Form::text('categories', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_id', 'Status Id:') !!}
    {!! Form::number('status_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Updeted At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updeted_at', 'Updeted At:') !!}
    {!! Form::date('updeted_at', null, ['class' => 'form-control','id'=>'updeted_at']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#updeted_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('ذخیره', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('news.index') !!}" class="btn btn-default">انصراف</a>
</div>
