@extends('shop.layouts.master')  
@section('content')
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
              <h5 class="shop-tittle margin-bottom-30">category</h5>
              <ul class="shop-cate">
                <li><a href="#."> Pets <span>24</span></a></li>
                <li><a href="#."> Pet Products <span>122</span></a></li>
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
              @forelse ($product as $p)
              <!-- Item -->
              <div class="col-md-4">
                <div class="item"> 
                  @if($p->discount > 0)
                  <div class="on-sale"> {{ $p->discount }}% <span>OFF</span> </div>
                  @else
                  @endif
                  <!-- Item img -->
                  @if ($p->product_image == null || $p->product_image == '')
                  <div class="item-img"> <img class="img-1" src="{{asset('shop/images/no-image.png')}}" alt="" style="width: 270px;height: 352px"> <img class="img-2" src="{{asset('shop/images/no-image.png')}}" alt="" style="width: 270px;height: 352px"> 
                    <!-- Overlay -->
                    <div class="overlay">
                      <div class="position-center-center">
                        <div class="inn"><a href="{{asset('shop/images/no-image.png')}}" data-lighter><i class="icon-magnifier"></i></a> <a href="#."><i class="icon-basket"></i></a> <a href="#." ><i class="icon-heart"></i></a></div>
                      </div>
                    </div>
                  </div>
                  @else
                  <div class="item-img"> <img class="img-1" src="{{asset('storage/'.$p->product_image)}}" alt="" style="width: 270px;height: 352px"> <img class="img-2" src="{{asset('storage/'.$p->product_image)}}" alt="" style="width: 270px;height: 352px"> 
                    <!-- Overlay -->
                    <div class="overlay">
                      <div class="position-center-center">
                        <div class="inn"><a href="{{asset('storage/'.$p->product_image)}}" data-lighter><i class="icon-magnifier"></i></a> <a href="#."><i class="icon-basket"></i></a> <a href="#." ><i class="icon-heart"></i></a></div>
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
            
            <!-- Pagination -->
            <ul class="pagination">
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection