<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="baneer-text">
                    <ul>
                        <li>No Fees, Ever.</li>
                        <li>Earn More on</li>
                        <li>Alegro Homes.</li>
                        <li><button onclick="document.getElementById('id02').style.display = 'block';document.getElementById('id01').style.display = 'none';" style="width:auto;">Create account</button></li>
                        <li><a href="javascript:void(0);">Already Started Registration ? </a><button onclick="document.getElementById('id01').style.display = 'block';document.getElementById('id02').style.display = 'none';" style="width:auto;">Continue here</button></li>

                    </ul>
                </div>
            </div>					
        </div>				
    </div>
</section>

<section class="here">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h1>Here’s what we give you</h1>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <img src="<?= $this->Url->image('extranet/free-listing.png'); ?>">
                <h5>Free listings, with no fine print</h5>
                <p>No sign up fee, no membership cost, no cut of your room rate. No, really.</p>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <img src="<?= $this->Url->image('extranet/wide-exposure.png'); ?>">
                <h5>Free listings, with no fine print</h5>
                <p>No sign up fee, no membership cost, no cut of your room rate. No, really.</p>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <img src="<?= $this->Url->image('extranet/customer-support.png'); ?>">
                <h5>Free listings, with no fine print</h5>
                <p>No sign up fee, no membership cost, no cut of your room rate. No, really.</p>
            </div>
        </div>
    </div>
</section>

<section class="you-have">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h5>All you have to do</h5>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <img src="<?= $this->Url->image('extranet/sign-in-sign-up.png'); ?>">
                <p>Sign in or sign up for an Alegro account</p>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <img src="<?= $this->Url->image('extranet/upload-details.png'); ?>">
                <p>Upload your property details and pictures</p>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <img src="<?= $this->Url->image('extranet/go-live.png'); ?>">
                <p>Set your prices and available dates</p>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <img src="<?= $this->Url->image('extranet/set-prices.png'); ?>">
                <p>See your listing go live in front of millions of travelers</p>
            </div>
        </div></div>
</section>

<section class="properties">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h4>Small properties deserve a big audience.</h4>
            </div>
            <button type="button" class="btn btn-info">LIST YOUR PROPERTY</button>
        </div>
    </div>
</section>    



<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<style type="text/css">
    body {
        font-family: 'Open Sans', Helvetica, Arial, sans-serif;
    }
    .modal-confirm {		
        color: #636363;
        width: 325px;
    }
    .modal-confirm .modal-content {
        padding: 20px;
        border-radius: 5px;
        border: none;
    }
    .modal-confirm .modal-header {
        border-bottom: none;   
        position: relative;
    }
    .modal-confirm h4 {
        text-align: center;
        font-size: 26px;
        margin: 30px 0 -15px;
    }
    .modal-confirm .form-control, .modal-confirm .btn {
        min-height: 40px;
        border-radius: 3px; 
    }
    .modal-confirm .close {
        position: absolute;
        top: -5px;
        right: -5px;
    }	
    .modal-confirm .modal-footer {
        border: none;
        text-align: center;
        border-radius: 5px;
        font-size: 13px;
    }	
    .modal-confirm .icon-box {
        color: #000;		
        position: absolute;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: -70px;
        width: 95px;
        height: 95px;
        border-radius: 50%;
        z-index: 9;
        background: #f9d749;
        padding: 15px;
        text-align: center;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    }
    .modal-confirm .icon-box i {
        font-size: 58px;
        position: relative;
        top: 3px;
    }
    .modal-confirm.modal-dialog {
        margin-top: 80px;
    }
    .modal-confirm .btn {
        color: #000;
        border-radius: 4px;
        background: #f9d749;
        text-decoration: none;
        transition: all 0.4s;
        line-height: normal;
        border: none;
    }
    .modal-confirm .btn:hover, .modal-confirm .btn:focus {
        background: #f9d749;
        outline: none;
    }
    .trigger-btn {
        display: inline-block;
        margin: 100px auto;
    }
    .modal-open{
        overflow: hidden;
    }
    .modal-open .modal {
    background: rgba(0,0,0,0.70);

}
</style>
<script>
$(document).ready(function(){
    $('body').attr('class',"modal-open");
    
});
function getClose(id){
    var targetUrl = "<?php echo HTTP_ROOT; ?>extranets"
    $('#'+id).removeClass('in');
    $('#'+id).hide();
    $('body').attr('class',"");
    window.history.pushState({url: "" + targetUrl + ""}, '', targetUrl);
}
</script>
<div id="accountConfirmed" class="modal fade in" style="display: block; padding-left: 12px;">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content" style='width: 100%;height: auto;'>
            <div class="modal-header">
                <div class="icon-box">
                    <i class="material-icons">&#xe898;</i>
                </div>				
                <h4 class="modal-title">All Set!</h4>	
            </div>
            <div class="modal-body">
                <p class="text-center">Your account has been successfully confirmed. You can now log into your Alegro account.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-block" onclick='getClose("accountConfirmed")'>OK</button>
            </div>
        </div>
    </div>
</div> 