$(document).on('click','.InputAdmin',function(){

    let adminname = $('#user-name').val();
    let adminpass = $('#user-pass').val();

    $.post('/uploadindex',{
        isseteadmin: 'isseteadmin',
        adminname: adminname,
        adminpass: adminpass
    },
    function(data){
        console.log(data)
        if(data == '0'){
            $('#user-name').css('border','solid red');
            $('#user-pass').css('border','solid red');
        }else{
            window.location.href = "https://gsoft.ge/morika/admin.php"
        }

    })
})


$(document).on('submit','.methodCategory', function(e){
    e.preventDefault();
    // return;
    let categoryname = $('#CategoryId').val() || '';
    let categoryplace = $('#CategoryPlaceId').val() || '';
    let recipient = $('.CategoryInfo').attr('data-bs-whatever');
    // $('.CategoryInfo').attr('data-bs-whatever')
    let dataid = $('.SaveBtn').attr('data-id')  || '';
    let CategoryLength = $('.CategoryListModal').children('li').length;
    let parentid = 0;
    // $('.CategoryListModal').append('<li class="nav-item">'+
    //                                 '<a href="#" class="nav-link active">'+categoryname+'</a>'+
    //                                 '<div class="CategoryMenuDiv">'+
    //                                 '<span class="material-icons growWidtDiv" style="cursor: pointer; user-select: none; font-weight: bold; color: white;">keyboard_arrow_left</span>'+
    //                                 '<button class="EditSpaceButton" type="button" data-bs-toggle="modal" data-bs-target=".CategoryModal" data-bs-whatever="@editCategory" name="editSpaceName" data-id="" style="color: black !important;"><span class="material-icons" style="color: orange;">edit</span></button>'+
    //                                 '<button class="DeleteList" type="button" data-bs-toggle="modal" data-bs-target=".CategoryModal" data-bs-whatever="@delCategory" name="Space" data-id="" style="color: black !important;"><span class="material-icons" style="color: red; font-weight: bold;">close</span></button>'+
    //                                 '<button class="treeList" type="button" data-bs-toggle="" href="#multiCollapseExample" role="button" aria-expanded="false" aria-controls="multiCollapseExample" data-modul="0" onclick="toggleCollapse(this)" name="Space" data-id="" style="color: black !important;"><span class="material-icons" style="color: white; font-weight: bold;">add</span></button>'+
    //                                 '</div>'+
    //                                 '</li>'+
    //                                 '<div class="collapse multi-collapse TreeCollapse" id="multiCollapseExample">'+
    //                                 '<input type="text" class="form-control" id="ProductTree" autocomplete="off">'+
    //                                 '</div>')

    addInfo(categoryname, categoryplace, recipient,dataid),parentid;
})


$(document).on('click','.SaveBtn', function(e){
    e.preventDefault();
    // return;
    let categoryname = $('#CategoryId').val() || '';
    let categoryplace = $('#CategoryPlaceId').val() || '';
    let recipient = $('.CategoryInfo').attr('data-bs-whatever')
    let dataid = $(this).attr('data-id')  || '';
    let parentid = 0;
    addInfo(categoryname, categoryplace, recipient,dataid, parentid);
})

