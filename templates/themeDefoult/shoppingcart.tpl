<div class="shopping-block">
  <div class="head">
    <h4>Продукция в Вашей корзине:</h4>
  </div>
  <div class="shopping-list">
    <!-- Список покупок -->
    {% autoescape false %}
      {{cart_list}}
    {% endautoescape %}
    <!-- end Список покупок -->
  </div>
  <a href="/orders" class="shopping-btn">К оплате</a>
</div>

<a href="#" class="shopping-cart">
  <i class="fas fa-shopping-cart fa-2x" ></i>
  <i class="fas fa-times fa-2x" style="display: none;"></i>
  <span class="count">0</span>
</a>
