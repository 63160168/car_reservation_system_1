<div class="container mt-3">
  <h3><?php echo $title;?></h3>
  

  <hr>
  <h4><u>กำลังรอไปรับรถ</u></h4>
  <hr>
  
  <table class="table table-hover">
    <thead>
      <tr>
        <th>หมายเลขใบจอง</th>
        <th>วันที่จอง</th>
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
            echo "<td>";
            echo anchor('index.php/C_detail_his/index/'.$booking1->id_booking, 'Detail', 'class="btn btn-info"');
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
  <h4><u>การจองในอดีต</u></h4>
  <hr>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>หมายเลขใบจอง</th>
        <th>วันที่จอง</th>
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
            echo "<td>";
            echo anchor('index.php/C_detail_his/index/'.$booking2->id_booking, 'Detail', 'class="btn btn-info"');
            echo "</td>"; 
            echo "</tr>";
        }
        } else {
        echo "No result.";
        }
    ?>
    </tbody>
    </table>
    
      <?php 
        echo anchor('index.php/C_main/index/', 'back', 'class="btn btn-dark"');
        ?> 
</div>