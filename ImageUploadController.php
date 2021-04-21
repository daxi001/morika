<?php
class ImageUploadController extends AdminBase
{

    public static function actionClient(){

        // self::checkAdmin();

        if(isset($_POST['isseteadmin'])){

            
            $adminname = $_POST['adminname'];
            $adminpass = $_POST['adminpass'];

            $admin = ImageUpload::selectAdmin();

            if($adminname == $admin[0]['ADMIN_NAME'] && $adminpass == $admin[0]['ADMIN_PASS']){

                ImageUpload::authorization($adminname,$adminpass);
                
                die('1');
            }else{
                
                die('0');
            }
        }
        require_once(ROOT . '/morika/index.php');
        return true;
    }

    public static function actionAdmin(){

        // self::checkAdmin();
        $tmp = '';
        $newTmp = '';
        $categoryArray = array();
        // $ProductArray = ImageUpload::selectProduct();

        // $ProductArray = ImageUpload::selectProduct($SearchValue = '');
        // error_log(print_r($ProductArray,true));

        // $MenuInfoCount = count(ImageUpload::selectProductInfoCount($SearchValue));

        // // $pagination = new Pagination($MenuInfoCount, $page, 'page-');

        if(isset($_POST['selectcategoryList'])){

            
            if(!isset($_SESSION['adminname']) && !isset($_SESSION['adminpass'])){

                die('0');
                // header('Location: https://archili.gsoft.ge/client');

            }else{

                $space="";
                $end = "";
                $icon = '<span class="material-icons CategoryShowIcon"  aria-hidden="true">chevron_right</span>&nbsp;';
                
                $Category = array();
                $newicon = '';
                $Category = ImageUpload::categoryParentChildTreemenu($parentid = 0,$space,$marginleft = 0,$icon,$Category,$end);

                for($i = 0; $i < count($Category); $i++){
                    $space =  $Category[$i]["SPACE"];
                    $marginleft = $Category[$i]["MARGINLEFT"];
                    $isParent = false;
                    for($j = 0; $j < count($Category); $j++){
                        if ($Category[$j]['PARENT_UID'] == $Category[$i]['UID']) {
                            $isParent = true;
                        }
                    }
                    
                    $tmp .='<li class="nav-item Category" data-id="'.$Category[$i]['UID'].'" parent-id="'.$Category[$i]['PARENT_UID'].'" value="'.$Category[$i]['CATEGORY_NAME'].'" id="draglist'.$Category[$i]['UID'].'" sort="'.$Category[$i]['SORT'].'" style="margin-left:'.$marginleft.'px;">';
                    if($isParent == true) {
                        $newicon = $Category[$i]["ICON"];
                        $tmp .='<a href="#" data-text="'.$space.$Category[$i]['CATEGORY_NAME'].'" class="nav-link active">'.$icon.''.$space.''.$Category[$i]['CATEGORY_NAME'].'</a>';
                    }else{
                        $tmp .='<a href="#" data-text="'.$space.$Category[$i]['CATEGORY_NAME'].'"  class="nav-link active">&nbsp;'.$space.''.$Category[$i]['CATEGORY_NAME'].'</a>';
                    }
                    
                    $tmp .='</li>';
 
                }
                
                die($tmp);
            }
            
        }


        if(isset($_POST['addcategory'])){

            $recipient = $_POST['recipient'];

            // if($recipient == '@addCategory'){
                
            //     $categoryname = $_POST['categoryname'];
            //     $categoryplace = $_POST['categoryplace'];

                // if($categoryname == ''){
                //     die('0');
                // }

                // if (ImageUpload::addCategoryExists($categoryname)) {
                //     die('-1');
                // }
            //     $parentUID = 0;

            //     $lasID = ImageUpload::insertCategory($categoryname,$categoryplace,$parentUID);
            //     ImageUpload::updateCategory($lasID, $categoryplace);

            //     $space="";
            //     $end = "";
            //     $icon = '<span class="material-icons showMe"  aria-hidden="true">chevron_right</span>&nbsp;';
                
            //     $Category = array();
            //     $newicon = '';
            //     $Category = ImageUpload::categoryParentChildTreemenu($parentid = 0,$space,$marginleft = 0,$icon,$Category,$end);
    
            //     self::showCategoryJson($Category,$tmp,$newTmp,$categoryArray);
                
            // }
            //რედაქტირება
            if($recipient == '@editCategory'){
                
                $categoryname = $_POST['categoryname'];
                $categoryplace = $_POST['categoryplace'];
                $UID = $_POST['dataid'];
                $parentUID = $_POST['parentid'];
                
                if($categoryname == ''){
                    die('0');
                }

                if (ImageUpload::addCategoryExists($categoryname)) {
                    die('-1');
                }

                ImageUpload::updateNewCategory($UID,$categoryname, $categoryplace, $parentUID);
                // ImageUpload::updateCategory($UID, $categoryplace);

                $space="";
                $end = "";
                $icon = '<span class="material-icons showMe"  aria-hidden="true">chevron_right</span>&nbsp;';
                
                $Category = array();
                $newicon = '';

                $Category = ImageUpload::categoryParentChildTreemenu($parentid = 0,$space,$marginleft = 0,$icon,$Category,$end);

                self::showCategoryJson($Category,$tmp,$newTmp,$categoryArray);
                
            }

            if($recipient == '@delCategory'){
                
                $UID = $_POST['dataid'];

                ImageUpload::deleteCategory($UID);

                $space="";
                $end = "";
                $icon = '<span class="material-icons showMe"  aria-hidden="true">chevron_right</span>&nbsp;';
                
                $Category = array();
                $newicon = '';
                $Category = ImageUpload::categoryParentChildTreemenu($parentid = 0,$space,$marginleft = 0,$icon,$Category,$end);

                self::showCategoryJson($Category,$tmp,$newTmp,$categoryArray);
            }

            if($recipient == '@treeCategory'){

                $parentUID = $_POST['dataid'];
                $categoryname = $_POST['categoryname'];
                $categoryplace = $_POST['categoryplace'];
                
                ImageUpload::insertCategory($categoryname,$categoryplace,$parentUID);
    
                $space="";
                $end = "";
                $icon = '<span class="material-icons showMe" aria-hidden="true">chevron_right</span>&nbsp;';
                
                $Category = array();
                $newicon = '';
                $Category = ImageUpload::categoryParentChildTreemenu($parentid = 0,$space,$marginleft = 0,$icon,$Category,$end);
                self::showCategoryJson($Category,$tmp,$newTmp,$categoryArray);

    
            }
            
        }

        
        if(isset($_POST['editmodal'])){
            $UID = $_POST['dataid'];

            $Category = ImageUpload::selectCategory($UID);

            $tmp .= '<div class="col-7 mb-3">
                            <label for="recipient-name" class="col-form-label">კატეგორიის რედაქტირება:</label>
                            <input type="text" class="form-control" id="CategoryId" autocomplete="off" value="'.$Category[0]['CATEGORY_NAME'].'">
                        </div>
                        <div class="col-3 mb-3" style="margin-top: 37px; margin-left: 30px;">
                            <input type="text" class="form-control" id="CategoryPlaceId" autocomplete="off" value="'.$Category[0]['SORT'].'">
                        </div>';
                    die($tmp);
        }
        
        if(isset($_POST['showcategory'])){

            // $Category = ImageUpload::selectCategory('');

            $space="";
            $end = "";
            $icon = '<span class="material-icons showMe"  aria-hidden="true">add</span>&nbsp;';
            
            $Category = array();
            $newicon = '';
            
            // $Category = ImageUpload::categoryParentChildTreemenu($parentid = 0,$space,$marginleft = 0,$icon,$Category,$end);
            $NewCategory = ImageUpload::categoryNewParentChildTreemenu($tmp = '',$parentid = 0, $indicator = '');
            die($NewCategory);
            // self::showCategory($Category,$tmp);

        }


        if(isset($_POST['sortIds'])){
            $listArray = $_POST['listArray'];

            $sortid = 0;
            for($i = 0; $i < count($listArray); $i++){
                $UID = $listArray[$i]['dataid']; 
                $ParentUID = $listArray[$i]['parentid']; 
                $value = $listArray[$i]['value'];

                $sortid = $sortid + 1;

                ImageUpload::updateNewCategory($UID, $value, $sortid, $ParentUID);
            }

        }

        if(isset($_POST['addtree'])){

            $parentUID = $_POST['dataid'];
            $categoryname = $_POST['value'];
            $categoryplace = 0;

            ImageUpload::insertCategory($categoryname,$categoryplace,$parentUID);

            $space="";
            $end = "";
            $icon = '<span class="material-icons showMe"  aria-hidden="true" style="color:#2c86e2; font-size:20px;">add</span>&nbsp;';
            
            $category_tree_array = array();
    
            $category_tree_array = ImageUpload::categoryParentChildTreemenu($parentid = 1,$space,$icon,$category_tree_array,$end);
            
            for($i = 0; $i < count($category_tree_array); $i++)
            {
                $tmp .='<li class="nav-item" draggable="true" data-id="'.$Category[$i]['UID'].'" parent-id="'.$Category[$i]['PARENT_UID'].'">
                <a href="#" class="nav-link active">';
                  
                echo $category_tree_array[$i]["SPACE"];
                $isParent = false;
                foreach($category_tree_array as $row1) {
                    if ($row1['PARENT_UID'] == $category_tree_array[$i]['UID']) {
                        $isParent = true;
                    }
                }
            
                if($isParent == true) {
                    echo $category_tree_array[$i]["ICON"];
                }
            
                echo $category_tree_array[$i]['CATEGORY_NAME'];
                $tmp .='</a>
                
                </li>';
            }
            die($tmp);
        }

        if(isset($_POST['showCategoryOnModal'])){

            $space="";
            $end = "";
            $icon = '<span class="material-icons showMe"  aria-hidden="true" style="color:#2c86e2; font-size:20px;">chevron_right</span>&nbsp;';
            
            $Category = array();
    
            $Category = ImageUpload::categoryParentChildTreemenu($parentid = 0,$space,$marginleft = 0,$icon,$Category,$end);
            

            for($i = 0; $i < count($Category); $i++){

                $space =  $Category[$i]["SPACE"];
                $marginleft = $Category[$i]["MARGINLEFT"];
                $isParent = false;
                for($j = 0; $j < count($Category); $j++){
                    if ($Category[$j]['PARENT_UID'] == $Category[$i]['UID']) {
                        $isParent = true;
                        
                    }
                }

                if($isParent == true) {
                    $newicon = $Category[$i]["ICON"];
                    $tmp .= '<option value="'.$Category[$i]['UID'].'" parent-id="'.$Category[$i]['PARENT_UID'].'">'.$Category[$i]['CATEGORY_NAME'].'</option>';
                }else{
                    $tmp .= '<option value="'.$Category[$i]['UID'].'" parent-id="'.$Category[$i]['PARENT_UID'].'">'.$Category[$i]['CATEGORY_NAME'].'</option>';
                }
            }

            die($tmp);
            
        }

        if(isset($_POST['addingCategory'])){

            $parentUID = $_POST['parentid'];
            $value = $_POST['value'];

            if($value == ''){
                die('0');
            }

            if (ImageUpload::addCategoryExists($value)) {
                die('-1');
            }

            $lastId = ImageUpload::insertCategory($value,$categoryplace = 0,$parentUID);
            $NewCategory = ImageUpload::selectCategory($lastId);

            $tmp .= '<div class="margin_bottom"  data-id="'.$NewCategory[0]['UID'].'" parent-id="'.$NewCategory[0]['PARENT_UID'].'"> 
                        &nbsp;
                    </div>
                    <span class="category_alone" contenteditable="false" id="drag'.$NewCategory[0]['UID'].'" data-id="'.$NewCategory[0]['UID'].'" parent-id="'.$NewCategory[0]['PARENT_UID'].'" sort="'.$NewCategory[0]['SORT'].'">'.$NewCategory[0]['CATEGORY_NAME'].'</span>
                    <div class="CategoryMenuDiv">
                        <button class="treeList" id="treeBtn'.$NewCategory[0]['UID'].'" onclick="openChild('.$NewCategory[0]['UID'].', this)" type="button" role="button" data-modul="0" name="Space" data-id="'.$NewCategory[0]['UID'].'" parent-id="'.$NewCategory[0]['PARENT_UID'].'" data-left="" style="color: black !important;"><span class="material-icons" style="color: #2bd030; font-weight: bold;">add</span></button>
                        <button class="EditSpaceButton" type="button" id="EditSpaceButton'.$NewCategory[0]['UID'].'" name="editSpaceName" data-id="'.$NewCategory[0]['UID'].'" parent-id="'.$NewCategory[0]['PARENT_UID'].'" style="color: black !important;"><span class="material-icons" style="color: orange;">edit</span></button>
                        <button class="DeleteListBtn" id="DeleteListBtn'.$NewCategory[0]['UID'].'" type="button"  name="Space" data-id="'.$NewCategory[0]['UID'].'" parent-id="'.$NewCategory[0]['PARENT_UID'].'" style="color: black !important;"><span class="material-icons" style="color: red; font-weight: bold;">close</span></button>
                        <button class="DeleteList" type="button" id="DeleteList'.$NewCategory[0]['UID'].'"  name="Space" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-bs-whatever="@delCategory" data-id="'.$NewCategory[0]['UID'].'" parent-id="'.$NewCategory[0]['PARENT_UID'].'" style="color: black !important;"><span class="material-icons" style="color: red; font-weight: bold;">close</span></button>
                        
                    </div>';
            // $NewCategory = ImageUpload::categoryNewParentChildTreemenu($tmp = '',$parentid = 0, $indicator = '');
            die($tmp);

        }

        if(isset($_POST['addingNewCategory'])){

            $parentUID = $_POST['parentid'];
            $value = $_POST['value'];

            if($value == ''){
                die('0');
            }

            if (ImageUpload::addCategoryExists($value)) {
                die('-1');
            }

            ImageUpload::insertCategory($value,$categoryplace = 0,$parentUID);

            $NewCategory = ImageUpload::categoryNewParentChildTreemenu($tmp = '',$parentid = 0, $indicator = '');
            die($NewCategory);

        }

        
        if(isset($_POST['Product_Category'])){

            $NewCategory = ImageUpload::categoryNewParentChildTreemenu($tmp = '',$parentid = 0, $indicator = 'indicator');
            die($NewCategory);
        }



        if(isset($_POST['New_Product'])){


            $name = $_POST['name'];
            $code = $_POST['code'];
            $CategoryUID = $_POST['category_id'];
            $comment = $_POST['comment'];
            $lastUID = '';
            $UID = $_POST['dataid'];
            

            if(!empty($UID)){
                
                ImageUpload::updateProduct($UID,$name,$code,$comment,$CategoryUID);
            }else{
                $lastUID = ImageUpload::insertProduct($name,$code,$comment,$CategoryUID);
            }
            
            if(empty($lastUID)){
                $lastUID = $UID;
            }

            $imageArray = $_POST['Photos'];

            $a = 0;

            while($a < count($imageArray)){

            $option['image'] = $imageArray[$a]['src'];
            $option['org-image'] = $imageArray[$a]['org-src'];


            if (!file_exists($_SERVER['DOCUMENT_ROOT']."/upload/morika/".$lastUID)) {

                mkdir($_SERVER['DOCUMENT_ROOT']."/upload/morika/".$lastUID, 0777, true);

            }

            $uniqid = uniqid();

            $imgdata['name'] = $option['image'];

            $imageInfo = explode(";base64,", $imgdata['name']);

            $imgExt = str_replace('data:image/', '', $imageInfo[0]);      

            $image = str_replace(' ', '+', $imageInfo[1]);

            $bigImg['org-name'] = $option['org-image'];

            $imageInfoOrg = explode(";base64,", $bigImg['org-name']);

            $imgExt = str_replace('data:image/', '', $imageInfoOrg[0]);      

            $image2 = str_replace(' ', '+', $imageInfoOrg[1]);

            $imgdata['parentid']= $lastUID;

            $imgdata['name'] = $uniqid;

            ImageUpload::insertImage($imgdata,$mainimage = 0,$CategoryUID);

            $bigImg['org-name'] = $uniqid;

            $targetHeight = '130';


            file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/upload/morika/{$lastUID}/{$imgdata['name']}_thumb.jpg", base64_decode($image));
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/upload/morika/{$lastUID}/{$bigImg['org-name']}.jpg", base64_decode($image2));

            $a++;

        }

        $ImageArray = ImageUpload::selectPhotos($lastUID);
        //     error_log(print_r($imageArray,true));
        $ProductArray = ImageUpload::selectProduct();
        }



        require_once(ROOT . '/morika/admin.php');

        return true;
    }


