<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $application->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background: #d5d5d5;">
            <div class="modal-body">
                <img height="100px" width="100px" src="{{ asset('public/uploads/images/default/default_image.png') }}" alt="applicant-image">
                <b>{{ $application->applicationTenants->first_name.' '.$application->applicationTenants->last_name }}</b>
            </div>
            <div class="modal-footer" style="margin-right: 70px;border: none!important;">
                <button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">Close</button>
                <a href='{{ route("edit-application",$application->id) }}' type="button" class="btn btn-warning rounded-pill">Edit</a>
                <a href='{{ route("tenant-application-confirm",$application->id) }}' class="btn btn-success rounded-pill">Accept</a>
                <a href='{{ route("tenant-application-decline",$application->id) }}' class="btn btn-danger rounded-pill">Decline</a>
            </div>
        </div>
    </div>
</div>