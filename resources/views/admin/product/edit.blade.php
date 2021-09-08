@extends('admin.layouts.master')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Product</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    {{ Breadcrumbs::render('edit_product', $data->id) }}
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-md-4">
                <div class="card">                    
                    <div class="card-body">
                        <nav class="nav flex-column">
                            <a class="nav-link active" aria-current="page" href="#">Product Information</a>
                            <a class="nav-link" href="{{ url('product/image/'.$data->id.'/edit') }}">Product Image</a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Product Information</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf      
                        @method('PUT')                      
                            <div class="form-group">
                                <div class="row">
                                    <div class="">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" class="form-control" name="name" autocomplete="off" placeholder="Product Name" value="{{ $data->name }}" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="">
                                        <div class="form-group">
                                            <label for="">Category</label>
                                            <select class="choices form-select" name="product_category_id" required="">
                                                @foreach ($category as $c)
                                                <option value="{{ $c->id }}" {{ $c->id == $data->product_category_id ? 'selected' : '' }}>{{ $c->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="">
                                        <label for="stock">Stock</label>
                                        <input type="number" min="0" class="form-control" id="stock" name="stock" autocomplete="off" placeholder="Stock" value="{{ $data->stock }}" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="">
                                        <div class="form-group">
                                            <label for="detail">Detail/Description</label>
                                            <textarea type="text" class="form-control round" name="detail"  id="detail">{{ $data->detail }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                               
                            <div class="form-group">
                                <div class="row">
                                    <div class="">
                                        <label for="vendor_price">Vendor Price</label>
                                        <input type="text" id="vendor_price" class="form-control uang" autocomplete="off" placeholder="Rp." value="{{ number_format($data->vendor_price) }}" required="">
                                        <input type="hidden" name="vendor_price" id="vendor_price_db">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="">
                                        <label for="retail_price">Retail Price</label>
                                        <input type="text" id="retail_price" class="form-control uang" autocomplete="off" placeholder="Rp." value="{{ number_format($data->retail_price) }} required="">
                                        <input type="hidden" name="retail_price" id="retail_price_db">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="">
                                        <label for="discount">Discount</label>
                                        <input type="number" min="0" class="form-control" id="discount" name="discount" autocomplete="off" value="{{ $data->discount }}" placeholder="Discount">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="">
                                        <label for="status">Status</label>
                                        <select class="choices form-select" name="status" id="status">
                                            <option value="1">Available</option>
                                            <option value="0">No Available</option>
                                        </select>
                                    </div>
                                </div>
                            </div>                
                                                       
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1" id="btnSubmit">Submit</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>        
    </section>
</div>
@push('script')
<script src="{{ asset('admin/assets/vendors/choices.js/choices.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/pages/form-element-select.js') }}"></script>
{{-- Cke Editor --}}
<script>
// Format mata uang.
$( '.uang' ).mask('000.000.000', {reverse: true});

$('#btnSubmit').click(function(){
    // Ubah format untuk store database
    v_price = $('#vendor_price').val();
    v_price = v_price.replace(/\./g, '');
    $('#vendor_price_db').val(v_price);

    r_price = $('#retail_price').val();
    r_price = r_price.replace(/\./g, '');
    $('#retail_price_db').val(r_price);
});

$(document).ready(function (e) {   
   $('#image').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
     
});
</script>
@endpush
@endsection
