<div class="modal fade" id="loginModal">
    <div class="modal-dialog login animated">
        <div class="modal-content bg-danger">
        <div class="login-wrap">
            <div class="login-html scrollable-element">
                <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
                <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
                <div class="login-form">
                    <div class="sign-in-htm">
                        <form method="post" action="" name="registration" class="form-horizontal" onSubmit="return valid();">
                            <div class="group">
                                <label for="signin_email" class="label">email</label>
                                <input id="signin_email" name="email" type="text" class="input">
                            </div>
                            <div class="group">
                                <label for="signin_password" class="label">Password</label>
                                <input id="signin_password" type="password" name="password" class="input" data-type="password">
                            </div>
                            <div class="group">
                                <input id="check" type="checkbox" class="check" checked>
                                <label for="check"><span class="icon"></span> Keep me Signed in</label>
                            </div>
                            <div class="group">
                                <input type="submit" name="login" class="button" value="Sign In">
                            </div>
                            <br />
                            <a  href="#" class="labelled text-center" for="">Forgot Password?</a>
                        </form>
                    </div>
                    <div class="sign-up-htm">
                        <form method="post" action="" name="registration" class="form-horizontal" onSubmit="return valid();">
                            <div class="row">
                                <div class=col-sm-6>
                                    <div class="group">
                                        <label for="first-name" class="label">First Name *</label>
                                        <input id="first-name" name="fname" type="text" class="input" required>
                                    </div>
                                    <div class="group">
                                        <label for="last-name" class="label">Last Name *</label>
                                        <input id="last-name"  name="lname" type="text" class="input" required>
                                    </div>
                                    <div class="group">
                                        <label for="phone" class="label"> Phone number *</label>
                                        <input id="phone"  type="text" name="phone" class="input"  data-type="phone" required>
                                    </div>
                                    <div class="group">
                                        <label for="email" class="label">Email Address *</label>
                                        <input id="email" name="email" type="text" class="input" onBlur="checkAvailability()" data-type="email" required>
                                        <span id="user-availability-status" style="font-size:12px;"></span>
                                        
                                    </div>
                                </div>
                                <div class=col-sm-6>
                                    <div class="group">
                                        <label for="occupation" class="label">Ocupation *</label>
                                        <input id="occupation" name="occupation" type="text" class="input" required>
                                    </div>
                                    <div class="group">
                                        <label for="industry" class="label">Industry *</label>
                                        <select name="industry" id="industry" class="input" required> 
                                            <option value="" style="background:rgba(40, 58, 90, 0.9)">Select Industry</option>

                                            <?php 
                                            $query ="SELECT * FROM industry";
                                            $stmt2 = $conn->prepare($query);
                                            $stmt2->execute();
                                            $res=$stmt2->get_result();
                                            while($rowd=$res->fetch_object())
                                            {
                                            ?>
                                                <option value="<?php echo $rowd->industry_id;?>" style="background:rgba(40, 58, 90, 0.9)" ><?php echo $rowd->name;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="group">
                                        <label for="pass" class="label">Password *</label>
                                        <input id="password" type="password" name="password" onBlur="validatePassword()" class="input" data-type="password" required>
                                        <span id="password-status" style="font-size:12px;  color:red"></span>
                                    </div>
                                    <div class="group">
                                        <label for="pass" class="label">Repeat Password *</label>
                                        <input id="cpassword" type="password" onBlur="verifyPassword()" class="input" data-type="cpassword" required>
                                        <span id="cpassword-status" style="font-size:12px; color:red"></span>
                                    </div>
                                </div>
                                <div class="group">
                                    <input type="submit" onclick="showNotification()" name="register" class="button" value="Sign Up">
                                </div>
                            </div>                   
                        </form>
                        <br/>
                            <label class="labelled text-center" for="tab-1">Already Member? Please Sign in here.</a>
                        
                        <div class="hr"></div>                        
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<!-- Login ends -->

<!-- scropts -->
<script>
function checkAvailability() {

$("#loaderIcon").show();
jQuery.ajax({
url: "includes/processing/check_email.php",
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

function validatePassword() {  
    var pw = document.getElementById("password").value;  
  //check empty password field  
  if(pw == "") { 
     document.getElementById("password-status").innerHTML = "**Fill the password please!";  
     return false;  
  }  
   
 //minimum password length validation  
  if(pw.length < 8) {  
     document.getElementById("password-status").innerHTML = "**Password length must be atleast 8 characters";  
     return false;  
  }  
  
//maximum length of password validation  
  if(pw.length > 15) {  
     document.getElementById("password-status").innerHTML = "**Password length must not exceed 15 characters";  
     return false;  
  } else {    
     return true;
  } 
   
}  
</script> 
<script>
    function verifyPassword() {
        var pw = document.getElementById("password").value;
        var cpw = document.getElementById("cpassword").value;
        if (pw != cpw) {
            document.getElementById("cpassword-status").innerHTML = "**Password does not match";
            return false;
        } else {
            return true;
        }
    }
</script> 