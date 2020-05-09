<style>
    .container12{
        width: 50%;
        margin: 0 auto;
    }

    #msg{
        font-size: 16px;
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
<section class="basics">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <?= $this->element('extranet/sidebar'); ?>
            </div>

            <div class="col-md-10">
                <div class="head-section">
                         <?= $this->Form->create('', ['type' => 'post', 'class' => 'photos-form', 'id' => 'photos-form']); ?>
                        <div class="card-page-header row">
                            <div class="col-sm-8">
                                <h1 class="m-t-0">Show them what they’re missing.</h1>
                                <p>
                                    <span>Pictures matter to travelers. Upload as many high-quality images as you have. You can add more later. Want some tips on how to upload quality photos that generate more bookings? 
                                        <a class="tips-toggle" href="javascript:void(0)">Check this out.</a>
                                    </span>
                                </p>
                                <p class="page-header-caption">* Tips: Min. 800x600 px — Best 2048x1536 px</p>
                            </div>

                            <div class="hidden-xs col-sm-4">
                                <img src="<?= $this->Url->image('extranet/ec-photos@2x.png'); ?>">
                            </div>
                        </div>



                        <!--                                                <div class="row">
                                                                            <div class="col-sm-12">                                        
                                                                                <div class="photo-uploader-section">
                                                                                    <div class="file-uploader-placeholder text-center">
                                                                                        <i class="ficon ficon-photo-uploader ficon-64 text-primary m-b-2 hidden-xs"></i></br></br>
                                                                                        <strong class="hidden-xs m-b-2">Drag and drop your pics here</strong></br></br>
                                                                                        <small class="m-b-2">.jpg &amp; .png only — max. 10 MB</small></br></br>
                                                                                        <input id="the-file-input" type="file" multiple>
                                                                                    </div>
                                                                                </div>
                                                                            </div>										
                                                                        </div>
                        
                        -->
                        <div class="row" id="img-section"><?php if(!empty($pro_pics)){
                            foreach($pro_pics as $pro_pic){
                        ?><div id='resDiv<?=$pro_pic->id;?>' class='resImg'><img id='defImg<?=$pro_pic->id;?>' class='defImg' src='<?=HTTP_ROOT.'img/pro_pic/'.$pro_pic->url;?>' <?php if($pro_pic->is_main == 1){ ?> style="width:400px;" <?php } ?>><span class='btn' onclick='deletePhoto(<?=$pro_pic->id;?>)'><i class='fa fa-trash'></i>Delete this photo</span><br><span  id='btnm<?=$pro_pic->id;?>' class='btn btn1'  onclick='setMainPhoto(<?=$pro_pic->id;?>)'> <?php if($pro_pic->is_main == 1){ ?>Main Image <?php }else{ ?>Set as main photo <?php } ?></span></div><?php } }
                            ?></div>

                        <div class="row" id="up-section">                            
                            <div class="container12" >

                                <input type="file" name="file" id="file" multiple>

                                <!-- Drag and Drop container-->
                                <div class="upload-area"  id="uploadfile">
                                    <h4>Drag and drop your pics here<br/>Or<br/>Click to select file</h4>
                                    <small class="mb2">.jpg &amp; .png only — max. 10 MB</small><br><br>

                                </div><div id='msg'></div>

                            </div>
                        </div>

                        <div class="last-section">
                            <input type="hidden" name="saveexit" id='saveexit' value="next">
                        <ul>
                            <li><span class='btn-next-save' onclick="gettForm()">SAVE AND EXIT</span></li>				                						
                            <li onclick="$('#saveexit').val('next');">
                                <button class='btn-next-save' type="submit" >NEXT</button>
                            </li>
                            <li><a href="<?=HTTP_ROOT;?>extranets/availability/<?=@$id;?>">PREVIOUS</a></li>
                        </ul>
                        </div>
                    <?=$this->Form->end();?>

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
        if (checking == "") {
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
            $("#msg").text("Drag here");
        });

        $("html").on("drop", function (e) {
            e.preventDefault();
            e.stopPropagation();
        });

        // Drag enter
        $('.upload-area').on('dragenter', function (e) {
            e.stopPropagation();
            e.preventDefault();
            $("#msg").text("Drop");
        });

        // Drag over
        $('.upload-area').on('dragover', function (e) {
            e.stopPropagation();
            e.preventDefault();
            $("#msg").text("Drop");
        });

        // Drop
        $('.upload-area').on('drop', function (e) {
            e.stopPropagation();
            e.preventDefault();

            $("#msg").text("Upload");

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
                    $("#msg").html("<span style='color:red'>" + response.msg + "</span>");
                } else {
                    $("#msg").text(response.msg);
                    $('#img-section').append("<div id='resDiv" + response.rid + "' class='resImg'><img id='defImg" + response.rid + "' class='defImg' src='" + response.url + "'><span class='btn' onclick='deletePhoto(" + response.rid + ")'><i class='fa fa-trash'></i>Delete this photo</span><br><span class='btn btn1' id='btnm"+ response.rid +"'  onclick='setMainPhoto(" + response.rid + ")'>Set as main photo</span></div>");
                }
                //addThumbnail(response);
            }
        });
    }
    function valchange(id){
    //valChange
    $('.btn1').text('Set as main photo');
    $('#'+id).text('Main Image');
    }
    function setMainPhoto(id) {
        $('.defImg').removeAttr('style');
        $('#defImg' + id).attr('style', 'width:400px;');
        valchange('btnm'+id);
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