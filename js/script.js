//DROPDOWN 
$(document).ready(function () {
   $('#menu li a').click(function (e) {
       $(this).parent().find('ul').slideToggle();
    }); 
});


//NAV MOBILE
    $(document).ready(function () {
            $("#ham").click(function() {
           $("#menu").fadeToggle(600)
     });          
 });



//////////MODALS REG LOGIN

function openLogin() {
    document.getElementById("modal-login").style.display = "block";
}

function closeLogin() {
    document.getElementById("modal-login").style.display = "none";
}

function openReg() {
    document.getElementById("modal-reg").style.display = "block";
}

function closeReg() {
    document.getElementById("modal-reg").style.display = "none";
}

//REGISTER AJAX
function register(){
    var usernameV = $("#username").val();
    var emailV = $("#email").val();
    var pwdV = $("#pwd").val();
    var pwd_repeatedV = $("#pwd_repeated").val();

    $.ajax ({
        type:"POST",
        url: 'actions/register.php',
        data: {
            username: usernameV,
            email: emailV,
            pwd: pwdV,
            pwd_repeated: pwd_repeatedV
        },
        success: function(data){
            $('#msg_reg').text(data);
           
            if (data == "Registracija je uspjela, sada se možete prijaviti!"){
               $("#msg-reg").removeClass("msg-0").addClass("msg-1");
               $('#reg-form')[0].reset();
                setTimeout(closeReg, 2000);
                setTimeout(openLogin, 0);
            }  
        }
    });
}



//LOGIN AJAX
function login(){
    var emailV = $("#email_l").val();
    var pwdV = $("#pwd_l").val();
    $.ajax ({
        type:"POST",
        url: 'actions/login_action.php',
        data: {
            email: emailV,
            pwd: pwdV
        },
        success: function(data){
            $('#msg-login').text(data);
            if (data == "Uspješno ste se prijavili!"){
               $("#msg-login").removeClass("msg-0").addClass("msg-1");
               $('#login-form')[0].reset();
                setTimeout(closeLogin, 2000);
                window.location.reload('nav');
            }  
        }
    });
}

//LOGOUT
$('.logout').click(function (event) {
    if (confirm('Jeste li sigurni da se želite odjaviti?')) {
        $.ajax({
            type: "POST",
            url: 'actions/logout.php',
            data: {
                // data stuff here
            },
            success: function () {
               window.location.reload();
            }
        });
    }
});



//ARTICLE ADMIN CHANGE
function openArticle(id_a, fk_id_u, fk_id_cat, title, description, content, foto_url, foto_alt,date_publication, date_last_change, position, number_likes, name_cat, username) {
    document.getElementById("modal-article").style.display = "block";
    document.getElementById("id_a").value = id_a;
    document.getElementById("category_article").value = fk_id_cat;
    document.getElementById("position_article").value = position;
    document.getElementById("title_article").value = title;
    document.getElementById("content_article").value = content;
    document.getElementById("description_article").value = description;
    document.getElementById("img-article").src = foto_url;
    document.getElementById("foto_alt").value = foto_alt;
    document.getElementById("date_publication_a").value = date_publication;
    document.getElementById("date_last_ch_a").value = date_last_change;
    document.getElementById("editor").value = username;
    document.getElementById("showimg").innerHTML = foto_url;
    document.getElementById("change_article").addEventListener("click", articleChange, false);
}

function closeArticle() {
    document.getElementById("modal-article").style.display = "none";
    $('#modalChangeBlogPost')[0].reset();
    document.getElementById("change_article").removeEventListener('click', catChange , false );
    $("#msg-art").text("");
    $("#msg-art").removeClass("msg-1").addClass("msg-0");
    $("#showimg").html("");
}

function newImg() {
    document.getElementById("new-img").style.display = "block";
}

function closeNewImg() {
    document.getElementById("new-img").style.display = "none";
}

