$(function(){

    $("#supplier").autocomplete({
    source: '/supplier',
    select: function(event, ui){
          $("#supplier").val(ui.item.supplierName);
          $("#add1").val(ui.item.Addr1);
          $("#add2").val(ui.item.Addr2);
          $("#add3").val(ui.item.Addr3);
          $("#ZoneLoc").val(ui.item.ZoneLoc);
          $("#TIN").val(ui.item.TIN);
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