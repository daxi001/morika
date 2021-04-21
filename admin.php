
<?php include './header.php';?>
<nav class="navbar navbar-light" style="background-color: #1f5881; height: 50px;">
<div class="container-fluid NavbarContainer">
    <!-- <a class="navbar-brand">Navbar</a> -->

    <span class="material-icons hidden_sidebar_icon" onclick = "openSideBar()">
      menu
    </span>
    <h3 class="SiteTitle otherfont">მორიკა</h3>

    
    <!-- <div> -->
      <form class="d-flex">
          <input class="form-control me-2 Searchinput" type="search" placeholder="Search" aria-label="Search">
      </form>
    <!-- </div> -->
    <span class="material-icons SearchIcon">search</span>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end NavMenu">
  
        <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn"><span class="material-icons NavMenuSpan">more_vert</span></button>
            <div id="myDropdown" class="dropdown-content">
                <a class="addCategoryBtn" href="#home"  data-bs-toggle="modal" data-bs-target=".addCategoryModal" data-bs-whatever="@addCategory"><span class="material-icons logoutIcon">add</span>&nbsp;კატეგორიის დამატება</a>
                <!-- <a href="#about" data-bs-toggle="modal" data-bs-target=".addProductModal" data-bs-whatever="@addProduct"><span class="material-icons logoutIcon">add</span>&nbsp;პროდუქტის დამატება</a> -->
                <a href="#contact"><span class="material-icons logoutIcon">logout</span>&nbsp;გასვლა</a>
            </div>
        </div>
    </div>
    
  </div>
</nav>

<div class="d-flex flex-column p-3 text-white bg-dark CategoryBar" >
<h3 class="otherfont">კატეგორია</h3>
  <ul class="nav nav-pills flex-column mb-auto adminCategoryList">

  </ul>
</div>

