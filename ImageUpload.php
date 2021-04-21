<?php

const SHOW_BY_DEFAULT = 10;

class ImageUpload
{
    const tmp = '';
    public static function selectAdmin()
    {
        $db = Db::getConnectionupload();

            
        $sql = 'SELECT * FROM ADMIN';

        $result = $db->prepare($sql);
        $result->execute();

        return $result->fetchAll();

    }

    public static function authorization($adminname,$adminpass)
    {
        
        $_SESSION['adminname'] = $adminname;
        $_SESSION['adminpass'] = $adminpass;
    }


    public static function insertCategory($categoryname,$categoryplace,$parentUID)
    {
        
        //ახლინდელი ფორმატი თარიღის
        $db = Db::getConnectionupload();

        $sql = 'INSERT INTO CATEGORY(CATEGORY_NAME, SORT, PARENT_UID)VALUES (:CATEGORY_NAME, :SORT, :PARENT_UID)';
        
        $result = $db->prepare($sql);

        $result->bindParam(':CATEGORY_NAME', $categoryname, PDO::PARAM_STR);
        $result->bindParam(':SORT', $categoryplace, PDO::PARAM_INT);
        $result->bindParam(':PARENT_UID', $parentUID, PDO::PARAM_INT);


        if ($result->execute()) {

            return $db->lastInsertId();

        }else{

            return 0;

        }

    }

   
    public static function addCategoryExists($categoryname){

        $db = Db::getConnectionupload();

        $sql="SELECT COUNT(*) FROM CATEGORY WHERE CATEGORY_NAME = :CATEGORY_NAME";

        $result = $db->prepare($sql);
        $result->bindParam(':CATEGORY_NAME',$categoryname, PDO::PARAM_STR);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch()["COUNT(*)"];

    }

    public static function updateCategory($lasID, $newsort)
    {
        
        //ახლინდელი ფორმატი თარიღის
        $db = Db::getConnectionupload();

        $sql = 'UPDATE CATEGORY SET SORT = SORT + 1 WHERE SORT >= :SORT AND UID != :UID';

        $result = $db->prepare($sql);

        $result->bindParam(':SORT', $newsort, PDO::PARAM_INT);
        $result->bindParam(':UID', $lasID, PDO::PARAM_INT);


        if ($result->execute()) {

            return true;

        }else{

            return false;

        }

    }

    public static function updateNewCategory($lasID, $categoryname, $categoryplace, $parentID)
    {
        error_log(print_r($lasID,true));
        //ახლინდელი ფორმატი თარიღის
        $db = Db::getConnectionupload();
        
        $sql = 'UPDATE CATEGORY SET CATEGORY_NAME = :CATEGORY_NAME, SORT = :SORT, PARENT_UID = :PARENT_UID WHERE UID = :UID';

        $result = $db->prepare($sql);

        $result->bindParam(':CATEGORY_NAME', $categoryname, PDO::PARAM_STR);
        $result->bindParam(':SORT', $categoryplace, PDO::PARAM_INT);
        $result->bindParam(':UID', $lasID, PDO::PARAM_INT);
        $result->bindParam(':PARENT_UID', $parentID, PDO::PARAM_INT);


        if ($result->execute()) {

            return true;

        }else{

            return false;

        }

    }


    public static function selectCategory($UID)
    {
        $db = Db::getConnectionupload();
        
        if(empty($UID)){
            $sql = 'SELECT * FROM CATEGORY ORDER BY SORT ASC';
            $result = $db->prepare($sql);
        // $result->bindParam(':UID', $UID, PDO::PARAM_INT);
            $result->execute();
        }else{
            $sql = 'SELECT * FROM CATEGORY WHERE UID = :UID ORDER BY SORT ASC';
            $result = $db->prepare($sql);
            $result->bindParam(':UID', $UID, PDO::PARAM_INT);
            $result->execute();
        }
    
        return $result->fetchAll();

    }