    public static function showCategoryJson($Category,$tmp,$newTmp,$categoryArray){

                $NewCategory = ImageUpload::categoryNewParentChildTreemenu($tmp = '',$parentid = 0, $indicator = '');

                $icon = '<span class="material-icons CategoryShowIcon"  aria-hidden="true">chevron_right</span>&nbsp;';

                for($i = 0; $i < count($Category); $i++){
                    $space =  $Category[$i]["SPACE"];
                    $marginleft = $Category[$i]["MARGINLEFT"];
                    $isParent = false;
                    for($j = 0; $j < count($Category); $j++){
                        if ($Category[$j]['PARENT_UID'] == $Category[$i]['UID']) {
                            $isParent = true;
                        }
                    }
                    
                    $newTmp .='<li class="nav-item Category" data-id="'.$Category[$i]['UID'].'" parent-id="'.$Category[$i]['PARENT_UID'].'" value="'.$Category[$i]['CATEGORY_NAME'].'" id="draglist'.$Category[$i]['UID'].'" sort="'.$Category[$i]['SORT'].'" style="margin-left:'.$marginleft.'px;">';
                    if($isParent == true) {
                        $newicon = $Category[$i]["ICON"];
                        $newTmp .='<a href="#" data-text="'.$space.$Category[$i]['CATEGORY_NAME'].'" class="nav-link active">'.$icon.''.$space.''.$Category[$i]['CATEGORY_NAME'].'</a>';
                    }else{
                        $newTmp .='<a href="#" data-text="'.$space.$Category[$i]['CATEGORY_NAME'].'"  class="nav-link active">&nbsp;'.$space.''.$Category[$i]['CATEGORY_NAME'].'</a>';
                    }
                    
                    $newTmp .='</li>';
                }

                $categoryArray = array('tmp' => $NewCategory, 'newTmp' => $newTmp);
            
                die(json_encode($categoryArray));
    }



