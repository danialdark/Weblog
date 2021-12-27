@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="{{ route('admin.content.posts.all') }}">پست ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد پست جدید</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد پست جدید
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.content.posts.all') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.content.posts.store') }}" method="post" enctype="multipart/form-data"
                        id="form">
                        @csrf
                        <input type="hidden" name="user_id" value={{ auth()->user()->id }}>
                        <section class="row">
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="category">دسته بندی</label>
                                    <select name="category" id="category" class="form-control form-control-sm"
                                        id="category">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach

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
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="category">زیردسته</label>
                                    <select name="sub_category" id="sub_category" class="form-control form-control-sm"
                                        id="sub_category">
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                        @endforeach

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
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="title">عنوان</label>
                                    <input type="text" class="form-control form-control-sm" name="title" id="title"
                                        value="{{ old('title') }}">
                                </div>
                                @error('title')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="summary">خلاصه</label>
                                    <input type="text" class="form-control form-control-sm" name="summary" id="summary"
                                        value="{{ old('summary') }}">
                                </div>
                                @error('summary')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select name="status" id="" class="form-control form-control-sm" id="status">
                                        <option value="0" @if (old('status') == 0) selected @endif>غیرفعال</option>
                                        <option value="1" @if (old('status') == 1) selected @endif>فعال</option>
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
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="status">زبان پست</label>
                                    <select name="language" class="form-control form-control-sm" id="status">
                                        <option value="fa" @if (old('language') == 0) selected @endif>فارسی</option>
                                        <option value="en" @if (old('language') == 1) selected @endif>اینگلیسی</option>
                                    </select>
                                </div>
                                @error('language')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="image">عکس</label>
                                    <input type="file" class="form-control form-control-sm" name="image" id="image"
                                        value="{{ old('image') }}">
                                </div>
                                @error('image')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                        </section>


                        <section class="col-12">
                            <div class="form-group">
                                <label for="">توضیحات</label>
                                <textarea name="description" id="description" class="form-control form-control-sm" rows="6">
                                                            {{ old('body') }}
                                                        </textarea>
                            </div>
                            @error('description')
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

@section('script')

    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description', {
            extraPlugins: 'easyimage',
            removePlugins: 'image',
            cloudServices_tokenUrl: 'https://83883.cke-cs.com/token/dev/03d095097446a57a5cba46ca9f8d0096f1bd88cd3e2116156dd4cd21d03a',
            cloudServices_uploadUrl: 'https://83883.cke-cs.com/easyimage/upload/'
        });
    </script>


    <script>
        $(document).ready(function() {
            var tags_input = $("#tags");
            var select_tags = $("#select_tags");
            var default_tags = tags_input.val();
            var default_data = null;
            if (tags_input.val() !== null && tags_input.val().length > 0) {
                default_data = default_tags.split(",")
            }
            select_tags.select2({
                tags: true,
                placeholder: "لطفا تگ هارا وارد کنید",
                data: default_data
            });
            select_tags.children("option").attr("selected", true).trigger("change");
            $("#form").submit(function(event) {
                if (select_tags.val() !== null && select_tags.val().length > 0) {
                    var selected = select_tags.val().join(",");
                    tags_input.val(selected)
                }
            })
        })
    </script>
@endsection