<div class="whole_products">
<div class="container-fluid main_products">
    <div class="headerForProducts">
      <h3 class="otherfont make_bold Product_list_title" style="margin-top:11px;">პროდუქციის ჩამონათვალი</h3>
      
      <button type="button" class="btn ProductUpload otherfont" data-bs-toggle="modal" data-bs-target=".addProductModal">
        <span class="material-icons icon add_circle">add_circle</span>
        <span class="product_add_button" style="vertical-align:middle;">პროდუქტის დამატება</span>
      </button>
    </div>

    <div class="grid-container product_list" style=" margin-top:35px;">
      <!-- <div class="row"> -->
      <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
        <div class="col-lg-4 col-md-6 product_card">
          <div class="card shadow" style="width: auto;">
            <img src="/upload/Restaurant_Image/Menu_Image/1/5f8476d23b76e.jpg" class="card-img-top" alt="...">
            <div class="product-button-parent"style="position:absolute; top:4px; right:7px; display:flex; flex-direction:column;">
      
              <span class="edit_toggle Product_button"><span class="material-icons" style="font-size:30px; ">arrow_drop_down</span></span>
              <div class="Product-edit-content">
                <p class="Product-editor-function" data-bs-toggle="modal" data-bs-target=".addProductModal"><span class="material-icons "  style="font-size:30px; color:yellow;" onclick="OpenRedactModal()">edit</span></p>
                <p class="Product-editor-function" ><span class="material-icons "  style="font-size:30px; color:red;" onclick="openDeleteModal('.modal_for_product_delete', this)">delete</span></p>
              </div>
            
            </div>
            <div class="card-body">
              <h5 class="card-title otherfont">დასახელება</h5>
              <p class="card-text otherfont card-explane" style="margin-bottom: 0px;">კოდი: 12345</p>
              <p class="card-text otherfont card-explane ">კატეგორია: კატეგორია1</p>
              <p class="card-text otherfont card-explane" style="font-size:12px !important; display:inline-block; width:180px;">კომენტარo შეზღუდული რaოდენობ...</p>
              <a href="#" class="see_button hover otherfont" style="float:right; font-size:15px; text-align:center;">სრულად</a>
            </div>
          </div>
        </div> 
     

        <div class="col-lg-4 col-md-6 product_card">
          <div class="card shadow" style="width: auto;">
            <img src="/upload/Restaurant_Image/Menu_Image/1/5f8476d23b76e.jpg" class="card-img-top" alt="...">
            <div class="product-button-parent"style="position:absolute; top:4px; right:7px; display:flex; flex-direction:column;">
      
              <span class="edit_toggle Product_button"><span class="material-icons" style="font-size:30px; ">arrow_drop_down</span></span>
              <div class="Product-edit-content"  >
                <p class="Product-editor-function"><span class="material-icons "  style="font-size:30px; color:yellow;">edit</span></p>
                <p class="Product-editor-function"><span class="material-icons "  style="font-size:30px; color:red;">delete</span></p>
              </div>
            
            </div>
            <div class="card-body">
              <h5 class="card-title otherfont">დასახელება</h5>
              <p class="card-text otherfont card-explane" style="margin-bottom: 0px;">კოდი: 12345</p>
              <p class="card-text otherfont card-explane">კატეგორია: კატეგორია1</p>
              <p class="card-text otherfont card-explane" style="font-size:12px !important; display:inline-block; width:180px;">კომენტარი: კომენტარo შეზღუდული რაოდენ...</p>
              <a href="#" class="see_button hover otherfont" style="float:right; font-size:15px; text-align:center;">სრულად</a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 product_card">
          <div class="card shadow" style="width: auto;">
            <img src="/upload/Restaurant_Image/Menu_Image/1/5f8476d23b76e.jpg" class="card-img-top" alt="...">
            <div class="product-button-parent"style="position:absolute; top:4px; right:7px; display:flex; flex-direction:column;">
      
              <span class="edit_toggle Product_button"><span class="material-icons" style="font-size:30px; ">arrow_drop_down</span></span>
              <div class="Product-edit-content">
                <p class="Product-editor-function"><span class="material-icons "  style="font-size:30px; color:yellow;">edit</span></p>
                <p class="Product-editor-function"><span class="material-icons "  style="font-size:30px; color:red;">delete</span></p>
              </div>
            
            </div>
            <div class="card-body">
              <h5 class="card-title otherfont">დასახელება</h5>
              <p class="card-text otherfont card-explane" style="margin-bottom: 0px;">კოდი: 12345</p>
              <p class="card-text otherfont card-explane">კატეგორია: კატეგორია1</p>
              <p class="card-text otherfont card-explane" style="font-size:12px !important; display:inline-block; width:180px;">კომენტარი: კომენტარo შეზღუდული რაოდენ...</p>
              <a href="#" class="see_button hover otherfont" style="float:right; font-size:15px; text-align:center;">სრულად</a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 product_card">
          <div class="card shadow" style="width: auto;">
            <img src="/upload/Restaurant_Image/Menu_Image/1/5f8476d23b76e.jpg" class="card-img-top" alt="...">
            <div class="product-button-parent"style="position:absolute; top:4px; right:7px; display:flex; flex-direction:column;">
      
              <span class="edit_toggle Product_button"><span class="material-icons" style="font-size:30px; ">arrow_drop_down</span></span>
              <div class="Product-edit-content">
                <p class="Product-editor-function"><span class="material-icons "  style="font-size:30px; color:yellow;">edit</span></p>
                <p class="Product-editor-function"><span class="material-icons "  style="font-size:30px; color:red;">delete</span></p>
              </div>
            
            </div>
            <div class="card-body">
              <h5 class="card-title otherfont">დასახელება</h5>
              <p class="card-text otherfont card-explane" style="margin-bottom: 0px;">კოდი: 12345</p>
              <p class="card-text otherfont card-explane">კატეგორია: კატეგორია1</p>
              <p class="card-text otherfont card-explane" style="font-size:12px !important; display:inline-block; width:180px;">კომენტარი: კომენტარo შეზღუდული რაოდენ...</p>
              <a href="#" class="see_button hover otherfont" style="float:right; font-size:15px; text-align:center;">სრულად</a>
            </div>
          </div>
        <!-- </div> -->

        <!-- პროდუქტის წაშლის მოდალი -->
      <div class="modal modal_for_product_delete">    
        <div class=" modal-sm animate deletion_div">
            <h5 class="otherfont deleteModalTitle">გსურთ წაშლა?</h5>
            <div class="flex">
              <button type="button" class="btn btn-light border_blue otherfont border_6px" style="width:70px !important" onclick="closeDeleteModal()">არა</button>
              <button type="button" class="btn btn-primary otherfont border_6px" style="width:70px !important">დიახ</button>
            </div>
        </div>
      </div>


      </div>
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
          <div class="addDiv border-left" style="" parent_id="0">
              
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

              <button class="Open_Categories otherfont"type="button" style="margin-top:10px;" onclick ="Open_Categories()">აირჩიეთ კატეგორია</button>

              <div class="add_category is_hidden">
                <div class="Add_category border-left">
                  <!--
                  <div class="block margin_bottom" onclick="checker(2, this)" children_is_hidden = "0">	
                    <i class="fas fa-chevron-down"></i>
                  </div>
                  <span class="category_alone" onclick="Choose_Category('კატეგორია 1')">კატეგორია 1</span>

    
                  <div class="border-left is_hidden" parent_id="1" id="2">
                    <div class="lines"></div>
                    <div class="block margin_bottom" onclick="checker(3, this)" children_is_hidden = "0">
                      <i class="fas fa-chevron-down"></i>
                    </div>
                    <span class="category_alone" onclick="Choose_Category('კატეგორია 2')">კატეგორია 2</span>
                    <div class="border-left is_hidden"  parent_id="2" id="3">
                      <div class="lines"></div>
                      <div class="block margin_bottom" onclick="checker(-1, this)" children_is_hidden = "0">
                        <i class="fas fa-chevron-down"></i>
                      </div>
                      <span class="category_alone" onclick="Choose_Category('კატეგორია 3')">კატეგორია 3</span>
                    </div>
                  
                  
                    <div class="block margin_bottom" onclick="checker(4, this)" children_is_hidden = "0">
                      <i class="fas fa-chevron-down"></i>
                    </div>
                    <span class="category_alone" onclick="Choose_Category('კატეგორია 4')">კატეგორია 4</span>
                    <div class="border-left is_hidden " parent_id="2", id="4">
                      <div class="lines"></div>
                      <div class="block margin_bottom" onclick="checker(5, this)" children_is_hidden = "0">
                        <i class="fas fa-chevron-down"></i>
                      </div>
                      <span class="category_alone" onclick="Choose_Category('კატეგორია 5')">კატეგორია 5</span>
                      <div class="border-left is_hidden" parent_id="4" id="5">
                        <div class="lines"></div>
                        <div class="block margin_bottom">
                          <i class="fas fa-chevron-down"></i>
                        </div>
                        <span class="category_alone" onclick="Choose_Category('კატეგორია 6')">კატეგორია 6</span>
                      </div>
                    </div>
                  </div>

                  <div class="block margin_bottom" onclick="checker(6, this)" children_is_hidden = "0">
                    <i class="fas fa-chevron-down"></i>
                  </div>
                  <span class="category_alone" onclick="Choose_Category('კატეგორია 5')">კატეგორია 5</span>
                  <div class="border-left is_hidden" parent_id="0" id="6">
                    <div class="lines"></div>
                    <div class="block margin_bottom">
                      <i class="fas fa-chevron-down"></i>
                    </div>
                    <span class="category_alone" onclick="Choose_Category('კატეგორია 6')">კატეგორია 6</span>
                  </div>-->
                </div>