    public static function actionAdminpage(){

        $categoryArray = array();

        if(isset($_POST['selectproduct'])){
            $ProductArray = ImageUpload::selectProduct();
        }



        if(isset($_POST['DataLoad'])){

            $SearchValue = $_POST['SearchValue'];error_log($SearchValue);

            $ProductArray = ImageUpload::selectInfo($SearchValue);

        }

        if(isset($_POST['deleteproduct'])){

            $UID = $_POST['dataid'];

            ImageUpload::DeleteProduct($UID);

            $ProductArray = ImageUpload::selectProduct();
        }

        if(isset($_POST['editproduct'])){

            $bswhatever = $_POST['bswhatever'];
            $UID = $_POST['dataid'];

            $ProductInfo = array();
            $PhotoesArr = array();
            if($bswhatever = '@editProduct'){
                $ProductArray = ImageUpload::selectProductWithUID($UID);
                $ImageArray = ImageUpload::selectPhotos($UID);
                $categoryName = ImageUpload::selectCategory($ProductArray['CATEGORY_UID']);
                for($i = 0; $i < count($ImageArray); $i++){
                    $Photoes = array('Img_UID' => $ImageArray[$i]['UID'], 'ImgName' => $ImageArray[$i]['IMAGE_NAME']);
                    array_push($PhotoesArr, $Photoes);
                }
                $ProductInfo = array('UID' => $ProductArray['UID'], 'name' => $ProductArray['PRODUCT_NAME'], 'code' => $ProductArray['PRODUCT_CODE'], 'comment' => $ProductArray['PRODUCT_COMMENT'], 'imagename' => $PhotoesArr, 'categoryName' => $categoryName[0]['CATEGORY_NAME'],'categoryUID' => $categoryName[0]['UID']);
                die(json_encode($ProductInfo));
            }
        }

        require_once(ROOT . '/morika/adminpage.php');

        return true;
    }


