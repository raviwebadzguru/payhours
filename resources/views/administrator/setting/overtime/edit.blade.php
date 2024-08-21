@extends('administrator.master')
@section('title', __('Edit Overtime'))

@section('main_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ __('Edit Overtime') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
            <li><a>{{ __('HRM') }}</a></li>
            <li><a href="{{ url('/hrm/overtime') }}">{{ __('Overtime') }}</a></li>
            <li class="active">{{ __('Edit Overtime') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Edit Overtime') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <form action="{{ url('/setting/overtime/update/' . $overtime->id) }}" method="post" name="overtime_edit_form">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="row">
                        <!-- Notification Box -->
                        <div class="col-md-12">
                            @if (!empty(Session::get('message')))
                                <div class="alert alert-success alert-dismissible" id="notification_box">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="icon fa fa-check"></i> {{ Session::get('message') }}
                                </div>
                            @elseif (!empty(Session::get('exception')))
                                <div class="alert alert-warning alert-dismissible" id="notification_box">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="icon fa fa-warning"></i> {{ Session::get('exception') }}
                                </div>
                            @else
                                <p class="text-yellow">{{ __('Edit overtime details. All fields are required.') }}</p>
                            @endif
                        </div>
                        <!-- /.Notification Box -->

                        <div class="col-md-6">
                            <label for="code">{{ __('Code') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="code" id="code" class="form-control" value="{{ old('code', $overtime->code) }}" placeholder="{{ __('Enter code..') }}">
                                @if ($errors->has('code'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('code') }}</strong>
                                </span>
                                @endif
                            </div>

                            <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $overtime->name) }}" placeholder="{{ __('Enter name..') }}">
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>

                            <label for="fixed_amount">{{ __('Fixed Amount') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('fixed_amount') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="fixed_amount" id="fixed_amount" class="form-control" value="{{ old('fixed_amount', $overtime->fixed_amount) }}" placeholder="{{ __('Enter fixed amount..') }}">
                                @if ($errors->has('fixed_amount'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('fixed_amount') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ url('/hrm/overtime') }}" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i> {{ __('Cancel') }}</a>
                    <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-save"></i> {{ __('Update Overtime') }}</button>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
@endsection
