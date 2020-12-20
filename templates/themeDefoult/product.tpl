<div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 product-item mb-4">
  <img src="{{img}}">
  <h5>{{ ProductName }}
    <a tabindex="0" class="product-info" data-placement="bottom" role="button" data-toggle="popover" data-trigger="focus" data-content="{{ Description }}"><i class="fas fa-info-circle"></i></a>
  </h5>
  <p>
    {{ Description }}
  </p>
  <div class="row pr-2">
    <span class="price col">{{Price}}</span>
    <a id="{{id}}" href="#" class="col btn2 btn-cart addPIncart">В корзину</a>
  </div>
</div>