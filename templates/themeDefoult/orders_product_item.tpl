<div id="item_{{ id }}" class="row mt-4">
	<div class="col-3 col-lg-2">
		<img src="{{http_url}}/uploads/{{img}}" width="100%" alt="">
	</div>
	<div class="col-7 col-lg-9">
		<div class="row">
			<div class="col"><h5>{{name}}</h5></div>
		</div>
		<div class="row">
			<div class="col"><h6>Цена: {{price}}р/ш</h6></div>
		</div>
		<div class="row">
			<div class="col">Количество: {{num}}</div>
		</div>
	</div>
	<div class="col-1 col-lg-1">
		<a id="{{ id }}" href="#" class="item-del dcarti"><i class="fas fa-times"></i></a>
	</div>
</div>