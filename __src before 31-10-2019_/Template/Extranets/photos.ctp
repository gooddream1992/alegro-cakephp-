<style>
    .typeone {
        margin-top: 40px;
    }
    .container12{
        width: 50%;
        margin: 0 auto;
    }

    #msg{
        font-size: 16px;
        display:none;
    }
    #msg img{
        float: none !important;
    }

    .upload-area{
        width: 100%;
        border: 2px dashed lightgray;
        border-radius: 3px;
        margin: 0 auto;
        text-align: center;
        overflow: auto;


    }

    .upload-area:hover{
        cursor: pointer;
    }

    .upload-area h4{
        text-align: center;
        font-weight: normal;
        font-family: sans-serif;
        line-height: 50px;
        color: darkslategray;
        padding: 50px 50px 0px 75px;
    }

    .mb2{
        text-align: center;
        font-weight: bold;
        font-family: sans-serif;
        line-height: 50px;
    }

    #file{
        display: none;
    }

    /* Thumbnail */
    .thumbnail{
        width: 80px;
        height: 80px;
        padding: 2px;
        border: 2px solid lightgray;
        border-radius: 3px;
        float: left;
        margin: 5px;
    }

    .size{
        font-size:12px;
    }
    .resImg{
        position: relative;
        display: inline-block;
        width: 100%;
        text-align: left;
        margin-bottom: 15px;
    }
    .resImg img{
        float: left;            
    }
    .resImg span{
        position: absolute;    
        background-color: white;
    }
    .resImg .btn{
        border: 1px solid black;
        padding: 3px;    
    }
    .resImg .btn1{
        border: 1px solid black;
        padding: 3px;    
        margin-top: 10px;
    }
    .resImg span i{
        color: red;        
    }
    #img-section{
        width: 50%;
    }