function articleChange(){
    var id_a = $("#id_a").val();
    var cat = $("#category_article").val();
    var position = $("#position_article").val();
    var title = $("#title_article").val();
    var content = $("#content_article").val();
    var description = $("#description_article").val();
    var new_url_img = $("#showimg").text();
    var foto_alt = $("#foto_alt").val();
 
    $.ajax ({
        type:"POST",
        url: 'actions/article_change.php',
        data: {
            id_a: id_a,
            cat: cat,
            position: position,
            title: title,
            content: content,
            description: description,
            new_url_img: new_url_img,
            foto_alt: foto_alt
        },
        success: function(data){
            $('#msg-art').text(data);
            if (data == "Članak je uspješno izmjenjen !"){
               $("#msg-art").removeClass("msg-0").addClass("msg-1");
                setTimeout(closeArticle, 1000) 
                refreshContent('includes/page_content/articleAdmin.php', 'admin-content');
            }
        }
    });
}


//CATEGORY ADMIN CHANGE
function openCat(id_cat, name_cat, parent_id) {
    document.getElementById("modal-cat").style.display = "block";
    document.getElementById("cat_id").value = id_cat;
    document.getElementById("title_category").value = name_cat;
    document.getElementById("category_parent").selectedIndex = parent_id -1;
    document.getElementById("change_cat").addEventListener("click", catChange, false);
}

function catChange(){
    var cat_nameV = $("#title_category").val();
    var parentIdV = $("#category_parent").val();
    var id_cat = $("#cat_id").val();
    $.ajax ({
        type:"POST",
        url: 'actions/cat_change.php',
        data: {
            id_cat: id_cat,
            cat_name: cat_nameV,
            parent: parentIdV
        },
        success: function(data){
            $('#msg-cat').text(data);
            if (data == "Kategorija je uspješno izmjenjena !"){
               $("#msg-cat").removeClass("msg-0").addClass("msg-1");
                setTimeout(closeCat, 1000) 
                refreshContent('includes/page_content/catAdmin.php', 'admin-content');
                $("#menu").load(location.href + " #menu>*", "");
            }
        }
    });
}

//CATEGORY ADMIN NEW

function newCat(){
     document.getElementById("modal-cat").style.display = "block";
     document.getElementById("modal_title").innerHTML = "Dodaj kategoriju";
     document.getElementById("change_cat").innerHTML = "Dodaj";
     document.getElementById("title_category").placeholder = "Upišite naziv kategorije";
     document.getElementById("change_cat").addEventListener("click", catAdd, false);    
}



function catAdd(){
    var cat_nameV = $("#title_category").val();
    var parentIdV = $("#category_parent").val();
    $.ajax ({
        type:"POST",
        url: 'actions/cat_add.php',
        data: {
            cat_name: cat_nameV,
            parent: parentIdV
        },
        success: function(data){
            $('#msg-cat').text(data);
            if (data == "Kategorija je uspješno dodana !"){
               $("#msg-cat").removeClass("msg-0").addClass("msg-1");
                setTimeout(closeCat, 1000) 
                refreshContent('includes/page_content/catAdmin.php', 'admin-content');
                $("#menu").load(location.href + " #menu>*", "");
            }
        }
    });
}
  

function closeCat() {
    document.getElementById("modal-cat").style.display = "none";
    $('#cat_change_form')[0].reset();
    document.getElementById("change_cat").removeEventListener('click', catChange , false );
    document.getElementById("change_cat").removeEventListener('click', catAdd , false );
    $("#category_parent").load(location.href + " #category_parent>*", "");
    $("#msg-cat").text("");
    $("#msg-cat").removeClass("msg-1").addClass("msg-0");
}

//USER ADMIN
function openUser(id_u,user,email,role,fname,lname,address,city,post_number,country,date_reg,date_last_ch) {
     document.getElementById("modal-user").style.display = "block";
     document.getElementById("id_u").value = id_u;
     document.getElementById("a_username").value = user;
     document.getElementById("a_email").value = email;
     document.getElementById("user_role").selectedIndex = role -1;
     document.getElementById("a_fname").value = fname;
     document.getElementById("a_lname").value = lname;
     document.getElementById("a_address").value = address;
     document.getElementById("a_city").value = city;
     document.getElementById("a_post_number").value = post_number;
     document.getElementById("a_country").value = country;
     document.getElementById("date_reg").value = date_reg;
     document.getElementById("date_last_change").value = date_last_ch;
     document.getElementById("change_user").addEventListener("click", changeUser, false);
}

