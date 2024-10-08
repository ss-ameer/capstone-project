<form action="add-item-form">
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
                    <input type="number" step="0.01" name="item_density" id="add-item-density" class="form-control" placeholder="Density">
                    <label for="add-item-density">Density</label>
                </div>
            </div>

            <div class="col-12">
                <div class="form-floating">
                    <input type="text" name="description" id="add-item-name" class="form-control" placeholder="Description">
                    <label for="add-item-description">Description</label>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-success justify-center">Create</button>
            </div>
        </div>
    </div>

    
</form>