</style>
<style type="text/css">
    .modal-confirm.modal-dialog {
        margin-top: 18%;
    }

    .fade.in{
        opacity:1
    }
    body {
        font-family: 'Montserrat', sans-serif !important;
    }
    .modal{background: rgba(0,0,0,0.70);}
    .modal-confirm {		
        color: #000;
        width: 550px;
    }
    .modal-confirm .modal-content {
        padding: 20px;
        border-radius: 5px;
        border: none;
        color: #000 !important;
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
    font-size: 41px;
    position: relative;
    top: 14px
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
<div id="logout-model1x" class="modal fade in" style="display: none;">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="fas fa-times"></i>
                </div>				
                <h4 class="modal-title"><?php echo __('Image Error!') ?></h4>	
            </div>
            <div class="modal-body">
                <p class="text-center"><?php echo __('Alegro only supports images that have the following formats: .jpeg, .jpg, .png and .gif') ?></p>
            </div>
            <div class="modal-footer">

                <span class="btn btn-success btn-block" onclick='getCloseht("logout-model1x")'><?php echo __('OK') ?></span>
            </div>
        </div>
    </div>
</div>


<section class="basics">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <?= $this->element('extranet/sidebar'); ?>
            </div>

            <div class="col-md-10">
                <div class="head-section">
                    <div id="f1">
                        <?= $this->Form->create('', ['type' => 'post', 'class' => 'photos-form', 'id' => 'photos-form']); ?>
                        <div class="card-page-header row">
                            <div class="col-sm-8">
                                <h1 class="m-t-0"><?php echo __('Upload pictures of your'); ?> <?= __($propertyTypeName->property_type); ?></h1>
                                <p>
                                    <span><?php echo __('Pictures matter to travelers. Upload as many high-quality images as you have. You can add more later. Want some tips on how to upload quality photos that generate more bookings?'); ?></span>
                                </p>
                                <p class="page-header-caption"><?php echo __('* Tips: Min. 800x600 px — Best 2048x1536 px'); ?></p>
                            </div>

                            <div class="hidden-xs col-sm-4">
                                <img src="<?= $this->Url->image('extranet/ec-photos@2x.png'); ?>">
                            </div>
                        </div>

                        <div class="row" id="img-section">
                            <?php
                            $pro_pics = $this->User->allPhoto($id, 1);
                            if (!empty($pro_pics->count())) {
                                foreach ($pro_pics as $pro_pic) {
                                    ?><div id='resDiv<?= $pro_pic->id; ?>' class='resImg'><img id='defImg<?= $pro_pic->id; ?>' class='defImg' src='<?= HTTP_ROOT . 'img/pro_pic/' . $pro_pic->url; ?>' <?php if ($pro_pic->is_main == 1) { ?> style="width:400px;" <?php } ?>><span class='btn' onclick='deletePhoto(<?= $pro_pic->id; ?>)'><i class='fa fa-trash'></i><?php echo __('Delete this photo'); ?></span><br><span  id='btnm<?= $pro_pic->id; ?>' class='btn btn1'  onclick='setMainPhoto(<?= $pro_pic->id; ?>)'> <?php if ($pro_pic->is_main == 1) { ?><?php echo __('Main Image'); ?> <?php } else { ?><?php echo __('Set as main photo'); ?> <?php } ?></span></div><?php
                                }
                            }
                            ?>
                        </div>

                        <div class="row" id="up-section">                            
                            <div class="container12" >

                                <input type="file" name="file" id="file" multiple>

                                <!-- Drag and Drop container-->
                                <div class="upload-area"  id="uploadfile">
                                    <h4><?php echo __('Drag and drop your pics here'); ?><br/><?php echo __('Or'); ?><br/><?php echo __('Click to select file'); ?></h4>
                                    <small class="mb2"><?php echo __('.jpg & .png only — max. 10 MB'); ?></small><br><br>

                                </div><div id='msg'></div>

                            </div>
                        </div>

                        <div class="last-section">
                            <input type="hidden" name="saveexit" id='saveexit' value="next">
                            <ul>
                                <li></li>			
                                <li>
                                    <button class='btn-next-save' type="button" onclick="myFunNxt(2)"><?php echo __('NEXT'); ?></button>
                                </li>
                                <li><a href="<?= HTTP_ROOT; ?>extranets/availability/<?= @$id; ?>"  style="font-size: 15px;padding: 8px 28px;"><?php echo __('PREVIOUS'); ?></a></li>
                            </ul>
                        </div>
                        <?= $this->Form->end(); ?>
                    </div>
                    <?php
                    $cntr = 1;
                    foreach ($availableBeds as $beds) {
                        ?>

                        <style>
                            .container12<?= $cntr; ?>{
                                width: 50%;
                                margin: 0 auto;
                            }

                            #msg<?= $cntr; ?>{
                                font-size: 16px;
                            }
                            #msg<?= $cntr; ?> img{
                                float: none !important;
                            }

                            .upload-area<?= $cntr; ?>{
                                width: 100%;
                                border: 2px dashed lightgray;
                                border-radius: 3px;
                                margin: 0 auto;
                                text-align: center;
                                overflow: auto;


                            }

                            .upload-area<?= $cntr; ?>:hover{
                                cursor: pointer;
                            }

                            .upload-area<?= $cntr; ?> h4{
                                text-align: center;
                                font-weight: normal;
                                font-family: sans-serif;
                                line-height: 50px;
                                color: darkslategray;
                                padding: 50px 50px 0px 75px;
                            }

                            .mb2<?= $cntr; ?>{
                                text-align: center;
                                font-weight: bold;
                                font-family: sans-serif;
                                line-height: 50px;
                            }

                            #file<?= $cntr; ?>{
                                display: none;
                            }

                            /* Thumbnail */
                            .thumbnail<?= $cntr; ?>{
                                width: 80px;
                                height: 80px;
                                padding: 2px;
                                border: 2px solid lightgray;
                                border-radius: 3px;
                                float: left;
                                margin: 5px;
                            }

                            .size<?= $cntr; ?>{
                                font-size:12px;
                            }
                            .resImg<?= $cntr; ?>{
                                position: relative;
                                display: inline-block;
                                width: 100%;
                                text-align: left;
                                margin-bottom: 15px;
                            }
                            .resImg<?= $cntr; ?> img{
                                float: left;            
                            }
                            .resImg<?= $cntr; ?> span{
                                position: absolute;    
                                background-color: white;
                            }
                            .resImg<?= $cntr; ?> .btn{
                                border: 1px solid black;
                                padding: 3px;    
                            }
                            .resImg<?= $cntr; ?> .btn1{
                                border: 1px solid black;
                                padding: 3px;    
                                margin-top: 10px;
                            }
                            .resImg<?= $cntr; ?> span i{
                                color: red;        
                            }
                            #img-section<?= $cntr; ?>{
                                width: 50%;
                            }
                        </style>

                        <div id='f<?= $cntr + 1; ?>'>
                            <?= $this->Form->create('', ['type' => 'post', 'class' => 'photos-form' . $cntr, 'id' => 'photos-form' . $cntr]); ?>
                            <div class="card-page-header row">
                                <div class="col-sm-8">
                                    <h1 class="m-t-0"><?php echo __('Upload pictures of your'); ?> <?= $beds->bed_name; ?></h1>
                                    <p>
                                        <span><?php echo __('Pictures matter to travelers. Upload as many high-quality images as you have. You can add more later. Want some tips on how to upload quality photos that generate more bookings?'); ?></span>
                                    </p>
                                    <p class="page-header-caption"><?php echo __('* Tips: Min. 800x600 px — Best 2048x1536 px'); ?></p>
                                </div>

                                <div class="hidden-xs col-sm-4">
                                    <img src="<?= $this->Url->image('extranet/ec-photos@2x.png'); ?>">
                                </div>
                            </div>

                            <div class="row" id="img-section<?= $cntr; ?>"><?php
                                $pro_pics = $this->User->allPhoto($id, $beds->id);
                                if (!empty($pro_pics->count())) {
                                    foreach ($pro_pics as $pro_pic) {
                                        ?><div id='resDiv<?= $cntr; ?><?= $pro_pic->id; ?>' class='resImg<?= $cntr; ?>'><img id='defImg<?= $pro_pic->id; ?>' class='defImg' src='<?= HTTP_ROOT . 'img/pro_pic/' . $pro_pic->url; ?>' <?php if ($pro_pic->is_main == 1) { ?> style="width:400px;" <?php } ?>><span class='btn' onclick='deletePhoto<?= $cntr; ?>(<?= $pro_pic->id; ?>)'><i class='fa fa-trash'></i><?php echo __('Delete this photo'); ?></span><br><span  id='btnm<?= $pro_pic->id; ?>' class='btn btn1'  onclick='setMainPhoto(<?= $pro_pic->id; ?>)'> <?php if ($pro_pic->is_main == 1) { ?><?php echo __('Main Image'); ?> <?php } else { ?><?php echo __('Set as main photo'); ?> <?php } ?></span></div><?php
                                    }
                                }
                                ?></div>

                            <div class="row" id="up-section<?= $cntr; ?>">                            
                                <div class="container12<?= $cntr; ?>" >

                                    <input type="file" name="file<?= $cntr; ?>" id="file<?= $cntr; ?>" multiple>

                                    <!-- Drag and Drop container-->
                                    <div class="upload-area<?= $cntr; ?>"  id="uploadfile<?= $cntr; ?>">
                                        <h4><?php echo __('Drag and drop your pics here'); ?><br/><?php echo __('Or'); ?><br/><?php echo __('Click to select file'); ?></h4>
                                        <small class="mb2<?= $cntr; ?>"><?php echo __('.jpg & .png only — max. 10 MB'); ?></small><br><br>

                                    </div><div id='msg<?= $cntr; ?>'></div>

                                </div>
                            </div>

                            <?php
                            //echo $cntr;
                            //echo $availableBeds->count();
                            //echo $beds->id;
                            if ($cntr == $availableBeds->count()) {
                                ?>
                                <div class="last-section">
                                    <input type="hidden" name="saveexit" id='saveexit' value="next">
                                    <ul>
                                        <li><span class='btn-next-save' onclick="gettForm()"><?php echo __('SAVE AND EXIT'); ?></span></li>				                						
                                        <li onclick="$('#saveexit').val('next');">
                                            <button class='btn-next-save' type="submit" ><?php echo __('NEXT'); ?></button>
                                        </li>
                                        <li  onclick="myFunNxt(<?= $cntr - 1; ?>)"><a href="javascript:void(0);"><?php echo __('PREVIOUS'); ?></a></li>
                                    </ul>
                                </div>
                            <?php } else { ?>
                                <div style="width:100%;float: right;">
                                    <button type="button" name="next" class="typeone next action-button" value="Next" style="text-decoration: none;color: #000;float: right;padding: 11px 46px;margin-left: 10px;font-size: 15px;font-weight: normal;border-radius: 4px !important;background-color: #f9d749;" onclick="myFunNxt(<?= $cntr + 2; ?>)" ><?php echo __('NEXT'); ?></button>

                                    <button onclick="myFunNxt(<?= $cntr; ?>)" type="button" name="previous" class="typeone previous action-button" value="previous" style="text-decoration: none;color: #000;float: right;padding: 10px 25px;border: 1px solid #000000;font-weight: normal;border-radius: 4px !important;background-color: #fff;" ><?php echo __('PREVIOUS'); ?></button>
                                </div>
                            <?php } ?>
                            <?= $this->Form->end(); ?>
                        </div> 
                        <script>
                            $(document).ready(function () {
                                checkSection<?= $cntr; ?>();
                            });
                            function checkSection<?= $cntr; ?>() {
                                var checking<?= $cntr; ?> = $('#img-section<?= $cntr; ?>').html();

                                if (checking<?= $cntr; ?> == "") {
                                    $('#img-section<?= $cntr; ?>').removeAttr('style');
                                    $('#up-section<?= $cntr; ?>').removeAttr('style');
                                    $('.container12<?= $cntr; ?>').removeAttr('style');
                                } else {
                                    $('#img-section<?= $cntr; ?>').attr('style', 'float:left;');
                                    $('#up-section<?= $cntr; ?>').attr('style', 'float:right;width:50%;');
                                    $('.container12<?= $cntr; ?>').attr('style', 'width:100%;');
                                }
                            }
                        </script>

                        <script>
                            $(function () {

                                // preventing page from redirecting
                                $("html").on("dragover", function (e) {
                                    e.preventDefault();
                                    e.stopPropagation();
                                    //$("#msg<?= $cntr; ?>").text("Drag here");
                                });

                                $("html").on("drop", function (e) {
                                    e.preventDefault();
                                    e.stopPropagation();
                                });

                                // Drag enter
                                $('.upload-area<?= $cntr; ?>').on('dragenter', function (e) {
                                    e.stopPropagation();
                                    e.preventDefault();
                                    //$("#msg<?= $cntr; ?>").text("Drop");
                                });

                                // Drag over
                                $('.upload-area<?= $cntr; ?>').on('dragover', function (e) {
                                    e.stopPropagation();
                                    e.preventDefault();
                                    //$("#msg<?= $cntr; ?>").text("Drop");
                                });

                                // Drop
                                $('.upload-area<?= $cntr; ?>').on('drop', function (e) {
                                    e.stopPropagation();
                                    e.preventDefault();

                                    // $("#msg<?= $cntr; ?>").text("Upload");

                                    var file = e.originalEvent.dataTransfer.files;
                                    var fd = new FormData();

                                    fd.append('file', file[0]);

                                    uploadData(fd);
                                });

                                // Open file selector on div click
                                $("#uploadfile<?= $cntr; ?>").click(function () {
                                    $("#file<?= $cntr; ?>").click();
                                });

                                // file selected
                                $("#file<?= $cntr; ?>").change(function () {
                                    var i = 0;
                                    var fd = new FormData();
                                    var length = ($('#file<?= $cntr; ?>')[0].files).length;
                                    for (i = 0; i < length; i++) {
                                        var files = $('#file<?= $cntr; ?>')[0].files[i];
                                        fd.append('file', files);
                                        fd.append('pro_id', <?= $id; ?>);
                                        fd.append('sub_id', <?= $beds->id; ?>);
                                        uploadData<?= $cntr; ?>(fd);
                                    }

                                });
                            });

                            // Sending AJAX request and upload file
                            function uploadData<?= $cntr; ?>(formdata) {

                                $.ajax({
                                    url: '<?= HTTP_ROOT; ?>extranets/uploadphoto',
                                    type: 'post',
                                    data: formdata,
                                    contentType: false,
                                    processData: false,
                                    dataType: 'json',
                                    success: function (response) {
                                        checkSection<?= $cntr; ?>();
                                        // $("#msg").text("Profile Picture Upload Complete.");
                                        if (response.status == "error") {
                                            $("#msg").show();
                                        } else {
                                            $("#msg<?= $cntr; ?>").text(response.msg);
                                            $('#img-section<?= $cntr; ?>').append("<div id='resDiv<?= $cntr; ?>" + response.rid + "' class='resImg'><img id='defImg<?= $cntr; ?>" + response.rid + "' class='defImg<?= $cntr; ?>' src='" + response.url + "'><span class='btn' onclick='deletePhoto<?= $cntr; ?>(" + response.rid + ")'><i class='fa fa-trash'></i><?php echo __('Delete this photo'); ?></span><br><span class='btn btn1' id='btnm" + response.rid + "'  onclick='setMainPhoto(" + response.rid + ")'><?php echo __('Set as main photo'); ?></span></div>");
                                        }
                                        //addThumbnail(response);
                                    }
                                });
                            }
                            function valchange(id) {
                                //valChange
                                $('.btn1').text('Set as main photo');
                                $('#' + id).text('Main Image');
                            }
                            function setMainPhoto(id) {
                                $('.defImg<?= $cntr; ?>').removeAttr('style');
                                $('#defImg<?= $cntr; ?>' + id).attr('style', 'width:400px;');
                                valchange('btnm' + id);
                                $.ajax({
                                    url: '<?= HTTP_ROOT; ?>extranets/set_main_pic/' + id,
                                    type: 'post',
                                    contentType: false,
                                    processData: false,
                                    dataType: 'json',
                                    success: function (res) {

                                    }
                                });
                            }
                            // Added thumbnail
                            function addThumbnail(data) {
                                $("#uploadfile<?= $cntr; ?> h1").remove();
                                var len = $("#uploadfile<?= $cntr; ?> div.thumbnail").length;

                                var num = Number(len);
                                num = num + 1;

                                var name = data.name;
                                var size = convertSize(data.size);
                                var src = data.src;

                                // Creating an thumbnail
                                $("#uploadfile<?= $cntr; ?>").append('<div id="thumbnail_<?= $cntr; ?>' + num + '" class="thumbnail"></div>');
                                $("#thumbnail_<?= $cntr; ?>" + num).append('<img src="' + src + '" width="100%" height="78%">');
                                $("#thumbnail_<?= $cntr; ?>" + num).append('<span class="size<?= $cntr; ?>">' + size + '<span>');

                            }

                            // Bytes conversion
                            function convertSize(size) {
                                var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
                                if (size == 0)
                                    return '0 Byte';
                                var i = parseInt(Math.floor(Math.log(size) / Math.log(1024)));
                                return Math.round(size / Math.pow(1024, i), 2) + ' ' + sizes[i];
                            }

                            function deletePhoto<?= $cntr; ?>(id) {

                                $.ajax({
                                    url: '<?= HTTP_ROOT; ?>extranets/delete_pic/' + id,
                                    type: 'post',
                                    contentType: false,
                                    processData: false,
                                    dataType: 'json',
                                    success: function (res) {

                                        $('#resDiv<?= $cntr; ?>' + id).remove();
                                        checkSection<?= $cntr; ?>();
                                    }
                                });
                            }
                        </script>
                        <?php
                        $cntr++;
                    }
                    ?>

                </div>
            </div>

        </div>
    </div>
