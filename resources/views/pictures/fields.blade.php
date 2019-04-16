<!-- Path Field -->
<div class="form-group col-sm-6">
    {!! Form::label('path', 'Path:') !!}
    {!! Form::text('path', null, ['class' => 'form-control']) !!}
</div>

<!-- Has Thumbnail Field -->
<div class="form-group col-sm-6">
    {!! Form::label('has_thumbnail', 'Has Thumbnail:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('has_thumbnail', 0) !!}
        {!! Form::checkbox('has_thumbnail', '1', null) !!} 1
    </label>
</div>

<!-- Thumbnail Path Field -->
<div class="form-group col-sm-6">
    {!! Form::label('thumbnail_path', 'Thumbnail Path:') !!}
    {!! Form::text('thumbnail_path', null, ['class' => 'form-control']) !!}
</div>

<!-- Item Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('item_type', 'Item Type:') !!}
    {!! Form::text('item_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Item Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('item_id', 'Item Id:') !!}
    {!! Form::number('item_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('ذخیره', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pictures.index') !!}" class="btn btn-default">انصراف</a>
</div>
