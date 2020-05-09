
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= __('Cms page listing') ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="<?php echo HTTP_ROOT; ?>Pages/listing-page"><?= __('Cms page listing') ?></a></li>            
        </ol>

    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">

            <div class="col-xs-12">            

                <div class="box">

                    <div class="box-body">

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="display: none">Id</th>
                                    <th>Page Title</th>
                                    <th>Link</th>
                                    <th>Created</th>
                                    <th>Modified</th>
                                    <th style="text-align: center;">Action</th>  
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pages as $pages): ?>
                                    <tr>
                                        <td style="display: none"><?= h($pages->id) ?></td>
                                        <td><?= h($pages->page_title) ?></td>
                                        <td><a target="_blank" href="<?php echo HTTP_ROOT . 'view-page/' . $pages->menu->seo . '-' . $pages->menu->id; ?>"><?php echo HTTP_ROOT . 'view-page/' . $pages->menu->seo . '-' . $pages->menu->id; ?></a></td>
                                        <td><?= h(date('jS M Y', strtotime($pages->created))) ?></td>
                                        <td><?= h(date('jS M Y', strtotime($pages->modified))) ?></td>
                                        <td style="text-align: center;">  
                                            <?php //echo $id = $user->id; ?>
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'add-page', $pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Update", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>                      
                        </table>
                    </div><!-- /.box-body -->
                    <a href="<?= h(HTTP_ROOT) ?>Pages/add-page"><button class="btn bg-olive btn-flat margin">Add page</button></a>
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

