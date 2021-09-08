@extends('shop.layouts.master')
@section('content')
<!-- LOADER -->
<div id="loader">
  <div class="position-center-center">
    <div class="ldr"></div>
  </div>
</div>

<!-- Wrap -->
<div id="wrap"> 
  <!--======= HOME MAIN SLIDER =========-->
  <section class="home-slider"> 
    
    <!-- SLIDE Start -->
    <div class="tp-banner-container">
      <div class="tp-banner">
        <ul>
          <!-- SLIDE  -->
          <li data-transition="random" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" > 
            <!-- MAIN IMAGE --> 
            <img src="{{asset('shop/images/slide1.jpg')}}"  alt="slider"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"> 
            <div class="tp-caption lfb tp-resizeme" 
                data-x="left" data-hoffset="0" 
                data-y="center" data-voffset="240" 
                data-speed="800" 
                data-start="500" 
                data-easing="Power3.easeInOut" 
                data-elementdelay="0.1" 
                data-endelementdelay="0.1" 
                data-endspeed="300" 
                data-scrolloffset="0"
                style="z-index: 8;"><a href="#." class="btn">SHOP NOW</a> </div>
          </li>
          
          <!-- SLIDE  -->
          <li data-transition="random" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" > 
            <!-- MAIN IMAGE --> 
            <img src="{{asset('shop/images/slide2.jpg')}}" alt="slider"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"> 
             <!-- LAYER NR. 4 -->
            <div class="tp-caption lfb tp-scrollbelowslider tp-resizeme" 
                data-x="center" data-hoffset="500" 
                data-y="center" data-voffset="240" 
                data-speed="800" 
                data-start="500" 
                data-easing="Power3.easeInOut" 
                data-elementdelay="0.1" 
                data-endelementdelay="0.1" 
                data-endspeed="300" 
                data-scrolloffset="0"
                style="z-index: 8;"><a href="#." class="btn">SHOP NOW</a> 
              </div>
          </li>
        </ul>
      </div>
    </div>
  </section>
  
  <!-- Content -->
  <div id="content"> 
    
    <!-- New Arrival -->
    <section class="padding-top-100 padding-bottom-100">
      <div class="container"> 
        
        <!-- Main Heading -->
        <div class="heading text-center">
          <h4>new arrival</h4>
          <span>New pets now available!</span> </div>
      </div>
      
      <!-- New Arrival -->
      <div class="arrival-block"> 
        
        <!-- Item -->
        <div class="item"> 
          <!-- Images --> 
          <img class="img-1" src="{{asset('shop/images/cat1.jpg')}}" alt=""> <img class="img-2" src="{{asset('shop/images/cat1.jpg')}}" alt=""> 
          <!-- Overlay  -->
          <div class="overlay"> 
            <!-- Price --> 
            <span class="price"><small>$</small>299</span>
            <div class="position-center-center"> <a href="{{asset('shop/images/cat1.jpg')}}" data-lighter><i class="icon-magnifier"></i></a> </div>
          </div>
          <!-- Item Name -->
          <div class="item-name"> <a href="#.">ORANGE TABBY CAT</a>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          </div>
        </div>
        
        <!-- Item -->
        <div class="item"> 
          <!-- Images --> 
          <img class="img-1" src="{{asset('shop/images/dog1.jpg')}}" alt=""> <img class="img-2" src="{{asset('shop/images/dog1.jpg')}}" alt=""> 
          <!-- Overlay  -->
          <div class="overlay"> 
            <!-- Price --> 
            <span class="price"><small>$</small>299</span>
            <div class="position-center-center"> <a href="{{asset('shop/images/dog1.jpg')}}" data-lighter><i class="icon-magnifier"></i></a> </div>
          </div>
          <!-- Item Name -->
          <div class="item-name"> <a href="#.">BROWN LABRADOR DOG</a>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          </div>
        </div>
        
        <!-- Item -->
        <div class="item"> 
          <!-- Images --> 
          <img class="img-1" src="{{asset('shop/images/rabbit1.jpg')}}" alt=""> <img class="img-2" src="{{asset('shop/images/rabbit1.jpg')}}" alt=""> 
          <!-- Overlay  -->
          <div class="overl
          
          ay"> 
            <!-- Price --> 
            <span class="price"><small>$</small>299</span>
            <div class="position-center-center"> <a href="{{asset('shop/images/rabbit1.jpg')}}" data-lighter><i class="icon-magnifier"></i></a> </div>
          </div>
          <!-- Item Name -->
          <div class="item-name"> <a href="#.">STRIPE RABBIT</a>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          </div>
        </div>
        
        <!-- Item -->
        <div class="item"> 
          <!-- Images --> 
          <img class="img-1" src="{{asset('shop/images/dog2.jpg')}}" alt=""> <img class="img-2" src="{{asset('shop/images/dog2.jpg')}}" alt=""> 
          <!-- Overlay  -->
          <div class="overlay"> 
            <!-- Price --> 
            <span class="price"><small>$</small>299</span>
            <div class="position-center-center"> <a href="{{asset('shop/images/dog2.jpg')}}" data-lighter><i class="icon-magnifier"></i></a> </div>
          </div>
          <!-- Item Name -->
          <div class="item-name"> <a href="#.">CIHUAHUA DOG</a>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          </div>
        </div>
        
        
    </section>
    
    <!-- Popular PET Products -->
    <section class="padding-top-50 padding-bottom-150">
      <div class="container"> 
        
        <!-- Main Heading -->
        <div class="heading text-center">
          <h4>popular pet products</h4>
          <span>Products best seller at our shop</span> </div>
        
        <!-- Popular Item Slide -->
        <div class="papular-block block-slide"> 
          
          <!-- Item -->
          <div class="item"> 
            <!-- Item img -->
            <div class="item-img"> <img class="img-1" src="{{asset('shop/images/food1.jpg')}}" alt="" > <img class="img-2" src="{{asset('shop/images/food1.jpg')}}" alt="" > 
              <!-- Overlay -->
              <div class="overlay">
                <div class="position-center-center">
                  <div class="inn"><a href="{{asset('shop/images/food1.jpg')}}" data-lighter><i class="icon-magnifier"></i></a> <a href="#." data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-basket"></i></a> <a href="#." data-toggle="tooltip" data-placement="top" title="Add To WishList"><i class="icon-heart"></i></a></div>
                </div>
              </div>
            </div>
            <!-- Item Name -->
            <div class="item-name"> <a href="{{url('/product-detail')}}">DIVINUS</a>
              <p>Dog Food</p>
            </div>
            <!-- Price --> 
            <span class="price"><small>$</small>299</span> </div>
          
          <!-- Item -->
          <div class="item"> 
            <!-- Item img -->
            <div class="item-img"> <img class="img-1" src="{{asset('shop/images/food2.jpg')}}" alt="" > <img class="img-2" src="{{asset('shop/images/food2.jpg')}}" alt="" > 
              <!-- Overlay -->
              <div class="overlay">
                <div class="position-center-center">
                  <div class="inn"><a href="{{asset('shop/images/food2.jpg')}}" data-lighter><i class="icon-magnifier"></i></a> <a href="#." data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-basket"></i></a> <a href="#." data-toggle="tooltip" data-placement="top" title="Add To WishList"><i class="icon-heart"></i></a></div>
                </div>
              </div>
            </div>
            <!-- Item Name -->
            <div class="item-name"> <a href="{{url('/product-detail')}}">WHISKAS</a>
              <p>Cat Food</p>
            </div>
            <!-- Price --> 
            <span class="price"><small>$</small>299</span> </div>
          
          <!-- Item -->
          <div class="item"> 
            <!-- Item img -->
            <div class="item-img"> <img class="img-1" src="{{asset('shop/images/product1.jpg')}}" alt="" > <img class="img-2" src="{{asset('shop/images/product1.jpg')}}" alt="" > 
              <!-- Overlay -->
              <div class="overlay">
                <div class="position-center-center">
                  <div class="inn"><a href="{{asset('shop/images/product1.jpg')}}" data-lighter><i class="icon-magnifier"></i></a> <a href="#." data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-basket"></i></a> <a href="#." data-toggle="tooltip" data-placement="top" title="Add To WishList"><i class="icon-heart"></i></a></div>
                </div>
              </div>
            </div>
            <!-- Item Name -->
            <div class="item-name"> <a href="{{url('/product-detail')}}">cat cage</a>
              <p>Cage For Cat</p>
            </div>
            <!-- Price --> 
            <span class="price"><small>$</small>299</span> </div>
          
          <!-- Item -->
          <div class="item"> 
            <!-- Item img -->
            <div class="item-img"> <img class="img-1" src="{{asset('shop/images/product2.jpg')}}" alt="" > <img class="img-2" src="{{asset('shop/images/product2.jpg')}}" alt="" > 
              <!-- Overlay -->
              <div class="overlay">
                <div class="position-center-center">
                  <div class="inn"><a href="{{asset('shop/images/product2.jpg')}}" data-lighter><i class="icon-magnifier"></i></a> <a href="#." data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-basket"></i></a> <a href="#." data-toggle="tooltip" data-placement="top" title="Add To WishList"><i class="icon-heart"></i></a></div>
                </div>
              </div>
            </div>
            <!-- Item Name -->
            <div class="item-name"> <a href="{{url('/product-detail')}}">Dog Cage</a>
              <p>Cage For Dog</p>
            </div>
            <!-- Price --> 
            <span class="price"><small>$</small>299</span> </div>
        </div>
      </div>
    </section>
    
    <!-- Popular PET Services -->
    <section class="padding-top-50 padding-bottom-150">
      <div class="container"> 
        
        <!-- Main Heading -->
        <div class="heading text-center">
          <h4>popular pet services</h4>
          <span>Best services at our shop</span> </div>
        
        <!-- Popular Item Slide -->
        <div class="papular-block block-slide"> 
          
          <!-- Item -->
          <div class="item"> 
            <!-- Item img -->
            <div class="item-img"> <img class="img-1" src="{{asset('shop/images/services1.jpg')}}" alt="" > <img class="img-2" src="{{asset('shop/images/services1.jpg')}}" alt="" > 
              <!-- Overlay -->
              <div class="overlay">
                <div class="position-center-center">
                  <div class="inn"><a href="{{asset('shop/images/services1.jpg')}}" data-lighter><i class="icon-magnifier"></i></a> <a href="#." data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-basket"></i></a> <a href="#." data-toggle="tooltip" data-placement="top" title="Add To WishList"><i class="icon-heart"></i></a></div>
                </div>
              </div>
            </div>
            <!-- Item Name -->
            <div class="item-name"> <a href="#.">BATHING</a>
              <p>Pemandian Hewan</p>
            </div>
            <!-- Price --> 
            <span class="price"><small>$</small>299</span> </div>
          
          <!-- Item -->
          <div class="item"> 
            <!-- Item img -->
            <div class="item-img"> <img class="img-1" src="{{asset('shop/images/services2.jpg')}}" alt="" > <img class="img-2" src="{{asset('shop/images/services2.jpg')}}" alt="" > 
              <!-- Overlay -->
              <div class="overlay">
                <div class="position-center-center">
                  <div class="inn"><a href="{{asset('shop/images/services2.jpg')}}" data-lighter><i class="icon-magnifier"></i></a> <a href="#." data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-basket"></i></a> <a href="#." data-toggle="tooltip" data-placement="top" title="Add To WishList"><i class="icon-heart"></i></a></div>
                </div>
              </div>
            </div>
            <!-- Item Name -->
            <div class="item-name"> <a href="#.">DOG GROOMING</a>
              <p>Basic/Standard Grooming</p>
            </div>
            <!-- Price --> 
            <span class="price"><small>$</small>299</span> </div>
          
          <!-- Item -->
          <div class="item"> 
            <!-- Item img -->
            <div class="item-img"> <img class="img-1" src="{{asset('shop/images/services3.jpg')}}" alt="" > <img class="img-2" src="{{asset('shop/images/services3.jpg')}}" alt="" > 
              <!-- Overlay -->
              <div class="overlay">
                <div class="position-center-center">
                  <div class="inn"><a href="{{asset('shop/images/services3.jpg')}}" data-lighter><i class="icon-magnifier"></i></a> <a href="#." data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-basket"></i></a> <a href="#." data-toggle="tooltip" data-placement="top" title="Add To WishList"><i class="icon-heart"></i></a></div>
                </div>
              </div>
            </div>
            <!-- Item Name -->
            <div class="item-name"> <a href="#.">Add-On</a>
              <p>Pelayanan Extra</p>
            </div>
            <!-- Price --> 
            <span class="price"><small>$</small>299</span> </div>
          
          <!-- Item -->
          <div class="item"> 
            <!-- Item img -->
            <div class="item-img"> <img class="img-1" src="{{asset('shop/images/services4.jpg')}}" alt="" > <img class="img-2" src="{{asset('shop/images/services4.jpg')}}" alt="" > 
              <!-- Overlay -->
              <div class="overlay">
                <div class="position-center-center">
                  <div class="inn"><a href="{{asset('shop/images/services4.jpg')}}" data-lighter><i class="icon-magnifier"></i></a> <a href="#." data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-basket"></i></a> <a href="#." data-toggle="tooltip" data-placement="top" title="Add To WishList"><i class="icon-heart"></i></a></div>
                </div>
              </div>
            </div>
            <!-- Item Name -->
            <div class="item-name"> <a href="#.">Cat Grooming</a>
              <p>Basic/Standard Grooming</p>
            </div>
            <!-- Price --> 
            <span class="price"><small>$</small>299</span> </div>
        </div>
      </div>
    </section>

    <!-- Testimonial -->
    <section class="testimonial padding-top-100">
      <div class="container">
        <div class="row">
          <div class="col-sm-6"> 
            
            <!-- SLide -->
            <div class="single-slide"> 
              
              <!-- Slide -->
              <div class="testi-in"> <i class="fa fa-quote-left"></i>
                <p>Pet care involves going the veterinarian, a nutritious diet, and plenty of exercise. First of all, it is recommended that you take your pet to the vet at least once a year. This ensures that your pet has a healthy diet.
                </p>
                <h5>Love & Care</h5>
              </div>
              
              <!-- Slide -->
              <div class="testi-in"> <i class="fa fa-quote-left"></i>
                <p>Pet care involves going the veterinarian, a nutritious diet, and plenty of exercise. First of all, it is recommended that you take your pet to the vet at least once a year. This ensures that your pet has a healthy diet.
                </p>
                <h5>Nutritious Diet</h5>
              </div>
              
              <!-- Slide -->
              <div class="testi-in"> <i class="fa fa-quote-left"></i>
                <p>Pet care involves going the veterinarian, a nutritious diet, and plenty of exercise. First of all, it is recommended that you take your pet to the vet at least once a year. This ensures that your pet has a healthy diet.
                </p>
                <h5>Caring pets gives happy & fun</h5>
              </div>
            </div>
          </div>
          
          <!-- Img -->
          <div class="col-sm-6"> <img class="img-responsive" src="{{asset('shop/images/cat1-2.jpg')}}" alt=""> </div>
        </div>
      </div>
    </section>
</div>
@endsection