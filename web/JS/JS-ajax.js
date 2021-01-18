$(function(){
    
    console.log('Привет, это smvc');
    new_get();
    new_post();
});



function new_post()
{
   $('a.ajaxNewArticleByPost').one('click', function(){ 
      var content = $(this).attr('data-contentId');  
      showLoaderIdentity();
      $.ajax({
         type: "POST",
         url: '/index.php?route=ajax/indexShow',
        // converters: 'json text',
         dataType: 'json',
         data: 'articleId='+content,
         
        })
            .done (function(obj){
            hideLoaderIdentity();
            console.log('Получили ответ:', obj);
            $('td.summary' + content).text(obj);
         })
       
            .fail (function(xhr, status, error){
            hideLoaderIdentity();       
            console.log('Ошибка соединения с сервером (POST)');
            console.log('ajaxError xhr:', xhr);
            console.log('ajaxError status:', status);
            console.log('ajaxError error:', error);               
      });
      
      
      return false;
                          
   });
} 


function new_get()
{
   $('a.ajaxNewArticleByGet').one('click', function(){ 
       var contentId = $(this).attr('data-contentId');
       console.log('ID article = ', contentId);
       $.ajax({
          url: '/index.php?route=ajax/indexShow&articleId=' + contentId,
          dataType: 'json'
        })
        
            .done (function(obj){
            hideLoaderIdentity();
            console.log('Ответ получен');
            $('td.summary' + contentId).text(obj);
            
        })
        
            .fail (function(xhr, status, error){
            hideLoaderIdentity();
    
            console.log('ajaxError xhr:', xhr);
            console.log('ajaxError status:', status);
            console.log('ajaxError error:', error);   
            console.log('Ошибка соединения при получении данных (GET)');
            
        });               
       
       return false;
   });  
}