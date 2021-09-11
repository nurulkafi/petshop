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
                @foreach ($productCategory as $item)
                <li><a href="{{ url('products/category/pet-product/'.$item->slug) }}"> {{ $item->name }} <span></span></a></li>
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

            <!-- Pagination -->
            <!-- <ul class="pagination">
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
            </ul> -->
            {{ $product->links('vendor.pagination.custom') }}
          </div>
        </div>
      </div>
    </section>
</div>

<!-- ADD TO CART LOCAL STORAGE -->
<script>
  let carts = document.querySelectorAll('.add-cart');

  let products = [
    @foreach($product as $item)
      {
        id: {{ $item->id }},
        name: '{{ $item->name }}',
        category: {{ $item->product_category_id }},
        price: {{ $item->retail_price }},
        image: "{{ $item->image->first()->small }}",
        inCart:0
      },
    @endforeach
  ];
  // console.log(products);

  for (let i=0; i < carts.length; i++) {    
    carts[i].addEventListener('click', (e) => {
      e.preventDefault();
      cartNumbers(products[i]);
      totalCost(products[i])
    })
  }

  function maskRupiah(x) {
      return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }

  //MENAMPILKAN JUMLAH BARANG SAAT WEB DI LOAD DARI LOCAL STORAGE
  function onLoadCartNumbers() {
    let productNumbers = localStorage.getItem('cartNumbers');

    if(productNumbers) {
      document.querySelector('.user-basket .cartNumbers').textContent = productNumbers;
    }
  }

  //MENYIMPAN VALUE/QTY DATA YANG DIPILIH KE LOCAL STORAGE
  function cartNumbers(product) {
    // console.log('The product clicked is', product);
    let productNumbers = localStorage.getItem('cartNumbers');
    productNumbers = parseInt(productNumbers);

    if(productNumbers) {
      localStorage.setItem('cartNumbers', productNumbers + 1);
      document.querySelector('.user-basket .cartNumbers').textContent = productNumbers + 1;

    } else {
      localStorage.setItem('cartNumbers', 1);
      document.querySelector('.user-basket .cartNumbers').textContent = 1;
    }  

    setItems(product);    
    
  }

  //MENIYMPAN DATA PRODUCT KE LOCAL STORAGE productsInCart
  function setItems(product) {
    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);
    
    if(cartItems != null) {
      if(cartItems[product.category] == undefined) {
        cartItems = {
          ...cartItems,
          [product.category]: product
        }
      }
      cartItems[product.category].inCart += 1;
    } else {
      product.inCart = 1;
      cartItems = {
        [product.category]: product
      }
    }
   
    
    localStorage.setItem("productsInCart", JSON.stringify(cartItems));
    
  }

  //MENYIMPAN TOTAL KE LOCAL STORAGE totalCost
  function totalCost(product) {
    // console.log("The product price is", product.price);
    let cartCost = localStorage.getItem("totalCost");   
    
    if(cartCost != null) {
        cartCost = parseInt(cartCost);
        localStorage.setItem('totalCost', cartCost + product.price);
        displayCart();
    } else {
        localStorage.setItem("totalCost", product.price);
        displayCart();
    }     
  }

  //MENAMPILKAN DATA PRODUK DI CART
  function displayCart() {
    let cartItems = localStorage.getItem('productsInCart');
    let cartCost = localStorage.getItem('totalCost');
    let cartNumbers = localStorage.getItem('cartNumbers');
    // cartNumbers = parseInt(cartNumbers);

    let productContainer = document.querySelector(".products");
    cartItems = JSON.parse(cartItems);

    // console.log(cartItems);
    if(cartItems && productContainer) {
        productContainer.innerHTML = '';
        Object.values(cartItems).map(item => {
          productContainer.innerHTML += `           
            <li>                        
              <div class="media-left">            
                <div class="cart-img"> 
                  <a href="#"> 
                    <img class="media-object img-responsive" src="{{asset('storage/${item.image}')}}" alt="..."> 
                  </a> 
                </div>

              </div>
              <div class="media-body">
                <h6 class="media-heading">${item.name}</h6>
                <span class="price">Rp. ${maskRupiah(item.price)}</span> 
                <span class="qty">QTY: ${item.inCart}</span> 
                <span class="total">Total: Rp. ${maskRupiah(item.inCart * item.price)}</span> 
              </div>
            </li>                         
          `
        });

         productContainer.innerHTML += `
          <li>
            <h5 class="text-center">SUBTOTAL: Rp. ${maskRupiah(cartCost)}</h5>
          </li>
          <li class="margin-0">
            <div class="row">
              <div class="col-xs-6"> <a href="{{ url('/cart') }}" class="btn">VIEW CART</a></div>
              <div class="col-xs-6 "> <a href="{{ url('/checkout') }}" class="btn">CHECK OUT</a></div>
            </div>
          </li>
        `
    }  

    if (cartNumbers == null) {
      productContainer.innerHTML += `
        <div class="noData">
          <img src="{{ asset('shop/images/emptyCart.svg') }}" style="display:block;margin-left:auto;margin:right:auto;width:100%">
          <h6>Whoops, your cart is empty!</h6>
          <small>
            Add something to make your pet happy :)
          </small>
        </div>
      `;
    } 
  }

  onLoadCartNumbers();
  displayCart();
</script>
@endsection