function addInfo(categoryname, categoryplace, recipient,dataid, parentid){

    $.post('/admin',
    {
        addcategory: 'addcategory',
        recipient: recipient,
        categoryname: categoryname,
        categoryplace: categoryplace,
        dataid: dataid,
        parentid: parentid
    },
    function(data){
        
        let obj = JSON.parse(data);
        console.log(obj);

        if(data == '-1'){
            
            $('.toast').attr('style','background-color: #3299f1 !important; z-index: 250')
            $('.toast-body').text('მსგავსი კატეგორია არსებობს!')
        }else if(data == '0'){
            $('.toast').attr('style','background-color: #b32d77 !important; z-index: 250')
            $('.toast-body').text('შეავსეთ კატეგორიის ველი!')
        }else{
            $('.adminCategoryList').html(obj['newTmp']);
            $('.addDiv').html(obj['tmp']);
            
            
            if(recipient == '@addCategory'){
                $('.toast').attr('style','background-color: #41c852 !important; z-index: 250')
                $('.toast-body').text('კატეგორია დაემატა!')
            }
            if(recipient == '@editCategory'){
                $('.toast').attr('style','background-color: #41c852 !important; z-index: 250')
                $('.toast-body').text('კატეგორია დარედაქტირდა!')
            }
            if(recipient == '@delCategory'){
                $('.toast').attr('style','background-color: #f13232 !important; z-index: 250')
                $('.toast-body').text('კატეგორია წაიშალა!')
            }
            if(recipient == '@treeCategory'){
                $('.toast').attr('style','background-color: #f13232 !important; z-index: 250')
                $('.toast-body').text('ქვეკატეგორია დაემატა!')
            }


            $('#drag'+dataid).prop('contenteditable',false);
            $('#drag'+dataid).css('padding',0);

            $('#treeBtn'+dataid).children('span').text('add');
            $('#treeBtn'+dataid).removeClass('EditListBtn');
            $('#treeBtn'+dataid).addClass('treeList');
            $('#EditSpaceButton'+dataid).show();
            $('#DeleteList'+dataid).show();
            $('#DeleteListBtn'+dataid).hide();
            $(this).hide();

        }
        $('.toast').css({'opacity':'1','z-index': 100000})
        setTimeout(function(){$('.toast').css('opacity','0')},5000)

        $('.addCategory').children('input').val('');
        $('#exampleModal').modal('hide');
    })

}

$(document).on('click','.growWidtDiv',function(){
    
    var width = $(this).parent('div').width();
    let parentid = $(this).closest('.CategoryList').attr('parent-id');
    let string1 = $(this).closest('.CategoryList').children('a').text();
    
    let strlen = string1.trim();

    $('.CategoryMenuDiv').css('width','28px');
    $('.CategoryMenuDiv').find('.growWidtDiv').css('color','#41a7d8');

    if(width == 28){
        $(this).parent('div').css('width','122px');
        $(this).css({'color':'white', 'transform':'rotate(180deg)'})
    }

    if(width == 122){
        $(this).parent('div').css('width','28px');
        // $(this).css('transform','rotate(0deg)')

        if(parentid > 0){
            let space = '&nbsp;'
            console.log(string1);
            $(this).closest('.CategoryList').children('a').html($(this).closest('.CategoryList').children('a').attr('data-text'));
        }
    }
    
})

$(document).on('click', '.addNewCategory', function(){

    // let dataid = $(this).attr('data-id');
    let recipient = $(this).attr('data-bs-whatever');

    if(recipient == '@addCategory'){
        $('#exampleModalLabel2').text('კატეგორიის დამატება');
        $(".CategoryInfo").attr('data-bs-whatever', recipient);
        showCategoryInput()
    }

})

$(document).on('click', '.addTreeCategory', function(){

    let dataid = $(this).attr('data-id');
    let recipient = $(this).attr('data-bs-whatever');

    if(recipient == '@treeCategory'){
        $('#exampleModalLabel2').text('ქვეკატეგორიის დამატება');
        $(".CategoryInfo").attr('data-bs-whatever', recipient);

        showCategoryInput();
        $(".SaveBtn").attr('data-id', dataid);
    }

})

function showCategoryInput(){
    $(".CategoryInfo").html('<div class="">'+
    // '<form class="addCategory">'+
        '<div style="display: flex;">'+
            '<div class="col-md-8 mb-3">'+
                '<label for="recipient-name" class="col-form-label otherfont">დამატება:</label>'+
                '<input type="text" class="form-control" id="CategoryId" autocomplete="off">'+
            '</div>'+
            '<div class="col-md-4 mb-3" style=" margin-left: 30px; display: flex;">'+
                '<div class="">'+
                    '<label for="recipient-name" class="col-form-label otherfont">მდებარეობა:</label>'+
                    '<input type="text" class="form-control" id="CategoryPlaceId" autocomplete="off">'+
                '</div>'+
            '</div>'+
        '</div>'+
    // '</form>'+
'</div>');
}

