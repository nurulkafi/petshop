@extends('admin.layouts.master')
@section('transaction_service','active')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Service Transaction</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    {{ Breadcrumbs::render('service_transaction') }}
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h5>Table Service Transaction</h5>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <a class="btn btn-primary float-start float-lg-end" href="{{ route('service_transaction.create') }}">
                            Add
                            <br>
                            <i class="bi bi-plus-circle"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Code</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Payment Status</th>
                            <th>Grand Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($transaction as $item)
                            @if ($item->status == \App\Models\ServiceTransaction::CREATED)
                            <tr class="table-primary">
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->transaction_date))  }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->payment_status }}</td>
                                <td>{{ number_format($item->grand_total) }}</td>
                                <td>
                                    <a href="{{ route('service_transaction.show',$item->id) }}" class="btn btn-info">Show</a>
                                </td>
                            </tr>
                            @elseif($item->status == \App\Models\ServiceTransaction::PROCESSED)
                            <tr class="table-info">
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->transaction_date))  }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->payment_status }}</td>
                                <td>{{ number_format($item->grand_total) }}</td>
                                <td>
                                    <a href="{{ route('service_transaction.show',$item->id) }}" class="btn btn-info">Show</a>
                                </td>
                            </tr>
                            @elseif($item->status == \App\Models\ServiceTransaction::COMPLETED)
                            <tr class="table-success">
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->transaction_date))  }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->payment_status }}</td>
                                <td>{{ number_format($item->grand_total) }}</td>
                                <td>
                                    <a href="{{ route('service_transaction.show',$item->id) }}" class="btn btn-info">Show</a>
                                </td>
                            </tr>
                            @else
                            <tr class="table-warning">
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->transaction_date))  }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->payment_status }}</td>
                                <td>{{ number_format($item->grand_total) }}</td>
                                <td>
                                    <a href="{{ route('service_transaction.show',$item->id) }}" class="btn btn-info">Show</a>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
{{-- Modal Form --}}
<div class="modal fade text-left" id="primary" tabindex="-1"role="dialog" aria-labelledby="myModalLabel160"aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger" id="modalheader">
                <h5 class="modal-title white" id="myModalLabel160">
                    Delete service
                </h5>
                <button type="button" class="close"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
            </button>
        </div>
        <form method="POST" id="form">
        @csrf
        @method('DELETE')
        <div id="method">

        </div>
        <div class="modal-body" id="modalform">
            Apakah Yakin Akan Menghapus Data?
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
                <span class="d-none d-sm-block">Yes</span>
            </button>
        </div>
        </form>
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
            $('#form').attr('action','service/'+id);
        });
    });
</script>
@endsection
