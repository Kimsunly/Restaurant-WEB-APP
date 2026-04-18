@extends('layouts.app')
@section('title', 'Menu - Feane')
@section('body_class', 'sub_page')
@section('content')
    <div class="hero_area">
        <div class="bg-box">
            <img src="{{ asset('assets/images/hero-bg.jpg') }}" alt="">
        </div>

        @include('partials.feane-header')
    </div>
    <!-- food section -->

    <section class="food_section layout_padding-bottom">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Our Menu
                </h2>
            </div>

            <ul class="filters_menu">
                <li class="active" data-filter="*">All</li>
                <li data-filter=".burger">Burger</li>
                <li data-filter=".pizza">Pizza</li>
                <li data-filter=".pasta">Pasta</li>
                <li data-filter=".fries">Fries</li>
            </ul>

            <div class="filters-content">
                <div class="row grid">
                    @forelse($menus as $item)
                        <div class="col-sm-6 col-lg-4 all {{ $item->category }}">
                            <div class="box">
                                <div class="img-box">
                                    @if($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
                                    @else
                                        <img src="{{ asset('assets/images/f1.png') }}" alt="{{ $item->name }}">
                                    @endif
                                </div>
                                <div class="detail-box">
                                    <h5>{{ $item->name }}</h5>
                                    <p>{{ $item->description }}</p>
                                    <div class="options">
                                        <h6>${{ number_format($item->price, 2) }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center w-100">No menu items yet.</p>
                    @endforelse
                </div>
            </div>
            <div class="btn-box">
                <a href="">
                    View More
                </a>
            </div>
        </div>
    </section>

    <!-- end food section -->
@endsection