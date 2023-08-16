<div class="container mt-3">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var minDate= year + '-' + month + '-' + day;
    
    $('#date').attr('min', minDate);
});
</script>


<br>
  <h3><?php echo $title;?></h3>
  <?php  echo anchor('index.php/C_return_car/car_detail/'.$id_car, 'back', 'class="float-end btn btn-info"'); ?>
  <?php echo form_open('index.php/C_return_car/add_return_car'); ?>
    <br>
    <input type="hidden" value="<?php echo $id_car;?>" name="id_car">
    
    <label for="date">วันมาคืนรถ</label>
    <input type="date" class="form-control" name="date" id="date" required>
    <br>
    <label for="date">เวลามาคืนรถ</label>
    <input type="time" class="form-control" name="time" required>
    


    <br>
    
    <input type="submit" value="submit" class="btn btn-success">

  <?php echo form_close();  ?>
</div>