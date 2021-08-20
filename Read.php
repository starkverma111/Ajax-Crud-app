  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Bootstrap 5-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Google Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" />
      <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet"/>
      
      <!-- Jquery CDN -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

      <title>Read</title>
      <style>
        body {
          background-color: whitesmoke;
          font-family: "Raleway", sans-serif;
        }
      </style>
  </head>
  <body>
  <ul class="nav justify-content-center p-4">
        <li class="nav-item">
          <a class="nav-link btn-primary text-dark rounded" href="Create.php">Create</a>
        </li>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <li class="nav-item ">
          <a class="nav-link btn-warning text-dark rounded" href="Read.php">Read</a>
        </li>
      </ul>


  <div class="container mt-5" style="width:40%">
    <h1 class="text-center">View data In Php using Ajax</h1>
    
    <table class="table table-bordered text-center mt-4" >
      <thead >
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Message</th>
          <th>Update</th>
          <th>Delete</th>
        </tr>
      </thead>

      <tbody id="table">
        
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="myform">

      <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Id</label>
          <input type="text" class="form-control" id="id" disabled />
        </div>  
      <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" />
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" />
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Message</label>
          <input type="text" class="form-control" id="message" />
        </div>
        <button type="button" class="btn btn-primary"  id="update_submit" >Submit</button>
        </form>
      </div>
      
    </div>
  </div>
</div>

  <script>
  $(document).ready(function() {
  //Read function
  fetch();
  function fetch(){	$.ajax({
      url: "AJax_view.php",
      type: "POST",
      cache: false,
      success: function(data){
        $('#table').html(data); 
      }
    });
  }
  //Delete function
    $(document).on("click", ".delete", function() { 
    
      var delete_id = $(this).data("id");
      
      $.ajax({
        url: "Ajax_delete.php",
        type: "POST",
        cache: false,
        data:{
          id: delete_id
        },
        success: function(data_delete){
        alert(data_delete);
        fetch();
        }
      });
  });

//Update Get and set on popup from function
$(document).on("click", ".update", function() { 
    
    var update_id = $(this).data("id");
    var update_name = $(this).data("name");
    var update_email = $(this).data("email");
    var update_message = $(this).data("message");

      $('#id').val(update_id);
      $('#name').val(update_name);
      $('#email').val(update_email);
      $('#message').val(update_message);

    
});

$('#update_submit').on('click', function(e) {
        e.preventDefault();

		
    var id = $('#id').val();
    var name = $('#name').val();
		var email = $('#email').val();
		var message = $('#message').val();
		
        if(id!="" && name!="" && email!="" && message!=""){
            
			$.ajax({
				url: "Ajax_update.php",
				type: "POST",
				data: {
          id: id,
					name: name,
					email: email,
					message: message			
				},
				cache: false,
				success: function(dataru){
                    $('#myform').trigger("reset");
					   alert(dataru);
             fetch();
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});


  });
  </script>
  </body>
  </html>