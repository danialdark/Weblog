@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">محتوا</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="{{ route('admin.content.exams.index') }}">آزمون ها</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#" class="active"> مشاهده آزمون </a></li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        {{ $exam->name }}
                    </h5>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">


                    <button class="btn btn-warning">زبان آزمون:@if ($exam->language == 'fa')
                            فارسی
                        @else
                            اینگلیسی
                        @endif</button>
                    <button class="btn btn-warning">تعدا سوالات:{{ $exam->questions->count() }}</button>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>سوال</th>
                                <th>گزینه 1</th>
                                <th>گزینه 2</th>
                                <th>گزینه 3</th>
                                <th>گزینه 4</th>
                                <th>پاسخ درست</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $number = 0;
                            @endphp
                            @foreach ($exam->questions as $question)
                                @php
                                    $number++;
                                @endphp
                                <tr>
                                    <th>{{ $number++ }}</th>
                                    <td>{{ $question->soal}}</td>
                                    <td>{{ $question->answer1 }}</td>
                                    <td>{{ $question->answer2 }}</td>
                                    <td>{{ $question->answer3 }}</td>
                                    <td>{{ $question->answer4 }}</td>
                                    <td>{{ $question->answer->option }}</td>
                                    <td class="width-16-rem text-left">
                                        <a href="{{ route('admin.content.exams.edit', $exam->id) }}"
                                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                        <form class="d-inline"
                                            action={{ route('admin.content.exams.destroy', $exam->id) }}" method="post">
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
                    <a href="{{ route('admin.content.exams.create') }}" class="btn btn-info btn-sm">ایجاد
                        سوال جدید </a>
                </section>

            </section>
        </section>
    </section>

@endsection
