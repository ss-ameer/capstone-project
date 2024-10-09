<!-- comp=form-item.php -->
<form id="add-item-form">
    <div class="container">
        <div class="row g-1">
            <div class="col-12">
                <div class="form-floating">
                    <input type="text" name="item_name" id="add-item-name" class="form-control" placeholder="Name">
                    <label for="add-item-name">Name</label>
                </div>
            </div>

            <div class="col">
                <div class="form-floating">
                    <input type="text" name="item_category" id="add-item-category" class="form-control" placeholder="Category">
                    <label for="add-item-name">Category</label>
                </div>
            </div>

            <div class="col">
                <div class="form-floating">
                    <input type="number" name="item_density" id="add-item-density" class="form-control" placeholder="Density">
                    <label for="add-item-density">Density</label>
                </div>
            </div>

            <div class="col-12">
                <div class="form-floating">
                    <input type="text" name="item_description" id="add-item-description" class="form-control" placeholder="Description">
                    <label for="add-item-description">Description</label>
                </div>
            </div>

            <div class="col-12">
                <div class="form-floating">
                    <input type="number" name="item_price" id="add-item-price" class="form-control" placeholder="Price">
                    <label for="add-item-price">Price</label>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-success justify-center" id="add-item-submit">Create</button>
            </div>
        </div>
    </div>

    
</form>