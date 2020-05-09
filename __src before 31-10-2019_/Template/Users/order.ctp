<section id="header-section" class="main-yellow-bg">


    <?php echo $this->element('frontend/login-header'); ?>


    <?php

//https://free.currencyconverterapi.com
    function convertCurrency($amount, $from = "AOA", $to = "USD") {
        $conv_id = "{$from}_{$to}";
        $string = file_get_contents("https://free.currencyconverterapi.com/api/v6/convert?q=$conv_id&compact=ultra&apiKey=5b92484fbf91b305348a");
        $json_a = json_decode($string, true);

        return $amount * round($json_a[$conv_id], 6);
    }

//pj($dats);
    ?>

    <form name="myform" action="<?php echo $paypal_url; ?>" method="post">
        <input type="hidden" name="business" value="prusty.abhimanyu-facilitator@gmail.com" />  
        <input type="hidden" value="_xclick" name="cmd"/>
        <input type="hidden" name="notify_url" value="<?php echo HTTP_ROOT . "users/paypal_process/" . $refer_idd; ?>" />
        <input type="hidden" name="cancel_return" value="<?php echo $cancel_return; ?>" />
        <input type="hidden" name="return" value="<?php echo $success_return; ?>" />
        <input type="hidden" name="rm" value="2" />
        <input type="hidden" name="lc" value="" />
        <input type="hidden" name="no_shipping" value="1" />
        <input type="hidden" name="no_note" value="1" />
        <input type="hidden" name="currency_code" value="USD" />
        <input type="hidden" name="page_style" value="paypal" />
        <input type="hidden" name="charset" value="utf-8" />
    <!--<input type="hidden" name="item_name" value="<?= $refer_idd; ?>" />-->
        <input type="hidden" name="item_name" value="New order form alegro.co.ao" />
        <input type="hidden" name="cbt" value="Back to FormGet" />        
        <input type="hidden" name="amount" value="<?php echo(convertCurrency($dats["total_cost"])); ?>" />
    </form>

    <script type="text/javascript">
        document.myform.submit();
    </script>


    <script type="text/javascript">
        function myFunction() {
            document.getElementById('deli').style = "display:block;";
        }
    </script>
    <script type="text/javascript">
        function myFunction2() {
            document.getElementById('pay').style = "display:block;";
        }
    </script>

    <div class="basket">
        <div class="container" style="padding:10%;">
            <div class="row clearfix"> <div class="wait">PayPal is processing the payment, please wait...</div>
                <div class="col-sm-12">

                    <div></div>
                    <div></div>
                    <div></div>
                    <div class="loader">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</section>
<div style="margin-left: 38%"><img src="<?= HTTP_ROOT; ?>img/processing_animation.gif"/></div>
Payment Processing
<style>
    #mhead{
        background-color: #f5f5f5;
        border: 1px solid #e3e3e3;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
        -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
        text-align: center;
        font-family: georgia;
        position: fixed;
        top: 0px;
        width: 100%;
        margin-bottom: 50px;
    }
    #product{
        position: relative;
        width: 300px;
        margin: 150px auto;
        background: #efefef;
        border: 1px solid #e3e3e3;
        border-radius: 10px;
        padding: 15px;
        text-align: center;
    }

    input[type="submit"]{
        display: block;
        background: #er4rer;
        width: auto;
        font-weight: bold;
        height: 30px;
        margin: auto;
        color: #000;
        margin-top: 20px;
    }

    #myad{
        display: block;
        position:relative;
        margin: 30px auto;
        margin-top: 100px;
        width: 780px;}

    .red{
        color:red;}
    .wait {
        width: auto;
        /* height: 72px; */
        position: absolute;
        top: 45%;
        left: 52%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }
    .loader {
        width: 100px;
        height: 20px;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }
    .loader > div {
        content: " ";
        width: 15px;
        height: 15px;
        background: #2196F3;
        border-radius: 100%;
        position: absolute;
        -webkit-animation: shift 2s linear infinite;
        animation: shift 2s linear infinite;
    }
    .loader > div:nth-of-type(1) {
        -webkit-animation-delay: -.4s;
        animation-delay: -.4s;
    }
    .loader > div:nth-of-type(2) {
        -webkit-animation-delay: -.8s;
        animation-delay: -.8s;
    }
    .loader > div:nth-of-type(3) {
        -webkit-animation-delay: -1.2s;
        animation-delay: -1.2s;
    }
    .loader > div:nth-of-type(4) {
        -webkit-animation-delay: -1.6s;
        animation-delay: -1.6s;
    }

    @-webkit-keyframes shift {
        0% {
            left: -60px;
            opacity: 0;
            background-color: yellow;
        }
        10% {
            left: 0;
            opacity: 1;
        }
        90% {
            left: 100px;
            opacity: 1;
        }
        100% {
            left: 160px;
            background-color: red;
            opacity: 0;
        }
    }

    @keyframes shift {
        0% {
            left: -60px;
            opacity: 0;
            background-color: yellow;
        }
        10% {
            left: 0;
            opacity: 1;
        }
        90% {
            left: 100px;
            opacity: 1;
        }
        100% {
            left: 160px;
            background-color: red;
            opacity: 0;
        }
    }

</style>
<?php echo $this->element('frontend/inner-footer'); ?>