@extends('admin.layouts.master')
@section('role','active')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Role</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    {{ Breadcrumbs::render('role') }}
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h5>Table Role</h5>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <a class="btn btn-primary float-start float-lg-end" href="{{ route('role.create') }}">
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
                            <th>Permission</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($role as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td style="width: 500px">
                                @foreach ($item->permissions as $permission)
                                    <span class="badge rounded-pill bg-primary">{{ $permission->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ route('role.edit',$item->id) }}" >
                                    Edit
                                </a>
                                <button class="btn btn-danger hapusData"  type="button" data-bs-toggle="modal" data-bs-target="#primary" data-id="{{ $item->id }}">
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
<div class="modal fade text-left" id="primary" tabindex="-1"role="dialog" aria-labelledby="myModalLabel160"aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger" id="modalheader">
                <h5 class="modal-title white" id="myModalLabel160">
                    Delete role
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
            $('#form').attr('action','role/'+id);
        });
    });
</script>
@endsection
