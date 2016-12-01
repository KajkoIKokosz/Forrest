$( document ).ready(function(){
    console.log('js załadowany');
    $('.biol_system').hide();
    $('.kingdom').click( function() {
    var kingdomId = $('.kingdom').val();    
    console.log(kingdomId)
    var URL = "http://127.0.0.1:8000/getJson/kingdomId";
    var Json = $.ajax({
        url: URL,
        data: {},
        type:"GET",
        dataType:"json",
        success:function( json ){
            console.log("json załadowany");
            $.getJSON(URL, function(data) {
                console.log('json załadowany');
//                $.each(data, function(index, value) {
//                    var elem = $("<div>" + value.author + ": " + value.title  + "</div>");
//                    $('#Book_list').prepend(elem);
//                });
            });
        },
        error: function(  ) {
            console.log("json niezaładowany");
        }
        //complete: function( xhr, status ) {}
    });
        
        
        $('.phylum').slideDown(1000);
    }) 
});