</div>
                
              
              

              <div class="form-floating textarea inputForProducts" style="margin-top:25px">
                <textarea class="form-control " placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                <label for="floatingTextarea" class="otherfont "style="font-weight:500;">კომენტარი...</label>
              </div>
              
            </div>
              <div class="col-lg-8">
                <div class="container make_left_border" style="padding-left:0px !important;">
                  <h4 class="otherfont" style = "text-align:center; margin-left: 50px; font-weight: 500; margin-bottom: 0px;">ფოტოები</h4>
                  <div class="row images wrapper" id="images" onchange="ChangeMainElement()">
                            
                  </div> 
                </div>
                <p align="center" class="otherfont" style="font-size:13px; color: #5E5F5F;;">მთავარი ფოტოს შესაცვლელად გადააადგილეთ ფოტო პირველ ადგილზე.</p>
              <!-- <div class="upload-btn imgUpload" onclick="selectFile()">
                  <i class="fas fa-cloud-upload-alt"></i>
                  <span>Choose files to Upload</span>
                  <input type="file" id="upload-file" onchange="uploads(event)" multiple="" accept="image/*">
              </div>
            </div>
          </div>
      </div>

      <!-- ფოტოების წაშლის მოდალი -->
      <div id="${date}" class="modal modalforDelete ">    
        <div class=" modal-sm animate deletion_div">
            <h5 class="otherfont deleteModalTitle">გსურთ წაშლა?</h5>
            <div class="flex">
              <button type="button" class="btn btn-light border_blue otherfont border_6px" style="width:70px !important" onclick="closeDeleteModal()">არა</button>
              <button type="button" class="btn btn-primary otherfont border_6px" style="width:70px !important">დიახ</button>
            </div>
        </div>
      </div>


      <div class="modal-footer ProductFooter">
        <div class="" onclick="selectFile()">
          <input type="file" id="upload-file" onchange="uploads(event)"  multiple="" accept="image/*"hidden/>
          <label for="actual-btn" class="addPhoto otherfont" >ფოტოს დამატება</label>
        </div>
        <span class="message otherfont" style="color:#5E5F5F;position:relative; font-size:14px;"><span class="material-icons" style="font-size:18px">error_outline</span>&nbsp;ფოტოების მაქსიმალური რაოდენობა: 10</span>
        <button type="submit" class="btn btn-primary SaveBtn otherfont" data-bs-dismiss="modal" id="liveToastBtn">შენახვა</button>
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

