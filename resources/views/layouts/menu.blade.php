<ul class="nav">
	<li class="{{ Request::is('news*') ? 'active' : '' }}">
		<a href="{!! route('news.index') !!}"><i class="pe-7s-news-paper"></i><p>اخبار</p></a>
	</li>

	<li class="{{ Request::is('categories*') ? 'active' : '' }}">
		<a href="{!! route('categories.index') !!}"><i class="pe-7s-network"></i><p>دسته بندی ها</p></a>
	</li>
	
	<li class="{{ Request::is('pictures*') ? 'active' : '' }}">
		<a href="{!! route('pictures.index') !!}"><i class="pe-7s-camera"></i><p>تصاویر</p></a>
	</li>
	<li class="{{ Request::is('tags*') ? 'active' : '' }}">
		<a href="{!! route('tags.index') !!}"><i class="pe-7s-ticket"></i><p>برچسب ها</p></a>
	</li>
 


	<li class="{{ Request::is('newsMetas*') ? 'active' : '' }}">
		<a href="{!! route('newsMetas.index') !!}"><i class="pe-7s-albums"></i><p>اطلاعات اضافی</p></a>
	</li>

	<li class="{{ Request::is('users*') ? 'active' : '' }}">
		<a href="{!! route('users.index') !!}"><i class="pe-7s-users"></i><p>کاربران</p></a>
	</li>


	<li class="{{ Request::is('Role*') ? 'active' : '' }}">
		<a href="{!! route('Role.index') !!}"><i class="pe-7s-user"></i><p>نقش ها</p></a>
	</li>
</ul>