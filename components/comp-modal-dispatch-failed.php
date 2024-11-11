<!-- comp-modal-dispach-failed.php -->

<div class="modal fade" id="modal-dispatch-failed" tabindex="-1" aria-labelledby="modal-failed-dispatch-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-failed-dispatch-label">Failed Reason</h5>
                <button type="button" class="btn-close"></button>
            </div>

            <div class="modal-body">
                <div class="container">
                    <form id="form-dispatch-failed">
                        <legend class="text-center">Select for a Reason</legend>
                        <select class="form-select" name="failed_reason" id="failed-reason-select" required>
                            <option class="text-center" value="">Select a Reason</option>
    
                            <optgroup label="Vehicle Issues:">
                                <option value="Mechanical Breakdown">Mechanical Breakdown</option>
                                <option value="Flat Tire">Flat Tire</option>
                                <option value="Engine Failure">Engine Failure</option>
                                <option value="Fuel Shortage">Fuel Shortage</option>
                            </optgroup>
                            
                            <optgroup label="Weather Conditions:">
                                <option value="Heavy Rain">Heavy Rain</option>
                                <option value="Snowstorm">Snowstorm</option>
                                <option value="Flooded Roads">Flooded Roads</option>
                                <option value="High Winds">High Winds</option>
                            </optgroup>
                            
                            <optgroup label="Driver-Related Issues:">
                                <option value="Driver Unavailable">Driver Unavailable</option>
                                <option value="Health Emergency">Health Emergency</option>
                                <option value="Delayed Start Time">Delayed Start Time</option>
                                <option value="Navigation Error">Navigation Error</option>
                            </optgroup>
                            
                            <optgroup label="Logistics and Scheduling:">
                                <option value="Scheduling Conflict">Scheduling Conflict</option>
                                <option value="Route Change">Route Change</option>
                                <option value="Overloaded Vehicle">Overloaded Vehicle</option>
                                <option value="Delivery Slot Missed">Delivery Slot Missed</option>
                            </optgroup>
                            
                            <optgroup label="Client or Location Issues:">
                                <option value="Incorrect Address">Incorrect Address</option>
                                <option value="Restricted Access">Restricted Access</option>
                                <option value="Unavailable Contact Person">Unavailable Contact Person</option>
                                <option value="Unreachable Location">Unreachable Location</option>
                            </optgroup>
                        </select>
                    </form>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
            </div>
        </div>
    </div>
</div>