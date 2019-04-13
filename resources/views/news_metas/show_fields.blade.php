<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $newsMeta->id !!}</p>
</div>

<!-- Meta Key Field -->
<div class="form-group">
    {!! Form::label('meta_key', 'Meta Key:') !!}
    <p>{!! $newsMeta->meta_key !!}</p>
</div>

<!-- Meta Value Field -->
<div class="form-group">
    {!! Form::label('meta_value', 'Meta Value:') !!}
    <p>{!! $newsMeta->meta_value !!}</p>
</div>

<!-- News Id Field -->
<div class="form-group">
    {!! Form::label('news_id', 'News Id:') !!}
    <p>{!! $newsMeta->news_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $newsMeta->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $newsMeta->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $newsMeta->deleted_at !!}</p>
</div>

