$(function(){

     $("#zone").autocomplete({
    source: '/zones',
    select: function(event, ui){
          $("#zone").val(ui.item.label);
          $("#ecozone").val(ui.item.value);
          //$("#zone").val(ui.item.Zone);
          return false;
     },

        // search: function(){$(this).addClass('working');},
        // open: function(){$(this).removeClass('working');}

    }).data("autocomplete")._renderItem = function(ul, item){
        return $("<li></li>")
              .data("item.autocomplete", item)
              .append("<a><strong>" + item.label + "</strong></a>")
              .appendTo(ul);
        };

});