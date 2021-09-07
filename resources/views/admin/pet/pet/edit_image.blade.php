@extends('admin.layouts.master')
@section('PetCategory','active')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Pet Category</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    {{ Breadcrumbs::render('edit_image_pet',$id) }}
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <nav class="nav flex-column">
                            <a class="nav-link" href="{{ route('pet.edit',$id) }}">Pet Information</a>
                            <a class="nav-link active" aria-current="page" href="#"">Pet Image</a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h5>Table Pet Image</h5>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <button class="btn btn-primary float-start float-lg-end" type="button" data-bs-toggle="modal" data-bs-target="#primary">
                                    Add
                                    <br>
                                    <i class="bi bi-plus-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($image as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><img src="{{ asset('storage/'.$item->small) }}" alt="" class="img-thumbnail"></td>
                                    <td>
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
            </div>
        </div>

    </section>
</div>
{{-- Modal Form --}}
<div class="modal text-left" id="primary" tabindex="-1"role="dialog" aria-labelledby="myModalLabel160"aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary" id="modalheader">
                <h5 class="modal-title white" id="myModalLabel160">
                    Add Image
                </h5>
                <button type="button" class="close"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
            </button>
        </div>
        <form method="POST" action="{{ url('pet/image/'.$id)}}" id="form" enctype="multipart/form-data">
        @csrf
        <div id="method">

        </div>
        <div class="modal-body" id="modalform">
            <div id="addForm">
                <div class="form-group">
                <div class="wrappers">
                    <div class="image">
                        <img src="" alt="" id="image">
                    </div>
                    <div class="content">
                        <div class="icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <div class="text">
                            No file chosen, yet!
                        </div>
                    </div>
                    <div id="cancel-btn" class="cancel-btn">
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="file-name">
                        File name here
                    </div>
                </div>
                <button onclick="defaultBtnActive()" class="custom-btn" id="custom-btn" type="button">Choose a file</button>
                <input id="default-btn" type="file" hidden name="image">
            </div>
            </div>
            <div id="hapusForm">
                Apakah Yakin Akan Menghapus Data?
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
<script src="{{ asset('admin/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#hapusForm').hide();
        let pet_id = "{{ $id }}";
        $('.hapusData').on('click',function () {
            const id = $(this).data('id');
            $('#addForm').hide();
            $('#hapusForm').show();
            $('#modalheader').attr('class','modal-header bg-danger');
            $('#modalheader h5').empty();
            $('#modalheader h5').append("Delete Pet Image");
            $('#submit').attr('class','btn btn-danger ml-1');
            $('#submit span').empty();
            $('#submit span').append('Yes');
            $('#method').append("<input type='hidden' name='_method' value='DELETE'>");
            $('#form').attr('action','../../../pet/image/' + id);
        });
        $('#closeBTN').on('click',function(){
            $('#addForm').show();
            $('#hapusForm').hide();
            $('#modalheader').attr('class','modal-header bg-primary');
            $('#modalheader h5').empty();
            $('#modalheader h5').append("Add Pet Category");
            $('#submit').attr('class','btn btn-primary ml-1');
            $('#submit span').empty();
            $('#submit span').append('Submit');
            $('#form').attr('action','../../../pet/image/' + pet_id);
            $('#method').empty();
        });
    });
</script>
<script>
         let wrappers = document.querySelector(".wrappers");
         let fileName = document.querySelector(".file-name");
         let defaultBtn = document.querySelector("#default-btn")
         let customBtn = document.querySelector("#custom-btn");
         let cancelBtn = document.querySelector("#cancel-btn i");
         let img = document.querySelector("#image");
         let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
         function defaultBtnActive(){
           defaultBtn.click();
         }
         defaultBtn.addEventListener("change", function(){
           let file = this.files[0];
           if(file){
             let reader = new FileReader();
             reader.onload = function(){
               let result = reader.result;
               img.src = result;
               wrappers.classList.add("actives");
               $('#custom-btn').hide();
             }
             cancelBtn.addEventListener("click", function(){
               img.src = "";
               wrappers.classList.remove("actives");
               $('#custom-btn').show();
             })
             reader.readAsDataURL(file);
           }
           if(this.value){
             let valueStore = this.value.match(regExp);
             fileName.textContent = valueStore;
           }
         });
      </script>
@endsection
