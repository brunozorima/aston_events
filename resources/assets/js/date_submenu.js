/**
 * Created by BRUNO ZORIMA on 10/04/2018.
 */
$(document).ready(function(){
    $('.dropdown-submenu a.drop').on("click", function(e){
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });
});

