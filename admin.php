<?php include './header.php';?>
<nav class="navbar navbar-light" style="background-color: #1f5881; height: 50px;">
<div class="container-fluid NavbarContainer">
    <!-- <a class="navbar-brand">Navbar</a> -->
    <h3 class="SiteTitle">მორიკა</h3>
    
    <!-- <div> -->
      <form class="d-flex">
          <input class="form-control me-2 Searchinput" type="search" placeholder="Search" aria-label="Search">
      </form>
    <!-- </div> -->
    <span class="material-icons SearchIcon">search</span>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end NavMenu">
  
        <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn"><span class="material-icons NavMenuSpan" onclick="myFunction()">more_vert</span></button>
            <div id="myDropdown" class="dropdown-content">
                <a class="addCategoryBtn" href="#home"  data-bs-toggle="modal" data-bs-target="#showaddModal"><span class="material-icons logoutIcon">add</span>&nbsp;მეთოდები&nbsp;კატეგორიებზე</a>
                <!-- <a href="#about" data-bs-toggle="modal" data-bs-target=".addProductModal" data-bs-whatever="@addProduct"><span class="material-icons logoutIcon">add</span>&nbsp;პროდუქტის დამატება</a> -->
                <a href="#contact"><span class="material-icons logoutIcon">logout</span>&nbsp;გასვლა</a>
            </div>
        </div>
        
    </div>
    
  </div>
</nav>
<div class="d-flex flex-column p-3 text-white bg-dark CategoryBar" style="width: 280px;">
<h3 class="otherfont">კატეგორია</h3>
  <ul class="nav nav-pills flex-column mb-auto CategoryList">

  </ul>
</div>
<div class="container-fluid">
    <div class="headerForProducts">
      <h3 class="otherfont make_bold" style="margin-top:11px;">პროდუქციის ჩამონათვალი</h3>
      
      <button type="button" class="btn ProductUpload otherfont" data-bs-toggle="modal" data-bs-target=".addProductModal"><span class="material-icons icon">add_circle</span>პროდუქტის დამატება</button>
    </div>
    <div class="card" style="width: 18rem;">
    <img src="/upload/Restaurant_Image/Menu_Image/1/5f8476d23b76e.jpg" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn">Go somewhere</a>
    </div>
    </div>

</div>

<!-- კატეგორიის დამატების მოდალი -->
<div class="modal fade scale-up-center addCategoryModal" id="showaddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
    <div class="modal-content">
      <div class="modal-header" style="color: white;">
        <h5 class="modal-title" id="exampleModalLabel">მეთოდები კატეგორიებზე</h5>
        <span class="material-icons" data-bs-dismiss="modal" aria-label="Close" style="color: white; cursor: pointer;">close</span>
      </div>
      <div class="modal-body" >
        <div class="addDiv" style="display: flex; align-items: center;">
            
        </div>
      </div>
    </div>
  </div>
</div>

<!-- კატეგოტიებზე მეთოდი -->
<div class="modal fade scale-up-center CategoryModal" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="box-shadow: 0 0px 10px rgb(0 0 0 / 30%);">
      <div class="modal-header" style="background-color: #2d69a7; color: white;">
        <h5 class="modal-title" id="exampleModalLabel2"></h5>
        <span class="material-icons" data-bs-dismiss="modal" aria-label="Close" style="color: white; cursor: pointer;">close</span>
      </div>
      <!-- <form class="methodCategory"> -->
        <div class="modal-body" >
          <div class="CategoryInfo" style="display: flex; align-items: center;">
              
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary SaveBtn" data-bs-dismiss="modal" id="liveToastBtn">შენახვა</button>
        </div>
      <!-- </form> -->
    </div>
  </div>
</div>

