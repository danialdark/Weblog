@extends('layouts.master')
@section('content')

    <div class="main-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="top-text header-text">
                        <h6>Over 36,500+ Active Listings</h6>
                        <h2>Find Nearby Places &amp; Things</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <form id="search-form" name="gs" method="submit" role="search" action="#">
                        <div class="row">
                            <div class="col-lg-3 align-self-center">
                                <fieldset>
                                    <select name="area" class="form-select" aria-label="Area" id="chooseCategory"
                                        onchange="this.form.click()">
                                        <option selected>All Areas</option>
                                        <option value="New Village">New Village</option>
                                        <option value="Old Town">Old Town</option>
                                        <option value="Modern City">Modern City</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-3 align-self-center">
                                <fieldset>
                                    <input type="address" name="address" class="searchText"
                                        placeholder="Enter a location" autocomplete="on" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-3 align-self-center">
                                <fieldset>
                                    <select name="price" class="form-select" aria-label="Default select example"
                                        id="chooseCategory" onchange="this.form.click()">
                                        <option selected>Price Range</option>
                                        <option value="$100 - $250">$100 - $250</option>
                                        <option value="$250 - $500">$250 - $500</option>
                                        <option value="$500 - $1000">$500 - $1,000</option>
                                        <option value="$1000+">$1,000 or more</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-3">
                                <fieldset>
                                    <button class="main-button"><i class="fa fa-search"></i> Search Now</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-10 offset-lg-1">
                    <ul class="categories">
                        <li><a href="category.html"><span class="icon"><img src="assets/images/apartment.svg"
                                        alt="Home"></span> Apartments</a></li>
                        <li><a href="listing.html"><span class="icon"><img src="assets/images/cloth.svg"
                                        alt="Food"></span> clothes</a></li>
                        <li><a href="#"><span class="icon"><img src="assets/images/car.svg" alt="Vehicle"></span>
                                Cars</a></li>
                        <li><a href="#"><span class="icon"><img src="assets/images/watch.svg"
                                        alt="Shopping"></span> watch</a></li>
                        <li><a href="#"><span class="icon"><img src="assets/images/motor.svg" alt="Travel"></span>
                                motorcycle</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="popular-categories">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Make Your Sell List</h2>

                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="naccs">
                        <div class="grid">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="menu">
                                        <div class="first-thumb active">
                                            <div class="thumb">
                                                <span class="icon"><img src="assets/images/apartment.svg"
                                                        alt=""></span>
                                                Apartments
                                            </div>
                                        </div>
                                        <div>
                                            <div class="thumb">
                                                <span class="icon"><img src="assets/images/cloth.svg"
                                                        alt=""></span>
                                                clothes
                                            </div>
                                        </div>
                                        <div>
                                            <div class="thumb">
                                                <span class="icon"><img src="assets/images/car.svg" alt=""></span>
                                                Cars
                                            </div>
                                        </div>
                                        <div>
                                            <div class="thumb">
                                                <span class="icon"><img src="assets/images/watch.svg"
                                                        alt=""></span>
                                                watch
                                            </div>
                                        </div>
                                        <div class="last-thumb">
                                            <div class="thumb">
                                                <span class="icon"><img src="assets/images/motor.svg"
                                                        alt=""></span>
                                                motorcycle
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9 align-self-center">
                                    <ul class="nacc">
                                        <li class="active">
                                            <div>
                                                <div class="thumb">
                                                    <div class="row">
                                                        <div class="col-lg-5 align-self-center">
                                                            <div class="left-text">
                                                                <form action="{{ route('store') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="data" value="apartment">
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control"
                                                                            name="area" id="area" placeholder="25meter">
                                                                        <label for="area">area(meter)</label>
                                                                    </div>
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control"
                                                                            name="rooms" id="rooms" placeholder="rooms">
                                                                        <label for="rooms">rooms</label>
                                                                    </div>
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control"
                                                                            name="price" id="price" placeholder="price">
                                                                        <label for="price">price</label>
                                                                    </div>
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control"
                                                                            name="seller" id="seller" placeholder="seller">
                                                                        <label for="seller">seller</label>
                                                                    </div>

                                                                    <div class="text-center">
                                                                        <button id="makebtn"
                                                                            class="btn btn-dark btn-lg">make</button>
                                                                    </div>
                                                                </form>


                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7 align-self-center">
                                                            <div class="right-image">
                                                                <img src="assets/images/tabs-image-01.jpg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <div class="thumb">
                                                    <div class="row">
                                                        <div class="col-lg-5 align-self-center">
                                                            <div class="left-text">
                                                                <form action="{{ route('store') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="data" value="cloth">
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control"
                                                                            name="size" id="size" placeholder="25">
                                                                        <label for="size">size</label>
                                                                    </div>
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control"
                                                                            name="brand" id="brand" placeholder="brand">
                                                                        <label for="brand">brand</label>
                                                                    </div>
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control"
                                                                            name="price" id="price" placeholder="price">
                                                                        <label for="price">price</label>
                                                                    </div>
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control"
                                                                            name="seller" id="seller" placeholder="seller">
                                                                        <label for="seller">seller</label>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <button id="makebtn1" class="btn btn-dark btn-lg">make</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7 align-self-center">
                                                            <div class="right-image">
                                                                <img src="assets/images/cloth.jpg" alt="Foods on the table">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <div class="thumb">
                                                    <div class="row">
                                                        <div class="col-lg-5 align-self-center">
                                                            <div class="left-text">
                                                                <form action="{{ route('store') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="data" value="car">
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control"
                                                                            name="model" id="model" placeholder="model">
                                                                        <label for="model">model</label>
                                                                    </div>
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control"
                                                                            name="type" id="type" placeholder="type">
                                                                        <label for="type">type</label>
                                                                    </div>
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control"
                                                                            name="price" id="price" placeholder="price">
                                                                        <label for="price">price</label>
                                                                    </div>
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control"
                                                                            name="seller" id="seller" placeholder="seller">
                                                                        <label for="seller">seller</label>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <button id="makebtn2" class="btn btn-dark btn-lg">make</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7 align-self-center">
                                                            <div class="right-image">
                                                                <img src="assets/images/car.jpg" alt="cars in the city">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <div class="thumb">
                                                    <div class="row">
                                                        <div class="col-lg-5 align-self-center">
                                                            <div class="left-text">
                                                                <form action="{{ route('store') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="data" value="watch">
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control"
                                                                            name="model" id="model" placeholder="model">
                                                                        <label for="model">model</label>
                                                                    </div>
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control"
                                                                            name="brand" id="brand" placeholder="brand">
                                                                        <label for="brand">brand</label>
                                                                    </div>
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control"
                                                                            name="price" id="price" placeholder="price">
                                                                        <label for="price">price</label>
                                                                    </div>
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control"
                                                                            name="seller" id="seller" placeholder="seller">
                                                                        <label for="seller">seller</label>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <button id="makebtn3" class="btn btn-dark btn-lg">make</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7 align-self-center">
                                                            <div class="right-image">
                                                                <img src="assets/images/watch.jpeg" alt="Shopping Girl">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <div class="thumb">
                                                    <div class="row">
                                                        <div class="col-lg-5 align-self-center">
                                                            <div class="left-text">
                                                                <form action="{{ route('store') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="data" value="motor">
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control"
                                                                            name="model" id="model" placeholder="model">
                                                                        <label for="model">model</label>
                                                                    </div>
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control"
                                                                            name="type" id="type" placeholder="type">
                                                                        <label for="type">type</label>
                                                                    </div>
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control"
                                                                            name="price" id="price" placeholder="price">
                                                                        <label for="price">price</label>
                                                                    </div>
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control"
                                                                            name="seller" id="seller" placeholder="seller">
                                                                        <label for="seller">seller</label>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <button id="makebtn4" class="btn btn-dark btn-lg">make</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7 align-self-center">
                                                            <div class="right-image">
                                                                <img src="assets/images/motor.jpg" alt="Traveling Beach">
                                                            </div>
                                                        </div>
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


    <div class="recent-listing">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Recent Listing</h2>
                        <h6>Check Them Out</h6>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="owl-carousel owl-listing">
                        <div class="item">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="listing-item">
                                        <div class="left-image">
                                            <a href="#"><img src="assets/images/listing-01.jpg" alt=""></a>
                                        </div>
                                        <div class="right-content align-self-center">
                                            <a href="#">
                                                <h4>1. First Apartment Unit</h4>
                                            </a>
                                            <h6>by: Sale Agent</h6>
                                            <ul class="rate">
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li>(18) Reviews</li>
                                            </ul>
                                            <span class="price">
                                                <div class="icon"><img src="assets/images/listing-icon-01.png"
                                                        alt=""></div> $450 - $950 / month with taxes
                                            </span>
                                            <span class="details">Details: <em>2760 sq ft</em></span>
                                            <ul class="info">
                                                <li><img src="assets/images/listing-icon-02.png" alt=""> 4 Bedrooms</li>
                                                <li><img src="assets/images/listing-icon-03.png" alt=""> 4 Bathrooms</li>
                                            </ul>
                                            <div class="main-white-button">
                                                <a href="contact.html"><i class="fa fa-eye"></i> Contact Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="listing-item">
                                        <div class="left-image">
                                            <a href="#"><img src="assets/images/listing-02.jpg" alt=""></a>
                                        </div>
                                        <div class="right-content align-self-center">
                                            <a href="#">
                                                <h4>2. Another House of Gaming</h4>
                                            </a>
                                            <h6>by: Top Sale Agent</h6>
                                            <ul class="rate">
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li>(24) Reviews</li>
                                            </ul>
                                            <span class="price">
                                                <div class="icon"><img src="assets/images/listing-icon-01.png"
                                                        alt=""></div> $1,400 - $3,500 / month with taxes
                                            </span>
                                            <span class="details">Details: <em>3650 sq ft</em></span>
                                            <ul class="info">
                                                <li><img src="assets/images/listing-icon-02.png" alt=""> 4 Bedrooms</li>
                                                <li><img src="assets/images/listing-icon-03.png" alt=""> 3 Bathrooms</li>
                                            </ul>
                                            <div class="main-white-button">
                                                <a href="contact.html"><i class="fa fa-eye"></i> Contact Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="listing-item">
                                        <div class="left-image">
                                            <a href="#"><img src="assets/images/listing-03.jpg" alt=""></a>
                                        </div>
                                        <div class="right-content align-self-center">
                                            <a href="#">
                                                <h4>3. Secret Place Hidden House</h4>
                                            </a>
                                            <h6>by: Best Property</h6>
                                            <ul class="rate">
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li>(36) Reviews</li>
                                            </ul>
                                            <span class="price">
                                                <div class="icon"><img src="assets/images/listing-icon-01.png"
                                                        alt=""></div> $1,500 - $3,600 / month with taxes
                                            </span>
                                            <span class="details">Details: <em>5500 sq ft</em></span>
                                            <ul class="info">
                                                <li><img src="assets/images/listing-icon-02.png" alt=""> 4 Bedrooms</li>
                                                <li><img src="assets/images/listing-icon-03.png" alt=""> 3 Bathrooms</li>
                                            </ul>
                                            <div class="main-white-button">
                                                <a href="contact.html"><i class="fa fa-eye"></i> Contact Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="listing-item">
                                        <div class="left-image">
                                            <a href="#"><img src="assets/images/listing-04.jpg" alt=""></a>
                                        </div>
                                        <div class="right-content align-self-center">
                                            <a href="#">
                                                <h4>4. Sunshine Fourth Apartment</h4>
                                            </a>
                                            <h6>by: Sale Agent</h6>
                                            <ul class="rate">
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li>(24) Reviews</li>
                                            </ul>
                                            <span class="price">
                                                <div class="icon"><img src="assets/images/listing-icon-01.png"
                                                        alt=""></div> $3,600 / month with taxes
                                            </span>
                                            <span class="details">Details: <em>3660 sq ft</em></span>
                                            <ul class="info">
                                                <li><img src="assets/images/listing-icon-02.png" alt=""> 5 Bedrooms</li>
                                                <li><img src="assets/images/listing-icon-03.png" alt=""> 3 Bathrooms</li>
                                            </ul>
                                            <div class="main-white-button">
                                                <a href="contact.html"><i class="fa fa-eye"></i> Contact Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="listing-item">
                                        <div class="left-image">
                                            <a href="#"><img src="assets/images/listing-05.jpg" alt=""></a>
                                        </div>
                                        <div class="right-content align-self-center">
                                            <a href="#">
                                                <h4>5. Best House Of the Town</h4>
                                            </a>
                                            <h6>by: Sale Agent</h6>
                                            <ul class="rate">
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li>(32) Reviews</li>
                                            </ul>
                                            <span class="price">
                                                <div class="icon"><img src="assets/images/listing-icon-01.png"
                                                        alt=""></div> $5,600 / month with taxes
                                            </span>
                                            <span class="details">Details: <em>1750 sq ft</em></span>
                                            <ul class="info">
                                                <li><img src="assets/images/listing-icon-02.png" alt=""> 6 Bedrooms</li>
                                                <li><img src="assets/images/listing-icon-03.png" alt=""> 3 Bathrooms</li>
                                            </ul>
                                            <div class="main-white-button">
                                                <a href="contact.html"><i class="fa fa-eye"></i> Contact Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="listing-item">
                                        <div class="left-image">
                                            <a href="#"><img src="assets/images/listing-06.jpg" alt=""></a>
                                        </div>
                                        <div class="right-content align-self-center">
                                            <a href="#">
                                                <h4>6. Amazing Pool Party Villa</h4>
                                            </a>
                                            <h6>by: Sale Agent</h6>
                                            <ul class="rate">
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li>(40) Reviews</li>
                                            </ul>
                                            <span class="price">
                                                <div class="icon"><img src="assets/images/listing-icon-01.png"
                                                        alt=""></div> $3,850 / month with taxes
                                            </span>
                                            <span class="details">Details: <em>3660 sq ft</em></span>
                                            <ul class="info">
                                                <li><img src="assets/images/listing-icon-02.png" alt=""> 4 Bedrooms</li>
                                                <li><img src="assets/images/listing-icon-03.png" alt=""> 3 Bathrooms</li>
                                            </ul>
                                            <div class="main-white-button">
                                                <a href="contact.html"><i class="fa fa-eye"></i> Contact Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="listing-item">
                                        <div class="left-image">
                                            <a href="#"><img src="assets/images/listing-05.jpg" alt=""></a>
                                        </div>
                                        <div class="right-content align-self-center">
                                            <a href="#">
                                                <h4>7. Sunny Apartment</h4>
                                            </a>
                                            <h6>by: Sale Agent</h6>
                                            <ul class="rate">
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li>(24) Reviews</li>
                                            </ul>
                                            <span class="price">
                                                <div class="icon"><img src="assets/images/listing-icon-01.png"
                                                        alt=""></div> $5,450 / month with taxes
                                            </span>
                                            <span class="details">Details: <em>1640 sq ft</em></span>
                                            <ul class="info">
                                                <li><img src="assets/images/listing-icon-02.png" alt=""> 8 Bedrooms</li>
                                                <li><img src="assets/images/listing-icon-03.png" alt=""> 5 Bathrooms</li>
                                            </ul>
                                            <div class="main-white-button">
                                                <a href="contact.html"><i class="fa fa-eye"></i> Contact Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="listing-item">
                                        <div class="left-image">
                                            <a href="#"><img src="assets/images/listing-02.jpg" alt=""></a>
                                        </div>
                                        <div class="right-content align-self-center">
                                            <a href="#">
                                                <h4>8. Third House of Gaming</h4>
                                            </a>
                                            <h6>by: Sale Agent</h6>
                                            <ul class="rate">
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li>(15) Reviews</li>
                                            </ul>
                                            <span class="price">
                                                <div class="icon"><img src="assets/images/listing-icon-01.png"
                                                        alt=""></div> $5,520 / month with taxes
                                            </span>
                                            <span class="details">Details: <em>1660 sq ft</em></span>
                                            <ul class="info">
                                                <li><img src="assets/images/listing-icon-02.png" alt=""> 5 Bedrooms</li>
                                                <li><img src="assets/images/listing-icon-03.png" alt=""> 4 Bathrooms</li>
                                            </ul>
                                            <div class="main-white-button">
                                                <a href="contact.html"><i class="fa fa-eye"></i> Contact Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="listing-item">
                                        <div class="left-image">
                                            <a href="#"><img src="assets/images/listing-06.jpg" alt=""></a>
                                        </div>
                                        <div class="right-content align-self-center">
                                            <a href="#">
                                                <h4>9. Relaxing BBQ Party Villa</h4>
                                            </a>
                                            <h6>by: Sale Agent</h6>
                                            <ul class="rate">
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li>(20) Reviews</li>
                                            </ul>
                                            <span class="price">
                                                <div class="icon"><img src="assets/images/listing-icon-01.png"
                                                        alt=""></div> $4,760 / month with taxes
                                            </span>
                                            <span class="details">Details: <em>2880 sq ft</em></span>
                                            <ul class="info">
                                                <li><img src="assets/images/listing-icon-02.png" alt=""> 6 Bedrooms</li>
                                                <li><img src="assets/images/listing-icon-03.png" alt=""> 4 Bathrooms</li>
                                            </ul>
                                            <div class="main-white-button">
                                                <a href="contact.html"><i class="fa fa-eye"></i> Contact Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $("#makebtn").click(function(){
            swal("Good job!", "your list has been made!", "success");
        })
        $("#makebtn1").click(function(){
            swal("Good job!", "your list has been made!", "success");
        })
        $("#makebtn2").click(function(){
            swal("Good job!", "your list has been made!", "success");
        })
        $("#makebtn3").click(function(){
            swal("Good job!", "your list has been made!", "success");
        })
        $("#makebtn4").click(function(){
            swal("Good job!", "your list has been made!", "success");
        })

    })
</script>

@endsection
