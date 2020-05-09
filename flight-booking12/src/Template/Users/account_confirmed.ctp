    


<?= $this->element('frontend/banner'); ?>
<section id="cta" data-slides='["<?php echo HTTP_ROOT ?>img/cta_bg1.jpg", "<?php echo HTTP_ROOT ?>img/cta_bg2.jpg", "<?php echo HTTP_ROOT ?>img/cta_bg3.jpg"]'>
    <div class="bg-overlay"></div>

    <?php echo $this->element('frontend/header'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="main-cta text-center">
                    <h1>Search For Cheap Flights</h1>
                    <h3>THE BEST WAY TO BUY CHEAP AIR TICKETS</h3>
                </div>
            </div>
        </div>
        <?php echo $this->element('frontend/search'); ?>



        <div class="row justify-content-center">
            <div class="col-md-1 text-center">
                <a href="#why-book-with-us" class="flight-click hvr-sink">
                    <img src="<?php echo HTTP_ROOT ?>img/flight_continue.png" />
                </a>
            </div>
        </div>

    </div>

</section>
<?= $this->element('frontend/why-book-with-us'); ?>
<?= $this->element('frontend/testimonials'); ?>
<?= $this->element('frontend/destination-carousel'); ?>
<?= $this->element('frontend/newsletter'); ?>
<?= $this->element('frontend/footer'); ?>

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
    var targetUrl = "<?php echo HTTP_ROOT ?>"
    $('#'+id).removeClass('in');
    $('#'+id).hide();
    $('body').attr('class',"");
    window.history.pushState({url: "" + targetUrl + ""}, '', targetUrl);
}
</script>
<div id="accountConfirmed" class="modal fade in" style="display: block; padding-left: 12px;">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
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