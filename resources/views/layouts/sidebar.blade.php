
<div class="sidebar" data-color="purple" data-image="{!! URL::asset('img/sidebar-5.jpg') !!}">
   <div class="sidebar-wrapper">
		<div class="logo">
                <a href="#" class="simple-text">
                    <b>مدیریت نشریه نیلسو</b><br>
                    <small> {!! Auth::user()->name !!}<br>خوش آمدید</small>
                </a>
		</div>
		@include('layouts.menu')
			
	 </div>	
</div>	