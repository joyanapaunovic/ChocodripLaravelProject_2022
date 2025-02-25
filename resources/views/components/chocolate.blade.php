<div class="col-lg-3">
    <div class="box-shop">
        <div class="img-box col-lg-12 ">
            <img src="{{asset('images/' . $src_picture)}}" alt="{{$name}}" class="img-fluid"/>
        </div>
        <div class="detail-box-shop">
            <h6 class="mt-4">
               {{$name}}
            </h6>
            <p class="product-type">{{ $category_name }}</p>
            <h5 class="d-flex align-items-center justify-content-between">
                ${{$current_price}}
                @if($previous_price != NULL)
                    <s>${{$previous_price}}</s>
                @endif
            </h5>
            {{-- get current route name --}}
{{--            <a href="{{ Route::currentRouteName() . "/" . $id}} " class="mt-4">--}}
{{--                See More...--}}
{{--            </a>--}}
            <a href="{{route('product', ['id' => $id])}}" class="mt-4">
                See More...
            </a>
        </div>
    </div>
</div>
