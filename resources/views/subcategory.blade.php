@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="top-text header-text">
                        <h6></h6>
                        <h2>{{ __('translation.poststitle') }}</h2>
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
                                                                        @foreach ($subcategory->posts as $post)
                                                                            <div class="top-icon">


                                                                                @php
                                                                                    if (App::isLocale('en')) {
                                                                                        $postid = $post->translations[0]->id;
                                                                                    } else {
                                                                                        $postid = $post->translations[1]->id;
                                                                                    }
                                                                                @endphp
                                                                                <a
                                                                                    href="{{ route('home.content.posts.show', $postid) }}">

                                                                                    @if (App::isLocale('en'))
                                                                                        <h4>{{ $post->translations[0]->title }}
                                                                                        </h4>
                                                                                    @else
                                                                                        <h4>{{ $post->translations[1]->title }}
                                                                                        </h4>

                                                                                    @endif

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
