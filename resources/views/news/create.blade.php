@extends('layouts.app')

@section('css')

<link href="{!!  URL::asset('css/selectize.bootstrap3.css') !!}" rel="stylesheet" type="text/css">
<link href="{!!  URL::asset('css/persianDatepicker-default.css') !!}" rel="stylesheet" type="text/css">
 

<link href="{!!  URL::asset('css/dropzone.css') !!}" rel="stylesheet" type="text/css">
 @endsection

@section('content')
<style>
	input[type=checkbox]{width:35px}
</style>



    <section class="content-header">
        <h2>
            اخبار
        </h2>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'news.store']) !!}

                      <!-- Title Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('title', 'عنوان:') !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Content Field -->
                    <div class="form-group col-sm-12 col-lg-12">
                        {!! Form::label('content', 'محتوا:') !!}

                         <textarea class="form-control" 
                            name="content" 
                            id="content" rows="6" 
                            placeholder="شرح کامل.." 
                            style="margin-top: 0px; margin-bottom: 0px; height: 216px;"></textarea>
                   
                    </div>


                    {!! Form::hidden('key', $imageKey) !!}

                    <!-- Picture Id Field -->


                    <!-- Pictures Field -->


                    <!-- Tag Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('tag', 'برچسب ها:') !!}
                         
                        <select  name="tag[]" class="form-control" multiple id="input-tags" >
                                                              
                            @foreach($tags as $id => $value )
                            {
                                <option   value="{{ $id }}">{{ $value }}</option> 
                            }                                    
                            @endforeach
                                     
                        </select>
                            
                    </div>


                    <!-- Categories Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('categories', 'دسته بندی ها:') !!} <br>
                     
                            @foreach($categories as $key=>$value)
                            <input type="checkbox" name="categories[]" value="{{$key}}">{{$value}}<br>
                               
                            @endforeach
                        
                    </div>

                    <!-- User Id Field -->
                     

                    <!-- Status Id Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('status_id', 'انتشار:') !!}
                         <select name="status_id" class="form-control select2 " style="width: 100%;" tabindex="-1" >
                             
                            @foreach($statuses as $key=>$value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>



					
                    <div class="form-group col-sm-12 col-lg-6">
                        {!! Form::label('pictures', 'تصاویر :') !!}              
                        <small>(عکس  کم حجم)</small>                        
                         
                        <div id="dropzone" class="dropzone"></div>                        
                                    
                    </div>
					
                 

                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('news.index') !!}" class="btn btn-default">انصراف</a>
                    </div>


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    
               
@endsection


@section('scripts')
<script src="{!!  URL::asset('js/selectize.min.js') !!}"></script>

<script src="{!!  URL::asset('js/persianDatepicker.min.js') !!}"></script>
<script src="{!!  URL::asset('js/dropzone.min.js') !!}"></script>

<script src="{!!  URL::asset('tinymce/tinymce.min.js') !!}"></script>

<script type="text/javascript">

	$(document).ready(function () {
		
		tinymce.init({
			selector: "textarea",
			themes: "modern",   
			plugins: [
				"advlist autolink lists link image charmap print preview anchor",
				"searchreplace visualblocks code fullscreen textcolor",
				"insertdatetime media table contextmenu paste directionality imagetools"
			],
			toolbar: "insertfile undo redo forecolor backcolor| styleselect | bold italic  ltr rtl | alignleft aligncenter alignright alignjustify | bullist numlist| link image "   
			, file_picker_types: 'image'
			,relative_urls : false
			,remove_script_host : false
			,convert_urls : true
			,images_upload_url:"{!! url('common/ajaxUploadFile?key='.$imageKey )!!}"
			,images_upload_base_path:"{{url('/')}}"
			,images_upload_handler: function (blobInfo, success, failure) {
					var xhr, formData;

					xhr = new XMLHttpRequest();
					xhr.withCredentials = false;
					xhr.open('POST', "{!! url('common/ajaxUploadFile/?key='.$imageKey ) !!}");

					xhr.onload = function() {
					  var json;

					  if (xhr.status != 200) {
						failure('HTTP Error: ' + xhr.status);
						return;
					  }

					  json = JSON.parse(xhr.responseText);

					  if (!json || typeof json.location != 'string') {
						failure('Invalid JSON: ' + xhr.responseText);
						return;
					  }

					  success(json.location);
					};

					formData = new FormData();
					formData.append('file', blobInfo.blob(), blobInfo.filename());

					xhr.send(formData);
				  }
		});
		
		
	});

</script>  

<script>
   
	$(document).ready(function () {
		$('#input-tags').selectize({ create: true  });   

	});

</script>

<script>var myDropzone = new Dropzone("#dropzone", {url: "{!! url('common/uploadAjaxFile?key='.$imageKey) !!}",maxFilesize:1024,params:{"_token":"{{ csrf_token() }}"}});</script>

<script type="text/javascript">

$(document).ready(function () {
    $('#created_at').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        useCurrent: false
    });
});

</script>
@endsection