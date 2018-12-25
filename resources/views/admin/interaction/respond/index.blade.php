@extends('admin/layouts/master')
@section('content')
    <section class="content-header">
        <h1>{{ trans('common.title_form.respond_head') }}</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        @include('admin/notice')
                        <div class="pull-left">
                            <h3 class="box-title">{{ trans('common.title_form.respond_title') }}</h3>
                        </div>
                        <div class="pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-hover dataTable" role="grid">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                {{ trans('common.form.name') }}
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                {{ trans('common.form.email') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                {{ trans('common.news.title') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                {{ trans('common.news.content') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                {{ trans('common.form.status') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                {{ trans('common.form.action') }}
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($responds as $row)
                                            <tr role="row" class="odd" id="row-{{ $row->id }}">
                                                <td class="sorting_1">{{ $row->user->name }}</td>
                                                <td>{{ $row->user->email }}</td>
                                                <td>{{ $row->title }}</td>
                                                <td>{!! $row->content !!}</td>
                                                <td>
                                                    @if ($row->status == 0)
                                                        <a href="{{ route('check_respond', $row->id) }}" class="bg-blue right badge badge-success badge-status">
                                                           <span>{{ trans('common.respond.check_now') }}</span>
                                                        </a>
                                                    @elseif ($row->status == 1)
                                                        <span class="bg-green right badge badge-success badge-status">
                                                        {{ trans('common.respond.checked') }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="textC">
                                                    <p class="del-button-respond" id="{{ $row->id }}" data-url="{{ route('delete_respond', $row->id) }}">
                                                        <button type="button" class="btn btn-block btn-danger btn-sm">Delete</button>
                                                    </p>
                                                    {{--<a href="{{ route('delete_respond', $row->id) }}" onclick="return confirm({{trans('common.form.confirm')}})">--}}
                                                        {{--<i id="trash" class="fa fa-trash" aria-hidden="true"></i>--}}
                                                    {{--</a>--}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

