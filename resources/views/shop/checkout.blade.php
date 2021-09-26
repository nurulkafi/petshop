@extends('shop.layouts.master')
@section('content')
<style>
/* Absolute Center Spinner */
.loading {
  position: fixed;
  z-index: 999;
  height: 2em;
  width: 2em;
  overflow: visible;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}

/* Transparent Overlay */
.loading:before {
  content: '';
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.3);
}

/* :not(:required) hides these rules from IE9 and below */
.loading:not(:required) {
  /* hide "loading..." text */
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}

.loading:not(:required):after {
  content: '';
  display: block;
  font-size: 10px;
  width: 1em;
  height: 1em;
  margin-top: -0.5em;
  -webkit-animation: spinner 1500ms infinite linear;
  -moz-animation: spinner 1500ms infinite linear;
  -ms-animation: spinner 1500ms infinite linear;
  -o-animation: spinner 1500ms infinite linear;
  animation: spinner 1500ms infinite linear;
  border-radius: 0.5em;
  -webkit-box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.5) -1.5em 0 0 0, rgba(0, 0, 0, 0.5) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
  box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) -1.5em 0 0 0, rgba(0, 0, 0, 0.75) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
}

/* Animation */

@-webkit-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-moz-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-o-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
</style>
  <!--======= SUB BANNER =========-->
  <section class="sub-bnr" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
      <div class="container">
        <h4>CHECKOUT</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula. 
          Sed feugiat, tellus vel tristique posuere, diam</p>
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li><a href="#">SHOP</a></li>
          <li class="active">CHECKOUT</li>
        </ol>
      </div>
    </div>
  </section>
  
  <!-- Content -->
  <div id="content"> 
    
    <!--======= PAGES INNER =========-->
    <section class="chart-page padding-top-100 padding-bottom-100">
      <div class="container"> 
        
        <!-- Payments Steps -->
        <div class="shopping-cart"> 
          
          <div class="cart-ship-info register">
            <div class="row">

              <!-- ESTIMATE SHIPPING & TAX -->
              <div class="col-sm-7">
                <h6>BILLING DETAILS</h6>
                <form action="{{ url('docheckout') }}" method="POST">
                  @csrf
                  <ul class="row">
                      <li class="col-md-6">
                      <label> *FIRST NAME
                        <input type="text" required name="first_name" value="" placeholder="">
                      </label>
                    </li>
                    <!-- LAST NAME -->
                    <li class="col-md-6">
                      <label> *LAST NAME
                        <input type="text" name="last_name" value="" placeholder="">
                      </label>
                    </li>

                    <!-- PHONE -->
                    <li class="col-md-6">
                        <label> *EMAIL
                            <input type="email" name="email" value="" placeholder="">
                        </label>
                    </li>
                    <li class="col-md-6">
                      <label> *PHONE
                        <input type="text" name="phone" value="" placeholder="">
                      </label>
                    </li>
                    <li class="col-md-6">
                        <!-- ADDRESS -->
                      <label>*PROVINCE
                          <select name="province_id" id="provinsiTujuan"  class="selectpicker">
                            <option>- Pilih Provinsi -</option>
                            @foreach ($province as $item)
                                <option value="{{ $item->code }}">{{ $item->title }}</option>
                            @endforeach
                          </select>
                      </label>
                    </li>
                    <li class="col-md-6">
                      <!-- ADDRESS -->
                      <label>*CITY
                        <select name="city_id" id="kotaTujuan"  class="selectpicker">
                          <option value="{{ old('first_name') }}">&nbsp;</option>
                        </select>
                      </label>
                    </li>

                    <!-- COUNTRY -->
                    <li class="col-md-12">
                      <label> *ADDRESS
                        <textarea name="address" style="border: 0.5px solid black;border-radius: 0%;margin-top:10px" class="form-control" name="address" id="message" rows="5" placeholder="">{{ old('address') }}</textarea>
                      </label>
                    </li>
                  </ul>
              </div>

              <!-- SUB TOTAL -->
              <div class="col-sm-5">
                <h6>YOUR ORDER</h6>
                <div class="order-place">
                  <div class="order-detail">
                    
                  </div>
                  <div class="pay-meth">
                    <button type="submit" class="btn btn-dark pull-right margin-top-30">PLACE ORDER</button>
                  </div>
                  <input type="hidden" name="codekurir" id="codekurir">
                  <input type="hidden" name="service" id="service">
                  <input type="hidden" name="shippingcost" id="shippingcost">
                  <input type="hidden" name="product_id[]" id="product_id">
                  <input type="hidden" name="qty[]" id="qty">
                  <input type="hidden" name="base_price[]" id="base_price">
                  <input type="hidden" name="base_total[]" id="base_total">
                  <input type="hidden" name="total_qty" id="total_qty">
                  <input type="hidden" name="subtotal" id="subtotal">
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<script src="{{asset('shop/js/jquery-1.11.3.min.js')}}"></script>
<script>
$(document).ready(function(){
  $('.loading').hide();

  $('#provinsiTujuan').on('change',function(){
      let id = $(this).val();
            $.ajax({
                url: 'province/search/'+id,
                type: 'get',
                dataType: 'json',
                success:function(data) {
                    $('#kotaTujuan').empty();
                    $.each(data, function(key, value){
                        $('#kotaTujuan').append(`<option value="${key}"> ${value} </option>`);
                    });
                    $('#kotaTujuan').selectpicker('refresh');
            },
          });
        });
        $('#kotaTujuan').on('change',function(){
            $('#kurir').empty();
            $('.loading').show();
            let tujuan = $('#kotaTujuan').children("option:selected").val();

            let berat = 1000;
            $.ajax({
                url: 'cekongkir/'+tujuan+'/berat/'+berat,
                type: 'get',
                dataType: 'json',
                success:function(data) {
                    $('.loading').hide();
                    $('#selectkurir').show();
                    $('#kurir').append('<option>--Select Courier--</option>')
                    for (let index = 0; index < 3; index++) {
                        let kurir = data[index].results[0].code.toUpperCase();
                        $.each(data[index].results[0].costs, function(key,result) {
                            $('#kurir').append('<option value="'+kurir+"|"+result.service+"|"+result.cost[0].value+'">'+ kurir+" "+result.service+" | "+result.cost[0].value+'</option>')
                        });
                    };

                     $('#kurir').selectpicker('refresh');

                }
            });
            $('#kurir').on('change',function(){
                let total_cost = 0;
                let cartItems = JSON.parse(localStorage.getItem('productsInCart'));
                cartItems = Object.values(cartItems);
                cartItems.map(item => {
                  total_cost = item.totalPrice;
                });    

                let ongkir = $('#kurir').find(':selected').val();
                const ongkirArray = ongkir.split('|');
                let codekurir = ongkirArray[0];
                let service = ongkirArray[1];
                ongkir = ongkirArray[2];
                total_cost = (parseInt(total_cost)+parseInt(ongkir));
                total_cost = new Intl.NumberFormat(['ban', 'id']).format(total_cost);

                $('#shippingcost').val(ongkir);
                $('#codekurir').val(codekurir);
                $('#service').val(service);
                $('#total_cost').html('Rp. '+total_cost+'');
            });
        });
});

  function maskRupiah(x) {
      return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }

  //MENAMPILKAN DATA PRODUK DI CART
  function displayCheckout() {
    let cartItems = JSON.parse(localStorage.getItem('productsInCart'));
    let cartQty = 0;
    let subtotal = 0;
    let db_subtotal = 0;
    let db_total_qty = 0;

    let productContainer = document.querySelector(".order-detail");
    
    //CEK LOCAL STORAGE KOSONG / NULL
    if(cartItems == null) {
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

    // console.log(cartItems);
    if(cartItems && productContainer) {
        cartItems = Object.values(cartItems);
        
        productContainer.innerHTML = '';

        
        cartItems.map(item => {           
        // MEMASUKAN VALUE KE DALAM FORM
        var db_product_id = item.id;
        var db_qty = item.inCart;
        var db_base_price = item.price;
        var db_base_total = item.price * item.inCart;
        db_subtotal = item.totalPrice += db_subtotal;
        db_total_qty = item.inCart += db_total_qty;

        $('#product_id').val(db_product_id);
        $('#qty').val(db_qty);
        $('#base_price').val(db_base_price);
        $('#base_total').val(db_base_total);
        $('#subtotal').val(db_subtotal);
        $('#total_qty').val(db_total_qty);

        subtotal = item.totalPrice += subtotal;

        cartQty = item.inCart;
        productContainer.innerHTML += `           
          <p>${item.name} <span>Rp. ${maskRupiah(item.price * item.inCart)} </span></p>                       
        `
        }); 

        if(cartItems.length == 0) {
          productContainer.innerHTML += `
            <div class="noData">
              <img src="{{ asset('shop/images/emptyCart.svg') }}" style="display:block;margin-left:auto;margin:right:auto;width:100%">
              <h6>Whoops, your cart is empty!</h6>
              <small>
                Add something to make your pet happy :)
              </small>
            </div>
          `;
        } else {
            productContainer.innerHTML += `
            <div class="quinty">
                <!-- QTY -->
                        <div class="row">
                            <div class="col-md-2">
                                <p>Courier</p>
                            </div>
                            <div class="loading"></div>
                            <div class="col-md-10" id="selectkurir">
                                <select class="selectpicker" id="kurir">
                                  <option>&nbsp;</option>
                            </div>
                        </div>
                    </div>
          `;
           productContainer.innerHTML += `
            <p class="all-total">TOTAL COST <span id="total_cost">Rp. ${maskRupiah(subtotal)}</span></p>
           `;
        }    
    }      
  }

  displayCheckout();
</script>
    @endsection