    public static function actionDeleteImg(){

        if(isset($_POST['deleteImage'])){
            
            $UID = $_POST['dataid'];
            $ImageArray = $_POST['imgArray'];
            error_log(print_r($ImageArray,true));

            ImageUpload::DeleteImage($UID);
            ImageUpload::FileName($ImageArray);
        }
        require_once(ROOT . '/morika/adminpage.php');

        return true;
    }

    public static function actionUserpage(){

        $tmp = '';
        $newTmp = '';
        $categoryArray = array();

        if(isset($_POST['selectuserproduct'])){
            $ProductArray = ImageUpload::selectProduct();
        }
        

        if(isset($_POST['selectusercategory'])){
            $space="";
                $end = "";
                $icon = '<span class="material-icons CategoryShowIcon" aria-hidden="true">chevron_right</span>&nbsp;';
                
                $Category = array();
                $newicon = '';
                $Category = ImageUpload::categoryParentChildTreemenu($parentid = 0,$space,$marginleft = 0,$icon,$Category,$end);

                for($i = 0; $i < count($Category); $i++){
                    $space =  $Category[$i]["SPACE"];
                    $marginleft = $Category[$i]["MARGINLEFT"];
                    $isParent = false;
                    for($j = 0; $j < count($Category); $j++){
                        if ($Category[$j]['PARENT_UID'] == $Category[$i]['UID']) {
                            $isParent = true;
                        }
                    }
                    
                    $tmp .='<li class="nav-item Category" data-id="'.$Category[$i]['UID'].'" parent-id="'.$Category[$i]['PARENT_UID'].'" value="'.$Category[$i]['CATEGORY_NAME'].'" id="draglist'.$Category[$i]['UID'].'" sort="'.$Category[$i]['SORT'].'" style="margin-left:'.$marginleft.'px;">';
                    if($isParent == true) {
                        $newicon = $Category[$i]["ICON"];
                        $tmp .='<a href="#" data-text="'.$space.$Category[$i]['CATEGORY_NAME'].'" class="nav-link active">'.$icon.''.$space.''.$Category[$i]['CATEGORY_NAME'].'</a>';
                    }else{
                        $tmp .='<a href="#" data-text="'.$space.$Category[$i]['CATEGORY_NAME'].'"  class="nav-link active">&nbsp;'.$space.''.$Category[$i]['CATEGORY_NAME'].'</a>';
                    }
                    
                    $tmp .='</li>';
 
                }
            die($tmp);
        }


        if(isset($_POST['DataLoad'])){

            $SearchValue = $_POST['SearchValue'];

            $ProductArray = ImageUpload::selectInfo($SearchValue);

        }


        require_once(ROOT . '/morika/userpage.php');

        return true;
    }
}
?>