function changeUser(){
    var id_uV = $("#id_u").val();
    var emailV = $("#a_email").val();
    var roleV = $("#user_role").val();
    $.ajax ({
        type:"POST",
        url: 'actions/user_change.php',
        data: {
            id_u: id_uV,
            email: emailV,
            role: roleV
        },
        success: function(data){
            $('#msg-user').text(data);
            if (data == "Korisnik je usješno izmjenjen !"){
               $("#msg-user").removeClass("msg-0").addClass("msg-1");
                setTimeout(closeUser, 1000) 
                refreshContent('includes/page_content/userAdmin.php', 'admin-content');
            }
        }
    });
}

function closeUser() {
    document.getElementById("modal-user").style.display = "none";
    $('#user_change_form')[0].reset();
    document.getElementById("change_user").removeEventListener('click', changeUser , false );
    $("#msg-user").text("");
    $("#msg-user").removeClass("msg-1").addClass("msg-0");
}

//EDITOR ADMIN
function openRole() {
    document.getElementById("modal-editor").style.display = "block";
    document.getElementById("btn-add-role").addEventListener("click", roleAdd, false);    
}

function roleAdd(){
    var id_u = $("#select_editors").val();
    var id_cat = $("#select_cat").val();
    $.ajax ({
        type:"POST",
        url: 'actions/role_add.php',
        data: {
            id_u: id_u,
            id_cat: id_cat
        },
        success: function(data){
            $('#msg-role').text(data);
            if (data == "Rola je uspješno dodana !"){
               $("#msg-role").removeClass("msg-0").addClass("msg-1");
                setTimeout(closeRole, 1000) 
                refreshContent('includes/page_content/roleEditor.php', 'admin-content');
            }
        }
    });
}

function refreshCat(id_u){
        $.ajax({  
                url:"actions/refresh_cat.php",  
                method:"POST",  
                data:{
                    id_u: id_u
                },  
                success:function(data){
                     $('#div-cat-editor').html(data);  
                }  
           });  
}

function closeRole() {
    document.getElementById("modal-editor").style.display = "none";
    document.getElementById("btn-add-role").removeEventListener('click', roleAdd , false );
    $("#msg-role").text("");
    $("#msg-role").removeClass("msg-1").addClass("msg-0");
    $("#modal-editor").load(location.href + " #modal-editor>*", "");
}

function deleteRole(id_re, event){
    if (confirm('Jeste li sigurni da se želite odjaviti?')) {
        $.ajax ({
            type:"POST",
            url: 'actions/delete_role.php',
            data: {
                id_re: id_re
            },
            success: function(data){
                    alert(data);
                if (data == 'Rola je trajno izbrisana, ako želite ponovno dodati rolu editoru pritisnite "Dodaj rolu +"  !') {
                    refreshContent('includes/page_content/roleEditor.php', 'admin-content');
                }
            }
        });
    }
}



// Get the modal
var modal =document.getElementsByClassName('modal')[0];


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
/*
function refreshContent(url, sectionID){
    $.ajax({
       type:"POST",
       url: url,
       data:{ true},
        success: function (data){
            document.getElementById(sectionID).innerHTML = xmlhttp.responseText;
        }
    })
}*/

//AJAX CALL CREATION

var xmlhttp;
if (window.XMLHttpRequest){
	xmlhttp = new XMLHttpRequest();
}else {
	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}

//REFRESH CONTENT ON PAGE
function refreshContent(url, sectionID){
	xmlhttp.open("POST", url, true);
	xmlhttp.onreadystatechange = function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById(sectionID).innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xmlhttp.send();
}





//LIKE
function like(idA){
    $.ajax ({
        type:"POST",
        url: 'article.php',
        data: {
            id: idA
        },
        success: function(data){
                alert(data);
                document.getElementById("btn-like").style.display = "none";
                $("#span-like").load(location.href + " #span-like>*", "");
        }
    });
}

//COMMENT

function comment(idU, idA){
    var userV = $("#user_c").val();
    var emailV = $("#email_c").val();
    var commentV = $("#comment").val();
    $.ajax ({
        type:"POST",
        url: 'actions/comment.php',
        data: {
            id_u: idU,
            id_a: idA,
            user: userV,
            email: emailV,
            comment: commentV
        },
        success: function(data){
            alert(data);
            if (data == "Vaš komentar je objavljen !"){
                $("#commetns-refresh").load(location.href + " #commetns-refresh>*", "");
            }
        }  
    });
}

