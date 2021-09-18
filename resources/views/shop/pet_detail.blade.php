@extends('shop.layouts.master')
@section('content')
  <!--======= SUB BANNER =========-->
  <section class="sub-bnr" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
      <div class="container">
        <h4>WOOD CHAIR</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula.
          Sed feugiat, tellus vel tristique posuere, diam</p>
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Products Detail</li>
        </ol>
      </div>
    </div>
  </section>

  <!-- Content -->
  <div id="content">

    <!-- Popular Products -->
    <section class="padding-top-100 padding-bottom-100">
      <div class="container">

        <!-- SHOP DETAIL -->
        <div class="shop-detail">
          <div class="row">

            <!-- Popular Images Slider -->
            <div class="col-md-7">

              <!-- Images Slider -->
              <div class="images-slider">
                <ul class="slides">
                  @foreach ($pet->image as $item)
                  <li data-thumb="{{ asset('storage/'.$item->extra_large) }}"> <img class="img-responsive" src="{{ asset('storage/'.$item->extra_large) }}"  alt=""> </li>
                  @endforeach
                </ul>
              </div>
            </div>

            <!-- COntent -->
            <div class="col-md-5">
              <h4>{{ $pet->name }}</h4>
              <span class="price"><small>Rp</small>{{ number_format($pet->price) }}</span>

              <!-- Sale Tags -->
              <ul class="item-owner">
                <li>Category :<a href="{{ url('pet/category/'.$pet->category->slug) }}"><span> {{ $pet->category->name }}</span></a></li>
                <li>Stock:<span> {{ $pet->stock }}</span></li>
              </ul>

              <!-- Item Detail -->
              <p>
                {!! $pet->description !!}
              </p>

              <!-- Short By -->
              <div class="some-info">
                <ul class="row margin-top-30">
                  <!-- ADD TO CART -->
                  <li class="col-xs-6"> <a href="#." class="btn">BUY</a> </li>

                  <!-- LIKE -->
                  <li class="col-xs-6"> <a href="#." class="like-us"><i class="icon-heart"></i></a> </li>
                </ul>

                <!-- INFOMATION -->
                <div class="inner-info">
                  <!-- Social Icons -->
                  <ul class="social_icons">
                    <li><a href="#."><i class="icon-social-facebook"></i></a></li>
                    <li><a href="#."><i class="icon-social-twitter"></i></a></li>
                    <li><a href="#."><i class="icon-social-tumblr"></i></a></li>
                    <li><a href="#."><i class="icon-social-youtube"></i></a></li>
                    <li><a href="#."><i class="icon-social-dribbble"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Popular Products -->
    <section class="light-gray-bg padding-top-150 padding-bottom-150">
      <div class="container">

        <!-- Main Heading -->
        <div class="heading text-center">
          <h4>YOU MAY LIKE IT</h4>
          <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula.
          Sed feugiat, tellus vel tristique posuere, diam</span> </div>

        <!-- Popular Item Slide -->
        <div class="papular-block block-slide">

            @foreach ($petsame as $item)
            <!-- Item -->
            <div class="item">
              <!-- Item img -->
              <div class="item-img"> <img class="img-1" src="{{asset('storage/'.$item->image->first()->medium)}}" alt="" > <img class="img-2" src="{{asset('storage/'.$item->image->first()->medium)}}" alt="" >
                <!-- Overlay -->
                <div class="overlay">
                  <div class="position-center-center">
                    <div class="inn"><a href="{{asset('shop/images/product-1.jpg')}}" data-lighter><i class="icon-magnifier"></i></a> <a href="#."><i class="icon-basket"></i></a> <a href="#." ><i class="icon-heart"></i></a></div>
                  </div>
                </div>
              </div>
              <!-- Item Name -->
              <div class="item-name"> <a href="{{ url('pet/detail/'.$item->slug) }}">{{ $item->name }}</a>
                {{-- <p>Lorem ipsum dolor sit amet</p> --}}
              </div>
              <!-- Price -->
              <span class="price"><small>Rp</small>{{ number_format($item->price) }}</span>
            </div>
          @endforeach
        </div>
      </div>
    </section>
@endsection
