$('#dialog_link').click(function () {
    $('#dialog').dialog('open');
    return false;
});
 
$('#dialog').dialog({
    autoOpen: false,
    maxHeight:400,                     
    height:400,
    title:"TITULO",                
    buttons: {
        "Cerrar": function (){
            $(this).dialog("close");
        }
    },
 
    open:function(){
        var s = $('#contents').height();
        var s2 = $(this).dialog( "option", "maxHeight" );
                         
        if(s < s2){
            $(this).height(s);
        }
    }
});