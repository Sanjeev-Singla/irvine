<script>

    $(document).ready(function(e){
        $('#tenantDetailsPlus').on('click',function(e){
            e.preventDefault();
            $('div.tenantDetails:last').clone().insertAfter('div.tenantDetails:last');
            $('div.tenantDetails input[name="first_name[]"]:last').val('');
            $('div.tenantDetails input[name="lart_name[]"]:last').val('');
            $('div.tenantDetails input[name="dob[]"]:last').val('');
            $('div.tenantDetails input[name="phone[]"]:last').val('');
            $('div.tenantDetails input[name="ssn[]"]:last').val('');
            $('div.tenantDetails input[name="valid_id[]"]:last').val('');
        });

        $('#tenantDetailsMinus').on('click',function(e){
            var numDiv = $('.tenantDetails').length;
            if (numDiv>1) {
                $('div.tenantDetails:last').remove('div.tenantDetails:last');
            }
        });
        
        $('#petDetailsPlus').on('click',function(e){
            e.preventDefault();
            $('div.petDetails:last').clone().insertAfter('div.petDetails:last');
            $('div.petDetails input[name="breed[]"]:last').val('');
            $('div.petDetails input[name="weight[]"]:last').val('');
        });

        $('#petDetailsMinus').on('click',function(e){
            e.preventDefault();
            var numDiv = $('.petDetails').length;
            if (numDiv>1) {
                $('div.petDetails:last').remove('div.petDetails:last');
            }
        });


        $('#referencePlus').on('click',function(e){
            e.preventDefault();
            $('div.referenceDetails:last').clone().insertAfter('div.referenceDetails:last');
            $('div.referenceDetails input[name="reference_name[]"]:last').val('');
            $('div.referenceDetails input[name="reference_phone[]"]:last').val('');
        });

        $('#referenceMinus').on('click',function(e){
            e.preventDefault();
            var numDiv = $('.referenceDetails').length;
            if (numDiv>1) {
                $('div.referenceDetails:last').remove('div.referenceDetails:last');
            }
        });

        $('#ememergencyDetailsPlus').on('click',function(e){
            e.preventDefault();
            $('div.ememergencyDetails:last').clone().insertAfter('div.ememergencyDetails:last');
            $('div.ememergencyDetails input[name="emergency_name[]"]:last').val('');
            $('div.ememergencyDetails input[name="emergency_phone[]"]:last').val('');
            $('div.ememergencyDetails input[name="relationship[]"]:last').val('');
        });

        $('#ememergencyDetailsMinus').on('click',function(e){
            e.preventDefault();
            var numDiv = $('.ememergencyDetails').length;
            if (numDiv>1) {
                $('div.ememergencyDetails:last').remove('div.ememergencyDetails:last');
            }
        });
    });

</script>