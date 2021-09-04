@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="row">
                            <div class="col-md-10">
                                <h5>Create Role</h5>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('role.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="checkbox">
                                Permissions :
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
        </div>
    </div>
</div>
@endsection
