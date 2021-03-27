<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=0">
        <title>Eun Academy | Receipt</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <section class="home-block">
            <div class="inner-container">
                <div class="head-block">
                    <div class="row">
                        <div class="col-md-6 col-6">
                            <div class="logo"><img src="{{ asset('assets/images/eun.png') }}" alt=""></div>
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="head-content">
                                <h4 class="text-right">Eun Professional Academy</h4>
                                <h6 class="text-right">ISO 9001 : 2015 Certified <br>
                                    CIN No: U80904AS2018PTC018558 <br>
                                    www.eungroup.in</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="head-row2">
                                <h4>Money Receipt#   {{ $receipt->money_receipt_no }}</h4>
                                <img src="{{ asset('assets/images/eun-bd.png') }}" alt="" class="monry">
                            </div>
                        </div>
                        <div class="col-6">
                            <h4 class="text-center date">Date: {{ $receipt->invoice_date }}</h4>
                        </div>
                    </div>
                </div>
                <div class="top-middle">
                    <div class="row">
                        <div class="col-md-6 col-6">
                            <h6 style="font-style: italic;font-family: 'Times New Roman', serif;font-size: 25px;">Received with thanks from#</h6>
                            <h5 style="font-size: 30px;font-weight: 700;margin-bottom: 0;padding-left: 50px;">Hello {{ $receipt->student->name }}</h5>
                            <h5 style="font-size: 30px;font-weight: 700;margin-bottom: 0;padding-left: 50px;">{{ $receipt->student->mobile }}</h5>
                        </div>
                        <div class="col-md-6 col-6">
                            <h5 class="text-center" style="font-size: 30px;font-weight: 700;margin-bottom: 0;padding-left: 50px;">{{ $receipt->branch->name }}</h5>
                        </div>
                    </div>
                    <div class="item-table">
                        <div class="row itable">
                            <div class="col-md-1 col-1 text-center" style="background-color: #4a73b9;">
                                <h5 style="color: #fff;">Sl.</h5>
                            </div>
                            <div class="col-md-5 col-5 light-gery">
                                <h5 style="z-index: 9;position: relative;color: #fff">Description</h5>
                                <img src="{{ asset('assets/images/eun-bd.png') }}" alt="" class="tabl-bg">
                            </div>
                            <div class="col-md-2 col-2 text-center light-gery">
                                <h5>Price</h5>
                            </div>
                            <div class="col-md-2 col-2 text-center light-gery">
                                <h5>Qty</h5>
                            </div>
                            <div class="col-md-2 col-2 text-center light-gery">
                                <h5>Total</h5>
                            </div>
                        </div>  
                        @if (isset($receipt->receiptItem) && !empty($receipt->receiptItem))
                        <div class="row all-feild bd-fff">
                            @foreach ($receipt->receiptItem as $ri)
                                <div class="col-1 text-center light-gery">
                                    <h5>{{ $loop->iteration }}</h5>
                                </div>
                                <div class="col-5">
                                    <h5>{{ $ri->name }}</h5>
                                </div>
                                <div class="col-2 text-center light-gery">
                                    <h5>₹ {{ number_format($ri->price, 2) }}</h5>
                                </div>
                                <div class="col-2 text-center">
                                    <h5>{{ $ri->qty }}</h5>
                                </div>
                                <div class="col-2 text-center light-gery">
                                    <h5>₹ {{ number_format($ri->total, 2) }}</h5>
                                </div>
                            @endforeach
                        </div>                                   
                        @else
                        <div class="row all-feild">
                            <div class="col-1 text-center light-gery">
                                No data found
                            </div>
                        </div>
                        @endif                                 
                        {{-- <div class="row all-feild">
                            <div class="col-1 text-center light-gery">
                                <h5>1.</h5>
                            </div>
                            <div class="col-5">
                                <h5>Admission</h5>
                            </div>
                            <div class="col-2 text-center light-gery">
                                <h5>₹ 999.</h5>
                            </div>
                            <div class="col-2 text-center">
                                <h5>1</h5>
                            </div>
                            <div class="col-2 text-center light-gery">
                                <h5>₹ 999</h5>
                            </div>
                        </div>   --}}
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <h4 class="text-left" style="font-weight: 700;">{{ $receipt->branch->city }}, {{ $receipt->branch->state }}, <br> {{ $receipt->branch->address }} <br>
                                Call: {{ $receipt->branch->mobile }}</h4>
                        </div>
                        <div class="col-4">
                            <div class="head-row2">
                                <h4 class="total">Total ₹ {{ $receipt->grand_total }}</h4>
                                <img src="{{ asset('assets/images/eun-bd.png') }}" alt="" class="monry">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom-middle text-right">  
                    <h4>Authorised Signature</h4>  
                </div>
                <div class="foot-block">
                    <div class="row">
                        <div class="col-12">
                            <h4>Thank You</h4>
                            <img src="{{ asset('assets/images/eun-bd.png') }}" alt="" class="monry f-bg">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
    <style>
        body { padding: 0;margin: 0;font-family: "Poppins", sans-serif;font-size: 15px;}
        img{max-width: 100%;}
        .home-block {padding: 50px}
        .inner-container {border: 1px solid #eceded;min-height: 500px;}
        .head-block {background:#e6e6e5;min-height: 150px;}
        .logo {padding: 10px;padding-left: 50px;padding-left: 150px;padding-bottom: 0;}
        .logo img {width: 30%;}
        .head-content{padding: 10px;padding-bottom: 0;}
        .head-content h4 {font-weight: 700;font-size: 35px;font-style: italic;font-family: "Times New Roman", serif;}
        .head-content h6 {font-size: 20px;font-weight: 700;line-height: 26px;font-style: italic;font-family: "Times New Roman", serif;}
        .head-row2 h4 {position: relative;z-index: 99;font-size: 30px;line-height: 68px;padding-left: 30px;color: #fff;    margin-bottom: 0;}
        .monry{position: absolute; top:0}
        .date {font-size: 30px;line-height: 68px;margin-bottom: 0;}

        /* top-middle */
        .top-middle{padding: 70px 60px;}
        .item-table{padding: 30px 0;}
        .item-table .all-feild:last-child{border-bottom: none;}
        .item-table .itable {border-bottom: 2px solid #fff;}
        .tabl-bg{position:absolute;width: 95%;left: 0px;top:0;height: 44px;}

        /* bottom-middle */
        .bottom-middle {padding-right: 30px;}
        .bottom-middle h4 {display: inline-block;border-top:1px solid #333;padding: 10px 10px 0;margin-bottom: 30px;}

        /* foot-block */
        .foot-block, .light-gery {background-color: #eceded;}
        .foot-block h4{position: relative;z-index: 9;color: #fff;padding-left: 60px;line-height: 68px;margin-bottom: 0;}
        .itable h5 {padding: 10px 0;margin-bottom: 0;}
        .all-feild {border-bottom: 2px solid #a8a5a2;}
        .all-feild h5 {padding: 10px 0;margin-bottom: 0;}
        .head-row2 .total {line-height: 41px;}
        
        /* Print-style */
        @media print {
            .logo {padding-left: 100px}
            .logo img {width: 40%;}
            .head-row2 h4, .date { line-height: 50px;}     
            .f-bg {width: 50%;}
            .foot-block h4 {line-height: 50px;}
            .head-row2 .total {line-height: 28px;font-size: 20px;}
    </style>
</html>