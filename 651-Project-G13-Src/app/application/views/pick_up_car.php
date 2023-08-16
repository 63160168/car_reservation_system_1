<div class="container mt-3">
  <h3><?php echo $title;?></h3>
  <h3 class="text-success" ><center><?php echo $this->session->flashdata('result'); ?></center></h3>

  <div class="float-end">
    <?php 
        echo anchor('index.php/C_sales/index/', 'back', 'class="btn btn-info"');
        
        ?> 
    </div>  
    <br>
    <hr>
  <?php echo form_open('index.php/C_pick_up_car/search'); ?>
    <input type="text" name="kw" placeholder="Search number of booking">
    <input type="submit" value="Search" class="btn btn-success">
  <?php echo form_close(); ?>
  <hr>

  <h4><u>รายการที่ค้นหา</u></h4>
  <hr>
  
  <table class="table table-hover">
    <thead>
      <tr>
        <th>หมายเลขใบจอง</th>
        <th>วันที่จอง</th>
        <th>สถานะ</th>
        <th>อื่นๆ</th>
      </tr>
    </thead>
    <tbody>
      <?php
        if (isset($bookings1)) {
        foreach ($bookings1->result() as $booking1 ) {
            echo "<tr>";
            echo "<td>" . $booking1->id_booking . "</td>";
            echo "<td>" . $booking1->datepickup_car . "</td>";
            echo "<td>" . $booking1->status . "</td>";
            echo "<td>";
            echo anchor('index.php/C_pick_up_car/detail_booking/'.$booking1->id_booking, 'Detail', 'class="btn btn-info"');
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
  <h4><u>กำลังมาไปรับรถ</u></h4>
  <hr>
  
  <table class="table table-hover">
    <thead>
      <tr>
        <th>หมายเลขใบจอง</th>
        <th>วันที่จอง</th>
        <th>สถานะ</th>
        <th>อื่นๆ</th>
      </tr>
    </thead>
    <tbody>
      <?php
        if (isset($bookings2)) {
        foreach ($bookings2->result() as $booking2 ) {
            echo "<tr>";
            echo "<td>" . $booking2->id_booking . "</td>";
            echo "<td>" . $booking2->datepickup_car . "</td>";
            echo "<td>" . $booking2->status . "</td>";
            echo "<td>";
            echo anchor('index.php/C_pick_up_car/detail_booking/'.$booking2->id_booking, 'Detail', 'class="btn btn-info"');
            echo "</td>"; 
            echo "</tr>";
        }
        } else {
        echo "No result.";
        }
?>
    </tbody>
  </table>
</div>