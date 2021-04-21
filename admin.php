<?php include ROOT . '/morika/header.php';?>
<?php include ROOT . '/morika/navbar.php';?>

<div class="whole_products">
  <div class="container-fluid main_products">

      <div class="headerForProducts">
        <h3 class="otherfont make_bold Product_list_title" style="margin-top:11px;">პროდუქციის ჩამონათვალი</h3>
        
        <button type="button" class="btn ProductUpload otherfont" data-bs-toggle="modal" data-bs-target=".addProductModal" data-bs-whatever="@addProduct">
          <span class="material-icons icon add_circle">add_circle</span>
          <span class="product_add_button" style="vertical-align:middle;">პროდუქტის დამატება</span>
        </button>
      </div>

      <div class="product_list">


          <!-- პროდუქტის წაშლის მოდალი -->
        
      </div> 
  </div>
</div>
<div class="modal modal_for_product_delete">    
  <div class=" modal-sm animate deletion_div">
      <h5 class="otherfont deleteModalTitle">გსურთ წაშლა?</h5>
      <div class="flex">
        <button type="button" class="btn btn-light border_blue otherfont border_6px" style="width:70px !important" onclick="closeDeleteModal()">არა</button>
        <button type="button" class="btn btn-primary otherfont border_6px" style="width:70px !important">დიახ</button>
      </div>
  </div>
</div>

<!-- კატეგორიის დამატების მოდალი -->
<div class="modal fade scale-up-center addCategoryModal" id="showaddModal" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollableg">
    <div class="modal-content">
      <div class="modal-header" style="color: white;">
        <h5 class="modal-title otherfont" id="exampleModalLabel1">მეთოდები კატეგორიებზე</h5>
        <span class="material-icons" data-bs-dismiss="modal" aria-label="Close" style="color: white; cursor: pointer;">close</span>
      </div>
      <!-- <form class="addCategory"> -->
      <div class="modal-body" id="ModalBody">
        <div class="ContextDiv">
        <ol class="list-group list-group-numbered">
          <li class="list-group-item addNewCategory" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-bs-whatever="@addCategory"><span class="material-icons" style="color: #46abe6;">folder</span>&nbsp;კატეგორიის დამატება</li>
          <li class="list-group-item addTreeCategory" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-bs-whatever="@treeCategory"><span class="material-icons" style="color: #dc4a12;">perm_media</span>&nbsp;ქვეკატეგორიის დამატება</li>
          <li class="list-group-item EditSpaceButton" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-bs-whatever="@editCategory"><span class="material-icons" style="color: #1bb127;">edit</span>&nbsp;კატეგორიის რედაქტირება</li>
          <li class="list-group-item DeleteList" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-bs-whatever="@delCategory"><span class="material-icons" style="color: #ad211a;">delete</span>&nbsp;კატეგორიის წაშლა</li>
        </ol>
        </div>
        <div class="container">
            <div style="display: flex; margin-left: 25px; margin-bottom: 30px;">
              <div class=" margin_bottom" data-id="" parent-id=""></div>
                <div style="width: 185px;">
                  <label for="ChildInput" style="margin-bottom: 10px;">კატეგორიის დამატება</label>
                  <input class="addNewChildInput" id="addNewChildInput" type="text" autocomplete="off">
                </div>
                <div class="CategoryChildDiv" style="top: 34px;">
                  <span class="material-icons addParentCategory" parent-id="" style="color: #2bd030; font-weight: bold;">done</span>
                  <span class="material-icons removeParentCategory" parent-id="" style="color: red; font-weight: bold;">close</span>
                </div>
              </div>
          <div class="addDiv border-left" parent_id="0">
              
          </div>
        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="submit" class="btn btn-primary SaveBtn" data-bs-dismiss="modal" id="liveToastBtn">შენახვა</button>
      </div> -->
      <!-- </form> -->
    </div>
  </div>
</div>

