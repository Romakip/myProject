$(function() {
   console.log('shopJS'); 
   shop_cart();
   count_cart_minus();
   count_cart_plus();
   cart_buy_all();
   
});   

function shop_cart(){
    
    $('button.shopCart').one('click', function(){
        let idInsert = $(this).attr('data-product-id');
                
        $.ajax({
            type: "POST",
            url: '/index.php?route=ajax/indexInsert',
            dataType: 'json',
            data: 'product-id=' + idInsert       
        })

            .done(function(obj){
                console.log("Product added in cart!");
                $(`#pullCartId${idInsert}  button`).replaceWith("Уже в корзине!");
                $(`#CartCount`).replaceWith(`<p id="CartCount">Корзина ${obj}</p>`);
        })
        
            .fail(function(xhr, status, error){
                console.log("Product ne ydalos add");
                console.log('Ошибка соединения с сервером (POST)');
                console.log('ajaxError xhr:', xhr);
                console.log('ajaxError status:', status);
                console.log('ajaxError error:', error);
        })
    })
}


function count_cart_minus() {
    
    $('button.minusCount').click(function(){
        let idCountMinus = $(this).attr('data-productId');
        let SumId = $(this).attr('data-priceId');
        
        $.ajax({
            
            type: "POST",
            url: '/index.php?route=ajax/indexUpdate',
            dataType: 'json',
            data: `productId=${idCountMinus}&doing=minus`
        })
        
            .done(function(obj){
                
                console.log(`Minus! ${idCountMinus}`);
                $(`#CountId${idCountMinus}`).replaceWith(`<p id=CountId${idCountMinus}>${obj}</p>`);
                $(`#SumId${idCountMinus}`).replaceWith(`<p id=SumId${idCountMinus}>${obj * SumId}</p>`);
            })    
            
            .fail(function(xhr, status, error){
                
                console.log(`Error! this ${error}`);
                console.log(`Xhr! this ${xhr}`);
                console.log(`Stauts! this ${status}`);
        
            })
        
        
    })
}


function count_cart_plus() {
    
    $('button.plusCount').click(function(){
        let idCountPlus = $(this).attr('data-productId');
        let SumId = $(this).attr('data-priceId');
        
        console.log("id", idCountPlus);
        console.log("price", SumId);
        $.ajax({
            
            type: "POST",
            url: "/index.php?route=ajax/indexUpdate",
            //dataType: 'json',
            data: `productId=${idCountPlus}&doing=plus`
        })
        
        
                .done(function(obj){
                    
                    console.log(`Plus! ${idCountPlus}`);
                    console.log(obj);
                    $(`#CountId${idCountPlus}`).replaceWith(`<p id=CountId${idCountPlus}>${obj}</p>`);
                    $(`#SumId${idCountPlus}`).replaceWith(`<p id=SumId${idCountPlus}>${obj * SumId}</p>`);
        })
        
                .fail(function(xhr, status, error){
                    
                    console.log(`Error! this ${error}`);
                    console.log(`Xhr! this ${xhr}`);
                    console.log(`Status! this ${status}`);
        })
   
    })
      
   
}


function cart_buy_all(){
        
        $(`button.buyAll`).one('click', function(){
        let API = "Want";
        console.log(API);
        
        $.ajax({
            
            type: "POST",
            url: "/index.php?route=admin/cart/update",   
            //dataType: 'json',
        })
                .done(function(obj){
                    
                    console.log('done!', obj);
                    console.log("Успешно!");
                    if (!obj){
                        $(`span#Botall`).replaceWith(`<h3>Спасибо за покупку, будем рады вам снова,
                        наш <a href="http://simplemvc-example.loc/index.php?route=admin/shop/index">магазин</a> всегда открыт для Вас!</h3>`);
                    }else if (obj){
                        alert("На складе не хватает вещей, пожалуйста, попытайтесь купить позже");
                    }    
        })
                .fail(function(xhr, status, error){
                    
                    console.log(`xhr - ${xhr}`);
                    console.log(`status - ${status}`);
                    console.log(`error - ${error}`);
        })

            
        })
        
    }


