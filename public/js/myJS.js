$(document).ready(function(){



  let cart_count = getCookie("cart_count");
  
  if (cart_count != "")
  {
       $(".dot").css("display", " inline-block");
       $(".dot_text").html(cart_count);
       $(".cart_item_number").html(cart_count);

  }

  $(".add_to_cart_BTN").click(function(){


    $(".dot").css("display", " inline-block");
    let count =   $(".dot_text").html();
    count = parseInt(count);
    count++;
    $(".dot_text").html(count);

    setCookie("cart_count", count, 365);


 
    let prod_id = $(this).attr('id');

    // get cart from cookie

    let cart = getCookie("cart_cookie"); 
 
    cart += ","+prod_id;
    setCookie("cart_cookie", cart, 365);


 
  });


;(function(){

  if($('#Cart-Items').length){

  
    let item_ids = getCookie("cart_cookie");
    if(item_ids != "")
    {
        $.ajax({
          type:'get',
          url: "/cart_items/"+item_ids, 
          dataType:'json',
          data:{},
          success:function(response) {
            
            // remove any old card items in this div 
             $( "#Cart-total" ).empty();

             // get count of each product
             var item_ids_array = item_ids.split(',');  
           //  item_ids_array = unset(item_ids_array[0]);
             product_with_count = countProducts(item_ids_array);

             console.log(product_with_count);

             let totalprice = 0; 
             // loop on response 
            $.each(response, function(i, val) {

              let j = i; 
              if(product_with_count[0][0]=="")
                  j++;

            let count = 0; 
            for( k = 0 ; k < product_with_count.length ; k ++)
            {
              if(product_with_count[k][0] == val['id'])
                count  = product_with_count[j][1];
            }
            // draw the card item
             let image_link = val['image'];
             let name = val['name'];
             let price = val['price'];
             let old_price = val['old_price'];

             let  intprice = parseInt(price.replace("EGP ", ""));
             let intcount = parseInt(count);

             subprice = intcount* intprice;
             totalprice += subprice;

              $('#Cart-total').append('<div class="Cart-Items" id="Cart-Items"><div class="row"><div class="col-6"><div class="cart_section"><div class="row"><div class="col-4"><img class="image-cart-item" src='+image_link+'" alt=""></div><div class="col-8"><p class="cart_item_name">'+name+'</p></div></div></div></div><div class="col-2"><div class="cart_section"><p class="cart_item_text">'+count+'</p></div></div><div class="col-2"><div class="cart_section"><p class="cart_item_text">'+price+'</p><p class="cart_item_text">'+old_price+'</p></div></div><div class="col-2"><div class=""><p class="cart_item_text paid_price">'+subprice+'</p></div></div></div></div>');

              j++;
            });

            console.log(totalprice);

            $('.finalprice').html(totalprice);
          }
        });
    }
  }

})();


  function countProducts(item_ids_array){

    let products_lenght = item_ids_array.length; 

    let products_count = [];
    let unique_ids = []; 


    for (i=0; i<products_lenght;i++){
      let count = 1; 

      for(j=0; j<products_lenght; j++){
        if(i != j ){
          if(item_ids_array[i] == item_ids_array[j])
          {
            count++;
          }
        }        
      }
      item_count = [item_ids_array[i],count];
      let inArray = jQuery.inArray( item_ids_array[i], unique_ids ) ; 
     // console.log(inArray);
      if(inArray == -1){
          unique_ids.push(item_ids_array[i]);
          products_count.push(item_count);
      }

    }
      return products_count;
  }

  function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }


  function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }
});