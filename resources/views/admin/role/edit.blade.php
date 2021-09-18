@extends('admin.layouts.master')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Role</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    {{ Breadcrumbs::render('edit_role') }}
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
                <form action="{{ route('role.update',$role->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Name</label>
                            <div class="row">
                                <div class="col-md-6"><input type="text" class="form-control" name="name" value="{{ $role->name }}"></div>
                                <div class="col-md-6"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Permissions :</label>
                                @foreach ($permission as $item)
                                 <div class="form-check">
                                 @if (in_array($item->id,$oldpermission))
                                    <input class="form-check-input" type="checkbox" value="{{ $item->id }}" name="permission[]" id="flexCheckDefault" checked>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $item->name }}
                                    </label>
                                 @else
                                    <input class="form-check-input" type="checkbox" value="{{ $item->id }}" name="permission[]" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $item->name }}
                                    </label>
                                 @endif
                                 </div>
                                @endforeach
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
