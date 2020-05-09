<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


<style type="text/css">
    .modal-confirm.modal-dialog {
        margin-top: 18%;
    }

    .fade.in{
        opacity:1
    }
    body {
        font-family: 'Open Sans', Helvetica, Arial, sans-serif;
    }
    .modal{background: rgba(0,0,0,0.70);}
    .modal-confirm {		
        color: #636363;
        width: 550px;
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
</style>

<?php if ($message == 'logout') { ?>
    <div id="logout-model" class="modal fade in" style="display: block;">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="material-icons">&#xe8ac;</i>
                    </div>				
                    <h4 class="modal-title"><?php echo __('Logged Out!')?></h4>	
                </div>
                <div class="modal-body">
                    <p class="text-center"><?php echo __('You´ve been successfully logged out from your account. You can log back in at anytime.')?></p>
                </div>
                <div class="modal-footer">
                    <span class="btn btn-success btn-block" onclick='getClose("logout-model")'><?php echo __('OK')?></span>
                </div>
            </div>
        </div>
    </div>  

<?php } elseif ($message == 'profile_is_not_update') { ?>  
    <div id="myModal_first_time" class="modal fade in" style="display: block;">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="material-icons">&#xe536;</i>
                    </div>				
                    <h4 class="modal-title"><?php echo __('Hi, Rafael!')?> <?php echo $this->request->getSession()->read('Auth.User.name'); ?>!</h4>	
                </div>
                <div class="modal-body">
                    <p class="text-center"><?php echo __('It´s nice to have you onboard. Before booking your first trip, kindly update the rest of the info on your profile page.')?></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success btn-block" onclick='getOnces("myModal_first_time",<?php echo $this->request->getSession()->read('Auth.User.id'); ?>)'><?php echo __('OK')?></button>
                </div>
            </div>
        </div>
    </div>      

<?php } elseif ($message == 'Profile updated sucessfully.') { ?>  
    <div id="profileupdate" class="modal" style="display: block;">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE876;</i>
				</div>				
				<h4 class="modal-title"><?php echo __('All Done!')?></h4>	
			</div>
			<div class="modal-body">
				<p class="text-center"><?php echo __('Your info has been successfully updated.')?></p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success btn-block" onclick='getClose("profileupdate")'><?php echo __('OK')?></button>
			</div>
            </div>
        </div>
    </div>      
<?php }else if($message == "Password changed successfully."){
    ?>
<div id="pwdCngSuc" class="modal" style="display: block;">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE876;</i>
				</div>				
				<h4 class="modal-title"><?php echo __('Password Changed!')?></h4>	
			</div>
			<div class="modal-body">
				<p class="text-center"><?php echo __('Your password has been successfully changed.')?></p>
			</div>
			<div class="modal-footer">
				<span class="btn btn-success btn-block" onclick='getClose("pwdCngSuc")'><?php echo __('OK')?></span>
			</div>
            </div>
        </div>
</div> 
<?php
}else if($message == "Password changed successfully now you can login."){
    ?>
<div id="pwdCngSuc" class="modal" style="display: block;">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                <div class="icon-box">
                    <i class="material-icons">&#xE876;</i>
                </div>              
                <h4 class="modal-title"><?php echo __('Password Changed!')?></h4>  
            </div>
            <div class="modal-body">
                <p class="text-center"><?php echo __('Your password has been successfully changed.')?></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-block" onclick='getCloseId("pwdCngSuc")'><?php echo __('OK')?></button>
            </div>
            </div>
        </div>
</div> 
<?php
}else if($message == "Thank you, We will get back to you soon."){
?>
<div id="cntsntsuc" class="modal" style="display: block;">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE876;</i>
				</div>				
				<h4 class="modal-title"><?php echo __('Message Sent!')?></h4>	
			</div>
			<div class="modal-body">
				<p class="text-center"><?php echo __('Your message has been sent to us. Please wait, as we will get back to you within 24 hours.')?></p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success btn-block" onclick='getClose("cntsntsuc")'><?php echo __('OK')?></button>
			</div>
		</div>
        </div>
</div> 
<?php
} else if("Property added successfully"){ ?>
    <div id="pro_add_succ" class="modal" style="display: block;">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE876;</i>
				</div>				
				<h4 class="modal-title">Your property has been added!</h4>	
			</div>
			<div class="modal-body">
				<p class="text-center">Rest assured as your property is now with us. One of our agents will review your property to make sure it meets our terms and conditions. Once it´s been approved or declined, an email will be sent to you to let you know.</p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success btn-block" onclick='getClose("pro_add_succ")'>OK</button>
			</div>
		</div>
	</div>
</div>
<?php
}else { ?>


    <div class="message success" id="s"  style="text-align: center; width: 450px;position: absolute; left: 23%; top: 9%; z-index: 1111; border-radius: 4px;" onclick="this.classList.add('hidden')"><?= h($message) ?></div>
<?php } ?>
<script>
    function getClose(id) {
        // loction.reload(true);
        $('#' + id).hide();


    }
    function getOnces(id, userId) {
        // loction.reload(true);
        $('#' + id).hide();
            $.ajax({
                type: "POST",
                url: pageurl + "users/isupdate",
                dataType: 'json',
                data: {userId:userId},
                success: function(res) {
                }

            });


    }
</script>