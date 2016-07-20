var vals = [];
 $(document).ready(function () {

     var $checkes = $('input:checkbox[name="chk[]"]').change(function () {
         vals = $checkes.filter(':checked').map(function () {
             return this.value;
         }).get();

         alert(JSON.stringify(vals));
     });
 });