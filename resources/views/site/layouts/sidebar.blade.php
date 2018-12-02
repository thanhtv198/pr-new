<h3 class="agileits-sear-head">{{ trans('common.aside.search_sidebar') }}</h3>
<div class="sidebar-banner">
    {!! Form::open(['route' => 'site_search_multiple', 'method' => 'post']) !!}
    <div class="form-group div-input">
        <label>{{ trans('common.aside.search_status') }}</label>
        {!! Form::select('status', $statusSidebar, null, ['class' => 'span2 col-md-2 form-control', 'placeholder' => trans('common.aside.all_status') ]) !!}
        <br>
        <label class="search-price">{{ trans('common.aside.search_category') }}</label>
        {!! Form::select('category_id', $categoriesSidebar, null, ['class' => 'span2 col-md-2 form-control', 'placeholder' => trans('common.aside.all_category')]) !!}
        <br>
        <label class="search-price">{{ trans('common.aside.search_price') }}</label>
        {!! Form::select('price', $priceSidebar, null, ['class' => 'span2 col-md-2 form-control', 'placeholder' => trans('common.aside.all_price')]) !!}
        <br>
        {!! Form::submit(trans('common.tag.search'), ['class' => 'btn btn-warning search-form']) !!}
    </div>
    {!! Form::close() !!}
</div>
<hr>
<div>
    <h3 class="agileits-sear-head">{{ trans('common.aside.search_local') }}</h3>
    <div view="sidebar">
        {!! Form::select('city', $city, null, ['class' => 'span2 col-md-2 form-control address1', 'placeholder' => trans('common.aside.choose_location')]) !!}
        {!! Form::button(trans('common.tag.search'), ['type' => 'submit', 'class' => 'btn-address btn btn-warning']) !!}
        {!! Form::hidden('url', config('app.url_base'), ['id' => 'url']) !!}
    </div>
</div>
<hr>
<div class="left-side">
    <h3 class="agileits-sear-head">{{ trans('common.aside.news') }}</h3>
    <ul>
        @foreach($newsSidebar as $row)
            <div class="news">
                <div class="info">
                    <div class="em">
                        <a href="{{ route('news_detail', $row->id) }}">
                            {{ $row->title }}
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </ul>
</div>

