var curentPage = 0;
var allPages = 4;

function nikosAjax(){
    if(curentPage==4){return false;}
    //$('#drogos').html('loading....');
    //edw vazeis oti xreastei na trexei san loading
    
    $.ajax('/jimframes/index.php?route=news/ncategory', {
        success: function(data) {
            $('#drogos').append($(data).find('.skata-grid'));
            curentPage++;
            //edw akyrwneis to loader px to kaneis opacity 0 klp klp
        },
        error: function() {
            console.log('Error Occured !!!');
        }
    });

}



//$('#container').load('url',function(data){  })