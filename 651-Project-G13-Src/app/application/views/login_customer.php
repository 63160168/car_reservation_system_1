<div class="container mt-3">
  <h3><?php echo $title ;?></h3>
  <div class="float-end">
    <?php 
        echo anchor('index.php/C_create_acc/index/', 'Create account', 'class="btn btn-link"');
        ?> 
    </div>  
    <br>
  <br>
  <h2>
    <?php 
      echo anchor('index.php/C_login/index_sales','login by sales');
      echo " | ";
      echo anchor('index.php/C_login/index_manager','login by manager',);
  
    ?>
  </h2>
  <hr>
  <?php 
  echo "<h4>Login</h4>";
  echo form_open('index.php/C_login/check_customer');
  ?>
  <hr>
  <p  class="text-danger" >
    <?php 
        echo $this->session->flashdata('error');
    ?>
  </p>
  <p  class="text-warning" >
    <?php       
        echo $this->session->flashdata('warning');
    ?>
  </p>

    <div class='form-group'>
        <label for="username">Username</label>
        <input type='text' class='form-control' name='username' placeholder="Enter username">
        <br>
        <label for="password">Password</label>
        <input type='password' class='form-control' name='password' placeholder="Enter password">
        <br><br>
        <input type="submit" value="submit" class="btn btn-success">
    </div>

  <?php 
    echo form_close(); 
  ?>

  <hr>
  <?php echo anchor('index.php/C_main/index','login by Guest',);?>
</div>