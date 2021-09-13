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
                    {{ Breadcrumbs::render('service_transaction_show') }}
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-title">
                        <br>
                        <div class="btn-group mb-3 float-end" role="group" style="margin-right: 20px">
                            <a href="{{ url('service_transaction/'.$transaction->id.'/print') }}" class="btn btn-primary icon icon-left" href="" target="_blank">
                                Print
                                <i class="bi bi-printer"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="text-center" style="font-size: 150%!important;">
                                <i class="fa fa-paw"></i>
                                <span class="text-default-d3">Petshop.com</span>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div>
                                        <span class="text-sm text-grey-m2 align-middle">To:</span>
                                        <span class="text-600 text-110 text-blue align-middle">{{ $transaction->customer_name }}</span>
                                    </div>
                                    <div class="text-grey-m2">
                                        <div class="my-1">
                                            {{ $transaction->customer_address }}
                                        </div>
                                        <div class="my-1"><i class="fab fa-whatsapp text-secondary"></i> <b class="text-600">{{ $transaction->customer_telp }}</b></div>
                                    </div>
                                </div>
                                <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                    <div class="text-grey-m2">
                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Invoice No:</span> {{ $transaction->code }}</div>
                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Transaction Date:</span>{{ date('d-m-Y',strtotime($transaction->transaction_date )) }}</div>
                                        @if ($transaction->payment_status == \App\Models\ServiceTransaction::PAID )
                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Payment Status:</span> <span class="badge bg-success  rounded-pill px-25">{{ $transaction->payment_status }}</span></div>
                                        @else
                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Payment Status:</span> <span class="badge bg-warning  rounded-pill px-25">{{ $transaction->payment_status }}</span></div>
                                        @endif

                                    </div>
                                </div>
                                <div class="mt-4">
                                    @php
                                        $i =1;
                                    @endphp
                                    <table class="table table-striped">
                                        <thead>
                                            <tr class="table-dark">
                                                <th>No</th>
                                                <th>Service</th>
                                                <th>Fee</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transaction->detail as $item)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $item->items->name }}</td>
                                                <td>{{ number_format($item->items->fee) }}</td>
                                            </tr>
                                            @endforeach
                                            <tr class="table-dark">
                                                <td colspan="2" class="text-right">Total</td>
                                                <td>{{ number_format($transaction->grand_total) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        @if ($transaction->status == \App\Models\ServiceTransaction::CREATED)
                                        <a href="{{ url('service_transaction/'.$transaction->id.'/process') }}" class="btn btn-primary rounded-pill float-end">Process</a>
                                        @elseif($transaction->status == \App\Models\ServiceTransaction::PROCESSED)
                                        <a href="{{ url('service_transaction/'.$transaction->id.'/finish') }}" class="btn btn-primary rounded-pill float-end">Finish</a>
                                        @else

                                        @endif
                                    </div>
                                </div>
                                @if ($transaction->status == \App\Models\ServiceTransaction::WAITING)
                                    <div class="form-group row">
                                        <div class="col-md-9 float-end">
                                            <label class="col-form-label float-end">Total</label>
                                        </div>
                                        <div class="col-md-3 float-end">
                                            <input type="text" id="total" class="form-control float-end uang" value="{{ $transaction->grand_total }}" disabled>
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
                                    <div class="form-group row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6">
                                            <a href="{{ url('service_transaction/'.$transaction->id.'/payment') }}" id="buttonPay" class="btn btn-primary float-end disabled">Pay</a>
                                        </div>
                                    </div>
                                    @endif
                            </div>
                        </div>
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
        $('#grand_total').val(total);
        $('#grandtotal').text("Rp." + maskRupiah(total));
    });
    $('#payment').on('input',function(){
        v_price = $('#total').val();
        v_price = v_price.replace(/\./g, '');
        pay = $(this).val();
        pay = pay.replace(/\./g, '');
        if(parseInt(v_price) == parseInt(pay) || parseInt(pay) >= parseInt(v_price)){
            $(this).addClass('is-valid');
            $('#buttonPay').removeClass('disabled')
            if(parseInt(pay) >= parseInt(v_price)){
                hasil = parseInt(pay) - parseInt(v_price);
                $('#kembalian').val(maskRupiah(hasil));
            }
        }else{
            $('#kembalian').val(0);
            $(this).removeClass('is-valid');
            $('#buttonPay').addClass('disabled')
        }
    });
</script>
@endpush
@endsection