<?php include './footer.php';?>


<script>
$(document).ready(function(){
    $.post('/admin',
    {
        selectcategory: 'selectcategory'
    },
    function(data){
        if(data == '0'){
            window.location.href = "https://gsoft.ge/morika/index.php";
        }else{
            $('.adminCategoryList').html(data);

            var categories = document.querySelector(".adminCategoryList").children;

            for (var i=0; i<categories.length; i++){
              if (categories[i].getAttribute("parent-id")== 0){
                categories[i].style.display = "block";
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
          <img class="Rest-images" onclick="openModal(${date})" data-count="${a}" src="" org-src="">
          

          <div class="loader load_count"></div>

          <div class="input">
          <div class="dropdown-edit">
            <span class="edit_toggle">. . .</span>
            <div class="dropdown-edit-content">
              <p class="editor-function"><span class="material-icons " onclick="openDeleteModal('.modalforDelete', ${date})" style="font-size:20px;">delete</span></p>
            </div>
          </div>

            <!--<span class="material-icons dish-icon showRestImg" data-count="${a}"  onclick="openModal(${date})" data-toggle="tooltip" data-placement="bottom" title="დათვალიერება">visibility</span>-->
            <!--<span class="material-icons dish-icon default-icon CheckImg CheckRestImg" data-count="${a}"   main-img="0" data-toggle="tooltip" data-placement="bottom" title="მთავარი სურათი">inbox</span> -->
            <!--<span class="material-icons dish-icon deleteImg deleteNewRestImg" data-toggle="modal" data-target=".modal-deleteImg" onclick="openDeleteModal(${date})" data-toggle="tooltip" data-placement="bottom" title="წაშლა">delete</span>-->
          </div>
          <p class="main hidden otherfont">მთავარი</p>

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
  
  //რექვესტის გასაკეთებლად პროდუქტის წაშლისთვის.
  if (str == ".modal_for_product_delete"){

    e = e.closest(".card");
  }

  modal.style.display = "block";

  window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
  }
  modal.children[0].children[1].children[1].setAttribute("onclick", "deleteElement("+e+")");
}


//ფოტოს წაშლა
function closeDeleteModal(){
  var modal = document.querySelector(".modalforDelete");
  var modal1 = document.querySelector(".modal_for_product_delete");
  modal_is_open =false;
  modal.style.display = "none";
  modal1.style.display = "none";
}

function deleteElement(e){
  document.getElementById(e).parentElement.remove();
  closeDeleteModal();
  ChangeMainElement()
}

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


//კატეგორიების გამოჩენა-დამალვა.
$(document).on('click','.CategoryShowIcon',function(e){


e.preventDefault();

var id = $(this).closest('li').attr('data-id');
var ischildhiden =  $(this).closest('li').attr('ischildhiden');

if(ischildhiden == 0){

    hideChilds(id); 
    $(this).css('transform','rotate(0deg)')
    $(this).attr('ischildhiden',1);
    $(this).closest('li').attr('ischildhiden', "1");

}else{
  showChilds(id);
    $(this).css('transform','rotate(90deg)')
    $(this).attr('ischildhiden',0);
    $(".CategoryList").each(function(){
    
        if($(this).attr('parent-id') == id) { 
            $(this).show(0);
        }
    });

    $(this).closest('li').attr('ischildhiden', "0");
}

});


//კატეგორიებში შვილების დასამალი რეკურსიული ფუნქცია.
function hideChilds(pid){

    var data = $('.adminCategoryList').find("[parent-id='" + pid + "']");

    for(var i = 0; i < data.length; i++){
        
        var id = data.eq(i).attr('data-id');


        if ($("[data-id ="+id+"]").length==2){
          //console.log($("[data-id ="+id+"]")[0].children[0].children[0].style.transform ="rotate(0deg)");
          $("[data-id ="+id+"]")[0].children[0].children[0].style.transform ="rotate(0deg)"
        }

        data.eq(i).hide(0);
        hideChilds(id);
        data.eq(i).attr('ischildhiden', "1");  
    } 

}

//კატეგორიებში შვილების გამოსაჩენი ფუნქცია (არა რეკურსიული).
function showChilds(pid){
    var data =  $('.adminCategoryList').find("[parent-id='" + pid + "']");

    for (var i=0; i<data.length; i++){
      //console.log(data.eq(i));
      data.eq(i).show(0);
    }

}


//საიდბარის გამოჩენა-გაქრობა ეკრანის ზომებზე.

function openSideBar(){
  var sideBar = document.querySelector(".CategoryBar");

  if (sideBar.classList.contains("is_visible")){
    sideBar.classList.remove("is_visible");
  }else{
    sideBar.classList.add("is_visible");
  }
  
}


//კატეგორიების select-ის ფუნქციონალი.

// function checker(n,arr){
//   if (arr.getAttribute("children_is_hidden")==0){
//       arr.setAttribute("children_is_hidden",1);
//       openChild(n,arr);
//   }else{
//     hideChild(n,arr);
//     arr.setAttribute("children_is_hidden",0);
//   }
// }

// function hideChild(n,arr){

//   arr = arr.parentElement.querySelectorAll(".border-left");

//   for (var i=0; i<arr.length; i++){
//     if(arr[i].getAttribute("id")==n){
//       arr[i].classList.add("is_hidden");
      
//     }
//   }
// }

// function openChild(n,arr){
//   arr = arr.parentElement.querySelectorAll(".border-left");

//   for (var i=0; i<arr.length; i++){
//     if(arr[i].getAttribute("id")==n){
//       arr[i].classList.remove("is_hidden");
//     }
//   }

// }

$(document).on('click','.showMe',function(e){

e.preventDefault();


var id = $(this).parent('div').attr('data-id');console.log(id);
var ischildhiden =  $(this).attr('ischildhiden');

    
if(ischildhiden == 1){

    $(this).text('add')
    $(this).attr('ischildhiden',0);

}else{
    $(this).text('remove')
    $(this).attr('ischildhiden',1);


}});

function checker(n,arr){

        console.log("123");
        
        if (arr.getAttribute("children_is_hidden")==0){
            arr.setAttribute("children_is_hidden",1);
            openChild(n,arr);
        }else{
          hideChild(n,arr);
          arr.setAttribute("children_is_hidden",0);
        }
      }
      
      function hideChild(n,arr){
      
        arr = arr.closest('.Add_category').querySelectorAll(".border-left");
      
        for (var i=0; i<arr.length; i++){
          if(arr[i].getAttribute("data-id")==n){
            arr[i].classList.add("is_hidden");
            
          }
        }
      }
      
      function openChild(n,arr){
        
        arr = arr.closest('.Add_category').querySelectorAll(".border-left");

        for (var i=0; i<arr.length; i++){
          if(arr[i].getAttribute("data-id")==n){
            arr[i].classList.remove("is_hidden");
          }
        }
      
      }

function Open_Categories(){
  if (document.querySelector(".add_category").classList.contains("is_hidden")){

    $.post("/admin",{

      Product_Category: "Product_Category",

    },function(data){
      $(".Add_category").html(data);
    })

    document.querySelector(".add_category").classList.remove("is_hidden");
    document.querySelector(".Open_Categories").classList.add("is_hidden");
    document.querySelector(".textarea").classList.add("is_hidden");
  }
}

function Choose_Category(str){
  document.querySelector(".Open_Categories").classList.remove("is_hidden");
  document.querySelector(".Open_Categories").innerHTML= str;
  document.querySelector(".add_category").classList.add("is_hidden");
  document.querySelector(".textarea").classList.remove("is_hidden");
}

function OpenRedactModal(){
  
}

</script>