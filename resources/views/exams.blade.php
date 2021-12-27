@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="top-text header-text">
                        <h2>{{ __('translation.examtitle') }}</h2>
                        <h6>{{ __('translation.examtitle2') }}</h6>
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
                                                                <div class="row">
                                                                    <div class="col-lg-6">

                                                                        @foreach ($exams as $exam)
                                                                            <div class="top-icon">
                                                                                <a
                                                                                    href="{{ route('home.content.exams.show', $exam->id) }}">
                                                                                    <h4>{{ $exam->name }} </h4>
                                                                                </a>
                                                                            </div>
                                                                    </div>
                                                                    @endforeach

                                                                </div>
                                                            </div>
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
