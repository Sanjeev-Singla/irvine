<div class="tenbox11 tenbox13">
    <h4>Submit Maintenance Requests</h4>
    <div class="tenbox11 tenbox15">
        <button type="submit" class="modal-op">Submit Request</button>
    </div>
    <!---Modal Start-->
    <div class="custom-model-main">
        <div class="custom-model-inner">
            <div class="close-btn">
                <i class="fas fa-times"></i>
            </div>
            <div class="custom-model-wrap">
                <div class="pop-up-content-wrap">
                    <div class="form-wrap">
                        <div class="form-heading">
                            <h4>Submit Maintenance Request</h4>
                            <p>Please fill out below fields and we will reach out shortly with a
                                solution.</p>
                        </div>
                        <form action="{{ route('maintenance-request') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="issue">Issue</label>
                                <input type="text" value="{{ old('issue') }}" class="form-control" maxlength="50" placeholder="50 characters" name="issue" required>
                            </div>
                            <div class="form-group">
                                <label for="priority">Priority Level</label>
                                <select class="form-control" name="priority_level" required>
                                    <option value="0">Low Priority</option>
                                    <option value="1">At Earliest Convenience</option>
                                    <option value="2">Urgent</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="apartment">Apartment Number</label>
                                <input type="number" value="{{ old('appartment_number') }}" class="form-control" placeholder="Only excepts number" name="appartment_number" required>
                            </div>
                            <div class="form-group">
                                <label for="issue_start_date">Issue Started On :</label>
                                <input type="date" class="form-control" value="{{ old('issue_start_date') }}" placeholder="xx/xx/xxxx" min="2015-01-01" name="issue_start_date" required>
                            </div>
                            <div class="form-group">
                                <label for="cause">Cause</label>
                                <input type="text" class="form-control" value="{{ old('cause') }}" maxlength="100" placeholder="100 charaters" name="cause">
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact Number</label>
                                <input type="number" class="form-control" value="{{ old('contact_number') }}" placeholder="xxx-xxx-xxxx" name="contact_number" required>
                            </div>
                            <div class="form-group">
                                <label for="available-time">Available Times for Service</label>
                                <div class="multi-date availableTime"><br>
                                    <input 
                                        type="datetime-local" 
                                        class="form-control" 
                                        value="{{ old('available_time[]') }}" 
                                        min="2021-02-13" 
                                        name="available_time[]" 
                                        required
                                    />
                                    <i class="fas fa-plus" id="availableTimePlus"></i>
                                    <i class="fas fa-minus" id="availableTimeMinus"></i>
                                </div>
                            </div>
                            <div class="form-group submit">
                                <button type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-overlay"></div>
    </div>
    <!--Modal End-->
</div>