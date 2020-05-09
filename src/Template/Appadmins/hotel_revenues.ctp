<?= $this->Flash->render() ?>
<style>
    .vbul{
        padding: 0px 0px 0px 0px !important;
    }
    .vbul li{
        display: inline;                                   
    }
    .spantext{
        font-size:24px;
    }
</style>
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            All Extranet Revenues
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">All Extranet Revenues</li>
        </ol>
    </section>
    <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>dist/bootstrap-datepicker.css" type="text/css">
    <script src="<?php echo HTTP_ROOT ?>js/jquery-3.3.1.min.js" ></script>
    <script src="<?php echo HTTP_ROOT ?>dist/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo HTTP_ROOT ?>dist/bootstrap-datepicker.js"></script>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-body">
                        <div>
                            <?=$this->Form->create(null,(['type'=>'post']));?>
                            <ul class="vbul">
                                <li><span class="spantext">Yearly : </span></li>
                                <li><input name="year_d" type="text" id="datepicker1" autocomplete="off" value="<?=@$data['year_d'];?>" ></li>
                                <li>
                                    <button type="submit" name="yera_f" class="btn btn-success btn-sm"> 
                                        <span class="glyphicon glyphicon-arrow-right"></span>
                                    </button>
                                </li>
                            </ul>
                            <?=$this->Form->end();?>
                            <script>
                                $("#datepicker1").datepicker({
                                    format: "yyyy",
                                    minViewMode: 2,
                                    autoclose: true
                                });
                            </script>
                            <?= $xc; ?>
                        </div>
                        <div>
                            <br><br>
                            <?=$this->Form->create(null,(['type'=>'post']));?>
                            <ul class="vbul">
                                <li><span class="spantext">Monthly : </span></li>
                                <li><input type="text" name="month_d" id="datepicker2" autocomplete="off" value="<?=@$data['month_d'];?>"></li>
                                <li>
                                    <button type="submit" name="month_f" class="btn btn-success btn-sm">
                                        <span class="glyphicon glyphicon-arrow-right"></span>
                                    </button>
                                </li>
                            </ul>
                            <?=$this->Form->end();?>
                            <script>
                                $("#datepicker2").datepicker({
                                    format: "mm/yyyy",
                                    minViewMode: 1,
                                    autoclose: true
                                });
                            </script>
                            <?= $xd; ?>
                        </div>
                        <div>
                            <br><br>
                            <?=$this->Form->create(null,(['type'=>'post']));?>
                            <ul class="vbul">
                                <li><span class="spantext">Weekly : </span></li> 
                                <li><input type="text" name="week_d1" class="datepicker3" autocomplete="off" value="<?=@$data['week_d1'];?>"></li>
                                <li><input type="text" name="week_d2" class="datepicker3" autocomplete="off" value="<?=@$data['week_d2'];?>"></li>
                                <li>
                                    <button type="submit" name="week_f" class="btn btn-success btn-sm"> 
                                        <span class="glyphicon glyphicon-arrow-right"></span>
                                    </button>
                                </li>
                            </ul>
                            <?=$this->Form->end();?>
                            <?= $xe; ?>
                        </div>
                        <div>
                            <br><br>
                            <?=$this->Form->create(null,(['type'=>'post']));?>
                            <ul class="vbul">
                                <li><span class="spantext">Daily : </span></li>
                                <li><input type="text" name="daily_d" class="datepicker3" autocomplete="off" value="<?=@$data['daily_d'];?>"></li>
                                <li>
                                    <button type="submit" name="daily_f" class="btn btn-success btn-sm">
                                        <span class="glyphicon glyphicon-arrow-right"></span>
                                    </button>
                                </li>
                            </ul>
                            <?=$this->Form->end();?>
                                    <?= $xf; ?>
                        </div>
                        <script>
                            $(".datepicker3").datepicker({
                                format: "dd/mm/yyyy",
                                autoclose: true
                            });
                        </script>




                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->