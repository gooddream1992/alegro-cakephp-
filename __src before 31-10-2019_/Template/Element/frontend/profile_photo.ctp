<style type="text/css">
    #search-results-body{margin: 50px 0 60px;}
.bg_white .upload-btn-wrapper {
    opacity: 0;
    position: relative;
    top: 0;
    width: 100%;
    text-align: center;
        display: inline-flex;
            height: 100%;
}
#frm{
    position: absolute;
    width: 100%;
    top: 0;
    height: 100%;
}
    .bg_white .profile-img {
    position: relative;
    display: inline-block;
}
    .bg_white .profile-img:hover .upload-btn-wrapper{opacity: 1;transition: 500ms all 0s easy-in-out;}
    .right_pro img {
    width: 100%;
}
    .upload-btn-wrapper .btn {
        /* border: 2px solid gray; */
        color: gray;
        /* background-color: white; */
        /* padding: 8px 20px; */
        /* border-radius: 8px; */
        font-size: 11px;
        font-weight: bold;
        border-radius: 0px;
        color: #fff;
        width: 100%;
            padding: 0 !important;
    background: none !important;
    }

    .upload-btn-wrapper input[type=file] {
    font-size: inherit;
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
    width: 100%;
    height: 100%;
}

    .progress,#error{
        display:none;
    }
    .upload-btn-wrapper .btn span{
        display: inline-block;
    width: 100%;
    background: #000;
    padding: 4px 11px!important;
    background: rgba(0,0,0,0.3);
    }
</style>



<script type="text/javascript" src="<?php echo HTTP_ROOT ?>js/img_js/script.js"></script>

<div class="col-md-2">
    <span class="profile-img ">
        <?php
        //pj($userDetails); exit;
        //echo $userDetails->user_detail->profile_photo; 
        // exit;
        if (isset($userDetails->user_detail->profile_photo) && !empty($userDetails->user_detail->profile_photo)) {
            ?>
            <img  alt="image preview" id="img-preview" src="<?php echo HTTP_ROOT . PHOTOS . $userDetails->user_detail->profile_photo; ?>" class="img-responsive">
        <?php } else { ?>
            <img  alt="image preview" id="img-preview" src="<?php echo HTTP_ROOT ?>img/avatar1.jpg" class="img-responsive">
        <?php } ?>
    <!--<img src="<?php echo HTTP_ROOT ?>img/avatar1.jpg" class="img-responsive">-->
        <form id="frm" action="<?php echo HTTP_ROOT . 'update_photo' ?>" method="POST" enctype="multipart/form-data">
            <div class="upload-btn-wrapper">
                <button class="btn"><span><i class="fas fa-camera" style="font-size: 30px;"></i></span></button>
                <input type="file" id="txtFile" name="txtFile" />
            </div>
        </form>
        <!--        <div class="progress">
                    <div class="progress-bar" id="progressBar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                       
                    
                    </div>
                </div>-->
        <div class="progress" style="height: 33px;">

            <img style="height: auto;" src="<?php echo HTTP_ROOT . 'img/loader.gif' ?>">


        </div>

        <div class="alert alert-danger" id="error"></div>
    </span>

</div>