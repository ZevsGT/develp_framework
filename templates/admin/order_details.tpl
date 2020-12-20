<div class="col-12 col-sm-12 col-md-12 col-lg-12 ol-xl-12 card p-3 mt-3">

	<div class="row">
  	<div class="col-12 col-lg-10">
  		№ заказа: #{{id}}
  	</div>

  	<div class="col-12 col-lg-2 text-right">
  		{{date}}
  	</div>
  </div>

	<hr>

  <div class="row">
  	<div class="col">
  		Заказ на сумму: {{total_sum}}р.
  	</div>
  </div>

  <div class="row">
  	<div class="col">
  		ФИО: 
  	</div>
  </div>

  <div class="row">
  	<div class="col">
  		Номер телефона: 
  	</div>
  </div>

  <div class="row">
  	<div class="col">
  		Адрес: {{address}}
  	</div>
  </div>
</div>

<div class="col-12 col-sm-12 col-md-12 col-lg-12 ol-xl-12 p-3 mt-3">
	<div class="row">
  	<h5>Список покупок:</h5>
  	{% autoescape false %}
	  	{{list}}
	  {% endautoescape %}
  </div>
</div>