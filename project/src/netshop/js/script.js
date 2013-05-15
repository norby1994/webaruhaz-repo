 $(document).ready(function() {
   $('#att-new').click(function(){
     $('#att-old').hide();
     $('#att-new-add').hide();
   });
    $('#att-old').click(function(){
     $('#att-new').hide();
     $('#att-old-add').show();
   });
 });