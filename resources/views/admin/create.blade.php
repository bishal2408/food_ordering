<!-- The Custom Modal -->
<div id="myModal" class="mmodal">
    <div class="mmodal-content">
        <div class="mmodal-header">
            <p>Add food form</p>
            <span class="close1">&times;</span>
        </div>
        <div class="mmodal-body">
            <form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <label class="formLabel" for="fname">Enter Food name</label> <br>
                <input class="formInput" type="text" id="fname" name="food_name" placeholder="Enter food name" required><br>

                <label class="formLabel" for="fdescription">Enter description</label> <br>
                <textarea class="formInput" id="fdescription" name="food_description" placeholder="Enter food description" required></textarea> <br>

                <label class="formLabel" for="fimage">Select image</label> <br>
                <input class="formInput" id="fimage" type="file" name="image" style="border: none;" required><br>

                <label class="formLabel" for="fprice">Enter Food price</label> <br>
                <input class="formInput" id="fprice" type="number" placeholder="Enter price" name="food_price" required><br>

                <p class="formLabel">Select food type</p>
                <input type="radio" name="food_type" id="normal" value="normal" style="margin-bottom: 6px;" checked>
                <label for="normal">Normal item</label> <br>
                <input type="radio" name="food_type" id="featured" value="featured" style="margin-bottom: 6px;">
                <label for="featured">Featured item</label> <br>

                <button type="submit">Add now</button>
            </form>
        </div>
    </div>

</div>