<table class="table table-responsive" id="news-table">
    <thead>
        <tr>
            <th>عنوان</th> 
        <th>برچسب ها</th>
        <th>دسته ها</th>
        <th>ایجادکننده</th>
        <th>وضعیت</th>
        <th>تاریخ ایجاد</th>
            <th colspan="3">عملیات</th>
        </tr>
    </thead>
    <tbody>
    @foreach($news as $news)
        <tr>
            <td>{!! $news->title !!}</td>
            <td>
                @php
                    $tags = explode(',',$news->tag); 
                     
                    foreach ($tags as $tag)
                    {
                        if (strlen(trim($tag))>2)
                            echo '<a class="btn-sm" href="'.url('tags/'.$tag).'">'. $tag .'</a>';
                    }
                @endphp 
            </td>


            <td>
                @php

                $cats = explode(',',$news->categories);

                foreach($cats as $cat)
                    if (intval($cat)>0)
                        echo '<a class="btn-sm" href="'.url('category/'.$cat).'">'. $categories[$cat] .'</a>';
                @endphp 
            </td>
            <td>{!! \App\Models\users::getDisplayName($news->user_id ) !!} </td>
            <td>{!! $statuses[$news->status_id] !!}</td>

            <td>{!! \Morilog\Jalali\Jalalian::forge( $news->created_at)->ago() !!}</td>
            <td>
                {!! Form::open(['route' => ['news.destroy', $news->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('news.show', [$news->id]) !!}" class='btn btn-default btn-xs'><i class="pe-7s-look"></i></a>
                    <a href="{!! route('news.edit', [$news->id]) !!}" class='btn btn-default btn-xs'><i class="pe-7s-edit"></i></a>
                    {!! Form::button('<i class="pe-7s-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('آیا مطمعن هستید؟')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>