<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice Petshopku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <style>
        body{
    margin-top:20px;
    color: #484b51;
}
.text-secondary-d1 {
    color: #728299!important;
}
.page-header {
    margin: 0 0 1rem;
    padding-bottom: 1rem;
    padding-top: .5rem;
    border-bottom: 1px dotted #e2e2e2;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
}
.page-title {
    padding: 0;
    margin: 0;
    font-size: 1.75rem;
    font-weight: 300;
}
.brc-default-l1 {
    border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
    margin-left: -.25rem!important;
}
.mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
    color: #888a8d!important;
}

.text-success-m2 {
    color: #86bd68!important;
}

.font-bolder, .text-600 {
    font-weight: 600!important;
}

.text-110 {
    font-size: 110%!important;
}
.text-blue {
    color: #478fcc!important;
}
.pb-25, .py-25 {
    padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
    padding-top: .75rem!important;
}
.bgc-default-tp1 {
    background-color: rgba(121,169,197,.92)!important;
}
.bgc-default-l4, .bgc-h-default-l4:hover {
    background-color: #f3f8fa!important;
}
.page-header .page-tools {
    -ms-flex-item-align: end;
    align-self: flex-end;
}

.btn-light {
    color: #757984;
    background-color: #f5f6f9;
    border-color: #dddfe4;
}
.w-2 {
    width: 1rem;
}

.text-120 {
    font-size: 120%!important;
}
.text-primary-m1 {
    color: #4087d4!important;
}

.text-danger-m1 {
    color: #dd4949!important;
}
.text-blue-m2 {
    color: #68a3d5!important;
}
.text-150 {
    font-size: 150%!important;
}
.text-60 {
    font-size: 60%!important;
}
.text-grey-m1 {
    color: #7b7d81!important;
}
.align-bottom {
    vertical-align: bottom!important;
}

    </style>
</head>
<body onload="window.print()">
<div class="page-content container">
    <div class="container px-0">
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
            </div>
    </div>
</div>
</body>
</html>
