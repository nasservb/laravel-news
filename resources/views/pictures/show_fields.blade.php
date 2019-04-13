<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $picture->id !!}</p>
</div>

<!-- Path Field -->
<div class="form-group">
    {!! Form::label('path', 'Path:') !!}
    <p>{!! $picture->path !!}</p>
</div>

<!-- Has Thumbnail Field -->
<div class="form-group">
    {!! Form::label('has_thumbnail', 'Has Thumbnail:') !!}
    <p>{!! $picture->has_thumbnail !!}</p>
</div>

<!-- Thumbnail Path Field -->
<div class="form-group">
    {!! Form::label('thumbnail_path', 'Thumbnail Path:') !!}
    <p>{!! $picture->thumbnail_path !!}</p>
</div>

<!-- Item Type Field -->
<div class="form-group">
    {!! Form::label('item_type', 'Item Type:') !!}
    <p>{!! $picture->item_type !!}</p>
</div>

<!-- Item Id Field -->
<div class="form-group">
    {!! Form::label('item_id', 'Item Id:') !!}
    <p>{!! $picture->item_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $picture->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $picture->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $picture->deleted_at !!}</p>
</div>

