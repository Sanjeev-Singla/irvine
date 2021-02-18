@forelse ($maintenanceRequests as $maintenanceRequest)
    <ul>
        <li>
            <h5><b>{{ $maintenanceRequest->appartment_number }}</b></h5>
        </li>
        <li>
            <h5><b>{{ $maintenanceRequest->issue }}</b></h5>
        </li>
        <li>
            <strong>First Added</strong>
            <h5>{{ date_format(date_create($maintenanceRequest->created_at), 'd-m-Y h:i a') }}</h5>
        </li>

        <li class="maintenance-form-open">
            <button class="btn {{ $maintenanceRequest->btnColor }} rounded-pill text-white">{{ $maintenanceRequest->status }}</button>
        </li>

    </ul>
    @include('owners.units.modals.maintenance')
@empty
<ul>
    <li>No request is available</li>
</ul>
@endforelse