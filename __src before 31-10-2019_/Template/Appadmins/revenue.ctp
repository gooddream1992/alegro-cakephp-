<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<style>
    table{
        padding:0px !important;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>  </h1>
        <ol class="breadcrumb">
            <li><a href="<?= HTTP_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="<?= HTTP_ROOT; ?>appadmins/revenue"> <i class="fa fa-list"></i>Revenue</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <?php
                $yrarr = array();
                foreach ($groupList as $val) {
                    array_push($yrarr, date_format($val->purches_date, 'Y'));
                }
                ?>
                <label>Year-wise Revenue</label><br>
                <select id="yearwise" onchange="yearwisechange()">
                    <?php foreach (array_unique($yrarr) as $val) { ?>
                        <option <?= (date('Y') == $val) ? "selected" : ""; ?>><?= $val; ?></option>
<?php } ?>
                </select>
                <div style="width:50%;" id="t1">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>                                
                                <td><label>Grand Total</label></td>                                
                                <td><span id="year_gtotal"></span><span> AOA</span></td>                                                                
                            </tr>
                            <tr>                                
                                <td><label>Tax</label></td>                                
                                <td><span id="date_tasks2"></span><span> AOA</span></td>                                                                
                            </tr>
                            <tr>
                                <td><label>Alegro after tax</label></td>
                                <td><span id="date_after_tasks2"></span><span> AOA</span></td>                               
                            </tr>
                            <tr>
                                <td><label>Air line </label></td>
                                <td><span id="air_in2"></span><span> AOA</span></td>                               
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-sm-12">
                <label>Month-wise Revenue</label><br>
                <?php
                $montharr = array();
                foreach ($groupList as $val) {
                    array_push($montharr, date_format($val->purches_date, 'm'));
                }
                ?>
                <select id="monthwise" onchange="monthwisechange()">
<?php foreach (array_unique($montharr) as $val) { ?>
                        <option value="<?= $val; ?>" <?= (date('m') == $val) ? "selected" : ""; ?>><?= date("F", mktime(0, 0, 0, $val, 10));
    ;
    ?></option>
<?php } ?>
                </select>
                <div style="width:50%;" >
                    <table class="table table-borderless" id="t2">
                        <tbody>
                            <tr>                                
                                <td><label>Grand Total</label></td>                                
                                <td><span id="month_gtotal"></span><span> AOA</span></td>                                                                
                            </tr>
                            <tr>                                
                                <td><label>Tax</label></td>                                
                                <td><span id="date_tasks1"></span><span> AOA</span></td>                                                                
                            </tr>
                            <tr>
                                <td><label>Alegro after tax</label></td>
                                <td><span id="date_after_tasks1"></span><span> AOA</span></td>                               
                            </tr>
                            <tr>
                                <td><label>Air line </label></td>
                                <td><span id="air_in1"></span><span> AOA</span></td>                               
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-sm-12">
                <label>Date-wise Revenue</label><br>
                <select id="datewise" onchange="datewisechange()" >
<?php for ($i=1;$i<=31;$i++) { ?>
                        <option <?= (date('d') == $i) ? "selected" : ""; ?>><?= $i; ?></option>
<?php } ?>
                </select> 
                <div style="width:50%;" id="t3">
                    <table class="table table-borderless">
                        <tbody>
                             <tr>                                
                                <td><label>Grand Total</label></td>                                
                                <td><span id="date_gtotal"></span><span> AOA</span></td>                                                                
                            </tr>
                            <tr>                                
                                <td><label>Tax</label></td>                                
                                <td><span id="date_tasks"></span><span> AOA</span></td>                                                                
                            </tr>
                            <tr>
                                <td><label>Alegro after tax</label></td>
                                <td><span id="date_after_tasks"></span><span> AOA</span></td>                               
                            </tr>
                            <tr>
                                <td><label>Air line </label></td>
                                <td><span id="air_in"></span><span> AOA</span></td>                               
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>

</div>
<script>
    var yearwise = monthwise = datewise = "";
    $(document).ready(function () {

        yearwise = $("#yearwise option:selected").text();
        monthwise = $("#monthwise option:selected").val();
        datewise = $("#datewise option:selected").text();
        jQuery.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>" + "appadmins/revn",
            dataType: 'json',
            data: {yearwise: yearwise},
            success: function (res) {
                //alert(res.year);
                var tax = res.year*(6.25/100);
                $('#date_tasks2').html(formatMoney(tax));
                $('#date_after_tasks2').html(formatMoney(res.year-tax));
                $('#air_in2').html(formatMoney(res.yr_air_tot));
                $('#year_gtotal').html(formatMoney(res.year_total));
            }
        });
        jQuery.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>" + "appadmins/revn",
            dataType: 'json',
            data: {yearwise: yearwise, monthwise: monthwise},
            success: function (res) {
               // alert(res.year + "--" + res.month);
                var tax = res.month*(6.25/100);
                $('#date_tasks1').html(formatMoney(tax));
                $('#date_after_tasks1').html(formatMoney(res.month-tax));
                $('#air_in1').html(formatMoney(res.mth_air_tot));
                 $('#month_gtotal').html(formatMoney(res.month_total));
            }
        });
        jQuery.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>" + "appadmins/revn",
            dataType: 'json',
            data: {yearwise: yearwise, monthwise: monthwise, datewise: datewise},
            success: function (res) {
              //  alert(res.year + "--" + res.month + "__" + res.date);
                var tax = res.date*(6.25/100);
                $('#date_tasks').html(formatMoney(tax));
                $('#date_after_tasks').html(formatMoney(res.date-tax));
                $('#air_in').html(formatMoney(res.dat_air_tot));
                 $('#date_gtotal').html(formatMoney(res.date_total));
                
            }
        });
    });
    function datewisechange() {
        datewise = $("#datewise option:selected").text();
        yearwise = $("#yearwise option:selected").text();
        monthwise = $("#monthwise option:selected").val();
        $('#t2').hide();
       // $('#t1').hide();
        jQuery.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>" + "appadmins/revn",
            dataType: 'json',
            data: {yearwise: yearwise, monthwise: monthwise, datewise: datewise},
            success: function (res) {
                $('#t3').show();
               // alert(res.year + "--" + res.month + "__" + res.date);
                var tax = res.date*(6.25/100);
                $('#date_tasks').html(formatMoney(tax));
                $('#date_after_tasks').html(formatMoney(res.date-tax));
                $('#air_in').html(formatMoney(res.dat_air_tot));
                 $('#date_gtotal').html(formatMoney(res.date_total));
            }
        });
    }
    function monthwisechange() {
        yearwise = $("#yearwise option:selected").text();
        monthwise = $("#monthwise option:selected").val();
       // $('#t1').hide();
        $('#t3').hide();
        jQuery.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>" + "appadmins/revn",
            dataType: 'json',
            data: {yearwise: yearwise, monthwise: monthwise},
            success: function (res) {
                $('#t2').show();
               // alert(res.year + "--" + res.month);
                var tax = res.month*(6.25/100);
                $('#date_tasks1').html(formatMoney(tax));
                $('#date_after_tasks1').html(formatMoney(res.month-tax));
                $('#air_in1').html(formatMoney(res.mth_air_tot));
                 $('#month_gtotal').html(formatMoney(res.month_total));
            }
        });
    }
    function yearwisechange() {
        yearwise = $("#yearwise option:selected").text();
        $('#t2').hide();
        $('#t3').hide();
        jQuery.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>" + "appadmins/revn",
            dataType: 'json',
            data: {yearwise: yearwise},
            success: function (res) {
              //  alert(res.year);
                $('#t1').show();
                var tax = res.year*(6.25/100);
                $('#date_tasks2').html(formatMoney(tax));
                $('#date_after_tasks2').html(formatMoney(res.year-tax));
                $('#air_in2').html(formatMoney(res.yr_air_tot));
                 $('#year_gtotal').html(formatMoney(res.year_total));
            }
        });
    }
    
    function formatMoney(amount, decimalCount = 2, decimal = ".", thousands = ",") {
  try {
    decimalCount = Math.abs(decimalCount);
    decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

    const negativeSign = amount < 0 ? "-" : "";

    let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
    let j = (i.length > 3) ? i.length % 3 : 0;

    return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
  } catch (e) {
    console.log(e)
  }
};
</script>