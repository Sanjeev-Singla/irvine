@forelse ($applications as $application)
    <ul>
        <li><img src="assets/img/about.jpg"></li>
        <li>
            <h5><b>{{ $application->applicationTenants->first_name.' '.$application->applicationTenants->last_name }}</b></h5>
        </li>
        <li>
            <h5><b>Applied</b></h5>
            <p>{{ date_format($application->created_at, 'd/m/Y h:i a') }}</p>
        </li>
        <li>
            <h5><b>Status</b></h5>
            @php
                if ($application->application_status == \Config::get('constant.application.pending')) {
                    $application->application_status = '<a href="#" data-toggle="modal" data-target="#exampleModal'. $application->id .'">Pending</a>';
                } elseif ($application->application_status == \Config::get('constant.application.confirm')) {
                    $application->application_status = 'Confirm';
                } else {
                    $application->application_status = 'Declined';
                }
            @endphp
            <p>{!! $application->application_status !!}</p>
        </li>
        <li class='text-success'><i class="fa fa-comment fa-2x"></i></li>

        @include('owners.units.modals.responseApplication')
    </ul>
@empty
    <ul>
        <li>No Application available</li>
    </ul>
@endforelse