</section>
<script>
    function gettForm() {
        $('#saveexit').val('save exit');
        $('#photos-form').submit();
    }
</script>
<script>
    $(document).ready(function () {
        checkSection();
    });
    function checkSection() {
        var checking = $('#img-section').html();
        //alert(checking == "");
        console.log(jQuery.type($('#img-section').html()));
        console.log($('#img-section').html().length);
        if ((checking == "") || (checking.length == 53)) {
            $('#img-section').removeAttr('style');
            $('#up-section').removeAttr('style');
            $('.container12').removeAttr('style');
        } else {
            $('#img-section').attr('style', 'float:left;');
            $('#up-section').attr('style', 'float:right;width:50%;');
            $('.container12').attr('style', 'width:100%;');
        }
    }
</script>

<script>
    $(function () {

        // preventing page from redirecting
        $("html").on("dragover", function (e) {
            e.preventDefault();
            e.stopPropagation();
            //$("#msg").text("Drag here");
        });

        $("html").on("drop", function (e) {
            e.preventDefault();
            e.stopPropagation();
        });

        // Drag enter
        $('.upload-area').on('dragenter', function (e) {
            e.stopPropagation();
            e.preventDefault();
            //$("#msg").text("Drop");
        });

        // Drag over
        $('.upload-area').on('dragover', function (e) {
            e.stopPropagation();
            e.preventDefault();
            //$("#msg").text("Drop");
        });

        // Drop
        $('.upload-area').on('drop', function (e) {
            e.stopPropagation();
            e.preventDefault();

            //$("#msg").text("Upload");

            var file = e.originalEvent.dataTransfer.files;
            var fd = new FormData();

            fd.append('file', file[0]);

            uploadData(fd);
        });

        // Open file selector on div click
        $("#uploadfile").click(function () {
            $("#file").click();
        });

        // file selected
        $("#file").change(function () {
            var i = 0;
            var fd = new FormData();
            var length = ($('#file')[0].files).length;
            for (i = 0; i < length; i++) {
                var files = $('#file')[0].files[i];
                fd.append('file', files);
                fd.append('pro_id', <?= $id; ?>);
                uploadData(fd);
            }

        });
    });

