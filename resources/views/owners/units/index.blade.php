@extends('layouts.auth')

@section('content')
    @push('css')
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link href="{{ asset('public/assets/css/after_owner_login.css') }}" rel="stylesheet">
    @endpush

    @include('flash-message')
    <section id="team" class="team">
        <div class="container">

            <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'London')">Units</button>
                <button class="tablinks" onclick="openCity(event, 'Paris')">Tenants</button>
                <button class="tablinks" onclick="openCity(event, 'Tokyo')">M Reqs</button>
                <button class="tablinks" onclick="openCity(event, 'japan')">Apps</button>
            </div>

            {{-- Units --}}
            <div id="London" class="tabcontent" style="display:block;">
                <h2>Units</h2>
                <div class="section-left">
                    <input type="text" id="username" name="search_unit"><i class="fa fa-search" aria-hidden="true"></i>
                </div>
                <div class="section-right">
                    <div class="icon-box">
                        <span><a href="#"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></span>
                        <a href="{{ route('add-unit') }}"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                    </div>
                    <select name="unit_sorting" class="input-select" autocomplete="off">
                        <option value="">Sort</option>
                        <option value="old">older to newest</option>
                        <option value="new">newest to older</option>
                        <option value="a_z">A-Z</option>
                        <option value="z_a">Z-A</option>
                    </select>
                    <select name="" class="input-select" autocomplete="off">
                        <option value="1" selected="true">All Properties</option>
                        <option value="2">Business Opportunity</option>
                        <option value="3">Commercial Lease</option>
                        <option value="4">Commercial Sale</option>
                        <option value="5">Land</option>
                        <option value="6">Residential Income</option>
                        <option value="7">Residential Lease</option>
                    </select>
                </div>
                <div id="unitSorting">
                    @forelse ($units as $item)
                        <ul>
                            <li><img src="{{ $item->upload_image }}"></li>
                            <li class="units-modal-op">
                                <h5>{{ $item->address }}</h5>
                                <a href="#">list units</a>
                            </li>
                            <li><strong>B & B</strong>
                                <p>{{ $item->bedroom . ' & ' . $item->bathroom }}</p>
                            </li>
                            <li><strong>SqFt</strong>
                                <p>{{ $item->square_footage }}</p>
                            </li>
                            <li><strong>Rent</strong>
                                <p>{{ '$ ' . $item->rent }}</p>
                            </li>
                            <li><strong>Lease End</strong>
                                <p>London is the capital</p>
                            </li>
                            <li><strong>Payment Status</strong>
                                <p>London is the capital</p>
                            </li>
                            <li>
                                <center>
                                    <strong>Delete</strong>
                                    <p><a href="#" class="text-danger"><i unit-id='{{ $item->id }}' id="deleteUnit" class="fa fa-trash fa-2x"></i></a></p>
                                </center>
                            </li>
                        </ul>

                        @include('owners.units.modals.unit')
                    @empty
                        <ul>
                            <li>no unit is available</li>
                        </ul>
                    @endforelse
                </div>
                <p class="see-text"><a href="javascript:;" class="see-all">Load More</a></p>
            </div>
            {{-- End Units --}}

            {{-- Tenant --}}
            <div id="Paris" class="tabcontent">
                <h2>Tenants</h2>
                <div class="section-left">
                    <input type="text" id="username" name="username"><i class="fa fa-search" aria-hidden="true"></i>
                </div>
                <div class="section-right">
                    <div class="icon-box"><span><a href="#"><i class="fa fa-minus-circle"
                                    aria-hidden="true"></i></a></span><a href="#"><i class="fa fa-plus-circle"
                                aria-hidden="true"></i></a></div>
                    <select name="" class="input-select" autocomplete="off">
                        <option value="1" selected="true">Sort</option>
                        <option value="2">Business Opportunity</option>
                        <option value="3">Commercial Lease</option>
                        <option value="4">Commercial Sale</option>
                        <option value="5">Land</option>
                        <option value="6">Residential Income</option>
                        <option value="7">Residential Lease</option>
                    </select>
                    <select name="" class="input-select" autocomplete="off">
                        <option value="1" selected="true">All Properties</option>
                        <option value="2">Business Opportunity</option>
                        <option value="3">Commercial Lease</option>
                        <option value="4">Commercial Sale</option>
                        <option value="5">Land</option>
                        <option value="6">Residential Income</option>
                        <option value="7">Residential Lease</option>
                    </select>
                </div>
                @forelse ($users as $user)
                    <ul class="tenants-modal-op">
                        <li><img src="{{ asset('public/uploads/images/default/default_image.png') }}"></li>
                        <li>
                            <h5><b>{{ $user->first_name . ' ' . $user->last_name }}</b></h5>
                            <a href="#">list units</a>
                        </li>
                        <li><strong>Payment Status</strong>
                            <p>London is the capital</p>
                        </li>
                        <li><strong>First Added</strong>
                            <p>{{ date_format(date_create($user->created_at), 'd-m-Y h:i a') }}</p>
                        </li>
                        <li class="msg-icon"><img src="msg-icon.png"></li>
                    </ul>
                    @include('owners.units.modals.tenant')
                @empty
                    <ul>
                        <li>No tenant is available</li>
                    </ul>
                @endforelse

                <p class="see-text"><a href="#">See All</a></p>
            </div>
            {{-- End Tenant --}}

            {{-- M Req --}}
            <div id="Tokyo" class="tabcontent">
                <h2>Maintenance Requests</h2>
                <div class="section-left">
                    <input type="text" id="username" name="maintenance"><i class="fa fa-search" aria-hidden="true"></i>
                </div>
                <div class="section-right">
                    <div class="icon-box">
                        <span>
                            <a href="#">
                                <i class="fa fa-minus-circle" aria-hidden="true"></i>
                            </a>
                        </span>
                        <a href="#">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <select name="sortStatus" class="input-select" autocomplete="off">
                        <option value="">All Requests</option>
                        <option value="0">Pending</option>
                        <option value="1">Received</option>
                        <option value="2">Resolved</option>
                        <option value="3">Cancelled</option>
                    </select>
                    {{-- <select name="" class="input-select" autocomplete="off">
                        <option value="1" selected="true">All Properties</option>
                        <option value="2">Business Opportunity</option>
                        <option value="3">Commercial Lease</option>
                        <option value="4">Commercial Sale</option>
                        <option value="5">Land</option>
                        <option value="6">Residential Income</option>
                        <option value="7">Residential Lease</option>
                    </select> --}}
                </div>
                <div id="maintenanceRequest">
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
                        <ul>
                    @endforelse
                </div>
                <p class="see-text"><a href="#">See All</a></p>
            </div>
            {{-- End M Req --}}

            {{-- Applications --}}
            <div id="japan" class="tabcontent">
                <h2>Application</h2>
                <div class="section-left">
                    <input type="text" id="username" name="search_application"><i class="fa fa-search" aria-hidden="true"></i>
                </div>
                <div class="section-right">
                    <div class="icon-box">
                        <span><a href="#"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></span>
                        <a href="#">
                            <i  class="fa fa-plus-circle  new-application-modal-op"
                                aria-hidden="true"></i></a>
                    </div>
                    <select name="application_sorting" class="input-select" autocomplete="off">
                        <option value="" selected>All</option>
                        <option value="0">Pending</option>
                        <option value="1">Confirmed</option>
                        <option value="2">Declined</option>
                        <option value="3">A - Z</option>
                        <option value="4">Z - A</option>
                    </select>
                    {{-- <select name="" class="input-select" autocomplete="off">
                        <option value="1" selected="true">All Properties</option>
                        <option value="2">Business Opportunity</option>
                        <option value="3">Commercial Lease</option>
                        <option value="4">Commercial Sale</option>
                        <option value="5">Land</option>
                        <option value="6">Residential Income</option>
                        <option value="7">Residential Lease</option>
                    </select> --}}
                </div>
                <div id="applications">
                    @forelse ($applications as $application)
                        <ul>
                            
                            <li><img src="{{ asset('public/uploads/images/default/default_image.png') }}"></li>
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
                                        $application->application_status = '<a href="#" data-toggle="modal" data-target="#exampleModal'.$application->id.'">Pending</a>';
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
                </div>
                <p class="see-text"><a href="#">See All</a></p>
            </div>
            {{-- End Application --}}

        </div>


    </section>

    @include('owners.units.modals.application')
    
@endsection

@push('scripts')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @include('owners.units.indexJS')
@endpush