<!-- კატეგოტიებზე მეთოდი -->
<div class="modal fade scale-up-center CategoryModal" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="box-shadow: 0 0px 10px rgb(0 0 0 / 30%);">
      <div class="modal-header" style="background-color: #2d69a7; color: white;">
        <h5 class="modal-title otherfont" id="exampleModalLabel2"></h5>
        <span class="material-icons" data-bs-dismiss="modal" aria-label="Close" style="color: white; cursor: pointer;">close</span>
      </div>
      <form class="methodCategory">
        <div class="modal-body " >
          <div class="CategoryInfo" style="display: flex; align-items: center;">
              
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary SaveBtn" data-bs-dismiss="modal" id="liveToastBtn">შენახვა</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- პროდუქტის დამატების მოდალი -->
<div class="modal fade scale-up-center addProductModal" id="addProductModalId" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content" style="border-radius:10px;">
      <div class="modal-header" style="background-color: #2d69a7; color: white;">
        <h5 class="modal-title otherfont" id="exampleModalLabel3">პროდუქტის დამატება</h5>
        <span class="material-icons" data-bs-dismiss="modal" aria-label="Close" style="color: white; cursor: pointer;">close</span>
      </div>
      <form class="addCategory">
      <div class="modal-body" >
          <div class="row">
            <div class="col-lg-4" style="margin-top:18px;">
              <div class="">
                  <label for="recipient-name" class="col-form-label input_title otherfont">დასახელება:</label>
                  <input type="text" class="form-control inputForProducts" id="ProductName" autocomplete="off">
              </div>
    
              <div class="">
                <label for="recipient-name" class="col-form-label input_title otherfont">კოდი:</label>
                <input type="text" class="form-control inputForProducts" id="ProductCode" autocomplete="off">
              </div>

              <button class="Open_Categories otherfont"type="button" id="Product_category"  style="margin-top:10px;" onclick ="Open_Categories()">აირჩიეთ კატეგორია</button>

              <div class="add_category is_hidden">
                <div class="Add_category border-left">
                  
                </div>
              </div>
                
              
              

              <div class="form-floating textarea inputForProducts" style="margin-top:25px">
                <textarea class="form-control " placeholder="Leave a comment here" id="Product_comment"></textarea>
                <label for="floatingTextarea" class="otherfont " style="font-weight:500;">კომენტარი...</label>
              </div>
              
            </div>

            <div class="col-lg-8">
                <div class="container make_left_border" style="padding-left:0px !important;">
                  <h5 class="otherfont input_title" style = "margin-left: 20px;
    margin-top: 22px; font-weight: 500; margin-bottom: 0px;">ფოტოები</h5>
                  <div class="row images wrapper" id="images" onchange="ChangeMainElement()">
                            
                  </div> 
                </div>
                <p align="center" class="otherfont" style="font-size:13px; color: #5E5F5F;;">მთავარი ფოტოს შესაცვლელად გადააადგილეთ ფოტო პირველ ადგილზე.</p>
            </div>
          

      <!-- ფოტოების წაშლის მოდალი -->
      <div id="${date}" class="modal modalforDelete ">    
        <div class=" modal-sm animate deletion_div">
            <h5 class="otherfont deleteModalTitle">გსურთ წაშლა?</h5>
            <div class="flex">
              <button type="button" class="btn btn-light border_blue otherfont border_6px" style="width:70px !important" onclick="closeDeleteModal()">არა</button>
              <button type="button" class="btn btn-primary otherfont border_6px delProduct" style="width:70px !important">დიახ</button>
            </div>
        </div>
      </div>


      <div class="modal-footer ProductFooter">
        <div class="main_color" onclick="selectFile()" style="border-radius: 5px;">
          <input type="file" id="upload-file" onchange="uploads(event)"  multiple="" accept="image/*"hidden/>
          <label for="actual-btn" class="addPhoto otherfont main_color" >ფოტოს დამატება</label>
        </div>
        <span class="message otherfont" style="color:#5E5F5F;position:relative; font-size:14px;"><span class="material-icons" style="font-size:18px">error_outline</span>&nbsp;ფოტოების მაქსიმალური რაოდენობა: 10</span>
        <button type="submit" class="btn btn-primary otherfont main_color Product_save_b" onclick="Update_Product(this)" data-bs-dismiss="modal" id="liveToastBtn">შენახვა</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="toast align-items-center text-white border-0 position-fixed bottom-0 end-0 p-3 scale-up-center showtoast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
      
    </div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>

<div class="col-lg-12 pagination-position">
    <?php  
    // echo $pagination->get(); 
    ?>
</div>

<?php include ROOT .'/morika/footer.php';?>


<script>
$(document).ready(function(){

  $.post('/adminpage',
    {
      selectproduct: 'selectproduct'
    },
    function(data){
        $('.product_list').html(data);

    })

    $.post('/admin',
    {
      selectcategoryList: 'selectcategoryList'
    },
    function(data){
        if(data == '0'){
            // window.location.href = "https://gsoft.ge/morika/index.php";
        }else{
            $('.adminCategoryList').html(data);

            var categories = document.querySelector(".adminCategoryList").children;

            for (var i=0; i<categories.length; i++){
              if (categories[i].getAttribute("parent-id")!= 0){
                categories[i].style.display = "none";
              };
            }

        }
        
    })


})


function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

const dragArea = document.querySelector(".wrapper");
    new Sortable(dragArea,{
    animation: 350
});


