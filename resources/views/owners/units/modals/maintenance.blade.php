<!---Maintenance-form-Modal Start-->
<div class="custom-model-main-maintenace">
    <div class="custom-model-inner">
        <div class="close-btn">
            <i class="fas fa-times"></i>
        </div>
        <div class="custom-model-wrap">
            <div class="pop-up-content-wrap">
                <div class="form-wrap">
                    <div class="form-heading">
                        <h4> Maintenance Request</h4>
                        <p>Date Submitted : {{ date_format(date_create($maintenanceRequest->created_at), 'd-m-Y h:i a') }}</p>
                    </div>
                    <form method="POST" action="{{ route('update-maintenance') }}">
                        @csrf
                        <input type="hidden" value="{{ $maintenanceRequest->id }}" name="id">
                        <div class="status-dropdown">
                            <label for="priority">Status :</label>
                            <select name="status">
                                <option value="0" {{ ($maintenanceRequest->status=='Pending')?'selected':'' }}>Pending</option>
                                <option value="1" {{ ($maintenanceRequest->status=='Received')?'selected':'' }}>Received</option>
                                <option value="2" {{ ($maintenanceRequest->status=='Resolved')?'selected':'' }}>Resolved</option>
                                <option value="3" {{ ($maintenanceRequest->status=='Cancelled')?'selected':'' }}>Cancel</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="issue">Issue</label>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="50 characters"
                                name="issue"
                                value="{{ $maintenanceRequest->issue }}"
                                readonly
                            >
                        </div>
                        <div class="form-group">
                            <label for="priority">Priority Level</label>
                            <select class="form-control" name="priority_level" id="exampleFormControlSelect1" readonly>
                                <option value="0" {{ ($maintenanceRequest->priority_level==0)?'selected':'' }}>Low Priority</option>
                                <option value="1" {{ ($maintenanceRequest->priority_level==1)?'selected':'' }}>At Earliest Convenience</option>
                                <option value="2" {{ ($maintenanceRequest->priority_level==2)?'selected':'' }}>Urgent</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="apartment">Apartment Number</label>
                            <input
                                type="number"
                                class="form-control"
                                placeholder="Only excepts number"
                                name="appartment_number"
                                value="{{ $maintenanceRequest->appartment_number }}"
                                readonly
                            >
                        </div>
                        <div class="form-group">
                            <label for="issue-start-date">Issue Started On :</label>
                            <input
                                type="date"
                                class="form-control"
                                placeholder=""
                                min="2015-01-01"
                                name="issue_start_date"
                                value="{{ $maintenanceRequest->issue_start_date }}"
                                readonly
                            >
                        </div>
                        <div class="form-group">
                            <label for="cause">Cause</label>
                            <input
                                type="text"
                                class="form-control"
                                placeholder=""
                                name="cause"
                                value="{{ $maintenanceRequest->cause }}"
                                readonly
                            >
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact Number</label>
                            <input
                                type="number"
                                class="form-control"
                                placeholder=""
                                name="contact_number"
                                value="{{ $maintenanceRequest->contact_number }}"
                                readonly
                            >
                        </div>
                        <div class="form-group">
                            <label for="available-time">Available Times for Service</label>
                            @php
                                $available_time = explode(',',$maintenanceRequest->available_time);
                            @endphp
                            @forelse ($available_time as $item)
                                <div class="multi-date availableTime">
                                    <input
                                        type="datetime-local"
                                        class="form-control"
                                        placeholder="xxx-xxx-xxxx"
                                        min="2021-02-13"
                                        name="available_time[]"
                                        value="{{ $item }}"
                                        readonly
                                        required
                                    >
                                    <i class="fas fa-plus" id="availableTimePlus"></i>
                                    <i class="fas fa-minus" id="availableTimeMinus"></i>
                                </div>
                            @empty
                                <div class="multi-date availableTime">
                                    <input
                                        type="datetime-local"
                                        class="form-control"
                                        placeholder="xxx-xxx-xxxx"
                                        min="2021-02-13"
                                        name="available_time[]"
                                        readonly
                                        required
                                    >
                                    <i class="fas fa-plus" id="availableTimePlus"></i>
                                    <i class="fas fa-minus" id="availableTimeMinus"></i>
                                </div>
                            @endforelse
                        </div>
                        <div class="form-group submit">
                            <button id="updateRequest" class="update-button">Update</button>
                            <button id="editRequest" class="edit-button">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-overlay"></div>
</div>
<!--Maintenace-form-Modal End-->