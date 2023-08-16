<div class="container mt-3">
<u><h3><?php echo $title;?></h3></u><br>

<?php echo form_open('index.php/C_booking/booking'); ?>

<?php foreach ( $cars->result() as $car ) { ?>
    <input type="hidden" value="<?php echo $this->session->flashdata('date'); ?>" name="date">
    <input type="hidden" value="<?php echo $this->session->flashdata('numdate'); ?>" name="numdate">
    <input type="hidden" value="<?php echo $car->id_car?>" name="id_car">
    <input type="hidden" value="<?php echo $car->price_per_day?>" name="">
<?php } ?>

<h5> Amount to be paid : <?php echo $car->price_per_day*$this->session->flashdata('numdate').'$' ?></h5><br>

<label for="payment-select">Choose a payment:</label>



<select name="payment" id="payment-select">
    <option value="">--Please choose an option--</option>
    <option value="paypal">Paypal</option>
    <option value="bank">Bank</option>
</select>

<br><br>
<label for="cardnumber">Card number</label>
<input type='number' class='form-control' name='cardnumber' required min=10 >

<br>

<input type="submit" value="submit" class="btn btn-success">

<?php echo form_close();  ?>

<?php  
    $this->session->set_flashdata('id_car',$car->id_car);
    echo anchor('index.php/C_booking/index/'.$this->session->flashdata('id_car'), 'back', 'class="float-end btn btn-info"'); ?>
</div>