// var exampleModal = document.getElementById('addProductModalId')
// exampleModal.addEventListener('show.bs.modal', function (event) {
//   // Button that triggered the modal
//   var button = event.relatedTarget
//   // Extract info from data-bs-* attributes
//   var recipient = button.getAttribute('data-bs-whatever')

//     if(recipient == '@addCategory'){

//       $(".addDiv").attr('data-bs-whatever');

//       $('#exampleModalLabel').text('კატეგორიის დამატება');
//     }

// })


function selectFile(){
    document.getElementById("upload-file").click()
} 

function toDataURL(src,callback){
        
    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
        var reader = new FileReader();
        reader.onloadend = function() {
            callback(reader.result);    
        }
        reader.readAsDataURL(xhr.response);
    };
    xhr.open('GET', src);
    xhr.responseType = 'blob';
    xhr.send();
}

function ImageRatioThumb(srcimage,a){


var data = srcimage;

var image = new Image();

image.src = data;

image.onload = function() {

    
    var imgSize = {
        w: image.width,
        h: image.height
    };

    var orgheight = (parseInt(imgSize.h,10));
    var orgwidth =  (parseInt(imgSize.w,10));

    var maxWidth = 100; // Max width for the image
    var maxHeight = 100;    // Max height for the image
    var ratio = 0;  // Used for aspect ratio
    var width = orgwidth;    // Current image width
    var height = orgheight;  // Current image height

    // Check if the current width is larger than the max
        

    var canvas = document.createElement("canvas");
    var ctx = canvas.getContext("2d");


    if(width > maxWidth){
        ratio = maxWidth / width; 
        height = height * ratio;    
        width = width * ratio;   

        canvas.width = width; 
        canvas.height = height; 
    }

    if(height > maxHeight){
        ratio = maxHeight / height; 
        width = width * ratio;    
        height = height * ratio;
        
        canvas.width = width; 
        canvas.height = height; 
    }

    ctx.drawImage(image, 
    0, 0, image.width, image.height, 
    0, 0, canvas.width, canvas.height
    );

    $('.Rest-images').eq(a).attr({'src':canvas.toDataURL()});
    // return canvas.toDataURL();
};


}
//სურათის ზომების მოჭრა დასასრული

function ImageRatio(srcimage,a){


var data = srcimage;

var image = new Image();

image.src = data;

image.onload = function() {

    var imgSize = {
        w: image.width,
        h: image.height
    };

    var orgheight = (parseInt(imgSize.h,10));
    var orgwidth =  (parseInt(imgSize.w,10));

    
    var canvas = document.createElement("canvas");
    var ctx = canvas.getContext("2d");

    if(orgwidth>orgheight)
    {
        var newheight = 1080 / (orgwidth/orgheight);
        canvas.width = 1080; 
        canvas.height = newheight;
    }else{
        var newwidth = 1080 / (orgheight/orgwidth); 
        var newheight = 700 / (orgheight/orgwidth);
        canvas.width = newwidth; 
        canvas.height = newheight;
    }
    ctx.drawImage(image, 
    0, 0, image.width, image.height, 
    0, 0, canvas.width, canvas.height,
    );

        
    $('.Rest-images').eq(a).attr({'org-src':canvas.toDataURL()});
    $('.BigRest-image').eq(a).attr({'src':canvas.toDataURL()});
    $('.mySlides').eq(a).attr({'src':canvas.toDataURL()});
    $('.load_count').eq(a).attr({'style':" display:none;"});
    // return canvas.toDataURL();

};

}


//ფოტოს ატვირთვა.
const uploads = (event) => {


let files = event.target.files
let images = document.getElementById("images")

var imgsrc = [];

for (let i = 0; i < files.length; i++) {
    
    let src = URL.createObjectURL(files[i])
    // var item = event.clipboardData.files;
    // uploadFile(item.getAsFile());
    toDataURL(src, function(dataUrl) {
        
        // images.innerHTML += `<div class="loadImage"></div>`
        var a = $('#images').children().length;

        var date = Date.now();

        // setTimeout(function(){
        images.innerHTML += `<div class="container containerImg AddImgCount${a}" data-count="${a}" >

          <div class="small_image_parent">
            <img class="Rest-images New_Img" onclick="openModal(${date})" data-count="${a}" src="" org-src="">
          </div>
          

          <div class="loader load_count"></div>

          <div class="input">
          <div class="dropdown-edit">
            <span class="edit_toggle">. . .</span>
            <div class="dropdown-edit-content">
              <p class="editor-function"><span class="material-icons " data-id = "${date}" onclick="openDeleteModal('.modalforDelete', ${date})" style="font-size:20px;">delete</span></p>
            </div>
          </div>

            <!--<span class="material-icons dish-icon showRestImg" data-count="${a}"  onclick="openModal(${date})" data-toggle="tooltip" data-placement="bottom" title="დათვალიერება">visibility</span>-->
            <!--<span class="material-icons dish-icon default-icon CheckImg CheckRestImg" data-count="${a}"   main-img="0" data-toggle="tooltip" data-placement="bottom" title="მთავარი სურათი">inbox</span> -->
            <!--<span class="material-icons dish-icon deleteImg deleteNewRestImg" data-toggle="modal" data-target=".modal-deleteImg" onclick="openDeleteModal(${date})" data-toggle="tooltip" data-placement="bottom" title="წაშლა">delete</span>-->
          </div>
          <p class="main hidden otherfont main_color">მთავარი</p>

          <div id="${date}" class="modal modalforPhoto " ">
            <span class="material-icons modal_close_icon" onclick="document.getElementById(${date}).style.display='none'">
              close
            </span>

            <div class="fullImg center">
              <img class="BigRest-image shadow img-fluid"  src="">
              <br>
              <span class="material-icons previous"  onclick="next(${date}, -1)">
                arrow_back_ios_new
              </span>
              <span class="material-icons next"  onclick="next(${date}, 1)">
                arrow_forward_ios
              </span>
              
            </div>
        </div>`

        if (a==0){
          ChangeMainElement();
        } 
        
        var b = ImageRatioThumb(src,a);
        var c = ImageRatio(src,a);
    })
   
    
}
}

