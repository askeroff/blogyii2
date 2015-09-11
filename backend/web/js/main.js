/**
 * Function for confirming delete action on news page
 * admin panel
 */
$(document).ready(function(){
    $(".delete-post-link").click(function(){
        var c = confirm("Действие необратимо. Вы уверены, что хотите удалить?");
        if(c == true)
        {
            window.location = $(this).attr("data-del");
        } else {
            return null;
        }
    });
});