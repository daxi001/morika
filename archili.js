//პროდუქტების მოდალში კატეგორიების არჩევა.  
function Choose_Category(str,arr){
    document.querySelector(".Open_Categories").classList.remove("is_hidden");
    document.querySelector(".Open_Categories").innerHTML= str;
    document.querySelector(".Open_Categories").setAttribute("send-id", arr.getAttribute("data-id"));
    document.querySelector(".add_category").classList.add("is_hidden");
    document.querySelector(".textarea").classList.remove("is_hidden");
}


//პროდუქტების რედაქტირების მოდალი  
function OpenRedactModal(){
    
}


//data-id წაშლა პროდუქტის დამატების ღილაკზე დაწკაპებისას
$(document).on('click','.ProductUpload', function(){
    $('.main_color').removeAttr('data-id');
})


//პროდუქტის ატვირთვა ბაზაში.
function Update_Product(e){
    var name = document.getElementById("ProductName").value;
    var code = document.getElementById("ProductCode").value;
    var category_id = document.getElementById("Product_category").getAttribute("send-id");
    var comment = document.getElementById("Product_comment").value;

    var Photos = [];
    var dataid = e.getAttribute('data-id') || '';
    document.querySelectorAll(".New_Img").forEach(element => {
        Photos.push({"src": element.getAttribute("src"), "org-src" : element.getAttribute("org-src")});
    });
    console.log(category_id);
    $.post("/admin",
    {
        New_Product: "New_Product",
        name:name,
        code:code,
        category_id:category_id,
        comment:comment,
        Photos:Photos,
        dataid:dataid
    },function(data){
        console.log(data);
        $(".product_list").html(data);
    })
    
}



//ფუნქცია მოდალის დამალვის შემდეგ.
$('#addProductModalId').on('hidden.bs.modal', function () {
    document.getElementById("ProductName").value="";
    document.getElementById("ProductCode").value="";
    document.getElementById("Product_category").innerHTML="აირჩიეთ კატეგორია";
    document.getElementById("Product_category").classList.remove("send-id");
    document.getElementById("Product_comment").value = "";
    document.getElementById("images").innerHTML = "";
})
  

$('body').click(function (event) 
{
   if(!$(event.target).closest('#openModal').length && !$(event.target).is('#openModal')) {
     $(".modalDialog").hide();
   }    
   

   if (!$(event.target).closest(".add_category").length && !$(event.target).is('.add_category')){
    if (!$(event.target).is(".Open_Categories")){
        document.querySelector(".Open_Categories").classList.remove("is_hidden");
        document.querySelector(".add_category").classList.add("is_hidden");
        document.querySelector(".textarea").classList.remove("is_hidden");
    }
   }
});


function changeURL(){
    location.replace("https://gsoft.ge/admin/1");
}

