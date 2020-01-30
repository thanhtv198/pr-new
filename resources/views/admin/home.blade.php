@extends('admin/layouts/master')
@section('content')
    <section class="content-header">
        <h1>{{ trans('common.tag.content_admin_dashboard') }}</h1>
    </section>
    <section class="content">
        @include('admin/notice')
        <div class="row">
            <div class="chart-user col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="pull-left">
                            <h2>{{ trans('common.dashboard.chart_user') }}</h2>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <h4>{{ trans('common.dashboard.chart_total_user') }}: {{ $data['total_user'] }}</h4>
                        {!! Charts::scripts() !!}
                        {!! $chartUser->render() !!}
                    </div>
                </div>
            </div>
            <div class="chart-user col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="pull-left">
                            <h2>{{ trans('common.dashboard.chart_order') }}</h2>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <h4>{{ trans('common.dashboard.chart_total_order') }}: {{ $data['total_order'] }}</h4>
                        {!! Charts::scripts() !!}
                        {!! $chartOrder->render() !!}
                    </div>
                </div>
            </div>

            <div class="chart-user col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="pull-left">
                            <h2>{{ trans('common.dashboard.chart_product') }}</h2>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <h4>{{ trans('common.dashboard.chart_total_product') }}: {{ $data['total_product'] }}</h4>
                        {!! Charts::scripts() !!}
                        {!! $chartProduct->render() !!}
                    </div>
                </div>
            </div>

            <div class="col-xs-8">
                <div class="box">
                    <div class="box-header">
                        <div class="pull-left">
                            <h3 class="box-title">{{ trans('common.title_form.common_qty') }}</h3>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                {{ trans('common.form.qty_product') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                {{ trans('common.form.qyt_member') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                {{ trans('common.form.qty_news') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                {{ trans('common.form.slide') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
                                                {{ trans('common.form.qty_respond') }}
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr role="row" class="odd">
                                            <td><a href="{{ route('get_product') }}">{{ $data['total_product'] }}</a></td>
                                            <td><a href="{{ route('get_member') }}">{{ $data['total_user'] }}</a></td>
                                            <td><a href="{{ route('news.index') }}">{{ $data['total_new'] }}</a></td>
                                            <td><a href="{{ route('news.index') }}">{{ $data['total_slide'] }}</a></td>
                                            <td><a href="{{ route('get_respond') }}">{{ $data['total_respond'] }}</a></td>
                                        </tr>
                                        </tbody>
                                        {!! Form::close() !!}
                                    </table>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>
            <!-- table 2 -->
        </div>

        <div class="clear"></div>
    </section>
@endsection

