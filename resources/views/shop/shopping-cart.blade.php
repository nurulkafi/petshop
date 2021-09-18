@extends('shop.layouts.master')
@section('content')  
<style>
  .quantity {
    align-items: center;
    display: flex;
    margin-left: 30px;
    color: blue;
  }

  .quantity > ion-icon {
    font-size: 30px;
  }
</style>
  <!--======= SUB BANNER =========-->
  <section class="sub-bnr" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
      <div class="container">
        <h4>SHOPPING CART</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula. 
          Sed feugiat, tellus vel tristique posuere, diam</p>
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li><a href="#">SHOP</a></li>
          <li class="active">SHOPPING CART</li>
        </ol>
      </div>
    </div>
  </section>
  
  <!-- Content -->
  <div id="content"> 
    
    <!--======= PAGES INNER =========-->
    <section class="padding-top-100 padding-bottom-100 pages-in chart-page">
      <div class="container"> 
        
        <!-- Payments Steps -->
        <div class="shopping-cart text-center">
          <div class="cart-head">
            <ul class="row">
              <!-- PRODUCTS -->
              <li class="col-sm-2 text-left">
                <h6>PRODUCTS</h6>
              </li>
              <!-- NAME -->
              <li class="col-sm-4 text-left">
                <h6>NAME</h6>
              </li>
              <!-- PRICE -->
              <li class="col-sm-2">
                <h6>PRICE</h6>
              </li>
              <!-- QTY -->
              <li class="col-sm-1">
                <h6>QTY</h6>
              </li>
              
              <!-- TOTAL PRICE -->
              <li class="col-sm-2">
                <h6>TOTAL</h6>
              </li>
              <li class="col-sm-1"> </li>
            </ul>
          </div>
          
          <!-- Cart Details -->
          <div class="cartProducts">
              
          </div>    
        </div>
      </div>
    </section>
    
    <!--======= PAGES INNER =========-->
    <section class="padding-top-100 padding-bottom-100 light-gray-bg shopping-cart small-cart">
      <div class="container"> 
        
        <!-- SHOPPING INFORMATION -->
        <div class="cart-ship-info margin-top-0">
          <div class="row"> 
            
            <!-- DISCOUNT CODE -->
            <div class="col-sm-7">
              
            </div>
            
            <!-- SUB TOTAL -->
            <div class="col-sm-5">
              <h6>grand total</h6>
              <div class="grand-total">
                <div class="order-detail cartDetail">
              

                </div>  
                <div class="coupn-btn">                
                  <a href="#." class="btn" style="background: #eeeeee;">Checkout</a>
                </div>        
              </div>              
            </div>
          </div>
        </div>
      </div>
    </section>
<script src="{{ asset('shop/js/cart.js') }}"></script>
<script> 
  let products = [];
  function maskRupiah(x) {
      return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }

  //MENAMPILKAN DATA PRODUK DI CART
  function displayCartProduct() {

    let cartItems = JSON.parse(localStorage.getItem('productsInCart'));
    let cartQty = 0;
    let subtotal = 0;

    let productContainer = document.querySelector(".cartProducts");
    let productDetailContainer = document.querySelector(".cartDetail");

    //CEK LOCAL STORAGE KOSONG / NULL
    if(cartItems == null) {
        productContainer.innerHTML += `
          <div class="noData">
            <img src="{{ asset('shop/images/emptyCart.svg') }}" style="display:block;margin-left:auto;margin:right:auto;width:25%">
            <h6>Whoops, your cart is empty!</h6>
            <small>
              Add something to make your pet happy :)
            </small>
          </div>
        `;
      }

    // console.log(cartItems);
    if(cartItems && productContainer && productDetailContainer) {
        cartItems = Object.values(cartItems);
        
        productContainer.innerHTML = '';
        productDetailContainer.innerHTML = '';
        
        cartItems.map(item => {            
          subtotal = item.totalPrice += subtotal;

          cartQty = item.inCart;
          productContainer.innerHTML += `           
            <ul class="row cart-details">
              <li class="col-sm-6">
              <div class="media"> 
                <!-- Media Image -->
                <div class="media-left media-middle"> 
                  <a href="#." class="item-img"> 
                    <img class="media-object" src="{{asset('storage/${item.image}')}}" alt=""> </a> 
                  </div>
                
                <!-- Item Name -->
                <div class="media-body">
                  <div class="position-center-center">
                    <h5>${item.name}</h5>
                  </div>
                </div>
              </div>
            </li>
            
            <!-- PRICE -->
            <li class="col-sm-2">
              <div class="position-center-center"> <span class="price"><small>Rp. </small>${maskRupiah(item.price)}</span> </div>
            </li>
            
            <!-- QTY -->
            <li class="col-sm-1">
              <div class="position-center-center">
                <div class="quantity"> 
                  <!-- QTY -->
                  <input type="number" value="${item.inCart}" min="0" max="${item.stock}" class="qty" data-id=${item.id}>
                </div>
              </div>
            </li>
            
            <!-- TOTAL PRICE -->
            <li class="col-sm-2">
              <div class="position-center-center"> <span class="price totalPrice"><small>Rp. </small><span>${maskRupiah(item.price * item.inCart)}</span></span> </div>
            </li>
            
            <!-- REMOVE -->
            <li class="col-sm-1">
              <div class="position-center-center" style="font-size:20px;color:black"> 
                <i class="icon-close removeItem" style="cursor:pointer"></i>
              </div>
            </li>           
            </ul>                         
          `;

          productDetailContainer.innerHTML += `
            <p class="all-total-product">${item.name} <span>Rp. ${maskRupiah(item.price * item.inCart)} </span></p>
          `;
        }); 

        if(cartItems.length == 0) {
          productContainer.innerHTML += `
            <div class="noData">
              <img src="{{ asset('shop/images/emptyCart.svg') }}" style="display:block;margin-left:auto;margin:right:auto;width:25%">
              <h6>Whoops, your cart is empty!</h6>
              <small>
                Add something to make your pet happy :)
              </small>
            </div>
          `;
        } else {
            productDetailContainer.innerHTML += `
              <p class="all-total">TOTAL COST <span>Rp. ${maskRupiah(subtotal)}</span></p>
            `;
        }   
        
    }  
  }