    public static function deleteCategory($UID){

        $db = Db::getConnectionupload();

        $sql = 'SELECT * FROM CATEGORY WHERE PARENT_UID = :UID';
        $result = $db->prepare($sql);
        $result->bindParam(':UID', $UID, PDO::PARAM_INT);
        $result->execute();
        $id = array();
        
        
        $resultarr = $result->fetchAll();

        for($i = 0; $i < count($resultarr); $i++){

            array_push($id,$resultarr[$i]['UID']);
            self::deleteCategory($resultarr[$i]['UID']);

            
        }

        $sql = 'DELETE FROM CATEGORY WHERE UID = :UID';

        $result = $db->prepare($sql);
        $result->bindParam(':UID', $UID, PDO::PARAM_INT);


        if(!$result->execute())
        {  
            return false;
        }

        return true;

  
    }


    //ყველა კატეგორიის წაშლა 
    public static function deleteAllCategory(){

        $db = Db::getConnectionupload();

        $sql = 'DELETE FROM CATEGORY';

        $result = $db->prepare($sql);
        // $result->bindParam(':UID', $UID, PDO::PARAM_INT);

        if(!$result->execute())
        {  
            return false;
        }

        return true;

  
    }


    // ფოტოების შეტანა ბაზაში
    public static function insertImage($imagename,$mainimage,$CategoryUID)
    {
        //ახლინდელი ფორმატი თარიღის
        $db = Db::getConnectionupload();

        $sql = 'INSERT INTO IMAGE(IMAGE_NAME, MAINIMAGE, CATEGORY_UID, PRODUCT_UID)VALUES (:IMAGE_NAME, :MAINIMAGE, :CATEGORY_UID,:PRODUCT_UID)';
        
        $result = $db->prepare($sql);

        $result->bindParam(':IMAGE_NAME', $imagename['name'], PDO::PARAM_STR);
        $result->bindParam(':MAINIMAGE', $mainimage, PDO::PARAM_INT);
        $result->bindParam(':CATEGORY_UID', $CategoryUID, PDO::PARAM_INT);
        $result->bindParam(':PRODUCT_UID', $imagename['parentid'], PDO::PARAM_INT);

        if ($result->execute()) {

            return $db->lastInsertId();

        }else{

            return 0;

        }

    }


    // პროდუქტის შეტანა ბაზაში
    public static function insertProduct($productname,$productcode,$barcode,$categoryUID)
    {
        
        //ახლინდელი ფორმატი თარიღის
        $db = Db::getConnectionupload();

        $date = date('d-m-Y');

        $sql = 'INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_CODE, PRODUCT_COMMENT, DATE, CATEGORY_UID )VALUES (:PRODUCT_NAME, :PRODUCT_CODE, :PRODUCT_COMMENT, :DATE, :CATEGORY_UID)';
        
        $result = $db->prepare($sql);

        $result->bindParam(':PRODUCT_NAME', $productname, PDO::PARAM_STR);
        $result->bindParam(':PRODUCT_CODE', $productcode, PDO::PARAM_STR);
        $result->bindParam(':PRODUCT_COMMENT', $barcode, PDO::PARAM_STR);
        $result->bindParam(':DATE', $date, PDO::PARAM_STR);
        $result->bindParam(':CATEGORY_UID', $categoryUID, PDO::PARAM_INT);


        if ($result->execute()) {

            return $db->lastInsertId();

        }else{

            return 0;

        }

    }


    public static function categoryParentChildTreemenu($parentid = 0,$space,$marginleft = 0, $icon,$category_tree_array,$end)
    {

        

        $db = Db::getConnectionupload();

        

        if (!is_array($category_tree_array))

        $category_tree_array = array();

        

        $sql = 'SELECT * FROM CATEGORY WHERE PARENT_UID = :parentid ORDER BY SORT ASC';



        $result = $db->prepare($sql);

        $result->bindParam(':parentid', $parentid, PDO::PARAM_INT);

        $result->execute();

        

        $i = 0;



        while ($row = $result->fetch()) {

            $icon = '<span class="material-icons showMe" data-id="'.$row["UID"].'" parent-id="'.$row["PARENT_UID"].'">add</span>&nbsp;';

            $category_tree_array[] = array("UID" => $row['UID'],"SPACE"=>$space,'MARGINLEFT'=>$marginleft, "ICON" =>$icon,"PARENT_UID"=> $row['PARENT_UID'],"CATEGORY_NAME" =>$space.$row['CATEGORY_NAME'],"SORT" => $row['SORT']);

            $category_tree_array = self::categoryParentChildTreemenu($row['UID'],''.$space,$marginleft += 24,$icon,$category_tree_array,'');
            $marginleft -= 24;
            $i++;

        }
        return $category_tree_array;

    }


