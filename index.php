<?php include ROOT . '/morika/header.php';?>
<?php include ROOT . '/morika/usernavbar.php';?>

<div class="whole_products">
  <div class="container-fluid main_products">
      <div class="headerForProducts">
        <h3 class="otherfont make_bold Product_list_title" style="margin-top:11px;">პროდუქციის ჩამონათვალი</h3> 
      </div>
      <div class="grid-container product_list_user">
  

    </div>
  </div>
</div>
<div class="modal fade AutorizationModal scale-up-center" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title otherfont" id="exampleModalLabel" style="color: white;">ავტორიზაცია</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">სახელი:</label>
            <input type="text" class="form-control" id="user-name" autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">პაროლი:</label>
            <input type="password" class="form-control" id="user-pass" autocomplete="off">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">დახურვა</button>
        <button type="button" class="btn btn-primary InputAdmin">შესვლა</button>
      </div>
    </div>
  </div>
</div>
<?php include ROOT . '/morika/footer.php';?>
<!-- <script src="/template/js/Upload_Image/main.js"></script> -->

<script>

$(document).ready(function(){

$.post('/userpage',
  {
    selectuserproduct: 'selectuserproduct'
  },
  function(data){
      $('.product_list_user').html(data);

  })
  
  $.post('/userpage',
  {
    selectusercategory: 'selectusercategory'
  },
  function(data){

        $('.userCategoryList').html(data);

        var categories = document.querySelector(".userCategoryList").children;

        for (var i=0; i<categories.length; i++){
          if (categories[i].getAttribute("parent-id")!= 0){
            categories[i].style.display = "none";
          };
        }

      
  })


})
// $(document).ready(function(){
//     $.post('/client',
//     {
//         selectusercategory: 'selectusercategory'
//     },
//     function(data){
//         $('.userCategoryList').html(data);
//     })
// })
</script>