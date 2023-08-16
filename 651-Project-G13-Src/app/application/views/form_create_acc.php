
<div class="container mt-3">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script>
$(function () {
    $("#user_name").keyup(function () {
        value = $(this).val();
        //console.log(value)
        if (value.length == 0) {
            document.getElementById("result_u").innerHTML = "";
            return;
        }else{
            $.ajax({
                type: "POST",
                url: "<?php echo base_url("index.php/C_create_acc/check_U");?>",
                data: {'user_name' : value },
                cache: false
            })
                .done(function( msg ) {
                    document.getElementById("result_u").innerHTML = msg;
                });
            
        }
               
    });

    $("#email").keyup(function () {
        value = $(this).val();
        //console.log(value)
        if (value.length == 0) {
            document.getElementById("result_e").innerHTML = "";
            return;
        }else{
            $.ajax({
                type: "POST",
                url: "<?php echo base_url("index.php/C_create_acc/check_E");?>",
                data: {'email' : value },
                cache: false
            })
                .done(function( msg ) {
                    document.getElementById("result_e").innerHTML = msg;
                });
            
        }
               
    });

    $("#identification_card").keyup(function () {
        value = $(this).val();
        //console.log(value)
        if (value.length == 0) {
            document.getElementById("result_i").innerHTML = "";
            return;
        }else{
            $.ajax({
                type: "POST",
                url: "<?php echo base_url("index.php/C_create_acc/check_Iden");?>",
                data: {'identification_card' : value },
                cache: false
            })
                .done(function( msg ) {
                    document.getElementById("result_i").innerHTML = msg;
                });
            
        }
               
    });
});

function checkPasswd() {
    password1 = document.getElementById("password").value;
    password2 = document.getElementById("confirm_password").value;
    console.log(password1,password2);
        if(password1 == password2){
            document.getElementById("message").innerHTML="<span style='color: green;'>Passwords match</span>";
            // console.log("Passwords match");
            
        }else{
            document.getElementById("message").innerHTML="<span style='color: red;'>Password don't match</span>";
            // console.log("Password don't match");
            
        }
}

</script>

  <h3><?php  echo $title;?></h3>
  <div class="float-end">
    <?php 
        echo anchor('index.php/C_login/index/', 'back', 'class="btn btn-info"');
        ?> 
    </div>  
    <br>
  <hr>
    <?php echo form_open('index.php/C_create_acc/add'); ?>

    <div class="form-group">

        <label for="name_of_user">Your Name</label>
        <input type="text" class="form-control" name="name_of_user" placeholder="Enter your name"
        value="<?php echo set_value('name_of_user'); ?>">
        <?php echo form_error('name_of_user'); ?>
        <br>

        <label for="user_name">User name</label>
        <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Enter your user name"
        value="<?php echo set_value('user_name'); ?>">
        <?php echo form_error('user_name'); ?>
        <div class='error' id="result_u" ></div>
        <div class="text-danger"><?php echo $this->session->flashdata('error_username'); ?></div>
        <br>

        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password"
        value="<?php echo set_value('password'); ?>">
        <?php echo form_error('password'); ?>
        <br>

        <label for="confirm_password"> Confirm password</label>
        <input type="password" class="form-control" name="confirm_password" id="confirm_password" onchange="checkPasswd()" placeholder="Enter your confirm password"
        value="<?php echo set_value('confirm_password'); ?>">
        <?php echo form_error('confirm_password'); ?>
        <div id="message"></div>
        <br>

        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email"  placeholder="Enter your email"  
        value="<?php echo set_value('email'); ?>"> 
        <?php echo form_error('email'); ?>
        <div class='error' id="result_e" ></div>
        <div class="text-danger"><?php echo $this->session->flashdata('error_email'); ?></div>
        <br>

        <label for="address">Address</label>
        <input type="address" class="form-control" name="address" placeholder="Enter your address"
        value="<?php echo set_value('address'); ?>">
        <?php echo form_error('address'); ?>
        <br>

        <label for="identification_card">Identification card</label>
        <input type="text" class="form-control" name="identification_card" id="identification_card" placeholder="Enter your identification card"
        value="<?php echo set_value('identification_card'); ?>">
        <?php echo form_error('identification_card'); ?>
        <div class='error' id="result_i" ></div>
        <div class="text-danger"><?php echo $this->session->flashdata('error_iden'); ?></div>
        <br>
        
        <input type="submit" value="Save" class="btn btn-success">
        <?php echo form_close(); ?>
    </div>



</div>