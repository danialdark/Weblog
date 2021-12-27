@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">نظرات </li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        نظرات
                    </h5>
                </section>


                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نویسنده</th>
                                <th>عنوان پست</th>
                                <th>متن اصلی</th>
                                <th>وضعیت</th>
                                <th>تاریخ ایجاد</th>
                                <th>تاریخ اخرین تغیرات</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $comment)
                                <tr>
                                    <th>1</th>

                                    <td>{{ $comment->user->firstname }} {{ $comment->user->lastname }}</td>
                                    <th>{{ $comment->post->title }}</th>
                                    <th>{{ $comment->body }}</th>
                                    <td>
                                        @if ($comment->approved == 1)
                                            {{ 'approved' }}
                                        @else
                                            {{ 'not approved' }}
                                        @endif
                                    </td>
                                    <td>{{ $comment->created_at }}</td>
                                    <td>{{ $comment->updated_at }}</td>

                                    <td class="width-16-rem  row justify-content-center ">
                                        @if ($comment->approved == 0)
                                            <form action="{{ route('admin.content.comments.update', $comment->id) }}" method="POST">
                                                @csrf
                                                {{ method_field('put') }}
                                                <input type="hidden" name="id" value="{{$comment->id}}" id="">
                                                <input type="hidden" name="body" value="{{$comment->body}}" id="">
                                                <input type="hidden" name="user_id" value="{{$comment->user->id}}" id="">
                                                <input type="hidden" name="post_id" value="{{$comment->post->id}}" id="">
                                                <input type="hidden" name="approved" value="1" id="">
                                                <button type="submit" class="btn btn-success btn-sm"><i
                                                        class="fa fa-edit"></i> تایید</button></form>

                                        @else
                                            <form action="{{ route('admin.content.comments.update', $comment->id) }}" method="POST">
                                                @csrf
                                                {{ method_field('put') }}
                                                <input type="hidden" name="id" value="{{$comment->id}}" id="">
                                                <input type="hidden" name="body" value="{{$comment->body}}" id="">
                                                <input type="hidden" name="user_id" value="{{$comment->user->id}}" id="">
                                                <input type="hidden" name="post_id" value="{{$comment->post->id}}" id="">
                                                <input type="hidden" name="approved" value="0" id="">
                                                <button type="submit" class="btn btn-warning btn-sm"><i
                                                        class="fa fa-edit"></i> عدم تایید</button></form>

                                        @endif

                                        <form class="d-inline"
                                            action="{{ route('admin.content.comments.destroy', $comment->id) }}"
                                            method="post">
                                            @csrf
                                            {{ method_field('delete') }}
                                            <button class="btn btn-danger btn-sm" type="submit"><i
                                                    class="fa fa-trash-alt"></i>
                                                حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>

            </section>
        </section>
    </section>

@endsection
