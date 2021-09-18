@extends('shop.layouts.master')
@section('content')
<style>
  .noData {
    text-align: center;
  }
</style>
  <!--======= SUB BANNER =========-->
  <section class="sub-bnr" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
      <div class="container">
        <h4>PAVSHOP PRODUCTS</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula.
          Sed feugiat, tellus vel tristique posuere, diam</p>
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Products</li>
        </ol>
      </div>
    </div>
  </section>

  <!-- Content -->
  <div id="content">

    <!-- Products -->
    <section class="shop-page padding-top-100 padding-bottom-100">
      <div class="container">
        <div class="row">

          <!-- Shop SideBar -->
          <div class="col-sm-3">
            <div class="shop-sidebar">
              <!-- Category -->
              <h5 class="shop-tittle margin-bootom-30">Product Category</h5>
              <ul class="shop-cate">
                @foreach ($productcategory as $item)
                <li><a href="{{ url('product/category/'.$item->slug) }}"> {{ $item->name }} <span></span></a></li>
                @endforeach
              </ul>
              <h5 class="shop-tittle margin-bootom-30">Pet Category</h5>
              <ul class="shop-cate">
                @foreach ($petcategory as $item)
                <li><a href="{{ url('pet/category/'.$item->slug) }}"> {{ $item->name }} <span></span></a></li>
                @endforeach
              </ul>
            </div>
          </div>

          <!-- Item Content -->
          <div class="col-sm-9">
            <div class="item-display">
              <div class="row">
                <div class="col-xs-6"> <span class="product-num">Showing 1 - 10 of 30 products</span> </div>

                <!-- Products Select -->
                <div class="col-xs-6">
                  <div class="pull-right">

                    <!-- Short By -->
                    <select class="selectpicker">
                      <option>Short By</option>
                      <option>Short By</option>
                      <option>Short By</option>
                    </select>
                    <!-- Filter By -->
                    <select class="selectpicker">
                      <option>Filter By</option>
                      <option>Short By</option>
                      <option>Short By</option>
                    </select>

                </div>
              </div>
            </div>

            <!-- Popular Item Slide -->
            <div class="papular-block row">
              @forelse ($pet as $p)
              @php
              $i=1;
              @endphp
              <!-- Item -->
              <div class="col-md-4">
                <div class="item">
                  <!-- Item img -->
                  @if ($p->image->first()->extra_large == null || $p->image->first()->extra_large == '')
                  <div class="item-img"> <img class="img-1" src="{{asset('shop/images/no-image.png')}}" alt="" style="width: 270px;height: 352px"> <img class="img-2" src="{{asset('shop/images/no-image.png')}}" alt="" style="width: 270px;height: 352px">
                    <!-- Overlay -->
                    <div class="overlay">
                      <div class="position-center-center">
                        <div class="inn">
                          <a href="{{asset('shop/images/no-image.png')}}" data-lighter>
                            <i class="icon-magnifier"></i>
                          </a>
                          <a href="#.">
                            <i class="icon-basket"></i>
                          </a>
                          <a href="#." >
                            <i class="icon-heart"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  @else
                  <div class="item-img"> <img class="img-1" src="{{asset('storage/'.$p->image->first()->extra_large)}}" alt="" style="width: 270px;height: 352px"> <img class="img-2" src="{{asset('storage/'.$p->image->first()->extra_large)}}" alt="" style="width: 270px;height: 352px">
                    <!-- Overlay -->
                    <div class="overlay">
                      <div class="position-center-center">
                        <div class="inn">
                          <a href="{{asset('storage/'.$p->image->first()->extra_large)}}" data-lighter>
                            <i class="icon-magnifier"></i>
                          </a>
                          <a href="#." class="add-cart cart{{ $i++ }}">
                            <i class="icon-basket"></i>
                          </a>
                          <a href="#." >
                            <i class="icon-heart"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endif
                  <!-- Item Name -->
                  <div class="item-name"> <a href="{{url('/pet/detail/'.$p->slug)}}">{{ $p->name }}</a>
                    <p>{{ $p->detail }}</p>
                  </div>
                  <!-- Price -->
                  <span class="price"><small>Rp.</small>{{ number_format($p->price) }}</span> </div>
              </div>
              @empty
              <p>No data available</p>
              @endforelse
              @forelse ($product as $p)
              @php
              $i=1;
              @endphp
              <!-- Item -->
              <div class="col-md-4">
                <div class="item">
                  @if($p->discount > 0)
                  <div class="on-sale"> {{ $p->discount }}% <span>OFF</span> </div>
                  @else
                  @endif
                  <!-- Item img -->
                  @if ($p->image->first()->extra_large == null || $p->image->first()->extra_large == '')
                  <div class="item-img"> <img class="img-1" src="{{asset('shop/images/no-image.png')}}" alt="" style="width: 270px;height: 352px"> <img class="img-2" src="{{asset('shop/images/no-image.png')}}" alt="" style="width: 270px;height: 352px">
                    <!-- Overlay -->
                    <div class="overlay">
                      <div class="position-center-center">
                        <div class="inn">
                          <a href="{{asset('shop/images/no-image.png')}}" data-lighter>
                            <i class="icon-magnifier"></i>
                          </a>
                          <a href="#.">
                            <i class="icon-basket"></i>
                          </a>
                          <a href="#." >
                            <i class="icon-heart"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  @else
                  <div class="item-img"> <img class="img-1" src="{{asset('storage/'.$p->image->first()->extra_large)}}" alt="" style="width: 270px;height: 352px"> <img class="img-2" src="{{asset('storage/'.$p->image->first()->extra_large)}}" alt="" style="width: 270px;height: 352px">
                    <!-- Overlay -->
                    <div class="overlay">
                      <div class="position-center-center">
                        <div class="inn">
                          <a href="{{asset('storage/'.$p->image->first()->extra_large)}}" data-lighter>
                            <i class="icon-magnifier"></i>
                          </a>
                          <a href="#." class="add-cart cart{{ $i++ }}">
                            <i class="icon-basket"></i>
                          </a>
                          <a href="#." >
                            <i class="icon-heart"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endif
                  <!-- Item Name -->
                  <div class="item-name"> <a href="{{url('/product-detail/'.$p->id)}}">{{ $p->name }}</a>
                    <p>{{ $p->detail }}</p>
                  </div>
                  <!-- Price -->
                  <span class="price"><small>Rp.</small>{{ number_format($p->retail_price) }}</span> </div>
              </div>
              @empty
              <p>No data available</p>
              @endforelse
            </div>
            {{ $pet->links('vendor.pagination.custom') }}
          </div>
        </div>
      </div>
    </section>
</div>
@endsection
