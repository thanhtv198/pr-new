@extends('site/layouts/master')
@section('content')
    <div class="container">
        <div class="error" id="404-error" style="margin-top: 200px;text-align: center">
            <h1>{{ trans('common.tag.404') }}</h1>
        </div>
    </div>
@endsection
