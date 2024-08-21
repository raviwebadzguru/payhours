<?php $__env->startSection('title', __('Departments')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           <?php echo __('DEPARTMENT'); ?> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
            <li><a><?php echo __('Setting'); ?></a></li>
            <li class="active"><?php echo __('Departments'); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo __('Manage departments'); ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                
                <div  class="col-md-6">
                    <a href="<?php echo url('/setting/departments/create'); ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> <?php echo __('Add department'); ?></a>
                </div>
                <div  class="col-md-6">
                    <input type="text" id="myInput" class="form-control" placeholder="<?php echo __('Search..'); ?>">
                </div>
                <!-- Notification Box -->
                <div class="col-md-12">
                    <?php if(!empty(Session::get('message'))): ?>
                        <div class="alert alert-success alert-dismissible" id="notification_box">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="icon fa fa-check"></i> <?php echo Session::get('message'); ?>

                        </div>
                    <?php elseif(!empty(Session::get('exception'))): ?>
                        <div class="alert alert-warning alert-dismissible" id="notification_box">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="icon fa fa-warning"></i> <?php echo Session::get('exception'); ?>

                        </div>
                    <?php endif; ?>
                </div>
                <!-- /.Notification Box -->
                <div  class="col-md-12 table-responsive">
                    <table  class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th><?php echo __('SL#'); ?></th>
                                <th><?php echo __('Department'); ?></th>
                                <th><?php echo __('Department Description'); ?></th>
                                <th class="text-center"><?php echo __('Added'); ?></th>
                                <th class="text-center"><?php echo __('Status'); ?></th>
                                <th class="text-center"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <?php ($sl = 1); ?>
                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo $sl++; ?></td>
                                <td><a href="<?php echo url('/setting/departments/details/' . $department['id']); ?>"><?php echo $department['department']; ?></a></td>
                                <td><?php echo str_limit($department['department_description'], 65); ?></td>
                                <td class="text-center"><?php echo date("d F Y", strtotime($department['created_at'])); ?></td>
                                <td class="text-center">
                                    <?php if($department['publication_status'] == 1): ?>
                                   <span class="label label-success"><?php echo __('Published'); ?></span>
                                <?php else: ?>
                                <span class="label label-warning"><?php echo __('Unpublished'); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?php echo url('/setting/departments/edit/' . $department['id']); ?>"><i class="icon fa fa-edit"></i> <?php echo __('Edit'); ?></a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>