//მთავარი ფოტოს შეცვლა
function ChangeMainElement() {
  var arr = document.querySelector(".images");
  arr.children[0].children[3].classList.remove("hidden");

  for (var i=1; i<arr.children.length; i++){
    arr.children[i].children[3].classList.add("hidden")
  }
}


// ფოტოების მოდალის გახსნა
function openModal(e) {

  modal_is_open = true;

  opened_modal_id = e;

  document.getElementById(e).style.display = "block";

  var modal = document.getElementById(e);


  window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        modal_is_open =false;
    }
  }
}

// ფოტოს წაშლის მოდალი და ამავდროულად პროდუქტების წაშლის მოდალი.
function openDeleteModal(str,e){
  var modal = document.querySelector(str);
  //str არის მოდალის დასახელება კლასებში.
  console.log(str);
  //რექვესტის გასაკეთებლად პროდუქტის წაშლისთვის.

  modal.style.display = "block";

  window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
  }

  console.log(e);
  modal.children[0].children[1].children[1].setAttribute("onclick", "deleteElement("+e+")");

}


function openNewDeleteModal(str,e){
  var modal = document.querySelector(str);
  //str არის მოდალის დასახელება კლასებში.

  modal.style.display = "block";

  window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
  }

  modal.children[0].children[1].children[1].setAttribute("onclick", "deleteElement("+e.getAttribute("data-id")+")");

  let dataid = e.getAttribute('data-id');
  if(dataid){
    
    let name = e.getAttribute('image-name');
    let parentid = e.getAttribute('image-parent');
    modal.children[0].children[1].children[1].setAttribute("data-id", dataid);
    modal.children[0].children[1].children[1].setAttribute("image-name", name);
    modal.children[0].children[1].children[1].setAttribute("image-parent", parentid);
  }
}

function deleteElement(str){

  console.log(str);

  var elem = $("[data-id="+str+"]")[0];

  console.log(elem);

  console.log(elem.closest(".containerImg"));

  elem.closest(".containerImg").remove();
  //console.log(str);
  //document.getElementById(str).parentElement.remove();
  closeDeleteModal();
  ChangeMainElement();
}

//ფოტოს წაშლა
function closeDeleteModal(){
  var modal = document.querySelector(".modalforDelete");
  var modal1 = document.querySelector(".modal_for_product_delete");
  modal_is_open =false;
  modal.style.display = "none";
  modal1.style.display = "none";
}

var imgArray = [];

//შემდეგ ფოტოზე გადასვლა
function next(e,direction){ 
  var modal = document.getElementById(e);

  var parent = modal.parentElement.parentElement.children;

  for (var i=0; i<parent.length; i++){
    if (e == parent[i].children[4].id){
      parent[i].children[4].style.display = "none";
      if (i+direction==parent.length){
        openModal(parent[0].children[4].id);
        return;
      }
      if (i+direction<0){
        openModal(parent[parent.length-1].children[4].id);
        return;
      } 
      openModal(parent[i+direction].children[4].id);
    }
  }
}

//ფოტოების გადაცვლა keyup-ზე.
var modal_is_open = false;
var opened_modal_id;

document.addEventListener("keyup", (event) => {

  if (event.keyCode == 37 && modal_is_open){
    console.log(opened_modal_id);
    next(opened_modal_id,-1);
  }
  if (event.keyCode == 39 && modal_is_open){
    next(opened_modal_id, 1);
  }
});





</script>