    public static function categoryNewParentChildTreemenu($tmp = '',$parentid = 0,$indicator)
    {

        $db = Db::getConnectionupload();
    
        
        $sql = 'SELECT * FROM CATEGORY WHERE PARENT_UID = :parentid ORDER BY SORT ASC';

        $result = $db->prepare($sql);

        $result->bindParam(':parentid', $parentid, PDO::PARAM_INT);

        $result->execute();

        $i = 0;

        $array = array();
        $resultArray = $result->fetchAll();
        $bool = true;
        if(count($resultArray) == 0){
            return  false;
        }

        if(strlen($indicator) > 0){

            for($i = 0; $i < count($resultArray); $i++) {
            
                $tmp .= '<div class="ParentFunc" id="ParentFunc'.$resultArray[$i]['UID'].'" style="">
                        <div class=" margin_bottom"  data-id="'.$resultArray[$i]['UID'].'" parent-id="'.$resultArray[$i]['PARENT_UID'].'">';
                        $isParent = true;
                        if(self::categoryNewParentChildTreemenu($tmp,$resultArray[$i]['UID'],$indicator) == false){
                            $isParent = false;
                        }
                        if($isParent == true){
                            $tmp .= '<span class="material-icons showProductChild ChildIcon" onclick="showPruductCategories('.$resultArray[$i]['UID'].', this)" aria-hidden="true" children_is_hidden = "0">add</span>';
                        }else{
                            $tmp .= '&nbsp;';
                        }
                $tmp .= '</div>
                        <span class="category_alone" contenteditable="false" id="drag'.$resultArray[$i]['UID'].'" data-id="'.$resultArray[$i]['UID'].'" parent-id="'.$resultArray[$i]['PARENT_UID'].'" sort="'.$resultArray[$i]['SORT'].'" onclick="Choose_Category(`'.$resultArray[$i]['CATEGORY_NAME'].'`,this)">'.$resultArray[$i]['CATEGORY_NAME'].'</span>

                        </div>';
                if(self::categoryNewParentChildTreemenu($tmp,$resultArray[$i]['UID'], $indicator) == false){
                    continue;
                }
                $tmp .= '<div class="border-left is_hidden" id="border-left'.$resultArray[$i]['UID'].'" parent_id="'.$resultArray[$i]['PARENT_UID'].'" data-id="'.$resultArray[$i]['UID'].'">
                                <div class="lines"></div>';
                        
                $tmp = self::categoryNewParentChildTreemenu($tmp,$resultArray[$i]['UID'], $indicator).'</div>';
    
            }

        }else{

            for($i = 0; $i < count($resultArray); $i++) {
            
                $tmp .= '<div class="ParentFunc" id="ParentFunc'.$resultArray[$i]['UID'].'" style="">
                        <div class=" margin_bottom"  data-id="'.$resultArray[$i]['UID'].'" parent-id="'.$resultArray[$i]['PARENT_UID'].'">';
                        $isParent = true;
                        if(self::categoryNewParentChildTreemenu($tmp,$resultArray[$i]['UID'], $indicator) == false){
                            $isParent = false;
                        }
                        if($isParent == true){
                            $tmp .= '<span class="material-icons showMe ChildIcon" onclick="checker('.$resultArray[$i]['UID'].', this)" aria-hidden="true" ischildhiden="0">add</span>';
                        }else{
                            $tmp .= '&nbsp;';
                        }
                $tmp .= '</div>
                        <span class="category_alone" contenteditable="false" id="drag'.$resultArray[$i]['UID'].'" data-id="'.$resultArray[$i]['UID'].'" parent-id="'.$resultArray[$i]['PARENT_UID'].'" sort="'.$resultArray[$i]['SORT'].'">'.$resultArray[$i]['CATEGORY_NAME'].'</span>
                        <div class="CategoryMenuDiv">
                            <button class="treeList" id="treeBtn'.$resultArray[$i]['UID'].'" onclick="openChild('.$resultArray[$i]['UID'].', this)" type="button" role="button" data-modul="0" name="Space" data-id="'.$resultArray[$i]['UID'].'" parent-id="'.$resultArray[$i]['PARENT_UID'].'" data-left="" style="color: black !important;"><span class="material-icons" style="color: #2bd030; font-weight: bold;">add</span></button>
                            <button class="EditSpaceButton" type="button" id="EditSpaceButton'.$resultArray[$i]['UID'].'" name="editSpaceName" data-id="'.$resultArray[$i]['UID'].'" parent-id="'.$resultArray[$i]['PARENT_UID'].'" style="color: black !important;"><span class="material-icons" style="color: orange;">edit</span></button>
                            <button class="DeleteListBtn" id="DeleteListBtn'.$resultArray[$i]['UID'].'" type="button"  name="Space" data-id="'.$resultArray[$i]['UID'].'" parent-id="'.$resultArray[$i]['PARENT_UID'].'" style="color: black !important;"><span class="material-icons" style="color: red; font-weight: bold;">close</span></button>
                            <button class="DeleteList" type="button" id="DeleteList'.$resultArray[$i]['UID'].'"  name="Space" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-bs-whatever="@delCategory" data-id="'.$resultArray[$i]['UID'].'" parent-id="'.$resultArray[$i]['PARENT_UID'].'" style="color: black !important;"><span class="material-icons" style="color: red; font-weight: bold;">close</span></button>
                            
                        </div>
                        </div>';
                if(self::categoryNewParentChildTreemenu($tmp,$resultArray[$i]['UID'], $indicator) == false){
                    continue;
                }
                $tmp .= '<div class="border-left is_hidden" id="border-left'.$resultArray[$i]['UID'].'" parent_id="'.$resultArray[$i]['PARENT_UID'].'" data-id="'.$resultArray[$i]['UID'].'">
                                <div class="lines"></div>';
                        
                $tmp = self::categoryNewParentChildTreemenu($tmp,$resultArray[$i]['UID'], $indicator).'</div>';
    
            }

        }
        
        // error_log(print_r($array,true));
        return $tmp;

    }

