<?php
$paramAction = $this->request->params['action'];
//echo $paramAction;
?>
<?= $this->element('frontend/banner'); ?>
<section id="cta-faq" data-slides='["https://architecturesstyle.com/wp-content/uploads/2019/11/ultra-modern-homes4-1200x675.jpg"]'>
    <div class="bg-overlay"></div>
    <?php echo $this->element('frontend/header'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="main-cta-faq text-center">
                    <h1><?php echo __('Published Properties'); ?></h1>
                    <?php //echo $pageDetails->page_desc 
                    ?>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-1 text-center">
                <a href="#faq-qna" class="flight-click-faq hvr-sink"><img src="<?php echo HTTP_ROOT ?>img/flight_continue.png" /></a>
            </div>
        </div>
    </div>
</section>
<div class="container" id="faq-qna">
    <!-- Bootstrap FAQ - START -->
    <div class="container">
        <br />
        <section class="sor-tb-ext">
            <div class="container">
			
			<p><b><?php echo __('Note:'); ?></b> <?php echo __('This table will display the number of properties that are officially registered on the platform to date. The properties displayed below have been tested and reviewed before becoming available for booking. We take security very seriously, as we do not want to put any of our guests in danger or cause them any harm.'); ?></p>
                <div id="example_wrapper" class="dataTables_wrapper no-footer">
                    <div class="dataTables_length" id="example_length">
                        <label>Show <select name="example_length" aria-controls="example" class="" style="display: none;">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <div class="nice-select" tabindex="0"><span class="current">10</span>
                                <ul class="list">
                                    <li data-value="10" class="option selected">10</li>
                                    <li data-value="25" class="option">25</li>
                                    <li data-value="50" class="option">50</li>
                                    <li data-value="100" class="option">100</li>
                                </ul>
                            </div>
                            entries
                        </label>
                    </div>
                    <!-- <div id="example_filter" class="dataTables_filter">
                        <label>Search:<input type="search" class="" placeholder="" aria-controls="example"></label>
                    </div> -->
                    <table id="myTable" class="display dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th  class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 88.3789px;">#</th>
                                <th  class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Guest Name: activate to sort column ascending" style="width: 122.754px;"><?php echo __('Logo'); ?></th>
                                <th  class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 300px;"><?php echo __('Name'); ?></th>
                                <th  class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Booking Type: activate to sort column ascending" style="width: 150px;"><?php echo __('Type'); ?></th>
                                <th  class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Total: activate to sort column ascending" style="width: 133.379px;"><?php echo __('Country'); ?></th>
                                <th  class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Commission: activate to sort column ascending" style="width: 124.004px;"><?php echo __('Province'); ?></th>
                                <th  class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 69.6289px;"><?php echo __('Municipality'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                            $i=1;
                            foreach($viewdata as $row){
                                echo('<tr role="row" class="odd">
                                <td class="sorting_1">'.$i.'</td>
                                <td class="sorting_1"><img src="https://www.alegro.co.ao/'.$row[profile_photo].'" style="width: 80px;border-radius: 50%;"></td>
                                <td class="sorting_1">'.$row[propertyName].'</td>
                                <td class="sorting_1">'.$row[property_type].'</td>
                                <td class="sorting_1">'.$row[nationality].'</td>
                                <td class="sorting_1">'.$row[state].'</td>
                                <td class="sorting_1">'.$row[city].'</td>
                            </tr>');
                            $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                  <br>
                </div>
            </div>
        </section>
        <script>
        $(document).ready(function() {
            $("#myTable").DataTable();
        } );
        </script>
        <style type="text/css">
            table.dataTable.no-footer {
                border: 1px solid #111;
            }
            table.dataTable.no-footer thead {
                background: #f7d74a;
            }
            .dataTables_length {
                display: none;
            }
            .dataTables_wrapper .dataTables_filter input {
                margin-left: 0.5em;
                border: 1px solid #ccc;
                padding: 7px;
                border-radius: 3px;
            }

            .dataTables_wrapper .dataTables_filter input:focus {
                outline: none;
            }

            .dataTables_wrapper .dataTables_paginate span .paginate_button.current {
                color: #333 !important;
                border: 1px solid #f7d74a !important;
                background: #f7d74a !important;
            }

            .dataTables_wrapper .dataTables_paginate span .paginate_button {
                border: 1px solid #ccc !important;
                width: 39px !important;
                padding: 7px 0 !important;
            }
        </style>
        <style>
            #cta-faq {
                position: relative;
                width: 100%;
                height: 400px;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center center;
                background-size: cover;

            }

            #booking-page {
                background-color: #fff;
            }
        </style>
    </div>
</div>
</div>
</div>

<?= $this->element('frontend/footer'); ?>