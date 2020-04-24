<!-- Shop Toolbar-->
<div class="shop-toolbar padding-bottom-1x mb-2">
    <div class="column">
        <div class="shop-sorting">
            <label for="sorting">Сортировка:</label>
            <select class="form-control" id="sorting">
                <option>Популярность</option>
                <option>Низкая - Высокая Цена</option>
                <option>Высокая - Низкая Цена</option>
                <option>Рейтинг</option>
                <option>A - Я Порядок</option>
                <option>Z - A Порядок</option>
            </select><span class="text-muted">Показано:&nbsp;</span><span>1 - 12 объявлений</span>
        </div>
    </div>
    <div class="column">
        <div class="shop-view"><a class="grid-view active" href="{{url()->current()}}"><span></span><span></span><span></span></a><a class="list-view" href="{{url()->current()}}/list"><span></span><span></span><span></span></a></div>
    </div>
</div>
<!-- Products Grid-->
<div class="isotope-grid cols-3 mb-2">
    <div class="gutter-sizer"></div>
    <div class="grid-sizer"></div>


@foreach($goods as $good)
    <!-- Product-->
        @if($good->active)
            <div class="grid-item">
                <div class="product-card">
                    <h3 class="product-title"><a href="/message/{{$good->id}}">{{$good->title}}</a></h3>
                    <img src="/storage/pictures/{{$good->pictures->photo}}">
                    <div class="product-buttons">
                        <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
                        <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">$49.99</button>
                    </div>
                </div>
            </div>
        @endif
    <!-- Product-->
    @endforeach
</div>
<!-- Pagination-->

{{ $goods->links() }}
<!--nav class="pagination">
    <div class="column">
        <ul class="pages">
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li>...</li>
            <li><a href="#">12</a></li>
        </ul>
    </div>
    <div class="column text-right hidden-xs-down"><a class="btn btn-outline-secondary btn-sm" href="#">Next&nbsp;<i class="icon-arrow-right"></i></a></div>
</nav-->

