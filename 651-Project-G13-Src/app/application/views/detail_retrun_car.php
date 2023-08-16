<div class="container mt-3">
  <h3 class="float-start" ><?php echo $title ;?></h3>
  <div class="d-flex justify-content-end">
    <?php 
        echo anchor('index.php/C_return_car/index/', 'back', 'class="btn btn-info"');
        ?> 
    </div>    
  <hr>
    <div class="row justify-content-start" ">
        <div class="col">
        img
        </div>
        <div class="col ">
            <?php foreach ( $cars->result() as $car ) { ?>
                <p>brand : <?php echo $car->brand ?> </p><hr>
                <p>model : <?php echo $car->name_model ?> </p><hr>
                <p>gear  : <?php echo $car->car_gear ?> </p><hr>
                <p>count unit : <?php echo $car->count_unit ?> </p><hr>
                <p>year of production : <?php echo $car->year_of_production ?> </p><hr>
                <p>number of passengers : <?php echo $car->number_of_passengers?> </p><hr>
                <p>price/day : <?php echo $car->price_per_day?> </p>
            <?php } ?>
        </div>
    </div>
     
    <hr>
    
    <div class="d-flex bd-highlight mb-3">
        <div class="p-2 bd-highlight"><?php echo anchor('index.php/C_return_car/form_return_car/'.$car->id_car, 'return car', 'class="btn btn-success"');?> 
                
        </div>
        
    </div>
     
    

  
     
    
</div>