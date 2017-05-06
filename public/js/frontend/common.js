$(function(){

/***********setting on main*************/
    $(".owl-carousel").owlCarousel({
        autoWidth:true,
        items:4,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [980,3],
        itemsTablet: [768,2],
        itemsTabletSmall: false,
        itemsMobile : [479,1],
        nav:false,
        loop: true,
        autoPlay: 4000,
        dots : false
    });
/***********END setting on main*************/

/***********setting for licenses*************/
    $('.flex-gallery').each(function(){
        $(this).unitegallery({
            gallery_theme: "tilesgrid",
            gallery_width:"100%",              //gallery width
            grid_space_between_cols:15,
            grid_space_between_rows:5,
            grid_space_between_mobile:0,
            tile_enable_border:false,
            tile_enable_shadow:false,
            grid_padding:0,
            tile_width: 255,						//tile width
            tile_height: 365,
            grid_num_rows:10
        });
    });
/***********END setting for licenses*************/

/***********project pop-up*************/
    $('.show-project-item').click(function(event){
        var project_id = $(this).attr('data-project-id');
        $('#overlay').fadeIn(400,
            function(){
                // console.log(service_id);
                $('[data-popup-id='+project_id+']')
                    .css('display', 'block')
                    .animate({opacity: 1, top: '45%'}, 200);
            });
        //Popup advice ClOSE
        $('#overlay').click( function(){
            $('[data-popup-id='+project_id+']')
                .animate({opacity: 0, top: '45%'}, 200,
                    function(){
                        $(this).css('display', 'none');
                        $('#overlay').fadeOut(400);
                    }
                );
        });
        $(document).keydown( function(e) {
            if (e.keyCode === 27) {
                $('[data-popup-id='+project_id+']')
                    .animate({opacity: 0, top: '45%'}, 200,
                        function(){
                            $(this).css('display', 'none');
                            $('#overlay').fadeOut(400);
                        }
                    );
                e.preventDefault();
            }
        });
        event.preventDefault();
    });
/***********END project pop-up*************/

/***********vacantions pop-up*************/
    $('.btn__blue-in-vacantion').click(function(event){
        var vacantions_id = $(this).parent().attr('id');
        $('#overlay').fadeIn(400,
            function(){
                $('[data-id=' + vacantions_id + ']')
                    .css('display', 'block')
                    .animate({opacity: 1, top: '45%'}, 200);
            });
        //Popup advice ClOSE
        $('#overlay').click( function(){
            $('[data-id=' + vacantions_id + ']')
                .animate({opacity: 0, top: '45%'}, 200,
                    function(){
                        $(this).css('display', 'none');
                        $('#overlay').fadeOut(400);
                    }
                );
        });
        $(document).keydown( function(e) {
            if (e.keyCode === 27) {
                $('[data-id=' + vacantions_id + ']')
                    .animate({opacity: 0, top: '45%'}, 200,
                        function(){
                            $(this).css('display', 'none');
                            $('#overlay').fadeOut(400);
                        }
                    );
                e.preventDefault();
            }
        });
        event.preventDefault();
    });
/***********END vacantions pop-up*************/
    
/***********callback pop-up*************/
    $('.callback').click(function(event){
        $('#overlay').fadeIn(400,
            function(){
                $('#callback')
                    .css('display', 'block')
                    .animate({opacity: 1, top: '45%'}, 200);
            });
        //Popup advice ClOSE
        $('#overlay').click( function(){
            $('#callback')
                .animate({opacity: 0, top: '45%'}, 200,
                    function(){
                        $(this).css('display', 'none');
                        $('#overlay').fadeOut(400);
                    }
                );
        });
        $(document).keydown( function(e) {
            if (e.keyCode === 27) {
                $('#callback')
                    .animate({opacity: 0, top: '45%'}, 200,
                        function(){
                            $(this).css('display', 'none');
                            $('#overlay').fadeOut(400);
                        }
                    );
                e.preventDefault();
            }
        });
        event.preventDefault();
    });
/***********END callback pop-up*************/

/***********project category tabs*************/
    $('.project-btn-wrapper .btn').click( function (e) {
        var category_id = $(this).attr('data-category-id');
        $('.project-btn-wrapper .btn').removeClass('btn__yellow');
        $(this).addClass('btn__yellow');
        $('.project-category').fadeOut(500);
        $('.project-content').find('[data-project-category='+category_id+']').fadeIn(1000);
    });
/***********END project category tabs*************/

/***********services category tabs*************/
    $('.services-menu_item').click( function (e) {
        var services_id = $(this).attr('data-services-id');
        $('.services-menu_item').removeClass('active');
        $(this).addClass('active');
        $('.services-page-item').fadeOut(500);
        $('.content-section').find('[data-services-item-id='+services_id+']').fadeIn(1000);
    });
/***********END services category tabs*************/

/**********scrollTo**************/
    $(".vacantions-menu_item").click(function() {
        var scrollId = $(this).attr('data-id');
        $('html, body').animate({
            scrollTop: $("#" + scrollId).offset().top
        }, 2000);
    });
/**********END scrollTo**************/

/**********Transition to a specified service**************/
    var hashId = window.location.hash.slice(1);
    if(hashId != 0){
        $('.services-menu-wrap').find('[data-services-id=' + hashId +']').trigger('click');
    }
/**********END transition to a specified service**************/

    $('#menu-toggle-open').on('click', function () {
        $('#nav-toggle').addClass('active');
    });
    $('#menu-toggle-close').on('click', function () {
        $('#nav-toggle').removeClass('active');
    });
    /**********call-back popup**************/
    $('#submit-send').on('click', function(event){
        $('#submit-send').attr('disabled', true);
        var data = new FormData($('form.callback')[0]);
        var url = $( "input[name$='url']" ).val();
        console.log(data);
        $.ajax({
            url: url,
            method: 'POST',
            processData: false,
            contentType: false,
            data: data,
            dataType : "json",
            success: function(data){
                //console.info('Server response: ', data);
                if(data.success){
                    swal(trans['base.success'], "", "success");
                    $(".callback").trigger("reset");
                    $('#callback, #overlay').hide();
                    $("#submit-send").attr('disabled', false);

                }
                else{
                    swal(trans['base.error'], data.message, "error");
                    $("#submit-send").attr('disabled', false);
                }
            },
            error:function(data){
                swal(trans['base.error']);
                $("#submit-send").attr('disabled', false);
                //  jQuery("#resume-form").trigger("reset");
            }

        });
        event.preventDefault();
    });
    /**********END call-back popup**************/
    /**********call-back**************/
    $('#send').on('click', function(event){
        $('#send').attr('disabled', true);
        var data = new FormData($('form#contact-callback')[0]);
        var url = $( "input[name$='url']" ).val();
        console.log(data);
        $.ajax({
            url: url,
            method: 'POST',
            processData: false,
            contentType: false,
            data: data,
            dataType : "json",
            success: function(data){
                //console.info('Server response: ', data);
                if(data.success){
                    swal(trans['base.success'], "", "success");
                    $("#contact-callback").trigger("reset");
                    $("#send").attr('disabled', false);

                }
                else{
                    swal(trans['base.error'], data.message, "error");
                    $("#send").attr('disabled', false);
                }
            },
            error:function(data){
                swal(trans['base.error']);
                $("#send").attr('disabled', false);
                //  jQuery("#resume-form").trigger("reset");
            }

        });
        event.preventDefault();
    });
    /**********END call-back**************/

    /**********Vacancies**************/
    $('.submit-vacantion').on('click', function(event){
        $('.submit-vacantion').attr('disabled', true);
        var vacancy_id = $(this).attr('id');
        console.log(vacancy_id);
        var data = new FormData($('form#vacantion-form-' + vacancy_id)[0]);
        console.log(data);
        $.ajax({
            url: '',
            method: 'POST',
            processData: false,
            contentType: false,
            data: data,
            dataType : "json",
            success: function(data){
                //console.info('Server response: ', data);
                if(data.success){
                    swal(trans['base.success'], "", "success");
                    $("#contact-callback").trigger("reset");
                    $(".submit-vacantion").attr('disabled', false);

                }
                else{
                    swal(trans['base.error'], data.message, "error");
                    $(".submit-vacantion").attr('disabled', false);
                }
            },
            error:function(data){
                swal(trans['base.error']);
                $(".submit-vacantion").attr('disabled', false);
                //  jQuery("#resume-form").trigger("reset");
            }

        });
        event.preventDefault();
    });
    /**********\Vacancies**************/
});