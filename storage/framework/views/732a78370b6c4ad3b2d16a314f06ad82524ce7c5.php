<?php $__env->startSection('title', __('Attendance Statement')); ?>
<?php $__env->startSection('main_content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <?php echo __('Attendance Statement'); ?> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
            <li><a>Attendance</a></li>
            <li class="active"><?php echo __('Attendance Statement'); ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo __('Attendance Statement'); ?>    </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <!-- <div class="btn-body">
                    <a href="<?php echo url('/hrm/attendance/details/report/go'); ?>" class="tip btn btn-primary btn-flat"><i class="fa fa-plus"></i><?php echo __('add new Attendance Statement'); ?> </a>
                    
                    <form action="<?php echo url('/hrm/attendance/details/report/pdf'); ?>" method="get">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="emp_id" value="<?php echo $empid; ?>">
                        <input type="hidden" name="date1" value="<?php echo $startdate; ?>">
                        <input type="hidden" name="date2" value="<?php echo $enddate; ?>">
                        
                        <button type="submit" class="tip btn btn-primary btn-flat"><?php echo __('PDF'); ?> </button>
                        
                    </form>
                </div> -->
                <hr>
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
                    <form class="form-horizontal" action="<?php echo url('/hrm/attendance/details/report/all'); ?>" method="get">
                        <?php echo csrf_field(); ?>

                        <div class="form-group<?php echo $errors->has('user_id') ? ' has-error' : ''; ?>">
                            <label for="user_id" class="col-sm-3 control-label"><?php echo __('Employee Name'); ?> </label>
                            <div class="col-sm-3">
                                <select name="emp_id" id="user_id" class="form-control">
                                    <option value="0"><?php echo __('Select One'); ?></option>
                                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $isSelected ="";
                                            if($employee['id']  == $empid){
                                                $isSelected = "selected";
                                            }?>
                                        <option value="<?php echo $employee['id']; ?>" <?php echo $isSelected; ?>><strong><?php echo $employee['name']; ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('user_id')): ?>
                                    <span class="help-block">
                                        <strong><?php echo $errors->first('user_id'); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- /.end group -->
                       
                        <div class="form-group<?php echo $errors->has('salary_month') ? ' has-error' : ''; ?>">
                            <label for="salary_month" class="col-sm-3 control-label"><?php echo __('Select Date'); ?></label>
                            <div class="col-sm-3">
                                <input type="text" name="daterange" class="form-control" id="reservation" value="<?php echo $date1; ?> <?php echo __('-'); ?> <?php echo $date2; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-10">
                                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-arrow-right"></i> <?php echo __('View Attendence Statement'); ?></button>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="printable_area">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th><?php echo __('SL'); ?></th>
                                <!-- <th><?php echo __('User ID'); ?></th> -->
                                <th><?php echo __('Employee'); ?></th>
                                <th><?php echo __('Attendance Date'); ?></th>
                                <th><?php echo __('Attendance Status'); ?></th>
                                <!-- <th><?php echo __('Leave Category'); ?></th> -->
                                <th><?php echo __('Shift'); ?></th>
                                <th><?php echo __('In Time'); ?></th>
                                <th><?php echo __('Out Time'); ?></th>
                                <th style="text-align: center;"><?php echo __('In-Status'); ?></th>
                                <th style="text-align: center;"><?php echo __('Out-Status'); ?></th>
                                <th><?php echo __('Worked (Hrs)'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

use function Psy\debug;

 $sl=1;?>
                            <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo $sl++; ?></td>
                                <!-- <td>ATTD<?php echo $attd->id; ?></td> -->
                                <!-- <td><?php echo Auth::user()->name; ?></td> -->
                                <td><?php echo $attd->name; ?></td>
                                <td><?php echo $attd->attendance_date; ?></td>
                                <td>
                                    <?php if($attd->attendance_status==1): ?>
                                    <b class="btn btn-success"><?php echo __('P'); ?></b>
                                    <?php else: ?>
                                    <b class="btn btn-danger"><?php echo __('A'); ?></b>
                                    <?php endif; ?>
                                <!-- </td>
                                <td> -->
                                    <?php if($attd->leave_category_id==0): ?>
                                    <!-- <b class="btn btn-primary"><?php echo __('No Leave'); ?></b> -->
                                    <?php elseif($attd->leave_category_id==3): ?>
                                    <b class="btn btn-success"><?php echo __('LWP'); ?></b>
                                    <?php else: ?>
                                    <b class="btn btn-success"><?php echo __('Leave'); ?></b>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $attd->shift_in; ?> - <?php echo $attd->shift_out; ?></td>
                                <td><?php echo $attd->check_in; ?></td>
                                <td><?php echo $attd->check_out; ?></td>
                                <?php 
                                    //xdebug_break();
                                    $chk_in1 = strtotime($attd->shift_in);
                                    $chk_in2 = strtotime($attd->check_in);

                                    $check_in = $chk_in2 - $chk_in1;
                                    
                                    $hours = floor($check_in / 3600);
                                    $minutes = floor(($check_in % 3600) / 60);
                                    $seconds = $check_in % 60;
                                    $check_in = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
                                    // If the result is negative, adjust for crossing midnight
                                    // if ($check_in < 0) {
                                    //     $check_in += 24 * 3600; // Adding 24 hours in seconds
                                    // }
                                    // echo gmdate('H:i:s', $check_in);
                                ?>
                                <td >  
                                    <?php if($attd->shift_in < $attd->check_in): ?>
                                        <!-- <img src="<?php //echo url('/public/profile_picture/late.png'); ?> "> &nbsp; <?php //echo gmdate('H:i:s', $check_in); ?> -->
                                        <img src="<?php echo url('/public/profile_picture/late.png'); ?> "> &nbsp; <?php echo $check_in; ?>

                                    <?php elseif($attd->shift_in == $attd->check_in): ?>
                                        <img src="<?php echo url('/public/profile_picture/ontime.png'); ?> "> &nbsp; <?php echo __('On Time'); ?>

                                    <?php else: ?>
                                        <img src="<?php echo url('/public/profile_picture/early.png'); ?> "> &nbsp; <?php echo $check_in; ?>

                                    <?php endif; ?>
                                </td>
                                <?php 
                                //xdebug_break();
                                    $chk_out1 = strtotime($attd->shift_out);
                                    $chk_out2 = strtotime($attd->check_out);

                                    $check_out = abs($chk_out1 - $chk_out2);

                                    $hours = floor($check_out / 3600);
                                    $minutes = floor(($check_out % 3600) / 60);
                                    $seconds = $check_out % 60;
                                    
                                    $check_out = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
                                    // If the result is negative, adjust for crossing midnight
                                     //if ($check_out < 0) {
                                         //$check_out += 24 * 3600; // Adding 24 hours in seconds
                                    //     $check_out = ($check_out + (24 * 3600)) % (24 * 3600);
                                    //}
                                    // echo gmdate('H:i:s', $check_out);
                                ?>
                                <td>
                                    <?php if($attd->shift_out < $attd->check_out): ?>
                                        <img src="<?php echo url('/public/profile_picture/early.png'); ?> "> &nbsp; <?php echo $check_out; ?>

                                    <?php elseif($attd->shift_out == $attd->check_out): ?>
                                        <img src="<?php echo url('/public/profile_picture/ontime.png'); ?> "> &nbsp; <?php echo __('On Time'); ?>

                                    <?php else: ?>
                                        <img src="<?php echo url('/public/profile_picture/late.png'); ?> "> &nbsp; <?php echo $check_out; ?>

                                    <?php endif; ?>
                                </td>
                                <td><?php 
                                    $time1 = strtotime($attd->check_in);
                                    $time2 = strtotime($attd->check_out);

                                    // Adding time
                                    // $added_time = $time1 + $time2;
                                    // echo "Added Time: " . date('H:i:s', $added_time) . "\n";

                                    // Subtracting time
                                    $subtracted_time = $time2 - $time1;

                                    // If the result is negative, adjust for crossing midnight
                                    if ($subtracted_time < 0) {
                                        $subtracted_time += 24 * 3600; // Adding 24 hours in seconds
                                    }
                                    echo gmdate('H:i:s', $subtracted_time);
                                ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                            <br>
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo __('Total'); ?>

                                </td>
                                <td>
                                    <?php echo $attendance->count(); ?> days
                                </td>
                            <!-- </tr>
                            <tr> -->
                                <td>
                                    <!-- <?php echo __('Total'); ?> -->
                                    <?php echo $attds->count(); ?> <?php echo __('Present'); ?>

                                </td>
                            <!-- </tr>
                            <tr> -->
                                <td>
                                    <!-- <?php echo __('Total'); ?> -->
                                    <?php echo $abs->count(); ?> <?php echo __('Absence'); ?>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </div><!--printable-->
                    <!-- <div class="sign-body-l">-----------------------------------<br><?php echo __('Employee'); ?></div>
                    <div class="sign-body-r">-----------------------------------<br><?php echo __('Authorized'); ?></div> -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>