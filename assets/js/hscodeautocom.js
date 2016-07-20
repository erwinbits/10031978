/*$(function(){
    $("#hscode1").autocomplete({
        source:'/hscodes',
        select: function(event,ui){
          $("#hscode1").val(ui.item.value);
          $("#tardsc1").val(ui.item.desc);
          $("#tarext1").val(ui.item.TAR_Ext);
          return false;
        },
        
    }).data("autocomplete")._renderItem = function(ul, item){
        return $("<li></li>")
          .data("item.autocomplete", item)
          .append("<a><strong>"+item.value+"</strong></a>")
          .appendTo(ul);
    };
});*/


 jQuery(document).ready(function () {

 event.preventDefault();
$.ui.autocomplete.prototype._renderItem = function(ul, item) {
event.preventDefault();

  return $( "<li>" )
    .data( "item.autocomplete", item )
    .append( "<a>"+item.HS_Code+"--"+item.TAR_Ext+"--"+item.TAR_DSC+"</a>" )
    .appendTo( ul );
 

};

       var addAuto = function ($tr) {
           console.log("Add auto");
           event.preventDefault();
           $('.hscode', $tr).autocomplete({
               source: '/hscodes',
               minLength: 2,
               select: function (evt, ui) {
                 
                   $(".hscode",$tr).val(ui.item.HS_Code);
                   $(".tar_desc", $tr).val(ui.item.TAR_DSC);
                   $(".tar_ext", $tr).val(ui.item.TAR_Ext);
                   $("#hscode").defaultValue;
                  evt.preventDefault();
                   
               }
           });
       }

       var defaultValue = function(){

 $("#hscode").val("waaaa");

       }
       // Update the row total of a specific row
       var updateTotal = function ($row) {
        console.log("update total");
           // Get the specific inputs
           var $quantity = $('.quantity', $row);
           var $cost = $('.cost', $row);
           var $total = $('.total', $row);
           var input1 = parseFloat($quantity.val());
           var input2 = parseFloat($cost.val());
           if (isNaN(input1) || isNaN(input2)) {
               if (!input2) {
                   $total.val($quantity.val());
               }

               if (!input1) {
                   $total.val($cost.val());
               }

           } else {
               $total.val(input1 * input2);
           }
           var total = input1 * input2;
           $total.val(total);
           // Now update the grand total
           var grandTotal = 0;
           $('.total').each(function () {
               grandTotal += parseFloat($(this).val());
           });
           $('.grandtotal').val(grandTotal);
       };

       var scntDiv = $('#p_scents');

       $('.addScnt').click(function () {
        console.log("clicks");
           var i = $('#p_scents tr').length + 1;
           var $tr = $('<tr>').append('<td>' + i + '</td>' + $('#template').html());
           scntDiv.append($tr);
           //return false;
           addAuto($tr);
       });

       //Remove button
       $(document).on('click', '.remScnt', function () {

           // Is there more than one row?
           var i = $('#p_scents tr').length;
           if (i > 1) {
               $(this).closest('tr').remove();
           }
           return false;
       });

       // Attach auto complete to the initial row
       addAuto($('#p_scents tr:first'));

       // Keyup handler recalculates the row total
       $('#p_scents').on('keyup', '.quantity,.cost', function () {
           updateTotal($(this).closest('tr'));
       });

       // Do an initial update of the first row totals
       updateTotal($("#p_scents tr:first"));

   });

   