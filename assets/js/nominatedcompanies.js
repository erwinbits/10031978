$(function(){

     $("#nominated").autocomplete({
    source: '/nominatedcompanies',
    select: function(event, ui){
          $("#nominated").val(ui.item.label);
          $("#tin").val(ui.item.value);
          $("#zone").val(ui.item.Zone);
          return false;
     },

        // search: function(){$(this).addClass('working');},
        // open: function(){$(this).removeClass('working');}

    }).data("autocomplete")._renderItem = function(ul,item){
        return $("<li></li>")
              .data("item.autocomplete", item)
              .append("<a><strong>" + item.label + "</strong></a>")
              .appendTo(ul);
        };

});