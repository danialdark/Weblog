@extends('layouts.master')
@section('content')
    <div class="main-banner">
        <div class="container">
            <div class="row">
            </div>
        </div>
    </div>
    <div class="container shadow my-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 text-center my-5">

                <h3 class="fw-bold">{{ $posttranslation->title }}</h3>

            </div>
            <div class="col-md-12 text-center" style="width: 455px;height:540px;">
                @foreach ($posttranslation->posts->images as $image)


                    <img src="{{ asset($image->url) }}" alt="">
                @endforeach
            </div>
            <div class="col-md-6">
                @php
                    echo $posttranslation->body;
                @endphp

            </div>
        </div>
        <div class="row my-5">
            <div class="text-center">
                <h3>{{ __('translation.comments') }}</h3>
            </div>
            @foreach ($comments as $comment)
                @if ($comment->parent_id == null)
                    <div class="my-3 shadow my-3 py-3">
                        <h2>{{ $comment->body }}</h2>
                        <h4>{{ __('translation.by') }} :{{ $comment->user->firstname }} {{ $comment->user->lastname }}
                        </h4>
                        <h5>{{ __('translation.createdat') }}:{{ $comment->created_at }}</h5>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#answer">
                            {{ __('translation.answer') }}
                        </button>
                        @foreach ($comment->answers as $answer)

                            <div class="shadow my-3">
                                <h2>{{ $answer->body }}</h2>
                                <h4>{{ __('translation.by') }} :{{ $answer->user->firstname }}
                                    {{ $answer->user->lastname }}
                                </h4>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#answer2">
                                    {{ __('translation.answer') }}
                                </button>
                                @foreach ($answer->answers as $answer2)
                                    <hr>
                                    <div class="container">
                                        <div class="shadow bg-light my-3 py-3">
                                            <h2>{{ $answer2->body }}</h2>
                                            <h4>user :{{ $answer2->user->firstname }} {{ $answer2->user->lastname }}
                                        </div>
                                    </div>

                                    <hr>
                                @endforeach
                                <div class="modal fade " id="answer2" tabindex="-1" aria-labelledby="answer2"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div
                                                class="
                                                        modal-body">
                                                <form action="{{ route('home.content.posts.comment.store') }}"
                                                    method="POST">
                                                    @csrf
                                                    <label for="comment"
                                                        class="form-label">{{ __('translation.commenttext') }}</label>
                                                    <input type="text" class="form-control" name="comment" id="comment">
                                                    <input type="hidden" value="{{ $posttranslation->posts->id }}"
                                                        name="post_id">
                                                    <input type="hidden" value="{{ auth()->user()->id }}"
                                                        name="author_id">
                                                    <input type="hidden" value="{{ $answer->id }}" name="parent_id">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">{{ __('translation.close') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-primary">{{ __('translation.send') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="modal fade" id="answer" tabindex="-1" aria-labelledby="answer" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="
                                                modal-body">
                                        <form action="{{ route('home.content.posts.comment.store') }}" method="POST">
                                            @csrf
                                            <label for="comment"
                                                class="form-label">{{ __('translation.commenttext') }}</label>
                                            <input type="text" class="form-control" name="comment" id="comment">
                                            <input type="hidden" value="{{ $posttranslation->posts->id }}"
                                                name="post_id">
                                            <input type="hidden" value="{{ auth()->user()->id }}" name="author_id">
                                            <input type="hidden" value="{{ $comment->id }}" name="parent_id">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">{{ __('translation.close') }}</button>
                                                <button type="submit"
                                                    class="btn btn-primary">{{ __('translation.save') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            @endforeach
        </div>
        <div class="row justify-content-center fw-bold">
            <p>{{ __('translation.by') }}: {{ $posttranslation->posts->user->firstname }}
                {{ $posttranslation->posts->user->lastname }}</p>
            <p>{{ __('translation.createdat') }}: {{ $posttranslation->posts->created_at }}</p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                {{ __('translation.makenewcomment') }}
            </button>
        </div>
        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('home.content.posts.comment.store') }}" method="POST">
                            @csrf
                            <label for="comment" class="form-label">{{ __('translation.commenttext') }}</label>
                            <input type="text" class="form-control" name="comment" id="comment">
                            <input type="hidden" value="{{ $posttranslation->posts->id }}" name="post_id">
                            <input type="hidden" value="{{ auth()->user()->id }}" name="author_id">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">{{ __('translation.close') }}</button>
                                <button type="submit" class="btn btn-primary">{{ __('translation.save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

{{-- {{ route('home.category.' . "$cat" . '.' . "$sub") }} --}}
