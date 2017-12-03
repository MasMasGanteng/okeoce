<div id="order_ready_to_eat" hidden>
    <div class="row no-gutters justify-content-center my-5">
        <img class="img-fluid" src="image/rtos-title.png">
    </div>
    <div class="row no-gutters justify-content-md-center">
        <div class="col col-lg-11">
            <div class="row mx-0">
                @foreach($product_list as $list)
                <div class="col col-lg-6">
                    <div class="sushi-list">
                        <div class="sl-img">
                            <img class="img-fluid" src="uploads/product/product/{{$list->url_img_product}}">
                        </div>
                        <div class="sl-text">
                            <div class="title">
                                {{$list->name}}
                            </div>
                            <div class="content">
                                {{$list->description}}
                            </div>
                            <button class="btn btn-blue cart-overlay">ADD TO CART</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>