    public static function selectProduct()
    {
        $db = Db::getConnectionupload();

        $sql = 'SELECT * FROM PRODUCT';
        $result = $db->prepare($sql);
        // $result->bindParam(':UID', $UID, PDO::PARAM_INT);
        $result->execute();
        
        return $result->fetchAll();
    }

    public static function selectPhotos($UID)
    {
        $db = Db::getConnectionupload();

        $sql = 'SELECT * FROM IMAGE WHERE PRODUCT_UID = :UID';
        $result = $db->prepare($sql);
        $result->bindParam(':UID', $UID, PDO::PARAM_INT);
        $result->execute();
        
    
        return $result->fetchAll();
    }

    //ძებნა
    public static function selectInfo($SearchValue)
    {

        // $limit = self::SHOW_BY_DEFAULT;

        // if(is_numeric($page))
        // {

        //     $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        // }

        $db = Db::getConnectionupload();


        if(!empty($SearchValue))
        {

            $sql = 'SELECT * FROM PRODUCT WHERE
            (PRODUCT_NAME LIKE "%'.$SearchValue.'%" OR 	PRODUCT_CODE LIKE "%'.$SearchValue.'%" OR PRODUCT_COMMENT LIKE "%'.$SearchValue.'%" OR DATE LIKE "%'.$SearchValue.'%")
            ORDER BY UID';


        }else{

            $sql = 'SELECT * FROM PRODUCT ORDER BY UID';

        }

        $result = $db->prepare($sql);
        // $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        // $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        $result->execute();

        return $result->fetchAll();

    }