$(document).on('click', '.EditSpaceButton', function(){

    let dataid = $(this).attr('data-id');
    let recipient = $(this).attr('data-bs-whatever');

    $('#drag'+dataid).attr('contenteditable',true);
    $('#drag'+dataid).css({'border':'1px solid #black','padding':'5px'});
    $('#drag'+dataid).focus();
    $('#treeBtn'+dataid).children('span').text('done');
    $('#treeBtn'+dataid).addClass('EditListBtn');
    $('#treeBtn'+dataid).removeClass('treeList');
    $('#DeleteListBtn'+dataid).show();
    $('#DeleteList'+dataid).hide();
    $(this).hide();

    // $.post('/admin', 
    // {
    //     editmodal: 'editmodal',
    //     dataid: dataid
    // },
    // function(data){

    //     if(recipient == '@editCategory'){
    //         $(".CategoryInfo").attr('data-bs-whatever', recipient);
    //         $(".SaveBtn").attr('data-id', dataid);
    //         $(".CategoryInfo").html(data);
    //         $('#exampleModalLabel2').text('კატეგორიის რედაქტირება');
    //     }
    // })
})

$(document).on('click','.EditListBtn',function(){

    let dataid = $(this).attr('data-id');
    let parentid = $(this).attr('parent-id');
    let value = $('#drag'+dataid).text();alert(value)
    let sort = $('#drag'+dataid).attr('sort');
    let recipient = '@editCategory';

    addInfo(value, sort, recipient,dataid,parentid);

})

$(document).on('click','.DeleteListBtn', function(){

    let dataid = $(this).attr('data-id');
    $('#drag'+dataid).attr('contenteditable',false);
    $('#drag'+dataid).blur();
    $('#treeBtn'+dataid).children('span').text('add');
    $('#treeBtn'+dataid).removeClass('EditListBtn');
    $('#treeBtn'+dataid).addClass('treeList');
    $('#EditSpaceButton'+dataid).show();
    $('#DeleteList'+dataid).show();
    $(this).hide();

})
$(document).on('click','.DeleteList', function(){
    let dataid = $(this).attr('data-id');
    let recipient = $(this).attr('data-bs-whatever');

    if(recipient == '@delCategory'){
        $(".CategoryInfo").attr('data-bs-whatever', recipient);
        $(".SaveBtn").attr('data-id', dataid);
        $(".CategoryInfo").html('<span>გსურთ წაშლა?</span>');
        $('#exampleModalLabel2').text('კატეგორიის წაშლა');
    }
})


$(document).on('click','.btn-close-white',function(){
    $('.toast').css('opacity','0');
})

$(document).on('click','.SearchIcon',function(){
    var width = $('.Searchinput').width();

    if(width == 0){
        $('.Searchinput').css({'width':'280px','padding':'10px'});
        $('.Searchinput').focus();
    }

    if(width == 260){
        $('.Searchinput').css({'width':'0px','padding':'0px'});
    }
    
})
var ListArray = [];

