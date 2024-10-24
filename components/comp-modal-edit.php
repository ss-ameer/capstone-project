<!-- Modal HTML -->
<div id="edit-modal" class="modal fade" tabindex="-1" aria-labelledby="edit-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-modal-label">Edit Data</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
                <form id="edit-form">
                    <!-- Dynamic form fields will be appended here by jQuery -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="saveChangesBtn">Save changes</button>
            </div>
        </div>
    </div>
</div>