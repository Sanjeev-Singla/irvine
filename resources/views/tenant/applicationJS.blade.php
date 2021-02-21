<script>
    function validateSSNs(){
        let ssn = $('#validateSSN').val();
        let regexp = /^([1-9])(?!\1{2}-\1{2}-\1{4})[1-9]{2}-[1-9]{2}-[1-9]{4}/;
        if (!regexp.test(ssn)) {
            alert('please enter valid ssn number');
        }
    }
    
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

        $('#phone-number-field,#phone-number-field1,#phone-number-field2,#phone-number-field3,#phone-number-field4,#phone-number-field5,#phone-number-field6').keydown(function (e) {
             var key = e.charCode || e.keyCode || 0;
             $text = $(this); 
             if (key !== 8 && key !== 9) {
                 if ($text.val().length === 3) {
                     $text.val($text.val() + '-');
                 }
                 if ($text.val().length === 7) {
                     $text.val($text.val() + '-');
                 }

             }

             return (key == 8 || key == 9 || key == 46 || (key >= 48 && key <= 57) || (key >= 96 && key <= 105));
         })

        $('#tenantDetailsMinus').on('click',function(e){
            var numDiv = $('.tenantDetails').length;
            if (numDiv>1) {
                $('div.tenantDetails:last').remove('div.tenantDetails:last');
            }
        });
        function validateSSNs(){
            alert('jkdafb');
        //$("#validateSSN").on('blur',function(){
            let ssn = $('#validateSSN').val();
            let regexp = /^([1-9])(?!\1{2}-\1{2}-\1{4})[1-9]{2}-[1-9]{2}-[1-9]{4}/;
            if (!regexp.test(ssn)) {
                alert('please enter valid ssn number');
            }
        }
        //});
        
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