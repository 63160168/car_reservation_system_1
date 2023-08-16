<div class="container mt-3">
  <h3><?php echo $title;?></h3>
  <?php 
      echo "Welcome : " . $this->session->userdata('user_name'); 
      
      echo  anchor('index.php/C_logout/logout_s','Logout','class="float-end btn btn-danger"');
  ?>
  <hr>
  <br>
  <h5>Menu</h5>

  <hr>
  <table class="table table-hover">
    <tbody>
      <tr>
        <th> <?php echo  anchor('index.php/C_m_car/index','1. Management car data ','class="btn btn-link"'); ?></th>
      </tr>
      <tr>
        <th> <?php echo  anchor('index.php/C_pick_up_car/index','2. Pick up the car','class="btn btn-link"'); ?></th>
      </tr>
      <tr>
        <th> <?php echo  anchor('index.php/C_return_car/index','3. Return the car','class="btn btn-link"'); ?></th>
      </tr>
    <tbody>
</table>

  <hr>

</div>