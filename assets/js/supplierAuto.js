$("#supplier").autocomplete({
    source: '/supplier',
    select: function(event, ui){
          $("#supplier").val(ui.item.label);
          $("#TIN").val(ui.item.value);
          $("#add1").val(ui.item.add1);
          $("#add2").val(ui.item.add2);
          $("#add3").val(ui.item.add3);
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