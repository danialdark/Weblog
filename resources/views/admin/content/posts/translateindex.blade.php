@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">پست های فارسی</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                         پست های فارسی
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
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
                            @foreach ($translations as $translation)
                            
                            
                                
                            
                                <tr>
                                    <th>1</th>
                                    <td>{{ $translation->posts->user->firstname }} {{ $translation->posts->user->lastname }}</td>
                                    <td>{{ $translation->posts->subcategory->category->title }}</td>
                                    <td>{{ $translation->posts->subcategory->name }}</td>
                                    <td>{{ $translation->title }}</td>
                                    <td>{{ $translation->summary }}</td>
                                    <td>@php
                                       echo $translation->body;
                                    @endphp</td>
                                    <td>
                                        @if ($translation->posts->status == 1)
                                            {{ 'active' }}
                                        @else
                                            {{ 'not active' }}
                                        @endif
                                    </td>
                                    <td>{{$translation->posts->created_at }}</td>
                                    <td>{{ $translation->posts->updated_at }}</td>

                                    <td class="width-16-rem text-left">
                                        <a href="{{ route('admin.content.posts.edit.farsi', $translation->id) }}"
                                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                        <form class="d-inline"
                                            action={{ route('admin.content.posts.destroy.farsi',$translation->id) }}" method="post">
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
