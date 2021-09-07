@extends('admin.layouts.master')
@section('Pet','active')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Pet</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    {{ Breadcrumbs::render('create_pet') }}
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h5>Pet Information</h5>
                    </div>
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h5>Pet Image
                            <button class="btn btn-primary icon btn-sm rounded-pill" type="button" id="btnPlus">
                                <i class="bi bi-plus-circle"></i>
                            </button>
                        </h5>

                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('pet.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label for="">Category</label>
                                <select class="choices form-select" name="category_id">
                                    @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Description</label>
                                <textarea type="text" class="form-control round" name="description"  id="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Weight</label>
                                <input type="text" class="form-control" name="weight">
                            </div>
                            <div class="form-group">
                                <label for="">Stock</label>
                                <input type="text" class="form-control" name="stock">
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-select">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                    <option value="Draft">Draft</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Image</label>
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
                                <input id="default-btn" type="file" hidden name="image[]">
                                <br>
                                <div class="wrappers preview2" id="preview2">
                                 <div class="image">
                                        <img src="" alt="" id="image2">
                                    </div>
                                    <div class="content">
                                        <div class="icon">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                        </div>
                                        <div class="text">
                                            No file chosen, yet!
                                        </div>
                                    </div>
                                    <div id="cancel-btn2"  class="cancel-btn">
                                        <i class="fas fa-times"></i>
                                    </div>
                                    <div class="file-name">
                                        File name here
                                    </div>
                                </div>
                                <div class="preview2">
                                    <button onclick="defaultBtn2Active()" class="custom-btn" id="custom-btn2" type="button">Choose a file</button>
                                    <input id="default-btn2" type="file" hidden name="image[]">
                                </div>
                                <br>
                                <div class="wrappers preview3" id="preview3">
                                    <div class="image">
                                        <img src="" alt="" id="image3">
                                    </div>
                                    <div class="content">
                                        <div class="icon">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                        </div>
                                        <div class="text">
                                            No file chosen, yet!
                                        </div>
                                    </div>
                                    <div id="cancel-btn3"  class="cancel-btn">
                                        <i class="fas fa-times"></i>
                                    </div>
                                    <div class="file-name">
                                        File name here
                                    </div>
                                </div>
                                <div class="preview3">
                                    <button onclick="defaultBtn3Active()" class="custom-btn" id="custom-btn3" type="button">Choose a file</button>
                                    <input id="default-btn3" type="file" hidden name="image[]">
                                </div>
                                <br>
                                <div class="wrappers preview4" id="preview4">
                                    <div class="image">
                                        <img src="" alt="" id="image4">
                                    </div>
                                    <div class="content">
                                        <div class="icon">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                        </div>
                                        <div class="text">
                                            No file chosen, yet!
                                        </div>
                                    </div>
                                    <div id="cancel-btn4"  class="cancel-btn">
                                        <i class="fas fa-times"></i>
                                    </div>
                                    <div class="file-name">
                                        File name here
                                    </div>
                                </div>
                                <div class="preview4">
                                    <button onclick="defaultBtn4Active()" class="custom-btn" id="custom-btn4" type="button">Choose a file</button>
                                    <input id="default-btn4" type="file" hidden name="image[]">
                                </div>
                            </div>
                            <div class="form-group float-start float-lg-end">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@push('script')
<script src="{{ asset('admin/assets/vendors/choices.js/choices.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/pages/form-element-select.js') }}"></script>
{{-- Cke Editor --}}
<script>
    CKEDITOR.replace('description', {
					// Define the toolbar groups as it is a more accessible solution.
					toolbarGroups: [
						{ "name": 'document', "groups": [ 'mode', 'document', 'doctools' ] },
                        { "name": 'clipboard', "groups": [ 'clipboard', 'undo' ] },
                        { "name": 'editing', "groups": [ 'find', 'selection', 'spellchecker', 'editing' ] },
                        { "name": 'forms', "groups": [ 'forms' ] },
                        { "name": 'basicstyles', "groups": [ 'basicstyles', 'cleanup' ] },
                        { "name": 'paragraph', "groups": [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                        { "name": 'links', "groups": [ 'links' ] },
                        { "name": 'insert', "groups": [ 'insert' ] },
                        { "name": 'styles', "groups": [ 'styles' ] },
                        { "name": 'colors', "groups": [ 'colors' ] },
                        { "name": 'tools', "groups": [ 'tools' ] },
                        { "name": 'others', "groups": [ 'others' ] },
                        { "name": 'about', "groups": [ 'about' ] }
					],
					// Remove the redundant buttons from toolbar groups defined above.
					removeButtons: 'Source,Save,Templates,PasteFromWord,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,CopyFormatting,RemoveFormat,Blockquote,CreateDiv,Outdent,Indent,BidiLtr,BidiRtl,Language,Link,Unlink,Anchor,Image,Flash,Table,HorizontalRule,SpecialChar,PageBreak,Iframe,Styles,Format,Font,FontSize,TextColor,BGColor,Maximize,ShowBlocks,About,NewPage,ExportPdf,Preview,Print'
				});
</script>
{{-- image preview --}}
<script>
         let wrappers = document.querySelector(".wrappers");
         let fileName = document.querySelector(".file-name");
         let defaultBtn = document.querySelector("#default-btn")
         let customBtn = document.querySelector("#custom-btn");
         let cancelBtn = document.querySelector("#cancel-btn i");
         let img = document.querySelector("#image");
         let defaultBtn2 = document.querySelector("#default-btn2");
         let customBtn2 = document.querySelector("#custom-btn2");
         let cancelBtn2 = document.querySelector("#cancel-btn2 i");
         let img2 = document.querySelector("#image2");
         let defaultBtn3 = document.querySelector("#default-btn3");
         let customBtn3 = document.querySelector("#custom-btn3");
         let cancelBtn3 = document.querySelector("#cancel-btn3 i");
         let img3 = document.querySelector("#image3");
         let defaultBtn4 = document.querySelector("#default-btn4");
         let customBtn4 = document.querySelector("#custom-btn4");
         let cancelBtn4 = document.querySelector("#cancel-btn4 i");
         let img4 = document.querySelector("#image4");
         let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
         function defaultBtnActive(){
           defaultBtn.click();
         }
         function defaultBtn2Active(){
           defaultBtn2.click();
         }
         function defaultBtn3Active(){
           defaultBtn3.click();
         }
         function defaultBtn4Active(){
           defaultBtn4.click();
         }
         defaultBtn.addEventListener("change", function(){
           let file = this.files[0];
           if(file){
             let reader = new FileReader();
             reader.onload = function(){
               let result = reader.result;
               img.src = result;
               wrappers.classList.add("actives");
             }
             cancelBtn.addEventListener("click", function(){
               img.src = "";
               wrappers.classList.remove("actives");
             })
             reader.readAsDataURL(file);
           }
           if(this.value){
             let valueStore = this.value.match(regExp);
             fileName.textContent = valueStore;
           }
         });
         defaultBtn2.addEventListener("change", function(){
           let file = this.files[0];
           if(file){
             let reader = new FileReader();
             reader.onload = function(){
               let result = reader.result;
               img2.src = result;
               wrappers.classList.add("actives");
             }
             cancelBtn2.addEventListener("click", function(){
               img2.src = "";
               wrappers.classList.remove("actives");
             })
             reader.readAsDataURL(file);
           }
           if(this.value){
             let valueStore = this.value.match(regExp);
             fileName.textContent = valueStore;
           }
         });
         defaultBtn3.addEventListener("change", function(){
           let file = this.files[0];
           if(file){
             let reader = new FileReader();
             reader.onload = function(){
               let result = reader.result;
               img3.src = result;
               wrappers.classList.add("actives");
             }
             cancelBtn3.addEventListener("click", function(){
               img3.src = "";
               wrappers.classList.remove("actives");
             })
             reader.readAsDataURL(file);
           }
           if(this.value){
             let valueStore = this.value.match(regExp);
             fileName.textContent = valueStore;
           }
         });
         defaultBtn4.addEventListener("change", function(){
           let file = this.files[0];
           if(file){
             let reader = new FileReader();
             reader.onload = function(){
               let result = reader.result;
               img4.src = result;
               wrappers.classList.add("actives");
             }
             cancelBtn4.addEventListener("click", function(){
               img4.src = "";
               wrappers.classList.remove("actives");
             })
             reader.readAsDataURL(file);
           }
           if(this.value){
             let valueStore = this.value.match(regExp);
             fileName.textContent = valueStore;
           }
         });
         $(document).ready(function(){
            let index = 1;
            $('.preview2').hide();
            $('.preview3').hide();
            $('.preview4').hide();
            $('#cancel-btn').on('click',function(){
                $('#default-btn').val('');
            });
            $('#btnPlus').on('click',function () {
                if (index === 1) {
                    $('#custom-btn').hide();
                }else{
                    $('#custom-btn'+index).hide();
                }
                index += 1;
                if (index === 4) {
                    $(this).hide();
                };
                $('.preview'+index).show();
            });
         });
</script>
@endpush
@endsection
