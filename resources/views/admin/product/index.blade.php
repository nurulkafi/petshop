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
                    {{ Breadcrumbs::render('product') }}
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h5>Table Product</h5>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <a class="btn btn-primary float-start float-lg-end" href="{{ route('product.create') }}">
                            Add
                            <br>
                            <i class="bi bi-plus-circle"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Stock</th>
                            <th>V.Price</th>
                            <th>R.Price</th>
                            <th>Discount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach($product as $p)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->category->name }}</td>
                                <td>{{ $p->stock }}</td>
                                <td>{{ number_format($p->vendor_price) }}</td>
                                <td>{{ number_format($p->retail_price) }}</td>
                                <td>{{ $p->discount }}</td>
                                <td>{{ $p->status }}</td>
                                <td>                                    
                                    
                                    <a href="{{ route('product.edit',$p->id) }}" class="btn btn-outline-info btn-sm editData" >
                                    Edit
                                    </a>
                                    
                                    <button class="btn btn-outline-danger btn-sm hapusData" type="button" data-bs-toggle="modal" data-bs-target="#primary" data-id="{{ $p->id }}">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
{{-- Modal Form --}}
<div class="modal fade text-left" id="primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary" id="modalheader">
                <h5 class="modal-title white" id="myModalLabel160">
                    Add Category
                </h5>
                <button type="button" class="close"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
            </button>
        </div>
        <form method="POST" action="{{ route('product_category.store') }}" id="form">
        @csrf
        <div id="method">

        </div>
        <div class="modal-body" id="modalform">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" autocomplete="off">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" id="closeBTN"
                class="btn btn-light-secondary"
                data-bs-dismiss="modal">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Close</span>
            </button>
            <button type="submit" class="btn btn-primary ml-1" id="submit">
                <i class="bx bx-check d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Submit</span>
            </button>
        </div>
        </form>
        </div>
    </div>
</div>
<script src="{{ asset('admin/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
<script>
        // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
    
    $(document).ready(function() {
        $('.hapusData').on('click',function () {
            const id = $(this).data('id');
            $('#modalform').empty();
            $('#modalform').append('Apakah Yakin Akan Menghapus Data?');
            $('#modalheader').attr('class','modal-header bg-danger');
            $('#modalheader h5').empty();
            $('#modalheader h5').append("Delete Product");
            $('#submit').attr('class','btn btn-danger ml-1');
            $('#submit span').empty();
            $('#submit span').append('Yes');
            $('#method').append("<input type='hidden' name='_method' value='DELETE'>");
            $('#form').attr('action','product/'+id);
        });
    });
</script>
@endsection
