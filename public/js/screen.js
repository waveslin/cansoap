$(window).resize(function(){
    if ($(window).width() <= 432) {  
        $(".brand-name").addClass( "hide" );
        $(".cart-item-info").addClass( "flex-column" );
        $(".need-sm-gap").addClass( "add-sm-gap" );
    }else{
        $(".brand-name").removeClass( "hide" );
        $(".cart-item-info").removeClass( "flex-column" );
        $(".need-sm-gap").removeClass( "add-sm-gap" );
    }

});