<a href="{{ route('admin.home') }}">GO TO ADMIN MAIN PAGE</a>
<form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="food_name" placeholder="Enter food name" required><br>
    <textarea name="food_description" cols="30" rows="5" placeholder="Enter food description" required></textarea>
    <input type="file" name="image" required><br>
    <input type="number" placeholder="Enter price" name="food_price" required><br>
    <p> <b>Select food type</b> </p>
    <input type="radio" name="food_type" id="normal" value="normal" checked>
    <label for="normal">Normal item</label> <br>
    <input type="radio" name="food_type" id="featured" value="featured">
    <label for="featured">featured item</label><br>
    <button type="submit">Add now</button>
</form>