<div class="container">

	<section class="stageS" id="stage_1" style="display: block;">
		{% autoescape false %}
	  {{ product_list }}
	  {% endautoescape %}
		
		<div class="row mt-4">
			<div class="col-auto">
				<a href="" data-stage="1" class="btn2 btn-cart next">Оформить заказ</a>
			</div>
			<div class="col-auto p-2"><h6>На сумму: <span id="sum_price">{{total_sum}}</span>р.</h6></div>
		</div>
	</section>

	<section class="stageS" id="stage_2">
		
		<form action="" method="post">
			<input type="hidden" name="stage" value="3">
			<div class="form-group">
				<label>ФИО</label>
				<input type="text" name="name" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp" placeholder="Введите ФИО">
			</div>
			<div class="form-group">
				<label>Номер телефона</label>
				<input type="tel" name="phone" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp" placeholder="Введите телефон">
			</div>
			<div class="form-group">
				<label>Адрес</label>
				<input type="text" name="address" class="form-control" id="exampleInputPassword1" required placeholder="Введите адрес">
			</div>
			<div class="form-group form-check">
				<input type="checkbox" class="form-check-input" id="checkbox">
				<label class="form-check-label" for="checkbox">согласие на обработку персональных данных</label>
			</div>
			<a href="" data-stage="2" class="btn2 btn-cart back">Назад</a>
			<input id="submit" name="submit" type="submit" class="btn btn-cart" value="Оформить" disabled>
		</form>

	</section>

	<section class="stageS" id="stage_3">
		
	</section>

	<!--<a href="" data-stage="3" class="btn2 btn-cart back">Назад</a>-->

</div>