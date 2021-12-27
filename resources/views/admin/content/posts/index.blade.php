@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">پست های اینگلیسی</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        پست های اینگلیسی
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.content.posts.create') }}" class="btn btn-info btn-sm">ایجاد پست جدید</a>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نویسنده</th>
                                <th>نام دسته بندی</th>
                                <th>نام زیردسته</th>
                                <th>عنوان</th>
                                <th>خلاصه</th>
                                <th>متن اصلی</th>
                                <th>وضعیت</th>
                                <th>تاریخ ایجاد</th>
                                <th>تاریخ اخرین تغیرات</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <th>1</th>
                                    <td>{{ $post->user->firstname }} {{ $post->user->lastname }}</td>
                                    <td>{{ $post->subcategory->category->title }}</td>
                                    <td>{{ $post->subcategory->name }}</td>
                                    
                                    <td>{{ $post->translations[0]->title }}</td>

                                    <td>{{ $post->translations[0]->summary }}</td>
                                    <td>@php
                                        echo $post->translations[0]->body;
                                     @endphp</td>
                                    <td>
                                        @if ($post->status == 1)
                                            {{ 'active' }}
                                        @else
                                            {{ 'not active' }}
                                        @endif
                                    </td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>{{ $post->updated_at }}</td>

                                    <td class="width-16-rem text-left">
                                        <a href="{{ route('admin.content.posts.edit', $post->id) }}"
                                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                        @if (!isset($post->translations[1]))
                                            <a href="{{ route('admin.content.posts.translate', $post->id) }}"
                                                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>چند زبانه</a>
                                        @endif

                                        <form class="d-inline"
                                            action={{ route('admin.content.posts.destroy', $post->id) }}" method="post">
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

    <img alt="" src="blob:http://127.0.0.1:8000/989f80bc-0120-4ace-99bd-bd1765e3b9fa" width="500" />


@endsection