    public static function selectProductInfoCount($SearchValue)
    {

            $db = Db::getConnectionupload();

            if(strlen($SearchValue) > 0)
            {

                $sql = 'SELECT * FROM PRODUCT WHERE
                (PRODUCT_NAME LIKE "%'.$SearchValue.'%" OR 	PRODUCT_CODE LIKE "%'.$SearchValue.'%" OR PRODUCT_COMMENT LIKE "%'.$SearchValue.'%" OR DATE LIKE "%'.$SearchValue.'%")
                ORDER BY UID  ASC';
            }else{

                $sql = 'SELECT * FROM PRODUCT  ORDER BY UID ASC';

            }

            $result = $db->prepare($sql);
            $result->execute();

            $RestaurantDataCount = array();

            $i = 0;

            while ($row = $result->fetch()) {

                $RestaurantDataCount[$i]['UID'] = $row['UID'];
                $i++;
            }

            return $RestaurantDataCount;

    }


    //პროდუქტის წაშლა 
    public static function DeleteProduct($UID){

        $db = Db::getConnectionupload();

        $sql = 'DELETE FROM PRODUCT WHERE UID = :UID';

        $result = $db->prepare($sql);
        $result->bindParam(':UID', $UID, PDO::PARAM_INT);

        if(!$result->execute())
        {  
            return false;
        }

        return true;
    }


    public static function selectProductWithUID($UID)
    {
        $db = Db::getConnectionupload();

        $sql = 'SELECT * FROM PRODUCT WHERE UID = :UID';
        $result = $db->prepare($sql);
        $result->bindParam(':UID', $UID, PDO::PARAM_INT);
        $result->execute();
        
        return $result->fetch();
    }

    //ფოტოების წაშლა
    public static function DeleteImage($UID)
    {
        $db = Db::getConnectionupload();

        $sql = 'DELETE FROM IMAGE WHERE UID = :UID';
        $result = $db->prepare($sql);
        $result->bindParam(':UID', $UID, PDO::PARAM_INT);
        $result->execute();
        
        return $result->fetch();
    }

        
    public static function FileName($imgArray){

        $name = '';
        $orgname = '';
        $dir = '';
        $a = 0;

        while($a < count($imgArray)){

            $name = array_values($imgArray[$a])[0].'_thumb.jpg';
            $orgname = array_values($imgArray[$a])[0].'.jpg';
            $dir = $_SERVER['DOCUMENT_ROOT'] . "/upload/morika/".array_values($imgArray[$a])[1]."/";
            
            self::DeleteFile($name, $orgname, $dir);
            $a++;
        }
        
        return true;
        
    }


    //სურათის ფაილის წაშლა
    public static function DeleteFile($name, $orgname, $dir){
        
        $dirHandle = opendir($dir);  
        $a = 0;  
        while ($file = readdir($dirHandle)) {
            if($file ==$name) {
                
                unlink($dir."/".$file);
            }
            if($file ==$orgname) {
                
                unlink($dir."/".$file);
            }
            
        } 
        
        if(empty($dir)){
            rmdir($dir);
        }
        
        closedir($dirHandle);
    }

    public static function updateProduct($UID,$name,$code,$comment,$CategoryUID)
    {
        
        $date = date('d-m-Y');
        //ახლინდელი ფორმატი თარიღის
        error_log($UID.' <====> '.$name.' <====> '.$code.' <====> '.$comment.' <====> '.$CategoryUID.' <====> '.$date);
        $db = Db::getConnectionupload();
        
        $sql = 'UPDATE PRODUCT SET PRODUCT_NAME = :PRODUCT_NAME, PRODUCT_CODE = :PRODUCT_CODE, PRODUCT_COMMENT = :PRODUCT_COMMENT, DATE = :DATE, CATEGORY_UID = :CATEGORY_UID WHERE UID = :UID';

        $result = $db->prepare($sql);

        $result->bindParam(':PRODUCT_NAME', $name, PDO::PARAM_STR);
        $result->bindParam(':PRODUCT_CODE', $code, PDO::PARAM_STR);
        $result->bindParam(':PRODUCT_COMMENT', $comment, PDO::PARAM_STR);
        $result->bindParam(':UID', $UID, PDO::PARAM_INT);
        $result->bindParam(':CATEGORY_UID', $CategoryUID, PDO::PARAM_INT);
        $result->bindParam(':DATE', $date, PDO::PARAM_STR);


        if ($result->execute()) {

            return true;

        }else{

            return false;

        }

    }
}

?>