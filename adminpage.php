<ul class="product_list_ul">
<li class="header_list">
<div class="header_list_div" >
    <label class="header_value otherfont">სურათები</label>
    <label class="header_value otherfont">დასახელება</label>
    <label class="header_value otherfont">კოდი</label>
    <label class="header_value otherfont">კატეგორია</label>
    <label class="header_value otherfont">რედაქტირება</label>
    <label class="header_value otherfont">წაშლა</label>
</div>
</li>
<?php 
    $i = 0;
    foreach($ProductArray as $row)
    {
        $ImageArray = ImageUpload::selectPhotos($row['UID']);
        $categoryName = ImageUpload::selectCategory($row['CATEGORY_UID']);
    ?>
    <li class="one_list" id="product1">
            <div class="one_list_div">
              <label class='element_value Product_photo '>
                <img class="shadow-sm inner_photo" src="/upload/morika/<?php echo $row['UID']?>/<?php echo $ImageArray[0]['IMAGE_NAME'] ?>_thumb.jpg" alt="No Image">
              </label>
              
              <div class="element_value text" >
                <span class="otherfont"><?php echo $row['PRODUCT_NAME']?></span>
              </div>
              <div class="element_value text" >
                <span class="otherfont"><?php echo $row['PRODUCT_CODE']?></span>
              </div>
              <div class="element_value text" >
                <span class="otherfont"><?php echo $categoryName[0]['CATEGORY_NAME']?></span>
              </div>
              <div class="element_value">
                <span class="material-icons text openEditModal" data-id="<?php echo $row['UID']?>" data-bs-toggle="modal" data-bs-target=".addProductModal" data-bs-whatever="@editProduct" onclick="openEditModal(this)">
                  edit
                </span>
              </div>
              
              <div class="element_value">
                <span class="element_value material-icons text" data-id="<?php echo $row['UID']?>" onclick="openProductDeleteModal(this)">
                  delete
                </span>
              </div>
              
            </div>
          </li>

    <?php
    $i++;
    }
    ?>
</ul>