$.ui.autocomplete.prototype._renderMenu = function(ul, items) {
  var self = this;
  ul.append("<table><thead><tr><th>HSCODE#</th><th>TAR_Ext</th><th>Item Name</th></tr></thead><tbody></tbody></table>");
  $.each( items, function( index, item ) {
    self._renderItem( ul.find("table tbody"), item );
  });
};

$.ui.autocomplete.prototype._renderItem = function(table, item) {
  return $( "<tr></tr>" )
    .data( "item.autocomplete", item )
    .append( "<td>"+item.value+"</td>"+"<td>"+item.TAR_Ext+"</td>"+"<td>"+item.label+"</td>" )
    .appendTo( table );
};

$("#hscode1").autocomplete({
  source:'/hscodes',
  minLength: 1
});