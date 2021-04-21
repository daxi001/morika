
<?php 
        $i = 0;
        foreach($ProductArray as $row)
        {
          $ImageArray = ImageUpload::selectPhotos($row['UID']);
          $categoryName = ImageUpload::selectCategory($row['CATEGORY_UID']);
        ?>
          <div class="col-lg-4 col-md-6 product_card">
            <div class="card shadow" style="width: auto;">
              <div class="img_parent">
                <img class="img_child" src="/upload/morika/<?php echo $row['UID']?>/<?php echo $ImageArray[0]['IMAGE_NAME'] ?>_thumb.jpg" class="card-img-top" alt="...">
              </div>
              <div class="product-button-parent"style="position:absolute; top:4px; right:7px; display:flex; flex-direction:column;">
    
              
              </div>
              <div class="card-body">
                <h5 class="card-title otherfont"><?php echo $row['PRODUCT_NAME']?></h5>
                <p class="card-text otherfont card-explane" style="margin-bottom: 0px;">კოდი: <?php echo $row['PRODUCT_CODE']?></p>
                <p class="card-text otherfont card-explane ">კატეგორია: <?php echo $categoryName[0]['CATEGORY_NAME'] ?></p>
                <p class="card-text otherfont card-explane" style="font-size:12px !important; display:inline-block; width:180px;"><?php echo $row['PRODUCT_COMMENT']?>...</p>
                <a href="#" class="see_button hover otherfont" style="float:right; font-size:15px; text-align:center;">სრულად</a>
              </div>
            </div>
          </div> 
      <?php
      $i++;
        }
      ?>
