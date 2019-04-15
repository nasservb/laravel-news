@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h2 class="pull-right">اخبار</h2>
        <h2 class="pull-left">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('news.create') !!}">افزودن</a>
        </h2>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
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
                    @foreach($news as $newsInner)
                        <tr>
                            <td>{!! $newsInner->title !!}</td>
                            <td>
                                @php
                                
                                    foreach ($newsInner->tags as $tag)
                                    {
                                        echo '<a class="btn-sm" href="'.url('tags/'.$tag->tag).'">'. $tag->tag .'</a>';
                                    }
                                @endphp 
                            </td>


                            <td>
                                @php

                                
                                foreach($newsInner->categories as $cat) 
                                    echo '<a class="btn-sm" href="'.url('category/'.$cat->title).'">'. $cat->title .'</a>';

                                @endphp 
                            </td>
                            <td>{!! \App\Models\users::getDisplayName($newsInner->user_id ) !!} </td>
                            <td>{!! $statuses[$newsInner->status_id] !!}</td>

                            <td>{!! \Morilog\Jalali\Jalalian::forge( $newsInner->created_at)->ago() !!}</td>

                            <td>
                                {!! Form::open(['route' => ['news.destroy', $newsInner->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{!! route('news.edit', [$newsInner->id]) !!}" class='btn btn-default btn-xs'><i class="pe-7s-edit"></i></a>
                                    {!! Form::button('<i class="pe-7s-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('آیا مطمعن هستید؟')"]) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="text-center">
        {{ $news->links() }}
        </div>
    </div>
@endsection

