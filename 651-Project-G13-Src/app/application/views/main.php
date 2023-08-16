<div class="container mt-3">
  <h3><?php echo $title;?></h3>
  <h3 class="text-success" ><center><?php echo $this->session->flashdata('result'); ?></center></h3>
  <?php 
  if($this->session->userdata('user_name') != null){
    echo "Welcome : " . $this->session->userdata('user_name'); 
    echo "  |  ".anchor('index.php/C_history/index','Data history of booking');
    echo  anchor('index.php/C_logout/logout_c','Logout','class="float-end btn btn-danger"');
  }else{
    echo "Welcome" ;
    echo  anchor('index.php/C_login/index','Login','class="float-end btn btn-link"');
  }
   
  ?>

  <hr>
  <?php echo form_open('index.php/C_main/search'); ?>
  <input type="text" name="kw" placeholder="Search brand or model">
  <input type="submit" value="Search" class="btn btn-success">
  <?php echo form_close(); ?>
  <hr>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>brand</th>
        <th>model/รุ่น</th>
        <th>price/day|ราคา/วัน</th>
        <th>อื่นๆ</th>
      </tr>
    </thead>
    <tbody>
      <?php
if (isset($cars)) {
  foreach ($cars->result() as $car ) {
    echo "<tr>";
    echo "<td>" . $car->brand . "</td>";
    echo "<td>" . $car->name_model . "</td>";
    echo "<td>" . $car->price_per_day . "</td>";
    echo "<td>";
    echo anchor('index.php/C_detail/index/'.$car->id_car, 'Detail', 'class="btn btn-info"');
    echo "</td>"; 
    echo "</tr>";
  }
} else {
  echo "No result.";
}
?>
    </tbody>
  </table>


  <hr>

</div>