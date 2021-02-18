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
                        <ul class="units-modal-op">
                            <li><img src="{{ $item->upload_image }}"></li>
                            <li>
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
                        <li><img src="{{ $user->profile_image }}"></li>
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

            <div id="japan" class="tabcontent">
                <h2>Application</h2>
                <div class="section-left">
                    <input type="text" id="username" name="username"><i class="fa fa-search" aria-hidden="true"></i>
                </div>
                <div class="section-right">
                    <div class="icon-box">
                        <span><a href="#"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></span>
                        <a href="#"><i data-toggle="modal" data-target="#myModal" class="fa fa-plus-circle"
                                aria-hidden="true"></i></a>
                    </div>
                    <select name="application_sorting" class="input-select" autocomplete="off">
                        <option selected="true">All</option>
                        <option value="">Pending</option>
                        <option value="">Received</option>
                        <option value="">Resolved</option>
                        <option value="">Cancelled</option>
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
                                if ($application->status == \Config::get('constant.application.pending')) {
                                    $application->status = '<a href="#" data-toggle="modal" data-target="#exampleModal">Pending</a>';
                                } elseif ($application->status == \Config::get('constant.application.confirm')) {
                                    $application->status = 'Confirm';
                                } else {
                                    $application->status = 'Declined';
                                }
                            @endphp
                            <p>{!! $application->status !!}</p>
                        </li>
                        <li class='text-success'><i class="fa fa-comment fa-2x"></i></li>

                        @include('owners.units.modals.responseApplication')
                    </ul>
                @empty
                    <ul>
                        <li>No Application available</li>
                    </ul>
                @endforelse

                <p class="see-text"><a href="#">See All</a></p>
            </div>
        </div>


    </section>

    @include('owners.units.modals.application')
    
@endsection

@push('scripts')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

    </script>
    <script>
        $(document).on('click', ".maintenance-form-open", function() {
            $(".custom-model-main-maintenace").addClass('model-open');
            //alert("class added");        
        });
        $(document).on('click', ".close-btn, .bg-overlay", function() {
            $(".custom-model-main-maintenace").removeClass('model-open');
            //alert("class removed");        
        });
        $(document).ready(function(){
            $('#editRequest').on('click',function(e){
                e.preventDefault();
                $('input[name="contact_number"]').attr('readonly',false);
                $('input[name="cause"]').attr('readonly',false);
                $('input[name="issue_start_date"]').attr('readonly',false);
                $('input[name="appartment_number"]').attr('readonly',false);
                $('select[name="priority_level"]').attr('readonly',false);
                $('input[name="issue"]').attr('readonly',false);
                $('input[name="available_time"]').attr('readonly',false);
            });

            $("#editTenant").on('click',function(e){
                e.preventDefault();
                $('input[name="status"]').attr('readonly',false);
                $('input[name="status"]').attr('readonly',false);
                $('input[name="status"]').attr('readonly',false);
                $('input[name="status"]').attr('readonly',false);
                $('input[name="status"]').attr('readonly',false);
                $('input[name="status"]').attr('readonly',false);
                $('input[name="status"]').attr('readonly',false);
            })
        });
    </script>
    <script>
        $(document).ready(function() {
            $("body").on('change','select[name="sortStatus"]',function(e){
                e.preventDefault();
                var token = $(document).find('meta[name=csrf-token]').attr('content');
                var status = $(this).val();
                $.ajax({
                    url:"{{ route('sort-maintenance-request') }}",
                    type:'post',
                    data:{'_token':token,'status':status},
                    success:function(data){
                        $('#maintenanceRequest').html(data);
                    },
                    error:function(data){   
                        alert('please try later');
                    }
                });
            });

            $("body").on('keyup','input[name="maintenance"]',function(e){
                e.preventDefault();
                var token = $(document).find('meta[name=csrf-token]').attr('content');
                var search_maintenance = $(this).val();
                $.ajax({
                    url:"{{ route('search-maintenance-request') }}",
                    type:'post',
                    data:{'_token':token,'search_maintenance':search_maintenance},
                    success:function(data){
                        $('#maintenanceRequest').html(data);
                    },
                    error:function(data){   
                        alert('please try later');
                    }
                });
            });

            //Load more
            var page=1;
            $('.see-all').on('click', function(){
               
                $.ajax({
    				url  : "{{ route('all-units') }}?page="+page, 
    				type : "GET",
    			
    				success : function( response ) {
    					$('#unitSorting').append(response);
    					pendingCount = $('#unitSorting ul').last().attr('data-count');
    					if(parseInt(pendingCount) <= 0){
    					
    					    $('.see-text').hide();
    					}
    					page++;
    				}
    			
    		     });
            });
            
            $('#pagination a').on('click', function(e){
                e.preventDefault();
                var url = $(this).attr('href');
                $.get(url, function(data){
                    $('#unitSorting').render(data);
                });
            });

            $("body").on('change','select[name="unit_sorting"]',function(e){
                e.preventDefault();
                var token = $(document).find('meta[name=csrf-token]').attr('content');
                var unit_sorting = $(this).val();
                $.ajax({
                    url:"{{ route('sort-units') }}",
                    type:'post',
                    data:{'_token':token,'unit_sorting':unit_sorting},
                    success:function(data){
                        $('#unitSorting').html(data);
                    },
                    error:function(data){   
                        alert('please try later');
                    }
                });
            });

            $("body").on('keyup','input[name="search_unit"]',function(e){
                e.preventDefault();
                var token = $(document).find('meta[name=csrf-token]').attr('content');
                var search_unit = $(this).val();
                $.ajax({
                    url:"{{ route('search-units') }}",
                    type:'post',
                    data:{'_token':token,'search_unit':search_unit},
                    success:function(data){
                        $('#unitSorting').html(data);
                    },
                    error:function(data){   
                        alert('please try later');
                    }
                });
            });

            $("#availableTimePlus").on("click",function(e){
                e.preventDefault();
                var numDiv = $('.availableTime').length;
                if (numDiv>=3) {
                    return;
                }
                $('div.availableTime:last').clone().insertAfter('div.availableTime:last');
                $('div.availableTime input[name="available_time[]"]:last').val('');
            });

            $('#availableTimeMinus').on('click',function(e){
                var numDiv = $('.availableTime').length;
                if (numDiv>1) {
                    $('div.availableTime:last').remove('div.availableTime:last');
                }
            });
            
            $(".units-modal-op").on('click', function() {
                $(".custom-model-main-units").addClass('model-open');
            }); 
            $(".close-btn, .bg-overlay, .closebut").click(function(){
                $(".custom-model-main-units").removeClass('model-open');
            });
            $(".tenants-modal-op").on('click', function() {
                $(".custom-model-main-tenants").addClass('model-open');
            }); 
            $(".close-btn, .bg-overlay, .closebut").click(function(){
                $(".custom-model-main-tenants").removeClass('model-open');
            });
            $(".new-application-modal-op").on('click', function() {
                $(".custom-model-main-new-application").addClass('model-open');
            }); 
            $(".close-btn, .bg-overlay, .closebut").click(function(){
                $(".custom-model-main-new-application").removeClass('model-open');
            });
        });

    </script>
@endpush
