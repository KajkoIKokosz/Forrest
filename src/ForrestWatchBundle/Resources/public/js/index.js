$( document ).ready(function(){
    console.log('js załadowany');
    $('.biol_system').hide();
    $('.kingdom').click( function() {
        var kingdomId = $('.kingdom').val();    
        console.log(kingdomId)
        var url = "/" + kingdomId;
        
        $('.phylum').slideDown(1000);
        
        $.ajax({
            url: url,
            success: function(){
                console.log("wysłano na adres");
            }
        });
        $('.phylum').slideDown(1000);
    });


    
    
});

