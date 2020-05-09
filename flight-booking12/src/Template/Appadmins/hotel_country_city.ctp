<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Hotel Location
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="<?php echo HTTP_ROOT . 'appadmins/hotel_country_city' ?>"> hotel_country_city</a></li>
        </ol>
    </section>


    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <form method="post" action="<?= $this->Url->build(["controller" => "Appadmins", "action" => "hotel_country_city", $locations_id]); ?>">
                            <div class="row">
                                <div class="col-sm-4 dropdown1" id='dropdown1'>
                                    <label >Country Name</label>
                                    <input type="text" class="form-control country_name"  name="country_name" value="<?= @$editData->country_name; ?>" required onclick="$('#dropdown1').addClass('dropdown1');">
                                    <div class="dropdown-content1">
                                        <?php foreach ($this->User->allcountry() as $val) { ?>
                                            <span onclick="$('.country_name').val('<?= $val->country_name; ?>'); $('#dropdown1').removeClass('dropdown1');countryData('<?= $val->country_name; ?>')"><?= $val->country_name; ?></span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-sm-4 dropdown" id='dropdown'>
                                    <label >State Name</label>
                                    <input type="text" class="form-control state_name" name="state_name"  value="<?= @$editData->state_name; ?>" onclick="$('#dropdown').addClass('dropdown');" >
                                    <div class="dropdown-content">
                                        <?php foreach ($this->User->allstate() as $val) {  if (!empty($val->state_name)) {  ?>
                                            <span onclick="$('.state_name').val('<?= $val->state_name; ?>'); $('#dropdown').removeClass('dropdown');stateData('<?= $val->state_name; ?>')"><?= $val->state_name; ?></span>
                                        <?php } } ?>
                                    </div>
                                </div>

                                <div class="col-sm-4 dropdown2" id='dropdown2'>
                                    <label >City Name</label>
                                    <input type="text" class="form-control city_name" name="city_name" value="<?= @$editData->city_name; ?>"  onclick="$('#dropdown2').addClass('dropdown2');">
                                    <div class="dropdown-content2">
                                        <?php foreach ($this->User->allstate() as $val) {  if (!empty($val->city_name)) { ?>
                                            <span onclick="$('.city_name').val('<?= $val->city_name; ?>'); $('#dropdown2').removeClass('dropdown2');"><?= $val->city_name; ?></span>
                                        <?php } } ?>
                                    </div>
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="submit" class="btn btn-info" name="update" value="Add" >
                                </div>
                                <div class="col-sm-6">

                                </div>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="box">
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">Country</th>
                                            <th style="text-align: center;">State</th>
                                            <th style="text-align: center;">City</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($allData as $val): ?>
                                            <tr>
                                                <td><?= $val->country_name; ?></td>
                                                <td><?= $val->state_name; ?></td>
                                                <td><?= $val->city_name; ?></td>
                                                <td>
                                                    <a href="<?= HTTP_ROOT; ?>appadmins/hotel_country_city/<?= $val->id; ?>" data-placement="top" data-hint="Edit" title="Edit" class="btn btn-info hint--top  hint" style="padding: 0 7px!important;"><i class="fa fa-edit"></i></a>
                                                    <a href="<?= HTTP_ROOT; ?>appadmins/delete/<?= $val->id; ?>/HotelCountryCitys" data-placement="top" data-hint="Delete" title="Delete" class="btn btn-danger hint--top  hint" style="padding: 0 7px!important;" onclick="if (confirm( & quot; Are you sure you want to delete Admin ? & quot; )) {
                                                                return true;
                                                            }
                                                            return false;"><i class="fa fa-trash"></i></a>

                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section>
</div>
<style>
    .dropdown,.dropdown1,.dropdown2 {
        position: relative;
        display: inline-block;
    }

    .dropdown-content,.dropdown-content1,.dropdown-content2 {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 395px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        max-height: 200px;
        overflow-x: scroll;
    }

    .dropdown-content span,.dropdown-content1 span,.dropdown-content2 span {
        color: black;
        padding: 4px 12px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content span:hover,.dropdown-content1 span:hover,.dropdown-content2 span:hover {background-color: #f1f1f1}

    .dropdown:hover .dropdown-content,.dropdown1:hover .dropdown-content1,.dropdown2:hover .dropdown-content2 {
        display: block;
    }

</style>
<script>
    function countryData(nm) {
        jQuery.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>" + "appadmins/get_states_name",
            dataType: 'html',
            data: {country_name: nm},
            success: function (res) {
                $('.dropdown-content').html('');
                $('.dropdown-content').html(res);
            }
        });
    }
    function stateData(nm) {
        jQuery.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>" + "appadmins/get_cities_name",
            dataType: 'html',
            data: {state_name: nm},
            success: function (res) {
                $('.dropdown-content2').html('');
                $('.dropdown-content2').html(res);
            }
        });
    }
</script>