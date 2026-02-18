$(document).ready(function(){
    $("#addEmpBtn").on('click', function(){
        $("#empFormCard").slideToggle(400);
    });

    $(".delete-confirm").on('click', function(e){
        if(!confirm("Are you sure you want to delete this record? This action cannot be undone.")){
            e.preventDefault();
        }
    });

    // 4minute 
    if($("#alert").length){
        setTimeout(() => { 
            $("#alert").fadeOut(600); 
        }, 4000);
    }
    $("#mobile-menu-btn").on('click', function(){
        const $sidebar = $("#sidebar");
        $sidebar.toggleClass("active");
        const isOpen = $sidebar.hasClass("active");
        $(this).attr("aria-expanded", isOpen ? "true" : "false");
    });
    
    $(".sidebar a").on('click', function(){
        if($(window).width() < 768) {
            $("#sidebar").removeClass("active");
            $("#mobile-menu-btn").attr("aria-expanded", "false");
        }
    });
});
