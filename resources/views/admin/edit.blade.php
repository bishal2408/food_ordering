<div class="editFood">
    <form action="{{ route('admin.update', ['id'=>$item->id]) }}" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="ModalEdit{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title"> Edit form </p>
                        <button type="button" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                        </button>
                    </div>
                    <div class="modal-body">
                        @method('PUT')
                        @csrf
                        <label class="formLabel" for="fname">Enter Food name</label> <br>
                        <input class="formInput" type="text" id="fname" name="food_name" placeholder="Enter food name" value="{{ $item->food_name }}" required><br>

                        <label class="formLabel" for="fdescription">Enter description</label> <br>
                        <textarea class="formInput" id="fdescription" name="food_description" placeholder="Enter food description" required>{{ $item->food_description }}</textarea> <br>

                        <label class="formLabel" for="fimage">Select image</label> <br>
                        <input class="formInput" id="fimage" type="file" name="image" style="border: none;" required><br>

                        <label class="formLabel" for="fprice">Enter Food price</label> <br>
                        <input class="formInput" id="fprice" type="number" placeholder="Enter price" name="food_price" value="{{ $item->food_price }}" required><br>

                        <p class="formLabel">Select food type</p>
                        <input type="radio" name="food_type" id="normal" value="normal" style="margin-bottom: 6px;" checked>
                        <label for="normal">Normal item</label> <br>
                        <input type="radio" name="food_type" id="featured" value="featured" style="margin-bottom: 6px;">
                        <label for="featured">Featured item</label> <br>

                        <button type="submit">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>