<!-- კპროდუქტის დამატების მოდალი -->
<div class="modal fade scale-up-center addProductModal" id="addProductModalId" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content" style="border-radius:10px;">
      <div class="modal-header" style="background-color: #2d69a7; color: white;">
        <h5 class="modal-title otherfont" id="exampleModalLabel">პროდუქტის დამატება</h5>
        <span class="material-icons" data-bs-dismiss="modal" aria-label="Close" style="color: white; cursor: pointer;">close</span>
      </div>
      <form class="addCategory">
      <div class="modal-body" >
          <div class="row">
            <div class="col-lg-4">
              <div class="">
                  <label for="recipient-name" class="col-form-label input_title">პროდუქტის დასახელება:</label>
                  <input type="text" class="form-control inputForProducts" id="ProductName" autocomplete="off">
              </div>
    
              <div class="">
                <label for="recipient-name" class="col-form-label input_title">პროდუქტის კოდი:</label>
                <input type="text" class="form-control inputForProducts" id="ProductCode" autocomplete="off">
              </div>
              <div class="form-floating textarea inputForProducts" style="margin-top:30px">
                <textarea class="form-control " placeholder="Leave a comment here" id="floatingTextarea" style="height:150px;"></textarea>
                <label for="floatingTextarea " style="font-weight:500;">კომენტარი...</label>
              </div>
              </div>
              <div class="col-lg-8">
          <div class="container make_left_border" style="padding-left:0px !important;">
              <h4 class="otherfont" style = "text-align:center; margin-left: 50px; font-weight: 500;">ფოტოები</h4>
              <div class="row images wrapper" id="images" onchange="ChangeMainElement()">
                          
              </div>  
          </div>

            </div>
          </div>
      </div>
      <div class="modal-footer ProductFooter">
        <div class="" onclick="selectFile()">
          <input type="file" id="upload-file" onchange="uploads(event)" multiple="" accept="image/*"hidden/>
          <label for="actual-btn" class="addPhoto" >ფოტოს დამატება</label>
        </div>
        <span class="message" style="color:#e03232;position: relative;"><span class="material-icons">error_outline</span>&nbsp;<strong>ფოტოების მაქსიმალური რაოდენობა: 10</strong></strong></span>
        <button type="submit" class="btn btn-primary SaveBtn" data-bs-dismiss="modal" id="liveToastBtn">შენახვა</button>
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
            $('.CategoryList').html(data);
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

            console.log(dragArea);

            new Sortable(dragArea,{
              animation: 350
});


var exampleModal = document.getElementById('addProductModalId')
exampleModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var recipient = button.getAttribute('data-bs-whatever')

    if(recipient == '@addCategory'){

      $(".addDiv").attr('data-bs-whatever');

      $('#exampleModalLabel').text('კატეგორიის დამატება');
    }

})


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
    $('.mySlides').eq(a).attr({'src':canvas.toDataURL()});
    // return canvas.toDataURL();

};

}

var main_picture;

//function uploads(event);

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
        // setTimeout(function(){
        images.innerHTML += `<div class="container containerImg AddImgCount${a}" data-count="${a}" >
          <img class="Rest-images"  data-count="${a}" src="" org-src="">
          <div class="overlay"></div>
          <div class="input">
            <span class="material-icons dish-icon showRestImg" data-count="${a}" onclick="openModal(${a})" data-toggle="tooltip" data-placement="bottom" title="დათვალიერება">visibility</span>
            <!-- <span class="material-icons dish-icon default-icon CheckImg CheckRestImg" data-count="${a}" main-img="0" data-toggle="tooltip" data-placement="bottom" title="მთავარი სურათი">inbox</span> -->
            <span class="material-icons dish-icon deleteImg deleteNewRestImg" data-toggle="modal" data-target=".modal-deleteImg" data-delete="${a}" data-toggle="tooltip" data-placement="bottom" title="წაშლა">delete</span>
          </div>
          <p class="main hidden otherfont">მთავარი</p>
          <div id="id01" class="modal">
              <img class="Rest-images" data-count = "${a}" src="'>
          </div>
        </div>`

        if (a==0){
          ChangeMainElement();
        }

        document.querySelectorAll(".deleteImg").forEach(element => {
            element.addEventListener("click", () =>{
              element.parentElement.parentElement.remove();
              changeMainElement();
            })
        });


        // document.querySelectorAll(".CheckImg").forEach(element => {
        //     element.addEventListener("click", () =>{

        //       var arr = document.querySelectorAll(".CheckImg");
              
        //       arr.forEach(elem => {
                  
        //           if (elem.getAttribute("main-img")=="1"){
        //             elem.setAttribute("main-img", "0");
        //             elem.parentElement.parentElement.children[3].classList.add("hidden");
        //           }
        //       });
                
        //       element.parentElement.parentElement.children[3].classList.remove("hidden");
        //       element.setAttribute("main-img", "1");
        //     })
        // });

        $('.CheckRestImg').each(function(){
            
            // if($(this).attr('data-count') == 0){
            //     $(this).attr('main-img',1);
            //     $(this).closest('.containerImg').children('img').css('border','5px solid #48bce8')
            //     $(this).closest('.containerImg').siblings('div').children('img').css('border','none')
            // }else{
            //     $(this).attr('main-img',0);
            // }
            
        });

        
        
        if(a > 9){
            
            $('.AddImgCount'+parseInt(a)).remove();
            
        }

        $('.w3-modal-content').append('<img class="mySlides" data-count="'+a+'" src="" style="">');
        
        var b = ImageRatioThumb(src,a)
        var c = ImageRatio(src,a)
    // },2000) 
    })
   
    // console.log(src)
    
}
}

function ChangeMainElement() {
  var arr = document.querySelector(".images");
  arr.children[0].children[3].classList.remove("hidden");

  for (var i=1; i<arr.children.length; i++){
    arr.children[i].children[3].classList.add("hidden")
  }
}


function openModal(e) {
  console.log("kaia");
}

function closeModal() {
    $('#myModal').hide();
}

var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = $(".mySlides");

  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x.eq(i).hide();
  }

  x.eq(slideIndex-1).show();

}




</script>