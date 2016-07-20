$(function(){

      var data = [
            {"label":"Port of Davao (Air)", "value":"P12AB"},
            {"label":"Sub-Port of Mactan", "value":"P07B"},
            {"label":"Ninoy Aquino Intl Airport", "value":"P03"},
            {"label":"Clark", "value":"P14"},
            {"label":"Sub-Port of Dadiangas (Air)", "value":"P12AA"},
            {"label":"Zamboanga International Airport", "value":"P11C"},
            {"label":"Sub-Port of Manila Domestic Airport", "value":"P03A"},
            
            ];

      $("#port").autocomplete(
      {
            source:data,
            select: function( event, ui ) {
                  $("#port").val(ui.item.label);
                  $("#portdesc").val(ui.item.value);
                  return false;

            },

            search: function(){$(this).addClass('working');},
            open: function(){$(this).removeClass('working');}
      });
	  
	
   $("#else").autocomplete(
   {
    source: '/else',
    select: function(event, ui){
          $("#else").val(ui.item.label);
          $("#tin").val(ui.item.value);
          $("#add1").val(ui.item.Addr1);
          $("#add2").val(ui.item.Addr2);
          $("#add3").val(ui.item.Addr3);
          $("#zone").val(ui.item.Zone);
          $("#email").val(ui.item.Email);
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
		
	$("#supplier").autocomplete({
    source: '/supplier',
    select: function(event, ui){
          $("#supplierName").val(ui.item.label);
          $("#add1").val(ui.item.value);
          $("#add2").val(ui.item.add2);
          $("#add3").val(ui.item.add3);

          return false;
     },

    }).data("autocomplete")._renderItem = function(ul, item){
        return $("<li></li>")
              .data("item.autocomplete", item)
              .append("<a><strong>" + item.label + "</strong></a>")
              .appendTo(ul);
        };
		

	$("#hscode").autocomplete({
    source: '/hscodes',
     minLength: 2,
    select: function(event, ui){
          $("#tar_desc").val(ui.item.desc);
          $("#hscode").val(ui.item.value);
          $("#tar_ext").val(ui.item.TAR_EXT);
          return false;
		},

    }).data("autocomplete")._renderItem = function(ul, item){
        return $("<li></li>")
              .data("item.autocomplete", item)
              .append("<a><strong>" + item.value + "</strong></a>")
              .appendTo(ul);
        };

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

    }).data("autocomplete")._renderItem = function(ul, item){
        return $("<li></li>")
              .data("item.autocomplete", item)
              .append("<a><strong>" + item.label + "</strong></a>")
              .appendTo(ul);
        };
});