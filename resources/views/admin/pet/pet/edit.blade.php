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
                    {{ Breadcrumbs::render('edit_pet',$pet->id) }}
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
                            <a class="nav-link active" aria-current="page" href="#">Pet Information</a>
                            <a class="nav-link" href="{{ url('pet/image/'.$pet->id.'/edit') }}">Pet Image</a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Pet Information</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pet.update',$pet->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $pet->name }}">
                            </div>
                            <div class="form-group">
                                <label for="">Category</label>
                                <select class="choices form-select" name="category_id">
                                    <option value="{{ $pet->category->id }}">{{ $pet->category->name }}</option>
                                    @foreach ($category as $item)
                                    @if ($item->id != $pet->category->id)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Description</label>
                                <textarea type="text" class="form-control round" name="description"  id="description">
                                    {!! $pet->description !!}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="text" class="form-control" name="price" value="{{ $pet->price }}">
                            </div>
                            <div class="form-group">
                                <label for="">Weight</label>
                                <input type="text" class="form-control" name="weight" value="{{ $pet->weight }}">
                            </div>
                            <div class="form-group">
                                <label for="">Stock</label>
                                <input type="text" class="form-control" name="stock" value="{{ $pet->stock }}">
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-select">
                                    <option value="{{ $pet->status }}">{{ $pet->status }}</option>
                                    @if ($pet->status == "Active")
                                        <option value="Inactive">Inactive</option>
                                        <option value="Draft">Draft</option>
                                    @elseif($pet->status == "Inactive")
                                        <option value="Active">Active</option>
                                        <option value="Draft">Draft</option>
                                    @else
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group float-start float-lg-end">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                 </div>
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
@endpush
@endsection
