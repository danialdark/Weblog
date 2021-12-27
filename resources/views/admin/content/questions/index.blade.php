@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">محتوا</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#" class="active">آزمون ها</a></li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        آزمون ها
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.content.exams.create') }}" class="btn btn-info btn-sm">ایجاد آزمون
                        جدید</a>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>طراح آزمون</th>
                                <th>نام آزمون</th>
                                <th>زبان آزمون</th>
                                <th>تعداد سوالات</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($exams as $exam)
                                <tr>
                                    <th>1</th>
                                    <td>{{ $exam->user->firstname }} {{ $exam->user->lastname }}</td>
                                    <td>{{ $exam->name }}</td>
                                    <td>{{ $exam->language }}</td>
                                    <td>{{ $exam->questions->count() }}</td>
                                    <td class="width-16-rem text-left">
                                        <a href="{{ route('admin.content.exams.edit', $exam->id) }}"
                                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                        <a href="{{ route('admin.content.exams.show', $exam->id) }}"
                                            class="btn btn-success btn-sm"><i class="fa fa-eye"></i> مشاهده</a>
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
                </section>

            </section>
        </section>
    </section>

@endsection
