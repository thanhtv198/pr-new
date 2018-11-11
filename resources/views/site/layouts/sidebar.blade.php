<div>
    <h3 class="agileits-sear-head">{{ trans('common.aside.search_local') }}</h3>
    <div view="sidebar">
        {!! Form::select('city', $city, null, ['class' => 'span2 col-md-2 form-control address1', 'placeholder' => 'Choose location']) !!}
        {!! Form::button(trans('common.tag.search'), ['type' => 'submit', 'class' => 'btn btn-warning']) !!}
        {!! Form::hidden('url', config('app.url_base'), ['id' => 'url']) !!}
    </div>
</div>
<hr>
<div class="sidebar-banner">
    {!! Form::open(['route' => 'site_search_multiple', 'method' => 'post']) !!}
    <div class="form-group div-input">
        <label>{{ __('Danh mục') }}</label>
        {!! Form::select('category_id', $categoriesSidebar, null, ['class' => 'span2 col-md-2 form-control', 'placeholder' => 'Tất cả danh mục']) !!}
        <br>
        <label class="search-price">{{ __('Mức giá') }}</label>
        {!! Form::select('price', $priceSidebar, null, ['class' => 'span2 col-md-2 form-control', 'placeholder' => 'Tất cả mức giá']) !!}
        <br>
        {!! Form::submit(__('Tìm kiếm'), ['class' => 'btn btn-warning search-form']) !!}
    </div>
    {!! Form::close() !!}
</div>
<hr>
<div class="left-side">
    <h3 class="agileits-sear-head">{{ trans('common.aside.news') }}</h3>
    <ul>
        @foreach($newsSidebar as $row)
            <div class="news">
                {{--<div class="image">--}}
                    {{--<a href="{{ route('news_detail', $row->id) }}">--}}
                        {{--<img src="{{ url(config('app.newsUrl')) }}/{{ $row->image }}" width="50px">--}}
                    {{--</a>--}}
                {{--</div>--}}
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

