<div id="order_ready_to_eat" hidden>
    <div class="text-center m-5">
        <img class="img-fluid" src="image/rtos-title.png">
    </div>
    <div class="row no-gutters justify-content-md-center">
        <div class="col col-lg-11">
            <div class="row mx-0">
                @foreach($product_list as $list)
                <div class="col col-md-6 col-lg-6 p-2">
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
                            <!-- <input type="text" id="id_product_buysushi{{$list->id}}" name="id_product_buysushi" value="{{$list->id}}" hidden> -->
                            <button id="{{$list->id}}" class="btn btn-blue" onclick="buysushi($(this));return false;">ADD TO CART</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>