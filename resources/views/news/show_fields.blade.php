<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $news->id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{!! $news->title !!}</p>
</div>

<!-- Content Field -->
<div class="form-group">
    {!! Form::label('content', 'Content:') !!}
    <p>{!! $news->content !!}</p>
</div>

<!-- Picture Id Field -->
<div class="form-group">
    {!! Form::label('picture_id', 'Picture Id:') !!}
    <p>{!! $news->picture_id !!}</p>
</div>

<!-- Pictures Field -->
<div class="form-group">
    {!! Form::label('pictures', 'Pictures:') !!}
    <p>{!! $news->pictures !!}</p>
</div>

<!-- Tag Field -->
<div class="form-group">
    {!! Form::label('tag', 'Tag:') !!}
    <p>{!! $news->tag !!}</p>
</div>

<!-- Categories Field -->
<div class="form-group">
    {!! Form::label('categories', 'Categories:') !!}
    <p>{!! $news->categories !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{!! $news->user_id !!}</p>
</div>

<!-- Status Id Field -->
<div class="form-group">
    {!! Form::label('status_id', 'Status Id:') !!}
    <p>{!! $news->status_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $news->created_at !!}</p>
</div>

<!-- Updeted At Field -->
<div class="form-group">
    {!! Form::label('updeted_at', 'Updeted At:') !!}
    <p>{!! $news->updeted_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $news->deleted_at !!}</p>
</div>