displayCartProduct();
  

   //CHANGE QTY IN CARTS

  //MERUBAH JUMLAH PRODUK DI CART
  function listenInputQty() {
      var qtyInput = document.getElementsByClassName('qty');
      for (var i = 0; i < qtyInput.length; i++) {
          var input = qtyInput[i];
          // console.log(input);
          input.addEventListener('change', qtyChanged)     
      } 
  }

  listenInputQty();  

  function qtyChanged(event) {
    var input = event.target;
    console.log(input);
    var id = $(this).data('id');
    // console.log(id);
    input.value = parseInt(input.value);
    if (isNaN(input.value) || input.value <= 0) {
      input.value = 1;
    } 

    var cartItem = JSON.parse(localStorage.getItem('productsInCart'));
    cartItem = Object.values(cartItem);

    var itemName = event.target.parentElement.parentElement.parentElement.parentElement.children[0].children[0].children[1].children[0].children[0].textContent;

    // add to it, only if it's empty
    var item = cartItem.find(item => item.name === itemName);
    // console.log(item);
    if (item) {
      item.inCart = input.value;
      item.inCart = parseInt(item.inCart)
      item.totalPrice = item.inCart * item.price;

      if (input.value > item.stock) {
        alert("Quantity exceeds stock!");
        item.inCart = item.stock;
        input.value = item.inCart;
      }
    } else {
      cartItem.push(item);
    }
      
    //then put it back

    localStorage.setItem('productsInCart', JSON.stringify(cartItem)); 

    cartPrice(); 
    cartNumberDisplay();    
    displayCart();   
    displayCartProduct();
    listenInputQty();
    listenDelete();     
  }

  //DELETE PRODUCTS IN CART
  function listenDelete() {
    const removeItem = document.getElementsByClassName('removeItem')
    for(var i = 0; i < removeItem.length; i++){
        let removeBtn = removeItem[i]
        removeBtn.addEventListener('click', () =>{
            let cartItem = JSON.parse(localStorage.getItem('productsInCart'))
            
            let itemName = event.target.parentElement.parentElement.parentElement.children[0].children[0].children[1].children[0].children[0].textContent;

            cartItem = Object.values(cartItem);

            // // console.log(cartItem);
            cartItem.forEach(item => {
                if(item.name != itemName){
                    products.push(item);
                }
            });
            localStorage.setItem('productsInCart', JSON.stringify(products));
            window.location.reload();
        })
    }
  }

  listenDelete();
 
  //Total keseluruhan produk
  function cartPrice(){
      let subTotal = 0;
      let cartItem = JSON.parse(localStorage.getItem('productsInCart'));
      
      if(cartItem) {
        cartItem = Object.values(cartItem);
        cartItem.map(item =>{
          subTotal = item.totalPrice += subTotal;        
        })
         // console.log(subTotal);        
        document.querySelector('.all-total span').textContent = 'Rp. '+maskRupiah(subTotal);
      } else {
        document.querySelector('.cartDetail').innerHTML = '<p class="all-total">TOTAL COST <span>Rp. 0</span></p>';
      }
   }
   // onLoadCartNumbers();
  function cartNumberDisplay(){
      let cartNumbers = 0;
      let cartItem = JSON.parse(localStorage.getItem('productsInCart'))

      if(cartItem) {
        cartItem = Object.values(cartItem);

        cartItem.forEach(item => {
            cartNumbers = item.inCart += cartNumbers;
        });
        // console.log(cartNumbers);
        document.querySelector('.user-basket .cartNumbers').textContent = cartNumbers;
      }      
  }

cartNumberDisplay()  

// cartPrice()

</script>
@endsection