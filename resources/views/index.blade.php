@extends('layouts.master')
@section('content')
    <div class="main-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="top-text header-text">
                        <h6>{{ __('translation.categorytitle') }}</h6>
                        <h2>{{ __('translation.categorytitletext') }}</h2>
                    </div>
                </div>

                <div class="col-lg-10 offset-lg-1">
                    <ul class="categories">
                        @foreach ($categories as $category)
                            <li><a href="{{ route('home.content.category.show', ['local' => 'fa', 'id' => $category->id]) }}"><span
                                        class="icon">
                                        <img src="{{ asset($category->images[1]->url) }}" alt="{{ $category->title }}">
                                    </span>
                                    {{ __('translation.' . $category->title) }}</a></li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="recent-listing">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>{{ __('translation.recentposts') }}</h2>
                        <h6>{{ __('translation.check') }}</h6>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="owl-carousel owl-listing">
                        <div class="item">
                            <div class="row">
                                @php
                                    $number = 0;
                                @endphp
                                @foreach ($posttranslations as $posttranslation)
                                    @php
                                        $number++;
                                        
                                    @endphp
                                    <div class="col-lg-12">
                                        <div class="listing-item">
                                            <div class="left-image">
                                                @foreach ($posttranslation->posts->images as $image)
                                                    
                                                    <a
                                                        href="{{ route('home.content.posts.show', $posttranslation->id) }}"><img
                                                            src="{{ asset($image->url) }}" alt=""></a>
                                                @endforeach
                                            </div>
                                            <div class="right-content align-self-center">
                                                <a href="#">
                                                    <h4> {{ $number . '.' . $posttranslation->title }}</h4>

                                                </a>
                                                <ul class="rate">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li>(18){{ __('translation.reviews') }}</li>
                                                </ul>
                                                <span class="details">{{ __('translation.summary') }}:
                                                    <em>{{ $posttranslation->summary }}</em></span>
                                                <h6 class="mt-5 fw-bold">
                                                    {{ __('translation.by') }}:{{ $posttranslation->posts->user->firstname }}{{ ' ' }}{{ $posttranslation->posts->user->lastname }}
                                                </h6>

                                                <ul class="info mt-5">
                                                    <li><img src="assets/images/time.svg"
                                                            alt=""><span>{{ __('translation.publishedat') }}:</span>{{ $posttranslation->posts->created_at }}
                                                    </li>
                                                    <li><img src="assets/images/time.svg"
                                                            alt=""><span>{{ __('translation.updatedat') }}:</span>{{ $posttranslation->posts->updated_at }}
                                                    </li>
                                                </ul>

                                                <div class="main-white-button">

                                                    <a
                                                        href="{{ route('home.content.posts.show', $posttranslation->id) }}"><i
                                                            class="fa fa-eye"></i>{{ __('translation.readmore') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- {{ route('home.category.' . "$cat" . '.' . "$sub") }} --}}
