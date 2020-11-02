


<div class="form-group">
    <label for="brand">Name car:</label>
<input type="text" class="form-control" name="brand" id="brand" value="{{ old('brand', $car->brand ?? null) }}">
  </div>
 
  <div class="form-group">
    <label for="model">Model:</label>
    <input type="text" class="form-control" name="model" id="model"  value="{{ old('model', $car->model ?? null) }}">
  </div>
  
  <div class="form-group">
    <label for="release_date">release date:</label>
    <input type="date" class="form-control" name="release_date" id="release_date"  value="{{ old('release_date', $car->release_date ?? null) }}">
  </div>

  <div class="form-group">
    <label for="picture">Picture</label>
    <input type="file" name="picture" id="picture" class="form-control-file">
</div>