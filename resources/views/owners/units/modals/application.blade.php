<!-- The Modal -->
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
</div>
