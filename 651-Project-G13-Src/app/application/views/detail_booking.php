<div class="container mt-3">
  <h3 class="float-start" ><?php echo $title ;?></h3>
  <div class="d-flex justify-content-end">
    <?php 
        echo anchor('index.php/C_history/index/', 'back', 'class="btn btn-info"');
        ?> 
   </div>    
  <hr>
        <div >
            <?php foreach ( $bookings->result() as $booking ) { ?>
                <p><u><strong>รายละเอียดใบจอง</strong></u></p> <hr>
                <p>เลขใบจอง: <?php echo $booking->id_booking?> </p>
                <p>date of pick up : <?php echo $booking->datepickup_car ?> </p>
                <p>number of date: <?php echo $booking->num_date ?> </p> <hr>
                <p><u>ผู้เช่ารถ</u></p> <hr>
                <p>name : <?php echo $booking->user_name ?> </p><hr>
                <p><u>รถที่เช่า</u></p> <hr>
                <p>brand : <?php echo $booking->brand ?> </p>
                <p>model : <?php echo $booking->name_model ?> </p>
                <p>gear  : <?php echo $booking->car_gear ?> </p>
                <p>count unit : <?php echo $booking->count_unit ?> </p>
                <p>number of passengers : <?php echo $booking->number_of_passengers?> </p>
                <p>price/day : <?php echo $booking->price_per_day?> </p><hr>
                <p><u>ยอดเงินรวม</u></p> <hr>
                <p>price/day : <?php echo $booking->price_per_day*$booking->num_date?> </p>
            <?php } ?>
        </div>
    
     
    <hr>
    
  
    </div>