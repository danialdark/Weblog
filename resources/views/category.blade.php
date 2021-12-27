@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="top-text header-text">
                        <h6>{{ __('translation.subcategorytitle') }}</h6>
                        <h2>{{ __('translation.subcategorytitle2') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="category-post">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="naccs">
                        <div class="grid">
                            <div class="row">
                                <div class="col-lg-12">
                                </div>
                                <div class="col-lg-12">
                                    <ul class="nacc">
                                        <li class="active">
                                            <div>
                                                <div class="thumb">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="top-content">
                                                                <div class="row justify-content-between">
                                                                    <div class="col-lg-3">
                                                                        @foreach ($category->subcategories as $subcategory)
                                                                            <div class="top-icon">
                                                                                <a
                                                                                    href="{{ route('home.content.subcategory.show', $subcategory->id) }}">
                                                                                    <h4>{{ __('translation.' . $subcategory->name) }}
                                                                                    </h4>
                                                                                </a>
                                                                            </div>
                                                                    </div>
                                                                    @endforeach

                                                                </div>
                                                            </div>
                                                            <h4>{{__('translation.aboutcat  ')}}</h4>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                </div>
                            </div>
                        </div>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
