{{-- <!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Application</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="{{ route('refer-tenant') }}" method="POST">
                <!-- Modal body -->
                @csrf
                <div class="modal-body">
                    <input type="email" class="form-data" name="tenant_email" required>
                    <select name="units_id" class="form-data" required>
                        <option value="">Select Unit Number</option>
                        @forelse ($units as $unit)
                            @if ($unit->status == \Config::get('constant.units.status.active'))
                                <option value="{{ $unit->id }}">{{ $unit->unit_number }}</option>
                            @endif
                        @empty
                            <option value="">No unit available</option>
                        @endforelse
                        
                    </select>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div> --}}

<style>
    .custom-model-main-new-application .application-email-box .form-group input{
        border-radius: 20px 20px 20px 20px;
        min-width: 320px;
    }
</style>

<div class="custom-model-main-new-application">
    <div class="custom-model-inner">
        <div class="close-btn">
            <i class="fas fa-times"></i>
        </div>
        <div class="custom-model-wrap">
            <div class="pop-up-content-wrap">
                <div class="form-wrap">
                    <form>
                        @csrf
                        <div class="application-heading">
                            <h2>New Application</h2>
                            <p>
                                Set up a new application by manually adding it
                                below or sending the link to a potential client.
                            </p>
                        </div>
                        <p id="messageApplication"></p>
                        <div class="application-email-box">
                            <div class="form-group">
                                <label for="tenant_email">Tenant Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    placeholder=""
                                    name="tenant_email"
                                    required="true"
                                >
                            </div>
                        </div>
                        <div class="application-select-box">
                            <div class="form-group">
                                <label for="units_id">Units_Id</label>
                                <select class="form-control" id="FormControlSelect" name="units_id" required="true">
                                    <option value="">Select Unit Number</option>
                                    @forelse ($units as $unit)
                                        @if ($unit->status == \Config::get('constant.units.status.active'))
                                            <option value="{{ $unit->id }}">{{ $unit->unit_number }}</option>
                                        @endif
                                    @empty
                                        <option value="">No unit available</option>
                                    @endforelse
                                </select>
                            </div>
                            <button type="submit" id="newApplication" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-overlay"></div>
</div>
