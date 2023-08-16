<div class="container mt-3">
  <h3><?php echo $title;?></h3>
<h3 class="text-success" ><center><?php echo $this->session->flashdata('result'); ?></center></h3>

  <div class="float-end">
    <?php 
        echo anchor('index.php/C_manager/index/', 'back', 'class="btn btn-info"');
        
        ?> 
    </div>  
    <br>
    <hr>
  <?php echo form_open('index.php/C_daily_report/search'); ?>
    <input type="text" name="kw" placeholder="Search day or month">
    <input type="submit" value="Search" class="btn btn-success">
  <?php echo form_close(); ?>
  <br>
  <hr>
  <h3><center>รายการที่ค้นหา</center></h3>

  <hr>
  <h4><u>รายการจอง</u></h4>
  <hr>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>วันที่จอง</th>
        <th>หมายเลขใบจอง</th>
        <th>หมายเลขรถที่จอง</th>
        <th>จำนวนวันที่จอง</th>
        <th>สถานะ</th>
        <th>อื่นๆ</th>
      </tr>
    </thead>
    <tbody>
        <?php
            if (isset($bookings)) {
                foreach ($bookings->result() as $booking ) {
                    echo "<tr>";
                    echo "<td>" . $booking->datepickup_car . "</td>";
                    echo "<td>" . $booking->id_booking . "</td>";
                    echo "<td>" . $booking->id_car . "</td>";
                    echo "<td>" . $booking->num_date . "</td>";
                    echo "<td>" . $booking->status . "</td>";
                    echo "<td>";
                    //echo anchor('index.php/C_pick_up_car/detail_booking/'.$booking1->id_booking, 'Detail', 'class="btn btn-info"');
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

  <hr>
  <h4><u>รายการมารับรถ</u></h4>
  <hr>
  
  <table class="table table-hover">
    <thead>
      <tr>
        <th>วันที่มารับรถ</th>
        <th>หมายเลขใบรับรถ</th>
        <th>หมายเลขใบจอง</th>
        <th>เวลามารับรถ</th>
        <th>อื่นๆ</th>
      </tr>
    </thead>
    <tbody>
        <?php
            if (isset($pickups)) {
                foreach ($pickups->result() as $pickup ) {
                    echo "<tr>";
                    echo "<td>" . $pickup->date_pick_up_car . "</td>";
                    echo "<td>" . $pickup->id_pick_up_car  . "</td>";
                    echo "<td>" . $pickup->id_booking . "</td>";
                    echo "<td>" . $pickup->time_pick_up_car . "</td>";
                    echo "<td>";
                    //echo anchor('index.php/C_pick_up_car/detail_booking/'.$booking2->id_booking, 'Detail', 'class="btn btn-info"');
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

  <hr>
  <h4><u>รายการมาคืนรถ</u></h4>
  <hr>

  <table class="table table-hover">
    <thead>
      <tr>
        <th>วันที่มาคืนรถ</th>
        <th>หมายเลขใบคืนรถ</th>
        <th>หมายเลขรถ</th>
        <th>เวลามารับรถ</th>
        <th>อื่นๆ</th>
      </tr>
    </thead>
    <tbody>
        <?php
            if (isset($returns)) {
                foreach ($returns->result() as $return ) {
                    echo "<tr>";
                    echo "<td>" . $return->date_return_car . "</td>";
                    echo "<td>" . $return->id_return_car  . "</td>";
                    echo "<td>" . $return->id_car . "</td>";
                    echo "<td>" . $return->time_return_car . "</td>";
                    echo "<td>";
                    //echo anchor('index.php/C_pick_up_car/detail_booking/'.$booking1->id_booking, 'Detail', 'class="btn btn-info"');
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

  <hr>
  <h3><center>รายการที่เกิดขึ้น</center></h3>
  <hr>
  <h4><u>รายการจอง</u></h4>
  <hr>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>วันที่จอง</th>
        <th>หมายเลขใบจอง</th>
        <th>หมายเลขรถที่จอง</th>
        <th>จำนวนวันที่จอง</th>
        <th>สถานะ</th>
        <th>อื่นๆ</th>
      </tr>
    </thead>
    <tbody>
        <?php
            if (isset($allbookings)) {
                foreach ($allbookings->result() as $allbooking ) {
                    echo "<tr>";
                    echo "<td>" . $allbooking->datepickup_car . "</td>";
                    echo "<td>" . $allbooking->id_booking . "</td>";
                    echo "<td>" . $allbooking->id_car . "</td>";
                    echo "<td>" . $allbooking->num_date . "</td>";
                    echo "<td>" . $allbooking->status . "</td>";
                    echo "<td>";
                    //echo anchor('index.php/C_pick_up_car/detail_booking/'.$booking1->id_booking, 'Detail', 'class="btn btn-info"');
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

  <hr>
  <h4><u>รายการมารับรถ</u></h4>
  <hr>
  
  <table class="table table-hover">
    <thead>
      <tr>
        <th>วันที่มารับรถ</th>
        <th>หมายเลขใบรับรถ</th>
        <th>หมายเลขใบจอง</th>
        <th>เวลามารับรถ</th>
        <th>อื่นๆ</th>
      </tr>
    </thead>
    <tbody>
        <?php
            if (isset($allpickups)) {
                foreach ($allpickups->result() as $allpickup ) {
                    echo "<tr>";
                    echo "<td>" . $allpickup->date_pick_up_car . "</td>";
                    echo "<td>" . $allpickup->id_pick_up_car  . "</td>";
                    echo "<td>" . $allpickup->id_booking . "</td>";
                    echo "<td>" . $allpickup->time_pick_up_car . "</td>";
                    echo "<td>";
                    //echo anchor('index.php/C_pick_up_car/detail_booking/'.$booking2->id_booking, 'Detail', 'class="btn btn-info"');
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

  <hr>
  <h4><u>รายการมาคืนรถ</u></h4>
  <hr>

  <table class="table table-hover">
    <thead>
      <tr>
        <th>วันที่มาคืนรถ</th>
        <th>หมายเลขใบคืนรถ</th>
        <th>หมายเลขรถ</th>
        <th>เวลามารับรถ</th>
        <th>อื่นๆ</th>
      </tr>
    </thead>
    <tbody>
        <?php
            if (isset($allreturns)) {
                foreach ($allreturns->result() as $allreturn ) {
                    echo "<tr>";
                    echo "<td>" . $allreturn->date_return_car . "</td>";
                    echo "<td>" . $allreturn->id_return_car  . "</td>";
                    echo "<td>" . $allreturn->id_car . "</td>";
                    echo "<td>" . $allreturn->time_return_car . "</td>";
                    echo "<td>";
                    //echo anchor('index.php/C_pick_up_car/detail_booking/'.$booking1->id_booking, 'Detail', 'class="btn btn-info"');
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