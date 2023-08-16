<div class="container mt-3">
  <h3><?php echo $title;?></h3>
  <div class="float-end">
    <?php 
        echo anchor('index.php/C_sales/index/', 'back', 'class="btn btn-info"');
        
        ?> 
    </div>  
    <br>
  <h3 class="text-success" ><center><?php echo $this->session->flashdata('result'); ?></center></h3>
  <h3 class="text-warning" ><center><?php echo $this->session->flashdata('warning'); ?></center></h3>
  <hr>

  <?php echo form_open('index.php/C_return_car/search'); ?>
  <input type="text" name="kw" placeholder="Search count unit / ทะเบียนรถ">
  <input type="submit" value="Search" class="btn btn-success">
  <?php echo form_close(); ?>
  <hr>
  <table class="table table-hover">
    <thead>
      <tr>
      <th>เลขทะเบียนรถ</th>
        <th>brand</th>
        <th>model</th>
        <th>อื่นๆ</th>
      </tr>
    </thead>
    <tbody>
      <?php
if (isset($cars)) {
  foreach ($cars->result() as $car ) {
    echo "<tr>";
    echo "<td>" . $car->count_unit . "</td>";
    echo "<td>" . $car->brand . "</td>";
    echo "<td>" . $car->name_model . "</td>";
    echo "<td>";
    echo anchor('index.php/C_return_car/car_detail/'.$car->id_car, 'Detail', 'class="btn btn-info"');
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

  <br>
  <h4>เเสดงรถที่ผู้เช่าใช้งาน ณ ขณะนี้</h4>
  <hr>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>เลขทะเบียนรถ</th>
        <th>brand</th>
        <th>model</th>
        <th>อื่นๆ</th>
      </tr>
    </thead>
    <tbody>
      <?php
        if (isset($cars_active)) {
        foreach ($cars_active->result() as $car_active ) {
            echo "<tr>";
            echo "<td>" . $car_active->count_unit . "</td>";
            echo "<td>" . $car_active->brand . "</td>";
            echo "<td>" . $car_active->name_model . "</td>";
            echo "<td>";
            echo anchor('index.php/C_return_car/car_detail/'.$car_active->id_car, 'Detail', 'class="btn btn-info"');
            echo "</td>"; 
            echo "</tr>";
        }
        } else {
        echo "No result.";
        }
       ?>
    </tbody>
  </table>


  <br>

</div>