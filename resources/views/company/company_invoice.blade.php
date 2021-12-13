 <!-- About Section -->
 <style type="text/css">
    @font-face {
      font-family: Ubuntu;
      src: url('../assets/fonts/Ubuntu/Ubuntu-Regular.ttf'); 
    }

    @font-face {
      font-family: Ubuntu-Medium;
      src: url('../assets/fonts/Ubuntu/Ubuntu-Medium.ttf'); 
    }

    @font-face {
      font-family: Ubuntu-Bold;
      src: url('../assets/fonts/Ubuntu/Ubuntu-Bold.ttf'); 
    }
    section.maincontents{
        background: url(../assets/images/invoice-bg.svg) no-repeat;
        background-size: 100%;
        background-position: center 12%;
        /*min-height: 13%;*/
        /* margin-bottom: -1px; */
     }
     .myinvoice.inv-cont{
        box-shadow: 2px 2px 3px 3px #ddd;
        border: none;
        /*bottom: 3em;
        position: relative;*/
        padding: 1.5em 5em !important;
    }
    .inv-company,body{
        font-family: 'Ubuntu-Medium';
    }
    .inv-company .inv-title{
        color: #ff0000;;
    }
    .inv-company .inv-name{
        margin: -7px 0 19px;
    }
    .invoice-tbl{
        border-bottom: .1rem solid #d6d7d9;
        padding: 0 0 5px 0;
    }
    .invoice-tbl td,
    .invoice-tbl th,
    .invoice-detail-tbl td{
        border:0 ;
    }
    .invoice-tbl .invoice-title{
        font-size: 23px;
        font-family: 'Ubuntu-Bold';
        /*font-weight: bold;*/
        text-align: right;
    }
    .invoice-tbl,
    .desc-tbl,
    .invoice-detail-tbl{
        width: 100%;
    }
    .invoice-detail-tbl{
        font-family: 'Ubuntu';
        margin: 1em 0;
    }
    .invoice-detail-tbl td{
        padding: 5px 2em 0px 0px;
        /*line-height: 1.5;*/
        background: #FFFFFF;
        font-family: 'Ubuntu-Medium';
    }
    .invoice-detail-tbl .td-title{
        color: #2670e0;
    }
    .desc-tbl thead{
        background: #06D6A0;
        border: none;
        font-size: 15px;
        font-weight: bold;
        font-family: 'Ubuntu-Medium';
    }
    .desc-tbl{
        font-family:'Ubuntu', sans-serif !important;
    }
    .desc-tbl td{
        /*padding: .5rem .5rem;*/
        font-family: 'Ubuntu-Medium';
        padding: .75rem;
        background-color: var(--bs-table-bg);
        border-bottom-width: 1px;
        box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
    }
    .desc-tbl tr:nth-child(even){
        background-color: #ddd;
    }
    .desc-tbl tr.total{
        background: none;
    }
    .desc-tbl tr.total td{
        background: #2670e0;
        color: #FFFFFF;
        font-size: 15px;
        font-weight: bold;
        font-family: 'Ubuntu';
        padding: .5rem;
    }
    .desc-tbl tr.total td:first-child{
        float: right;
        background: #2670e0;
    }
    .back-btn{
        /*margin: 1em 0;*/
        padding: 0;
    }
    .back-btn img{
        padding: 0px 7px 0px 0px;
        top: 0;
        position: relative;
    }
    .back-btn a{
        font-family: 'Ubuntu-Medium';
        color: #212529;
        text-decoration: none;
        padding: 0;
    }
    .invoice-tbl h4{
        font-family: 'Ubuntu-Medium', sans-serif !important;
        font-size: 25px;
     }
    .payment-divider-line{
        border-bottom: .15rem solid #d6d7d9;
        width: 100%;
        /*margin: 1rem 0 1.5rem;*/
     }
     .panel-info{
        width: 100%;
     }
     .order-note{
        padding: 0;
     }
     .order-note p{
        font-family: 'Ubuntu';
        color: #212529;
     }
 </style>
<section class="mb-0 maincontents">
    <div class="container">      
        <div class="row">      
            <div class="col-md-12 col-lg-12">
                <div class="inv-cont myinvoice">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered invoice-tbl">
                                    <thead>
                                        <tr class="header">
                                            <td width="71%"><a href="{{url('/')}}" class="brand-link"><img class="invoice-logo" src="{{asset('/assets/theme_image/v1-logo.svg')}}" width="200" title="Visible One SSL Digital Certificate Service"></a></td>
                                            <!-- <td width="20%" class="invoice-title">Invoice <span>发票</span></td> -->
                                            <td width="29%" class="invoice-title">InvoiceNo. <span style="font-weight: bold;">{{isset($sale->invoice_no)? $sale->invoice_no:''}}</span></td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                           <!--  <div class="payment-divider-line"></div> -->
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered invoice-detail-tbl">
                                   <tbody>
                                        <tr class="header">
                                            <!-- <td width="40%">{{isset($sale->company)? $sale->company:''}}</td> -->
                                            <td width="40%">Lobahn Technology</td>
                                            <td width="30%" class="td-title">Payment Amount</td>
                                            <td width="30%" class="td-title">Payment Method</td>
                                        </tr>
                                        <tr class="header">
                                            <td width="40%">Address</td>
                                            <td width="30%">$ 100.00</td>
                                            <td width="30%">Paypal </td>
                                        </tr>
                                        <tr class="header">
                                            <td width="40%">09755735300</td>
                                            <td width="30%" class="td-title">Invoice Date</td>
                                            <td width="30%" class="td-title">Order Status</td>
                                        </tr>
                                        <tr class="header">
                                            <td width="40%">Shwebo.</td>                               
                                            <td width="40%">10-10-2021</td>
                                            <td width="40%">Complete </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="inv-company">
                                <p class="inv-title">Invoice To :</p>
                                <p class="inv-name">Lobahn Technology Co., Ltd.</p>
                            </div>
                        </div>
                    <div class="panel panel-info">
                        <!-- <div class="panel-heading">
                            <div class="panel-title"><h5>Amount <span>數額</span></h5></div>
                        </div> -->
                        <div class="table-responsive">
                            <table cellspacing="0" cellpadding="0" class="table table-striped desc-tbl" style="font-family:'Ubuntu-Medium';">
                                <thead>
                                    <tr class="tr-success">
                                        <td width="80%">Description</td>
                                        <td width="20%">Amount</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    	<td>Description ONe</td>
                                    	<td>100.00</td>
                                    </tr>
                                    <tr class="title">
                                        <td class="textright">Subtotal :</td>
                                        <td class="textcenter">$ 100.00</td>
                                    </tr> 
                                    
                                    <tr class="total">
                                        <td class="textright">Total :</td>
                                        <td class="textcenter">$ 100.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="text-left back-btn col-12">
                        <a href="#" class="btn"><img src="../assets/images/invoice-back.svg">Go Back</a>
                        
                    </div>
                </div>
            
          </div>    
      </div>
  </div>

</section>

<!-- end of content block -->