$("#itemGroupName").autocomplete({
    source: '/supplier',
    select: function(event, ui){
          $("#itemGroupName").val(ui.item.label);
          $("#cltcode").val(ui.item.value);
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