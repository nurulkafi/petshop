@extends('admin.layouts.master')
@section('content')
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet">
<style>
    .foto {
        padding: 10px;
        width: 100%;
        height: 350px;
        box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
    }
</style>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Company Profile</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    {{ Breadcrumbs::render('company') }}
                </nav>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Company</h5>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true"><i class="bi bi-house-fill"></i> Profil</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#form" role="tab" aria-controls="profile" aria-selected="false"><i class="bi bi-pencil-fill"></i> Edit Profil</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <p class="my-2">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="foto">                               
                                <p style="text-align: center;position: relative;top: 50px">
                                    @if ($company[0]->path_picture != 'null')
                                    <img id="preview-image-before-upload" src="{{ asset('storage/'.$company[0]->path_picture) }}" alt="preview image" style="border-radius: 50%;width: 150px;">
                                    @else
                                    <img id="preview-image-before-upload" src="{{ asset('images/no-image.jpg') }}" alt="preview image" style="border-radius: 50%;width: 150px;">
                                    @endif
                                </p>
                                <p style="text-align: center;position: relative;top: 50px;font-weight: bold">
                                    {{ $company[0]->name }}
                                </p>
                                <p style="text-align: center;position: relative;top: 30px">
                                    <small>{{ $company[0]->email }}</small>
                                </p>
                                <p style="text-align: center;position: relative;top: 10px">
                                    <small>{{ $company[0]->address }}</small>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <table class="table table-striped">
                                <tr>
                                    <td>Name</td>
                                    <td>:</td>
                                    <td>{{ $company[0]->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{ $company[0]->email }}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>:</td>
                                    <td>{{ $company[0]->address }}</td>
                                </tr>
                                <tr>
                                    <td>Contact Number</td>
                                    <td>:</td>
                                    <td>{{ $company[0]->contact_number }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </p>
            </div>
            <div class="tab-pane fade" id="form" role="tabpanel" aria-labelledby="form-tab">
                <p class="my-2">
                    @if (count($company) > 0)
    <form action="{{ route('company.update', $company[0]->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Company Profile</h4>
            </div>
            <div class="card-content">
                <div class="card-body">                    
                    <div class="row">
                        <div class="col-md-6">
                            <label class="card-text">
                                Profile Picture
                            </label>                                    
                            <div class="form-group">
                                <input type="file" name="path_picture" placeholder="Choose Image" id="image">
                                <br><br>
                                @error('image')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                                @if ($company[0]->path_picture != 'null')
                                <img id="preview-image-before-upload" src="{{ asset('storage/'.$company[0]->path_picture) }}" alt="preview image" style="max-height: 250px;border-radius: 50%">
                                @else
                                <img id="preview-image-before-upload" src="{{ asset('images/no-image.jpg') }}" alt="preview image" style="max-height: 250px;border-radius: 50%">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-icon-left">
                                <label for="first-name-icon">Company Name</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="Company Name" id="first-name-icon" name="name" value="{{ $company[0]->name }}" autocomplete="off">
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group has-icon-left">
                                <label for="email-id-icon">Email</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="Email" id="email-id-icon" name="email" value="{{ $company[0]->email }}" autocomplete="off">
                                    <div class="form-control-icon">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group has-icon-left">
                                <label for="mobile-id-icon">Contact Number</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="Mobile" id="mobile-id-icon" name="contact_number" value="{{ $company[0]->contact_number }}" autocomplete="off">
                                    <div class="form-control-icon">
                                        <i class="bi bi-phone"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Company Address</label>
                                <div class="position-relative">
                                    <textarea class="form-control round" name="address" id="address" autocomplete="off">{{ $company[0]->address }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        </div>
                    </div>
                        
                    
                </div>
            </div>
        </div>
    </div>
    </form>
    @else
    <form action="{{ route('company.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Company Profile</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="card-text">
                                        Profile Picture
                                    </label>                                    
                                    <div class="form-group">
                                        <input type="file" name="path_picture" placeholder="Choose Image" id="image">
                                        @error('image')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                        <img id="preview-image-before-upload" src="{{ asset('images/no-image.jpg') }}" alt="preview image" style="max-height: 250px;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Company Name</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" placeholder="Company Name" id="first-name-icon" name="name">
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group has-icon-left">
                                        <label for="email-id-icon">Email</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" placeholder="Email" id="email-id-icon" name="email">
                                            <div class="form-control-icon">
                                                <i class="bi bi-envelope"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group has-icon-left">
                                        <label for="mobile-id-icon">Contact Number</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" placeholder="Mobile" id="mobile-id-icon" name="contact_number">
                                            <div class="form-control-icon">
                                                <i class="bi bi-phone"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Company Address</label>
                                        <div class="position-relative">
                                            <textarea class="form-control round" name="address" id="address"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </form>
    @endif
                </p>
            </div>                
        </div>
    </div>
</div>
    
</div>
<!-- filepond validation -->
<script
    src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script
    src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

<!-- image editor -->
<script
    src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-filter/dist/filepond-plugin-image-filter.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
<!-- filepond -->
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
<script>
$(document).ready(function (e) {
 
   
   $('#image').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});

// register desired plugins...
        FilePond.registerPlugin(
            // preview the image file type...
            FilePondPluginImagePreview,
        );
    // Filepond: Image Preview
        FilePond.create(document.querySelector('.image-preview-filepond'), {
            allowImagePreview: true,
            allowImageFilter: false,
            allowImageExifOrientation: false,
            allowImageCrop: false,
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
            fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                // Do custom type detection here and return with promise
                resolve(type);
            })
        });
</script>
@endsection