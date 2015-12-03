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

// making all checkbox checked
// gonna use it for mass deletion of users or another content

function checkingBoxes(){
      var ids = '';
      if($(".check-one:checked").size() > 1){
      $(".delete-all").css("display", "block");
      $(".check-one:checked").each(function(){
        ids += $(this).val() + ",";
      });
    }  else{
        $(".delete-all").css("display", "none"); 
        ids = '';
    }
    ids = ids.replace(/,\s*$/, "");
    $(".delete-all").attr("data-del", "/users/delete?ids=" + ids);
    return ids;
}

$(".check-all").change(function(){
    $(".check-one").prop('checked', $(this).prop("checked"));
    checkingBoxes();
    });

$(".check-one").change(function() {
   checkingBoxes();                           
});

});