// Sending AJAX request and upload file
    function uploadData(formdata) {

        $.ajax({
            url: '<?= HTTP_ROOT; ?>extranets/uploadphoto',
            type: 'post',
            data: formdata,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (response) {
                checkSection();
                // $("#msg").text("Profile Picture Upload Complete.");
                if (response.status == "error") {
                    $("#logout-model1x").show();
                } else {
                    $("#msg").text(response.msg);
                    $('#img-section').append("<div id='resDiv" + response.rid + "' class='resImg'><img id='defImg" + response.rid + "' class='defImg' src='" + response.url + "'><span class='btn' onclick='deletePhoto(" + response.rid + ")'><i class='fa fa-trash'></i><?php echo __('Delete this photo'); ?></span><br><span class='btn btn1' id='btnm" + response.rid + "'  onclick='setMainPhoto(" + response.rid + ")'><?php echo __('Set as main photo'); ?></span></div>");
                }
                //addThumbnail(response);
            }
        });
    }
    function valchange(id) {
        //valChange
        $('.btn1').text('Set as main photo');
        $('#' + id).text('Main Image');
    }
    function setMainPhoto(id) {
        $('.defImg').removeAttr('style');
        $('#defImg' + id).attr('style', 'width:400px;');
        valchange('btnm' + id);
        $.ajax({
            url: '<?= HTTP_ROOT; ?>extranets/set_main_pic/' + id,
            type: 'post',
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (res) {

            }
        });
    }
