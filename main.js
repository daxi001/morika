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


$(document).on('submit','.addCategory', function(e){
    e.preventDefault();
    // return;
    let categoryname = $('#CategoryId').val() || '';
    let categoryplace = $('#CategoryPlaceId').val() || '';
    let recipient = '@addCategory';
    // $('.CategoryInfo').attr('data-bs-whatever')
    let dataid = $('.SaveBtn').attr('data-id')  || '';
    let CategoryLength = $('.CategoryListModal').children('li').length;

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

    addInfo(categoryname, categoryplace, recipient,dataid);
})

$(document).on('click','.SaveBtn', function(e){
    e.preventDefault();
    // return;
    let categoryname = $('#CategoryEdit').val() || '';
    let categoryplace = $('#CategoryPlaceEdit').val() || '';
    let recipient = $('.CategoryInfo').attr('data-bs-whatever')
    let dataid = $(this).attr('data-id')  || '';
    
    addInfo(categoryname, categoryplace, recipient,dataid);
})

function addInfo(categoryname, categoryplace, recipient,dataid){

    $.post('/admin',
    {
        addcategory: 'addcategory',
        recipient: recipient,
        categoryname: categoryname,
        categoryplace: categoryplace,
        dataid: dataid
    },
    function(data){
        
        let obj = JSON.parse(data);
        
        if(data == '-1'){
            
            $('.toast').attr('style','background-color: #3299f1 !important; z-index: 250')
            $('.toast-body').text('მსგავსი კატეგორია არსებობს!')
        }else if(data == '0'){
            $('.toast').attr('style','background-color: #b32d77 !important; z-index: 250')
            $('.toast-body').text('შეავსეთ კატეგორიის ველი!')
        }else{
            $('.CategoryList').html(obj['tmp']);
            $('.CategoryListModal').html(obj['newTmp']);
            
            
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

        }
        $('.toast').css({'opacity':'1','z-index': 100000})
        setTimeout(function(){$('.toast').css('opacity','0')},5000)

        $('.addCategory').children('input').val('');
        $('#exampleModal').modal('hide');
    })

}

$(document).on('click','.growWidtDiv',function(){
    var width = $(this).parent('div').width();

    $('.CategoryMenuDiv').css('width','28px');
    $('.CategoryMenuDiv').find('.growWidtDiv').css('color','#41a7d8');

    if(width == 28){
        $(this).parent('div').css('width','122px');
        $(this).css({'color':'white', 'transform':'rotate(180deg)'})
    }

    if(width == 122){
        $(this).parent('div').css('width','28px');
        $(this).css('transform','rotate(0deg)')
    }
    
})

$(document).on('click', '.EditSpaceButton', function(){

    let dataid = $(this).attr('data-id');
    let recipient = $(this).attr('data-bs-whatever');

    $.post('/admin', 
    {
        editmodal: 'editmodal',
        dataid: dataid
    },
    function(data){
        if(recipient == '@editCategory'){
            $(".CategoryInfo").attr('data-bs-whatever', recipient);
            $(".SaveBtn").attr('data-id', dataid);
            $(".CategoryInfo").html(data);
            $('#exampleModalLabel2').text('კატეგორიის რედაქტირება');
        }
    })
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

$(document).on('click','.addCategoryBtn',function(){
    console.log('helloo');
    $.post('/admin',
    {
        showcategory: 'showcategory'
    },
    function(data){
        $('.addDiv').html(data);

        $('.CategoryList').each( function() {
            
            $('.CategoryListModal').sortable({
                items: "li",
                revert: true,
                connectWith: '.CategoryList',
                axis: 'y',
                // arr: $(this).sortable('toArray'),
                update: function(event, ui) {

                    var sortArray = [];
                    
                    var sortedIDs = $( this ).sortable( "toArray",{attribute: 'data-id'});
                    var sortedIName = $( this ).sortable( "toArray",{attribute: 'value'});
                    sortArray.push({'id':sortedIDs,'value':sortedIName})
                    $.post( '/admin',{ sortIds:'sortIds',sortArray: sortArray});
                
               }
            })
        });

        // const drag = document.querySelector('ul');

        // console.log(drag);

        // new Sortable(drag, {
        //     animation: 350
        // })

    })
})

function toggleCollapse(a){
    let dataid = a.getAttribute('data-id');
    let modul = a.getAttribute('data-modul');

    if(modul == 0){
        document.getElementById('multiCollapseExample'+dataid).classList.add("show")
        a.setAttribute("data-modul", "1");
    }else{
        document.getElementById('multiCollapseExample'+dataid).classList.remove("show")
        a.setAttribute("data-modul", "0"); 
    }
    
}

