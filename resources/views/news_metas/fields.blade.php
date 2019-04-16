<!-- Meta Key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('meta_key', 'Meta Key:') !!}
    {!! Form::text('meta_key', null, ['class' => 'form-control']) !!}
</div>

<!-- Meta Value Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('meta_value', 'Meta Value:') !!}
    {!! Form::textarea('meta_value', null, ['class' => 'form-control']) !!}
</div>

<!-- News Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('news_id', 'News Id:') !!}
    {!! Form::number('news_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('ذخیره', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('newsMetas.index') !!}" class="btn btn-default">انصراف</a>
</div>
