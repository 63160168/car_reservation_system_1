<div class="container mt-3">
  <h3><?php  echo $title;?></h3>
 
  <div class="float-end">
    <?php 
        echo anchor('index.php/C_m_car/index/', 'back', 'class="btn btn-info"');
        ?> 
    </div>  
    <br>
    <hr>

  <?php echo form_open('index.php/C_m_car/save'); ?>
  
  <div class="form-group">

    <label for="name_model">Name model</label>
    <input type="text" class="form-control" name="name_model" placeholder="Enter model name"
      value="<?php echo set_value('name_model'); ?>">
    <?php echo form_error('name_model'); ?>
    <br>
    <label for="brand">Brand</label>
    <input type="text" class="form-control" name="brand" placeholder="Enter brand"
      value="<?php echo set_value('brand'); ?>">
    <?php echo form_error('brand'); ?>
    <br>
    <label for="car_gear">Car gear</label>
    <input type="text" class="form-control" name="car_gear" placeholder="Enter car gear"
      value="<?php echo set_value('car_gear'); ?>">
    <?php echo form_error('car_gear'); ?>
    <br>
    <label for="count_unit">Count unit</label>
    <input type="text" class="form-control" name="count_unit" placeholder="Enter count unit"
      value="<?php echo set_value('count_unit'); ?>">
    <?php echo form_error('count_unit'); ?>
    <br>
    <label for="year_of_production">Year of production</label>
    <input type="number" class="form-control" name="year_of_production" placeholder="Enter year of production"
      value="<?php echo set_value('year_of_production'); ?>">
    <?php echo form_error('year_of_production'); ?>
    <br>
    <label for="number_of_passengers">Number of passengers</label>
    <input type="number" class="form-control" name="number_of_passengers" placeholder="Enter number of passengers"
      value="<?php echo set_value('number_of_passengers'); ?>">
    <?php echo form_error('number_of_passengers'); ?>
    <br>
    <label for="price_per_day">price per day</label>
    <input type="number" class="form-control" name="price_per_day" placeholder="Enter price per day"
      value="<?php echo set_value('price_per_day'); ?>">
    <?php echo form_error('price_per_day'); ?>
    <br>
    
    <label for="status-select">status</label>
    <select name="status" id="status-select" class="form-control">
    <?php
        if(set_value('status') == "rent"){
            echo "<option value=''>--Please choose an option--</option>";
            echo "<option value='rent' selected >rent/ให้เช่า</option>";
            echo "<option value='booking'>booking/ถูกจอง</option>";
            echo " <option value='active'>active/ใช้งานอยู่</option>";
            echo " <option value='repair'>repair/ซ่อม</option>";
            echo " <option value='not for rent'>not for rent/ไม่ให้เช่า</option>";
        }else if(set_value('status')  == "booking"){
            echo "<option value=''>--Please choose an option--</option>";
            echo "<option value='rent'>rent/ให้เช่า</option>";
            echo "<option value='booking'selected >booking/ถูกจอง</option>";
            echo " <option value='active'>active/ใช้งานอยู่</option>";
            echo " <option value='repair'>repair/ซ่อม</option>";
            echo " <option value='not for rent'>not for rent/ไม่ให้เช่า</option>";
        }else if(set_value('status')  == "actived"){
            echo "<option value=''>--Please choose an option--</option>";
            echo "<option value='rent'>rent/ให้เช่า</option>";
            echo "<option value='booking'>booking/ถูกจอง</option>";
            echo " <option value='active'selected >active/ใช้งานอยู่</option>";
            echo " <option value='repair'>repair/ซ่อม</option>";
            echo " <option value='not for rent'>not for rent/ไม่ให้เช่า</option>";
        }else if(set_value('status')  == "repair"){
            echo "<option value=''>--Please choose an option--</option>";
            echo "<option value='rent'>rent/ให้เช่า</option>";
            echo "<option value='booking'>booking/ถูกจอง</option>";
            echo " <option value='active'>active/ใช้งานอยู่</option>";
            echo " <option value='repair' selected >repair/ซ่อม</option>";
            echo " <option value='not for rent'>not for rent/ไม่ให้เช่า</option>";
        }else if(set_value('status')  == "not for rent"){
            echo "<option value=''>--Please choose an option--</option>";
            echo "<option value='rent'>rent/ให้เช่า</option>";
            echo "<option value='booking'>booking/ถูกจอง</option>";
            echo " <option value='active'>active/ใช้งานอยู่</option>";
            echo " <option value='repair'>repair/ซ่อม</option>";
            echo " <option value='not for rent'selected >not for rent/ไม่ให้เช่า</option>";
        }else{
            echo "<option value=''>--Please choose an option--</option>";
            echo "<option value='rent'>rent/ให้เช่า</option>";
            echo "<option value='booking'>booking/ถูกจอง</option>";
            echo " <option value='active'>active/ใช้งานอยู่</option>";
            echo " <option value='repair'>repair/ซ่อม</option>";
            echo " <option value='not for rent'>not for rent/ไม่ให้เช่า</option>";
        }
        ?>
    </select>
    <?php echo form_error('status'); ?>
    <br>
    <input type="submit" value="Save" class="btn btn-success">
    <?php echo form_close(); ?>
  </div>
</div>