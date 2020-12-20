<div class="row m-1">
    <div class="col-12 col-sm-12 col-md-6 col-lg-6 ol-xl-6 card p-3">
      <form action="" method="post">
        <div class="form-group">
          <label for="exampleFormControlInput1">Название</label>
          <input type="text" name='productName' class="form-control" id="exampleFormControlInput1" placeholder="Название" value="{{productName}}">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Категория</label>
          <select class="form-control" name="category" id="exampleFormControlSelect1">
            {% autoescape false %}
            {{category}}
            {% endautoescape %}
          </select>
        </div>
        <div class="form-group">
          <input type="checkbox" name="popular" value="true" id="exampleCheck1">
          <label for="exampleCheck1">Популярное</label>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Цена</label>
          <input type="text" name='price' class="form-control" id="exampleFormControlInput1" placeholder="Цена" value="{{price}}">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Описание</label>
          <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{description}}</textarea>
        </div>
        <button type="submit" name='submit' class="btn btn-primary">Готово</button>
      </form>
    </div>
</div>