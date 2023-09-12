$(document).ready(function () {
    $('.delete_product_btn').click(function (e) { 
        e.preventDefault();
        var id = $(this).val();
        // alert(id);
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              
              $.ajax({
                method: "POST",
                url: "code.php",
                 data: {
                   'product_id':id,
                   'delete_product_btn':true

                },
                
                success: function (response) {
                  
                    if(response == 200){
                        
                        swal(" success!",  "Product Deleted Successfully!", "success");
                        $("#products_table").load(location.href + " #products_table");
                    }else if(response == 500){
                        swal("Error !",  "Something went wrong!", "Error");
                    }
                    
                }
              });
            } 
          });
        
    });
});
