
(function ($) {
    
  
    $(".confirmDelete").submit(function (event) {
        var x = confirm("Are you sure you want to delete?");
        if (x) {
            return true;
        }
        else {
            event.preventDefault();
            return false;
        }
    });
    
     $("select[name=mesSelecionado]").change(function () { 
        var form = $(this).parent();
        form.submit();
    });
    

})(jQuery);

