@extends('site/layouts/master')
@section('content')
    <div class="container">
        <div class="error" id="404-error" style="margin-top: 200px;">
            <h1>{{ trans('common.tag.404') }}</h1>
        </div>
    </div>
@endsection
/var/www/html/Laravel/pr-new$ redis-server --port 8890
/var/www/html/Laravel/pr-new/server_node$ node server
/var/www/html/Laravel/pr-new$ php artisan queue:list