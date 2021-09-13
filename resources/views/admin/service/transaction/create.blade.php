@extends('admin.layouts.master')
@section('transaction_service','active')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Service</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    {{ Breadcrumbs::render('service_transaction_create') }}
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                    <form action="{{ route('service_transaction.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Customer Name</label>
                            <input type="text" class="form-control" name="customer_name">
                            <input type="hidden" id="grand_total" name="grand_total">
                        </div>
                        <div class="form-group">
                            <label for="">Customer Address</label>
                            <input type="text" class="form-control" name="customer_address">
                        </div>
                        <div class="form-group">
                            <label for="">Customer Telp</label>
                            <input type="text" class="form-control" name="customer_telp">
                        </div>
                        <div class="form-group">
                            <label for="">Payment Status</label>
                            <select name="payment_status" id="payment_status" class="form-select">
                                <option value="{{ \App\Models\ServiceTransaction::PAID }}">Pay Directly</option>
                                <option value="{{ \App\Models\ServiceTransaction::UNPAID }}">Pay Indirectly</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Service</label>
                            @foreach ($service as $item)
                            <div class="form-check" id="checkbox">
                                    <input class="form-check-input servicecheckbox"  type="checkbox" value="{{ $item->id."|".$item->fee }}" name="service[]" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $item->name  }}  Rp. <span class="uang">{{ $item->fee }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                        <div id="paid">
                        <div class="form-group row">
                            <div class="col-md-9 float-end">
                                <label class="col-form-label float-end">Total</label>
                            </div>
                            <div class="col-md-3 float-end">
                                <input type="text" id="total" class="form-control float-end uang" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-9 float-end">
                                <label class="col-form-label float-end">Payment</label>
                            </div>
                            <div class="col-md-3 float-end">
                                <input type="text" class="form-control float-end uang" id="payment">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-9 float-end">
                                <label class="col-form-label float-end">Kembalian</label>
                            </div>
                            <div class="col-md-3 float-end">
                                <input type="text" class="form-control float-end uang " id="kembalian" disabled>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1" id="btnSubmit" disabled>Submit</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@push('script')
<script>
    CKEDITOR.replace('detail', {
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
<script>
    function maskRupiah(angka) {
    var   bilangan = angka;

    var reverse = bilangan.toString().split('').reverse().join(''),
      ribuan  = reverse.match(/\d{1,3}/g);
      ribuan  = ribuan.join('.').split('').reverse().join('');

    // Cetak hasil
    return ribuan;
  }
    $( '.uang' ).mask('000.000.000', {reverse: true});
    $( '.servicecheckbox').on('click',function () {
        let total = 0;
        var searchIDs = $('input:checked').map(function(){
            let harga = $(this).val();
            const hargaArray = harga.split('|');
            harga = hargaArray[1];
            return hargaArray[1];
        });
        for (let index = 0; index < searchIDs.length; index++) {
            total = total + parseInt(searchIDs[index]);
        }
        $('#total').val(maskRupiah(total));
        $('#grand_total').val(total);
    });
    $('#payment_status').on('change',function(){
        let status =  $(this).val();
        if(status == "unpaid"){
            $('#paid').hide('slow');
            $('#btnSubmit').prop('disabled', false);
        }else{
            $('#btnSubmit').prop('disabled', true);
            $('#paid').show('slow');
        }
    });
    $('#payment').on('input',function(){
        v_price = $('#total').val();
        v_price = v_price.replace(/\./g, '');
        pay = $(this).val();
        pay = pay.replace(/\./g, '');
        if(parseInt(v_price) == parseInt(pay) || parseInt(pay) >= parseInt(v_price)){
            $(this).addClass('is-valid');
            $('#btnSubmit').prop('disabled', false);
            if(parseInt(pay) >= parseInt(v_price)){
                hasil = parseInt(pay) - parseInt(v_price);
                $('#kembalian').val(maskRupiah(hasil));
            }
        }else{
            $('#kembalian').val(0);
            $(this).removeClass('is-valid');
            $('#btnSubmit').prop('disabled', true);
        }
    });
</script>
@endpush
@endsection
