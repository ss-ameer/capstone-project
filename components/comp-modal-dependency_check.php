<!-- comp-modal-dependency_check.php -->
<div class="modal fade" id="dependency-modal" tabindex="-1" role="dialog" aria-labelledby="dependency-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dependency-modal-label">Handle Dependencies</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <p>This has dependencies:</p>
                            <ul id="dependency-list"></ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group">
                                <label for="reassign-value" class="input-group-text">Reassign Value</label>
                                <input type="text" class="form-control" id="reassign-value" placeholder="Enter new value or leave blank for null">
                            </div>
                        </div>
                    </div>
    
                    <input type="hidden" id="reassign-id" value="">
                    <input type="hidden" id="reassign-column" value="truck_id">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirm-dependency-action">Proceed</button>
            </div>
        </div>
    </div>
</div>
