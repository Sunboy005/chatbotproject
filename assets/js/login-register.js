$(document).ready(function(){
    function valid()
    {
        if(document.registration.password.value!= document.registration.cpassword.value)
        {
            alert("Password and Re-Type Password Field do not match  !!");
            document.registration.cpassword.focus();
        return false;
        }
        return true;
    }

	
    $('input[type="checkbox"]').click(function(){
        if($(this).prop("checked") == true){
            $('#guradd').val( $('#hadd').val() );
            $('#gurstate').val( $('#state').val() );
        } 
        
    });

    function checkAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_email.php",
            data:'email='+$("#email").val(),
            type: "POST",
            success:function(data){
                $("#user-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error:function ()
            {
                event.preventDefault();
                alert('error');
            }
        });
    }
});

