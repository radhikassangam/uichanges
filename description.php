<style>
    *,
*::before,
*::after {
    box-sizing: border-box;
}

/* Body styling */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    min-height: 100vh;
    overflow-x: hidden; /* Prevent horizontal overflow */
    display: flex;
    flex-direction: column;
}

/* Ensure html element doesn't have unwanted margins */
html {
    margin: 0;
    padding: 0;
}
.fa-check{
    text-align:right;
     padding:10px; 
    margin-left:-40px;
}
/* Responsive media queries */
@media (max-width: 768px) {
    body {
        padding: 50px; /* Adding some padding for smaller screens */
        width:100%
    }
    .ddd{
        padding:10px;
        margin:10px !important;
        width:100%;
        /* background-color:#f5f6f8; */
    }
   
}

@media (max-width: 480px) {
    body {
        padding: 0px; /* Further reduce padding for very small screens */
        width:100%
    }
    .ddd{
        padding:10px;
        margin:10px !important;
        width:100%;
        /* background-color:#f5f6f8; */
    }
   
  
}
</style>    


<div class="tab tab-nav-boxed tab-nav-underline product-tabs mt-3 ddd " style="margin:150px">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a  id ="description" href="#product-tab-description" class="nav-link active">Description</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://uthhanecom.gergstore.com/Authenticate/login" style="padding: 1.5rem 0 1.3rem;font-size: 1.5rem;font-weight: 700;color: #999; text-transform: capitalize;">Customer Reviews (0)</a>
                          </li>
                        </ul>
                        <div class="tab-content" style="  font-family: sans-serif;">
                            <div class="tab-pane active" id="product-tab-description">
                                <div class="col-md-6 mb-5">
                                    
                                    <h4 class="title tab-pane-title font-weight-bold mb-2">Details</h4>
                                    <p class="mb-4"><?php echo $row['description']; ?></p>    
                                    <ul class="list-type-check">
                                    <li><i class="fa-solid fa-check"></i><span style="font-weight:bold;">Artisan Name :</span> <?php echo !empty($row1['artisan_name']) ? $row1['artisan_name'] : 'Not available'; ?></li>
                                    <li><i class="fa-solid fa-check"></i><span style="font-weight:bold;">Product ID :</span> <?php echo !empty($row1['product_id']) ? $row1['product_id'] : 'Not available'; ?></li>
                                    <li> <i class="fa-solid fa-check"></i><span style="font-weight:bold;">Artisan Id :</span> <?php echo !empty($row1['artisan_id']) ? $row1['artisan_id'] : 'Not available'; ?></li>
                                    <li><i class="fa-solid fa-check"></i><span style="font-weight:bold;">Artisan State :</span> <?php echo !empty($row1['artisan_state']) ? $row1['artisan_state'] : 'Not available'; ?></li>
                                    <li><i class="fa-solid fa-check"></i><span style="font-weight:bold;">Artisan District :</span> <?php echo !empty($row1['artisan_dist']) ? $row1['artisan_dist'] : 'Not available'; ?></li>
                                    <li><i class="fa-solid fa-check"></i><span style="font-weight:bold;">Material :</span> <?php echo !empty($row1['material']) ? $row1['material'] : 'Not available'; ?></li>
                                    <li><i class="fa-solid fa-check"></i><span style="font-weight:bold;">Color :</span> <?php echo !empty($row1['color']) ? $row1['color'] : 'Not available'; ?></li>
                                    <li><i class="fa-solid fa-check"></i><span style="font-weight:bold;">Maximum Quantity :</span> <?php echo !empty($row1['max_qua']) ? $row1['max_qua'] : 'Not available'; ?></li>
                                    <li><i class="fa-solid fa-check"></i><span style="font-weight:bold;">Weight :</span> <?php echo !empty($row1['weight']) ? $row1['weight'] : 'Not available'; ?></li>
                                    <li><i class="fa-solid fa-check"></i><span style="font-weight:bold;">Product Dimension :</span> <?php echo !empty($row1['dimention']) ? $row1['dimention'] : 'Not available'; ?></li>
                                    <li><i class="fa-solid fa-check"></i><span style="font-weight:bold;">Care :</span> <?php echo !empty($row1['care']) ? $row1['care'] : 'Not available'; ?></li>
                                    <li><i class="fa-solid fa-check"></i><span style="font-weight:bold;">Delivery Date :</span> <?php echo !empty($row1['delivery_date']) ? $row1['delivary_date'] : 'Not available'; ?></li>
                                                            
                              
                       </ul>                                               
                      </div>             
                </div>
          </div>            
    </div>