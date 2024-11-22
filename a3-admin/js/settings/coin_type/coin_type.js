function changeCoinType(id){
    event.preventDefault();   
      $.post("view/theme/inc/settings/coin_type/change/change_form.php",
      {
          id : id
      },
      function(result){
        $("#change").html(result);
      });
};