<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ route('home') }}" class="logo">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{ route('home') }}" class="active">{{ __('translation.home') }}</a>
                        </li>
                        <li>
                            <a class="dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">{{ __('translation.categories') }}</a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                @foreach ($categories as $category)
                                    <li> <a class="dropdown-item"
                                            href="{{ route('home.content.category.show', $category->id) }}">
                                            {{ __("translation.$category->title") }} &raquo; </a>
                                        <ul class="submenu dropdown-menu">
                                            @foreach ($category->subcategories as $subcategory)
                                                <li><a class="dropdown-item"
                                                        href="{{ route('home.content.subcategory.show', $subcategory->id) }}">{{ __("translation.$subcategory->name") }}</a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a class="dropdown-toggle" href="#" id="language" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">{{ __('translation.language') }}</a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="language">

                                <li> <a class="dropdown-item" href="/fa"> {{ __('translation.farsi') }} </a></li>
                                <li> <a class="dropdown-item" href="/en"> {{ __('translation.english') }} </a></li>

                            </ul>
                        </li>
                        @auth
                            <li>
                                <a class="dropdown-toggle" href="#" id="language" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">{{ __('translation.exam') }}</a>
                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="language">
                                    @foreach ($exams as $exam)
                                    <li> <a class="dropdown-item" href="{{route("home.content.exams.show",$exam->id)}}"> {{$exam->name}} </a></li>
                                    @endforeach
                                    <li> <a class="dropdown-item" href="{{route("home.content.exams.index")}}"> {{__("translation.examall")}} </a></li>
                                </ul>
                            </li>
                        @endauth
                        @auth

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="btn text-white" type="submit">{{ __('translation.logout') }}</button>
                                    <span>
                                        <img src="{{ asset('assets/images/car.jpg') }}" style="width: 45px;height:45px;"
                                            class="rounded-circle" alt="">
                                    </span>
                                </form>

                            </li>
                        @endauth
                        @guest
                            <li>
                                <div class="main-white-button"><a href="{{ route('register') }}"><i
                                            class="fa fa-plus"></i>
                                        {{ __('translation.login') }}/{{ __('translation.signup') }}</a>
                                </div>
                            </li>
                        @endguest

                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->

{{-- "home.category.".$category->title,$category->id --}}
{{-- {{route("home.category.".$category->title.".".$subcategory->name,$subcategory->id)}} --}}
