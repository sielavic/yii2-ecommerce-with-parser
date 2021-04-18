/*price range*/

 $('#sl2').slider();

    $('.catalog').dcAccordion({
        speed: 300
    });


function showWishlist(wishlist){
        $('#wishlist .modal-body').html(wishlist);

        $('#wishlist').modal();
    }

    function getWishlist(){
        $.ajax({
            url: '/wishlist/show',
            type: 'GET',
            success: function(res){
                if(!res) alert('Ошибка!');
                showWishlist(res);
            },
            error: function(){
                alert('Error!');
            }
        });
        return false;
    }


// Удаление из корзины
$('.del-item').on('click',function(){
    $.ajax({
        url:'/wishlist/del-item',
        data:{id:$(this).data('id')},
        success:function(){
        location.reload();    
        }
    });
});


$('.del-item2').on('click',function(){
    $.ajax({
        url:'/wishlist/del-item',
        data:{id:$(this).data('id')},

        success:function(){
        location.reload();    
        }
    });
});

$('.del-item3').on('click',function(){
    $.ajax({
        url:'/cart/del-item',
        data:{id:$(this).data('id')},
        success:function(){
        location.reload();    
        }
    });
});



$('#wishlist .modal-body').on('click', '.del-item', function(){
        var id = $(this).data('id');
        $.ajax({
            url: '/wishlist/del-item',
            data: {id: id},
            type: 'GET',
            success: function(res){
                if(!res) alert('Ошибка!');
                showWishlist(res);
            },
            error: function(){
                alert('Error!');
            }
        });
    });

$('.modal').on('click',  '.close', function() {
   location.reload();
});

$('.modal-footer').on('click', '.btn-default', function() {
   location.reload();
});


 $('#wish').on('click', '.add-to-cart2', function(){
        var id = $(this).data('id');
        $.ajax({
            url: '/wishlist/del-wish',
            data:{id:$(this).data('id')},
                                          // вишлист делит
          success: function(result) {
          //$('#wish').html(result);
       //  if($('#close').click)){
       //  location.reload();

       //  },
         // $('div').removeClass("container table-responsive");
          
        //  $("div.container:last").remove();
          
        //  var justADiv = html.replace('div>', '').replace('div>', '');
        //  var oldData = $('#wish').html();
         // var newData = $(justADiv).find('#wish').html();
          $('#wish').html(result);
    
          
          // $('#wish' ).html("");
      //   $('.table-responsive' ).html(html); 
         
        //  var justADiv = html.replace('div>', 'div>').replace('div>', 'div>');
        //  var oldData = $('#wish').html();
        //  var newData = $(justADiv).find('#wish').html();
           
        },
            
              error: function(){
                alert('Error!');
            }
        
        });
        
    });
    


    function clearWishlist(){
        $.ajax({
            url: '/wishlist/clear',
            type: 'GET',
            success: function(res){
                if(!res) alert('Ошибка!');
                //showWishlist(res);
                location.reload(); 
            },
            error: function(){
                alert('Error!');
            }

        });
    }






$('.add-to-wishlist').on('click', function (e) {
        e.preventDefault();
        var id = $(this).data('id'),
            qty = $('#qty').val();
        $.ajax({
            url: '/wishlist/add',
            data: {id: id, qty: qty},
            type: 'GET',
            success: function(res){
                if(!res) alert('Ошибка!');
                showWishlist(res);
            },
            error: function(){
                alert('Error!');
            }
        });
    });





    function showCart(cart){
        $('#cart .modal-body').html(cart);
        $('#cart').modal();
    }

    function getCart(){
        $.ajax({
            url: '/cart/show',
            type: 'GET',
            success: function(res){
                if(!res) alert('Ошибка!');
                showCart(res);
            },
            error: function(){
                alert('Error!');
            }
        });
        return false;
    }

    $('#cart .modal-body').on('click', '.del-item', function(){
        var id = $(this).data('id');
        $.ajax({
            url: '/cart/del-item',
            data: {id: id},
            type: 'GET',
            success: function(res){
                if(!res) alert('Ошибка!');
                showCart(res);
            },
            error: function(){
                alert('Error!');
            }
        });
    });

    function clearCart(){
        $.ajax({
            url: '/cart/clear',
            type: 'GET',
            success: function(res){
                if(!res) alert('Ошибка!');
                showCart(res);
            },
            error: function(){
                alert('Error!');
            }
        });
    }


  $('.add-to-cart2').on('click', function (e) {
        e.preventDefault();
        var id = $(this).data('id'),
            qty = $('#qty').val();
        $.ajax({
            url: '/cart/add',
            data: {id: id, qty: qty},
            type: 'GET',
            success: function(res){
                if(!res) alert('Ошибка!');
                showCart(res);
            },
            error: function(){
                alert('Error!');
            }
        });
    });


    $('.add-to-cart').on('click', function (e) {
        e.preventDefault();
        var id = $(this).data('id'),
            qty = $('#qty').val();
        $.ajax({
            url: '/cart/add',
            data: {id: id, qty: qty},
            type: 'GET',
            success: function(res){
                if(!res) alert('Ошибка!');
                showCart(res);
            },
            error: function(){
                alert('사이즈를 선택하다!');
            }
        });
    });
    
    


	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});
