@if($available && $previous_price != NULL)
    <div class="box">
        <div class="img-box">
            <img src="{{asset("images/" . $src_picture)}}" alt="{{$name}}">
        </div>
        <div class="detail-box">
            <h6 class="py-2">
                {{$name}}
            </h6>
            <p class="in-stock"><i class="fa-sharp fa-solid fa-circle"></i> IN STOCK</p>
            <h5 class="price mt-3 mb-2">
                ${{$current_price}}
                    <s class="ml-2 previous-price">{{$previous_price}}</s>
            </h5>
            <a href="{{ route('product', ['id' => $id]) }}" class="see-more-home-page">See More...</a>


        </div>
    </div>
@endif
