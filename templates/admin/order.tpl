<div id='{{id}}' class="col-12 col-sm-12 col-md-12 col-lg-12 ol-xl-12 card p-3 mt-3">
  <div class="row">
		<div class="col">
			<div class="row">

				<div class="col-auto">№{{id}}</div>
				<div class="col-auto"><small>{{data}}</small></div>
				<div class="col-auto"><i class="fas fa-money-bill-wave"></i> {{price}}</div>
				<div class="col-auto"><i class="fas fa-circle"></i> {{status}}</div>
				<div class="col"><i class="fas fa-map-marker-alt"></i> {{address}}</div>

			</div>
		</div>

		<div class="col-auto">
			<div class="row">
				<div class="col">
					<a href="/admin/orders/info/{{id}}" class="btn btn-secondary"><i class="fas fa-chevron-circle-down"></i> <small>Детали заказа</small></a>
					<a id='{{id}}' href="#" class="btn btn-secondary"><i class="far fa-trash-alt"></i></a>
				</div>
			</div>
		</div>

  </div>
</div>