// Added thumbnail
    function addThumbnail(data) {
        $("#uploadfile h1").remove();
        var len = $("#uploadfile div.thumbnail").length;

        var num = Number(len);
        num = num + 1;

        var name = data.name;
        var size = convertSize(data.size);
        var src = data.src;

        // Creating an thumbnail
        $("#uploadfile").append('<div id="thumbnail_' + num + '" class="thumbnail"></div>');
        $("#thumbnail_" + num).append('<img src="' + src + '" width="100%" height="78%">');
        $("#thumbnail_" + num).append('<span class="size">' + size + '<span>');

    }

// Bytes conversion
    function convertSize(size) {
        var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
        if (size == 0)
            return '0 Byte';
        var i = parseInt(Math.floor(Math.log(size) / Math.log(1024)));
        return Math.round(size / Math.pow(1024, i), 2) + ' ' + sizes[i];
    }

    function deletePhoto(id) {

        $.ajax({
            url: '<?= HTTP_ROOT; ?>extranets/delete_pic/' + id,
            type: 'post',
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (res) {

                $('#resDiv' + id).remove();
                checkSection();
            }
        });
    }
</script>

<script>
    $('#f1').show();
    myFunNxt(1);
    function myFunNxt(data) {
<?php for ($xcvf = 2; $xcvf <= $cntr; $xcvf++) { ?>
            $('#f1').hide();
            $('#f<?= $xcvf; ?>').hide();
            $('html, body').animate({scrollTop: '0px'});
<?php } ?>
        $('#f' + data).show();
    }
    function getClose(id) {
        // loction.reload(true);

        $('#' + id).hide();


    }
    function getCloseht(id) {

        $('#' + id).modal('hide');
        $('#' + id).hide();

    }
</script>