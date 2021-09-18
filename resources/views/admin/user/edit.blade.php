@extends('admin.layouts.master')
@section('user','active')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>User</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    {{ Breadcrumbs::render('edit_user') }}
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h5>Edit User</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('user.update',$user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Name</label>
                                        <input type="text" id="" name="name" value="{{ $user->name }}" class="form-control round">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Email</label>
                                        <input type="text" id="" name="email" value="{{ $user->email }}" class="form-control round">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Password</label>
                                        <input type="password" id="" name="password" class="form-control round">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Confirm Password</label>
                                        <input type="password" id="" name="confirm-password" class="form-control round">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Role</label>
                                        <select name="role" id="" class="form-select">
                                            <option value="{{ $oldrole->id }}">{{ $oldrole->name }}</option>
                                            @foreach ($role as $item)
                                                @if ($item->id != $oldrole->id)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Submit</button>
                            </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
