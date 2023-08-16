<div class="container mt-3">
  <h3><?php echo $title;?></h3>
  <?php 
      echo "Welcome : " . $this->session->userdata('user_name'); 
      
      echo  anchor('index.php/C_logout/logout_m','Logout','class="float-end btn btn-danger"');
  ?>
  <hr>
  <br>
  <h5>Menu</h5>

  <hr>
  <table class="table table-hover">
    <tbody>
      <tr>
        <th> <?php echo  anchor('index.php/C_daily_report/index','1. Dayily report ','class="btn btn-link"'); ?></th>
      </tr>
     
    <tbody>
</table>

  <hr>

</div>