//Toggle activation
function toggleActivation(id_cat, id_u, id_a){
    $.ajax ({
        type:"POST",
        url: 'actions/toggle_activation_cat.php',
        data: {
            id_cat: id_cat,
            id_u: id_u,
            id_a: id_a
        },
        success: function(data){
                alert(data);
            if (data == "Kategorija je aktivirana i ponovno je vidljiva korisnicima !" || 
                data == "Kategorija je deaktivirana i nije vidljiva korisnicima !"){
                refreshContent('includes/page_content/catAdmin.php', 'admin-content');
                $("#menu").load(location.href + " #menu>*", "");
            }
            if (data == "Korisnik je ponovno aktiviran, te se može prijaviti !" || 
                data == "Korisnik je blokiran i ne može se više prijaviti !") {
                refreshContent('includes/page_content/userAdmin.php', 'admin-content');
            }
            if (data == "Članak je aktiviran i ponovno je vidljiv korisnicima !" || 
                data == "Članak je deaktiviran i nije vidljiv korisnicima !"){
                refreshContent('includes/page_content/articleAdmin.php', 'admin-content');
            }
        }
    });
}

//ADD ARTICLE
function addArticle(){
    var id_cat = $("#category_article").val();
    var position = $("#position_article").val();
    var title = $("#title_article").val();
    var content = $("#content_article").val();
    var description = $("#description_article").val();
    var foto_alt = $("#foto_alt").val();
    $.ajax ({
        type:"POST",
        url: 'actions/add_article.php',
        data: {
            id_cat: id_cat,
            position: position,
            title: title,
            content: content,
            description: description,
            foto_alt: foto_alt
        },
        success: function(data){
            $('#msg-art-add').text(data);
            if (data == "Članak je uspješno objavljen !"){
               $("#msg-art-add").removeClass("msg-0").addClass("msg-1");
               refreshContent('includes/page_content/addArticle.php', 'admin-content');
            }  
        }
    });
}

//IMG UPLOAD CHANGE ADMIN ARTICLE

function uploadimg (theform){
    //Submit the form.
    theform.submit();
}

function doneloading(theFrame, theFile){
    var theloc = "showimg.php?thefile="+theFile;
    theFrame.processAjax("showimg", theloc);
}

function processAjax(obj, serverPage){
    var theImg;
    xmlhttp.open("GET", serverPage);
    xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById(obj).innerHTML = xmlhttp.responseText;
            document.getElementById("new-img").style.display = "none";
        }
    }
    xmlhttp.send(null);
}



/*
$(document).click(function (e) {
    if (!$(e.target).closest('ul').length) {
        $(this).parent().find('#menu li a').slideUp();
    }
});

/*
$(document).ready(function () {
    $('#menu li a').hover(function (e) {
        if (!$(e.target).closest('ul', '#menu li a').length) {
            $('#menu li a').stop(true).slideUp();
        }
    });
});

/*
function dropdown(id){
    var drop = "#drop" + id;
    var dropdown = "#dropdown" + id;
    $(drop).click(function (e) {
        $(dropdown).stop(true).slideToggle();
    });
    $(document).click(function (e) {
        if (!$(e.target).closest(drop, dropdown).length) {
            $(dropdown).stop(true).slideUp();
        }
    });
}*/

/*
function dropdown(id){
    var drop = "#drop" + id;
    var dropdown = "#dropdown" + id;
    $(dropdown).slideDown('slow');
  
    $(dropdown).mouseleave(function () {
     $(dropdown).slideUp('slow');
    });
}*/


   /* 
    $(document).click(function (e) {
        if (!$(e.target).closest('.drop_s, .dropdown_s').length) {
            $('.dropdown_s').stop(true).slideUp('slow');
        }
    });
*/

//DROPDOWN KORISNICI
/*
$(document).ready(function () {
    $('#drop').click(function (e) {
        $('#dropdown').stop(true).slideToggle();
    });
    $(document).click(function (e) {
        if (!$(e.target).closest('#drop, #dropdown').length) {
            $('#dropdown').stop(true).slideUp();
        }
    });
});*/