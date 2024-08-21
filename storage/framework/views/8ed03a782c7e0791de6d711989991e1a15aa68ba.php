<?php $__env->startSection('title', __('Generate Payslip')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo __('GENERATE PAYSLIP'); ?>

    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
      <li><a><?php echo __('Salary'); ?></a></li>
      <li class="active"><?php echo __('Generate Payslip'); ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo __('Generate Payslip'); ?></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
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
        <div class="col-md-12">
          <form class="form-horizontal" action="<?php echo url('/hrm/generate-payslips/'); ?>" method="post">
            <?php echo csrf_field(); ?>

              <div class="form-group<?php echo $errors->has('salary_frm_date') ? ' has-error' : ''; ?>">
                <label for="salary_frm_date" class="col-sm-3 control-label"><?php echo __('Select From Date'); ?></label>
                <div class="col-sm-3">
                  <div class="input-group date">
                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                    <input type="date" name="salary_frm_date" id="salary_frm_date" class="form-control pull-right" value="<?php echo old('salary_frm_date'); ?>" onchange="updateDate2()">
                  </div>
                    <?php if($errors->has('salary_frm_date')): ?>
                    <span class="help-block">
                      <strong><?php echo $errors->first('salary_frm_date'); ?></strong>
                    </span>
                    <?php endif; ?>
                </div>
              </div>
              <!-- /.end group -->
              <div class="form-group<?php echo $errors->has('salary_to_date') ? ' has-error' : ''; ?>">
                <label for="salary_to_date" class="col-sm-3 control-label"><?php echo __('Select To Date'); ?></label>
                <div class="col-sm-3">
                  <div class="input-group date">
                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                    <input type="date" name="salary_to_date" id="salary_to_date" class="form-control pull-right" value="<?php echo old('salary_to_date'); ?>">
                  </div>
                    <?php if($errors->has('salary_to_date')): ?>
                    <span class="help-block">
                      <strong><?php echo $errors->first('salary_to_date'); ?></strong>
                    </span>
                    <?php endif; ?>
                </div>
              </div>
              <!-- /.end group -->
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-10">
                  <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-arrow-right"></i> <?php echo __('GO'); ?></button>
                </div>
              </div>
              <!-- /.end group -->
            </form>
            <!-- /. end form -->
          </div>
          <!-- /. end col -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix"></div>
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>