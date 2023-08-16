<div class="container mt-3">
  <h3><?php echo $title ;?></h3>
  
  <div class="d-flex bd-highlight mb-3">
        <div class="p-2 bd-highlight"><h3><?php echo  anchor('index.php/C_m_car/add_car','Add car','class="d-flex justify-content-start btn btn-link"');?></h3> </div>
        <div class="ms-auto p-2 bd-highlight"> <?php echo anchor('index.php/C_sales/index/', 'back', 'class="btn btn-info"');?></div>
    </div>
  <h3 class="text-success" ><center><?php echo $this->session->flashdata('result'); ?></center></h3>
  <hr>


  <h4>รถอยู่สถานะการปล่อยให้เช่า</h4>
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
        if (isset($cars_rent)) {
        foreach ($cars_rent->result() as $car_rent ) {
            echo "<tr>";
            echo "<td>" . $car_rent->count_unit . "</td>";
            echo "<td>" . $car_rent->brand . "</td>";
            echo "<td>" . $car_rent->name_model . "</td>";
            echo "<td>";
            echo anchor('index.php/C_m_car/car_detail/'.$car_rent->id_car, 'Detail', 'class="btn btn-info"');
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
  <h4>รถอยู่สถานะการไม่ให้เช่า</h4>
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
        //NFR==Not for rent
        if (isset($cars_NFR)) {
        foreach ($cars_NFR->result() as $car_NFR ) {
            echo "<tr>";
            echo "<td>" . $car_NFR->count_unit . "</td>";
            echo "<td>" . $car_NFR->brand . "</td>";
            echo "<td>" . $car_NFR->name_model . "</td>";
            echo "<td>";
            echo anchor('index.php/C_m_car/car_detail/'.$car_NFR->id_car, 'Detail', 'class="btn btn-info"');
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
  <h4>รถอยู่สถานะการซ่อมเเซม</h4>
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
        if (isset($cars_repair)) {
        foreach ($cars_repair->result() as $car_repair ) {
            echo "<tr>";
            echo "<td>" . $car_repair->count_unit . "</td>";
            echo "<td>" . $car_repair->brand . "</td>";
            echo "<td>" . $car_repair->name_model . "</td>";
            echo "<td>";
            echo anchor('index.php/C_m_car/car_detail/'.$car_repair->id_car, 'Detail', 'class="btn btn-info"');
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
  <h3 class="text-danger"><center>การเเก้ไขข้อมูลสถานะเหล่านี้อาจทำให้ระบบผิดพลาดได้</center></h3>
  <h4>รถอยู่สถานะการจอง</h4>
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
        if (isset($cars_booking)) {
        foreach ($cars_booking->result() as $car_booking ) {
            echo "<tr>";
            echo "<td>" . $car_booking->count_unit . "</td>";
            echo "<td>" . $car_booking->brand . "</td>";
            echo "<td>" . $car_booking->name_model . "</td>";
            echo "<td>";
            echo anchor('index.php/C_m_car/car_detail/'.$car_booking->id_car, 'Detail', 'class="btn btn-info"');
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
  <h4>รถอยู่สถานะการใช้งาน</h4>
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
            echo anchor('index.php/C_m_car/car_detail/'.$car_active->id_car, 'Detail', 'class="btn btn-info"');
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