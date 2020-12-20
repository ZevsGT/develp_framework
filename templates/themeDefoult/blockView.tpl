 <div class="container mt-3">
    <h3 class="mb-3">{{tittle}}</h3>
    <div class="row pl-2 pr-2">
      <!-- список -->
      {% autoescape false %}
      {{List}}
      {% endautoescape %}
      <!-- end список -->
    </div>
  </div>