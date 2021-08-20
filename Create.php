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

    <title>Create</title>
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

<div class="container pt-3" style="width: 40%">
      <h1 class="text-center">Insert Data using JQuery Ajax</h1>
      <hr />
      <form id="myform">

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
        <button type="button" class="btn btn-primary"  id="submit" >Submit</button>
      </form>

      <br /><br />

    </div>


<script>
$(document).ready(function() {

	$('#submit').on('click', function(e) {
        e.preventDefault();

		
        var name = $('#name').val();
		var email = $('#email').val();
		var message = $('#message').val();
		
        if(name!="" && email!="" && message!=""){
            
			$.ajax({
				url: "Ajax_insert.php",
				type: "POST",
				data: {
					name: name,
					email: email,
					message: message			
				},
				cache: false,
				success: function(datar){
                    $('#myform').trigger("reset");
					   alert(datar);
					
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