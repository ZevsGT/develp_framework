<div id="item_{{ id }}" class="item row">
  <div class="col-auto">
    <img src="{{img}}" alt="">
  </div>
  <div class="col">
    <h5>{{ProductName}}</h5>
    <h6>Цена: {{Price}}р/шт.</h6>
    <span>
      Количество: <span id="quantity_{{ id }}"> {{ number }} </span>
    </span>
  </div>
  <span class="col-auto btndel">
    <a id="{{ id }}" href="#" class="dcarti"><i class="fas fa-times"></i></a>
  </span>
</div>