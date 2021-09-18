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
                    {{ Breadcrumbs::render('create_role') }}
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h5>Create Role</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('role.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <div class="row">
                                <div class="col-md-6"><input type="text" class="form-control" name="name"></div>
                                <div class="col-md-6"></div>
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="">Permissions :</label>
                                @forelse ($permission as $item)
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $item->id }}" name="permission[]" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $item->name }}
                                    </label>
                                 </div>
                                @empty
                                    Empty!
                                @endforelse
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