$(document).on('click','.addCategoryBtn',function(e){
    
    e.preventDefault();

    $.post('/admin',
    {
        showcategory: 'showcategory'
    },
    function(data){
        $('.addDiv').html(data);

        var oldContainer;
        var isIntextMenuOpen;
        var element;
        // var tree = new Tree(document.getElementById('tree'));

        var a = 0;
        var idArray = [];
        var parArray = [];
        var valArray = [];
        $('.CategoryListDiv').each( function(e) {
            
            if($(this).attr('parent-id') > 0){
                $(this).hide();
            }
            let dataid = $(this).attr('data-id');
            let parid = $(this).attr('parent-id');
            let value = $(this).attr('value');

            if(parid > 0){
                parArray.push({'parid':parid, 'value':value});
            }else{
                valArray.push({'dataid':dataid, 'value':value});
            }

            
        //     let dataid = $(this).attr('data-id');

        //     ListArray.push($(this), e.clientY);
        //     // console.log($(this)[a])

        //     $('.CategoryListModal').sortable({
        //         items: "li",
        //         revert: true,
        //         connectWith: '.CategoryList',
        //         axis: 'y',
        //         group: 'nested',
        //         dropOnEmpty: false,
                
        //         out: function( event, ui ) {
        //             let y = getCoordinate(event)
                    
        //             // console.log(event.clientY)
        //             if(y == event.clientY){
        //                 // console.log($(this))
        //             }
        //         },

        //         change: function( event, ui ) {
                                        	
        //             let y = getCoordinate(event)
        //             // console.log(y)
        //             // console.log(event.clientY)
        //             if(y == event.clientY){
        //                 // console.log($(this))
        //             }
        //         },
        //         over: function( event, ui ) {
        //             let y = getCoordinate(event)
        //             // console.log(y)
        //             // console.log(event.clientY)
        //             if(y == event.clientY){
        //                 console.log(a)
        //                 $('#showdiv'+a).show();
        //                 // console.log($(this))
        //             }
        //             // var x = $(this).sortable( "instance" );console.log(x);
        //         },

        //         update: function(event, ui) {
        //             // console.log($(event.target))
        //             let y = getCoordinate(event)

        //             if(y == event.clientY){
        //                 console.log(a)
        //                 console.log($(this).children('li')[a])
        //             }
        //             var sortArray = [];
        //             console.log(event.clientY)
        //             var sorted = $(this).sortable( "serialize", { key: "sort" } );
        //             var drop =  $( this).sortable( "option", "dropOnEmpty" );
        //             var sortedIDs = $( this ).sortable( "toArray",{attribute: 'data-id'});
        //             var sortedIName = $( this ).sortable( "toArray",{attribute: 'value'});
        //             sortArray.push({'id':sortedIDs,'value':sortedIName})
        //             $.post( '/admin',{ sortIds:'sortIds',sortArray: sortArray});
                
        //        }
        //     })

        //     a++;
        });

        // console.log(JSON.stringify(valArray));

        // tree.json([{
        //     name: valArray['value']
        //   },  {
        //     name: parArray['value'],
        //     open: true,
        //     type: Tree.FOLDER,
        //     selected: true,
        //     children: [{
        //       name: parArray['value']
        //     }]
        //   }]);


    })
})




function dragStart(event) {
    // event.preventDefault();
    // console.log('dragStart '+event.target.id)
    
    let id = event.target.getAttribute('data-id');
    event.dataTransfer.setData("html", event.currentTarget.outerHTML);
    // console.log(event.target);
    document.getElementById('drag'+id).closest('.CategoryListDiv').style.opacity = 0.6;
    document.getElementById('drag'+id).closest('.CategoryListDiv').classList.add("newdrag");
    // event.currentTarget.outerHTML.css('border','1px solid green');
  }
  
  function dragging(event) {
    let id = event.target.getAttribute('data-id');
    
  }
  
  function allowDrop(event) {
    event.preventDefault();
    let id = event.target.getAttribute('data-id');console.log('id '+id)
    let parid = event.target.getAttribute('parent-id');console.log('parid '+parid)
    // var data = event.dataTransfer.getData("html");
    $('.pasteDiv').remove();
    $('.CategoryListDiv'+id).after('<div class="pasteDiv pasteDiv'+id+'" id="pasteDiv'+id+'" style="height: 30px; background-color:red;"></div>')

    $('.CategoryListDiv').each(function(){
        if(id == $(this).attr('parent-id')){
            let dataid = $(this).attr('data-id');
            $(this).show();

        }
        
    })
    // $('.CategoryListDiv'+id).show();
    if(id != null){
        document.getElementById('showdiv'+id).style.display = "block"
        document.getElementById('showdiv'+id).setAttribute('data-id',id)
    }

    // console.log(event.target)
    // console.log('allow '+event.target.id)
  }
  
  function drop(event) {
    event.preventDefault();
    var listArray = [];
    // console.log('drop '+event.target.id);
    let id = event.target.getAttribute('data-id');
    let datachild = event.target.getAttribute('data-child');
    var data = event.dataTransfer.getData("html");

        console.log(data)
        console.log(id)
        console.log($('.pasteDiv'+id).length);
        $('.pasteDiv'+id).html(data);
        // $('#childDiv'+id).children('div').attr("parent-id",id)
        const draggables = document.querySelectorAll('.CategoryListDiv');
        draggables.forEach(element => {

            listArray.push({'dataid': element.getAttribute('data-id'), 'parentid':element.getAttribute('parent-id'), 'value':element.getAttribute('value').trim()})
        });
        console.log(listArray)
        $.post( '/admin',{ sortIds:'sortIds',listArray: listArray});
    // }
    
    $('.CategoryListDiv').each(function(){
        if($(this).hasClass('newdrag')){
            $(this).remove();
        }
    })

  }


