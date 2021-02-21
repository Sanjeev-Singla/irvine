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
            $('input[name="available_time[]"]').attr('readonly',false);
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
        });

        $("#editUnit").on('click',function(e){
            e.preventDefault();
            $('input[name="bedroom"]').attr('readonly',false);
            $('input[name="bathroom"]').attr('readonly',false);
            $('input[name="square_footage"]').attr('readonly',false);
            $('input[name="rent"]').attr('readonly',false);
            $('#editUnit').attr('hidden',true);
            $('#updateUnit').attr('hidden',false);
        });

        $("#updateUnit").on('click',function(e){
            e.preventDefault();
            var token = $(document).find('meta[name=csrf-token]').attr('content');
            var bedroom         = $('input[name="bedroom"]').val();
            var bathroom        = $('input[name="bathroom"]').val();
            var square_footage  = $('input[name="square_footage"]').val();
            var rent            = $('input[name="rent"]').val();
            var unit_id         = $('input[name="unit_id"]').val();
            $.ajax({
                url:"{{ route('update-unit') }}",
                type:'post',
                data:{'_token':token,'bedroom':bedroom,'bathroom':bathroom,'square_footage':square_footage,'rent':rent,'unit_id':unit_id},
                success:function(data){
                    setTimeout(() => {
                        $('.alert').remove();
                    }, 3000);
                    $('.custom-model-wrap').prepend(data.msg);
                    $('input[name="bedroom"]').attr('readonly',true);
                    $('input[name="bathroom"]').attr('readonly',true);
                    $('input[name="square_footage"]').attr('readonly',true);
                    $('input[name="rent"]').attr('readonly',true);
                    $('#editUnit').attr('hidden',false);
                    $('#updateUnit').attr('hidden',true);
                },
                error:function(data){   
                    alert('please try later');
                }
            });
        });

        $('#newApplication').on('click',function(e){
            e.preventDefault();
            var token        = $(document).find('meta[name=csrf-token]').attr('content');
            var tenant_email = $('input[name="tenant_email"]').val();
            var units_id     = $('select[name="units_id"] option:selected').val();

            $.ajax({
                url:"{{ route('refer-tenant') }}",
                type:'post',
                data:{'_token':token,'tenant_email':tenant_email,'units_id':units_id},

                success:function(data){
                    $('#messageApplication').html(data).addClass('alert alert-primary');
                    $('input[name="tenant_email"]').val('');
                    $('select[name="units_id"] option:selected').attr('selected','');

                    setTimeout(function(){
                        $('.custom-model-main-new-application').removeClass('model-open');
                        
                    },2000);
                },
                error:function(data){   
                    $('#messageApplication').text('please try later').addClass('alert alert-danger');
                }
            });
        }); 
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

        // search maintenance        
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

        // Sorting application
        $("body").on('change','select[name="application_sorting"]',function(e){
            e.preventDefault();
            var token = $(document).find('meta[name=csrf-token]').attr('content');
            var status = $(this).val();
            $.ajax({
                url:"{{ route('sort-applications') }}",
                type:'post',
                data:{'_token':token,'status':status},
                success:function(data){
                    $('#applications').html(data);
                },
                error:function(data){   
                    alert('please try later');
                }
            });
        });

        // search application
        $("body").on('keyup','input[name="search_application"]',function(e){
            e.preventDefault();
            var token = $(document).find('meta[name=csrf-token]').attr('content');
            var search_application = $(this).val();
            $.ajax({
                url:"{{ route('search-application') }}",
                type:'post',
                data:{'_token':token,'search_application':search_application},
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

        // search units
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

        // delete units
        $("i#deleteUnit").on('click',function(e){
            e.preventDefault();
            if (!confirm('Are you sure you want to delete?')) {
                return;
            }
            var unit_id = $(this).attr('unit-id');
            var token = $(document).find('meta[name=csrf-token]').attr('content');
            var $this = $(this);
            
            $.ajax({
                url:"{{ route('delete-unit') }}",
                type:'post',
                data:{'_token':token,'unit_id':unit_id},
                success:function(data){
                    if (data.status == true) {
                        $this.closest('ul').remove();
                        $('#team .container').prepend(data.msg);
                    }else{
                        $('#team .container').prepend(data.msg);
                    }
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
        
        

        // Modals
        $(".units-modal-op").on('click', function() {
            $(this).parent().next().addClass('model-open');
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
            $('#messageApplication').text('').removeClass('alert alert-primary');
            $(".custom-model-main-new-application").addClass('model-open');
        }); 
        $(".close-btn, .bg-overlay, .closebut").click(function(){
            $(".custom-model-main-new-application").removeClass('model-open');
        });
    });

</script>