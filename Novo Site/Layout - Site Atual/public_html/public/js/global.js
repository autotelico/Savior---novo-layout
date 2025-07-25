$('.tab-button').click(function(){
	$('.tab-button').removeClass('active');
	$(this).addClass('active');
	$('.tab-block').removeClass('active');
	$('#'+$(this).attr('data-tab')).addClass('active');
})

$('.toTop').click(function() {
	$('body, html').animate({scrollTop:0},800);
});

$(document).ready(function() { 
    
    var overlay = $('#overlay'); 
    var open_modal = $('.open_modal'); 
    var close = $('.modal_close, #overlay'); 
    var modal = $('.modal_div'); 

     open_modal.click( function(event){ 
         event.preventDefault(); 
         var div = $(this).attr('href'); 
         overlay.fadeIn(400, 
             function(){ 
                 $(div) 
                     .css('display', 'block') 
                     .animate({opacity: 1, top: '25%'}, 200);
         });
     });

     close.click( function(){ 
            modal 
             .animate({opacity: 0, top: '45%'}, 200, 
                 function(){ 
                     $(this).css('display', 'none');
                     overlay.fadeOut(400); 
                 }
             );
     });
});