$(document).on('submit', '.addTree', function(e){

    e.preventDefault();

    let dataid = $(this).attr('data-id');
    let value = $('#ProductTree'+dataid).val();

    $.post('/admin',{
        addtree: 'addtree',
        dataid: dataid,
        value: value
    },
    function(data){
        $('.adminCategoryList').html(data);
        $('.CategoryListModal').html(data);
    })
})


// კატეგორიის გამოჩენა დასაწყისი :(
    // $(document).ready(function(){


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

        
        }
        
    });
    
    
    // function hideChilds(pid){
        
    //     var data = $('.addDiv').children("[parent-id='" + pid + "']");
        
    //     for(var i = 0; i < data.length; i++){
            
    //         var id = data.eq(i).attr('data-id');
            
    //         data.eq(i).hide(0);
    //         hideChilds(id);
    //         data.eq(i).attr('ischildhiden', "1");    
    //     } 
    // }
    
        
    // });
    
    
    // კატეგორიის გამოჩენა დასასრული :)



    var arrayID = [];

    $(document).on('click','.treeList',function(){
        let dataid = $(this).attr('data-id');
        let parentid = $(this).attr('parent-id');
        let a = 0;
        let left = parseInt($(this).attr('data-left'));

        // $(this).removeClass('is_hidden');
        // console.log($(this).closest('.ParentFunc').after('.border-left'));

        if($('#border-left'+dataid)[0] == undefined){
            
            $('#ParentFunc'+dataid).after('<div class="border-left" id="border-left'+dataid+'" parent_id="'+dataid+'" data-id="">'+
            '<div class="lines"></div><div class="ParentFunc" id="ParentFunc'+dataid+'">'+
            '<div class=" margin_bottom" data-id="" parent-id="'+dataid+'">'+
                // '<span class="material-icons showMe ChildIcon" onclick="checker(97, this)" aria-hidden="true" children_is_hidden="0" style="">add</span>'+
            '</div>'+
            '<input class="ChildInput" id="ChildInput'+dataid+'" type="text" autocomplete="off">'+
                '<div class="CategoryChildDiv">'+
                    '<span class="material-icons addNewCategory" parent-id="'+dataid+'" style="color: #2bd030; font-weight: bold;">done</span>'+
                    '<span class="material-icons removeCategory" parent-id="'+dataid+'"  style="color: red; font-weight: bold;">close</span>'+
                '</div>'+
            '</div>'+
            '</div>')
        }else{
            $('#border-left'+dataid).append('<div class="ParentFunc" id="ParentFunc'+dataid+'">'+
            '<div class=" margin_bottom" data-id="" parent-id="'+dataid+'">'+ 
                
            '</div>'+
            '<input class="ChildInput" id="ChildInput'+dataid+'" type="text" autocomplete="off">'+
            '<div class="CategoryChildDiv">'+
                '<span class="material-icons addNewCategory" parent-id="'+dataid+'"  style="color: #2bd030; font-weight: bold;">done</span>'+
                '<span class="material-icons removeCategory" parent-id="'+dataid+'"  style="color: red; font-weight: bold;">close</span>'+
            '</div>'+
                    '</div>');
        }



    })

    
    $(document).on('click','.addNewCategory', function(){
        var arrayCategory = []
        let parentid = $(this).attr('parent-id');
        let value = $(this).parent('div').siblings('#ChildInput'+parentid).val();
        let parent = $(this).closest('.ParentFunc');
        arrayCategory.push({'value':value, 'parentid':parentid});
        // $(this).closest('.ParentFunc').html('');

        $.post('/admin',
        {
            addingCategory: 'addingCategory',
            parentid: parentid,
            value: value
        },
        function(data){

            if(data == '-1'){
                $('.toast').attr('style','background-color: #3299f1 !important; z-index: 250')
                $('.toast-body').text('მსგავსი კატეგორია არსებობს!')
            }else if(data == '0'){
                $('.toast').attr('style','background-color: #b32d77 !important; z-index: 250')
                $('.toast-body').text('შეავსეთ კატეგორიის ველი!')
            }else{
                
                parent.removeAttr('id');
                parent.html(data);console.log(parent.html());
                let id = parent.children('.margin_bottom').attr('data-id');
                parent.attr('id','ParentFunc'+id);

                $('.toast').attr('style','background-color: #41c852 !important; z-index: 250')
                $('.toast-body').text('კატეგორია დაემატა!')
            }

            $('.toast').css({'opacity':'1','z-index': 100000})
            setTimeout(function(){$('.toast').css('opacity','0')},5000)
        })
    })


    $(document).on('click','.removeCategory',function(){
        let parentid = $(this).attr('parent-id');
        $(this).closest('#ParentFunc'+parentid).remove();
    })

    
    function checker(n,arr){
        
        if (arr.getAttribute("children_is_hidden")==0){
            arr.setAttribute("children_is_hidden",1);
            openChild(n,arr);
        }else{
          hideChild(n,arr);
          arr.setAttribute("children_is_hidden",0);
        }
      }
      
      function hideChild(n,arr){
      
        arr = arr.closest('.addDiv').querySelectorAll(".border-left");
      
        for (var i=0; i<arr.length; i++){
          if(arr[i].getAttribute("data-id")==n){
            arr[i].classList.add("is_hidden");
            
          }
        }
      }
      
      function openChild(n,arr){
        
        arr = arr.closest('.addDiv').querySelectorAll(".border-left");

        for (var i=0; i<arr.length; i++){
          if(arr[i].getAttribute("data-id")==n){
            arr[i].classList.remove("is_hidden");
          }
        }
      
      }

      $(document).on('click','.addParentCategory', function(){

        let value = $('#addNewChildInput').val();
        let parentid = 0;

        $.post('/admin',
        {
            addingNewCategory: 'addingNewCategory',
            parentid: parentid,
            value: value
        },
        function(data){

            if(data == '-1'){
                $('.toast').attr('style','background-color: #3299f1 !important; z-index: 250')
                $('.toast-body').text('მსგავსი კატეგორია არსებობს!')
            }else if(data == '0'){
                $('.toast').attr('style','background-color: #b32d77 !important; z-index: 250')
                $('.toast-body').text('შეავსეთ კატეგორიის ველი!')
            }else{
                
                $('.addDiv').html(data);
                $('#addNewChildInput').val('');
                $('.toast').attr('style','background-color: #41c852 !important; z-index: 250')
                $('.toast-body').text('კატეგორია დაემატა!')
            }

            $('.toast').css({'opacity':'1','z-index': 100000})
            setTimeout(function(){$('.toast').css('opacity','0')},5000)
        })
      })

      $(document).on('click', '.removeParentCategory', function(){
        $('#addNewChildInput').val('');
      })


