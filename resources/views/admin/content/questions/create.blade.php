@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">محتوا</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="{{ route('admin.content.exams.index') }}">ازمون ها</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="{{ route('admin.content.exams.show', $exam->id) }}">
                    {{ $exam->name }}</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد سوال جدید برای {{ $exam->name }}
            </li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد سوال
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.content.exams.show', $exam->id) }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.content.exams.questions.store', $exam->id) }}" method="post"
                        enctype="multipart/form-data" id="form">
                        @csrf
                        <section class="row">

                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="soal">متن سوال</label>
                                    <input type="soal" class="form-control form-control-sm" name="soal" id="soal"
                                        value="{{ old('soal') }}">
                                </div>
                                @error('soal')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="answer1">گزینه 1</label>
                                    <input type="answer1" class="form-control form-control-sm" name="answer1" id="answer1"
                                        value="{{ old('answer1') }}">
                                </div>
                                @error('answer1')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="answer2">گزینه 2</label>
                                    <input type="answer2" class="form-control form-control-sm" name="answer2" id="answer2"
                                        value="{{ old('answer2') }}">
                                </div>
                                @error('answer2')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="answer3">گزینه 3</label>
                                    <input type="answer3" class="form-control form-control-sm" name="answer3" id="answer3"
                                        value="{{ old('answer3') }}">
                                </div>
                                @error('answer3')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="answer4">گزینه 4</label>
                                    <input type="answer4" class="form-control form-control-sm" name="answer4" id="answer4"
                                        value="{{ old('answer4') }}">
                                </div>
                                @error('answer4')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="option">گزینه درست</label>
                                    <select name="option" id="" class="form-control form-control-sm" id="option">
                                        <option value="1">گزینه 1</option>
                                        <option value="2">گزینه 2</option>
                                        <option value="3">گزینه 3</option>
                                        <option value="4">گزینه 4</option>
                                    </select>
                                </div>
                                @error('status')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>  
                            <section class="col-12 my-3">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>

@endsection
