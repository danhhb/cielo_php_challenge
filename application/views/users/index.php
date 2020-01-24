<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	<!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <title>Cielo challenge</title>
  </head>
  <body>
 
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">CIELO PHP challange</a>
    </nav>
 
	<div class="container-fluid" style="margin-top: 80px;">
		<div class="row">
			<div class="col-md-12" align="right">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#user_modal_add">New</button>
			</div>
		</div>
		
	</div>
    
    <main role="main" style="margin-top: 15px;">
	    <div class="container">
            <span id="success_message"></span>
		    <div class="card-columns" id="card-columns">
				<div class="card bg-light mb-3" style="max-width: 18rem;">
				  <div class="card-header" style="background-color: red;"></div>
				  <div class="card-body">
				    <h5 class="card-title">Name</h5>
				    <h6 class="card-subtitle mb-2 text-muted">Email:</h6>
				    <p class="card-text">jhondoe@gmail.com</p>
				    <h6 class="card-subtitle mb-2 text-muted">Date of Birth:</h6>
				    <p class="card-text">2020-01-12</p>
				  </div>
				</div>
		    </div>
		</div>

	<main>
	<!-- Modal -->
	     <div class="modal fade" id="user_modal_add" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	       <div class="modal-dialog" role="document">
	         <form method="post" id="user_form">
	         	<div class="modal-content">
	         	  <div class="modal-header">
	         	    <h5 class="modal-title" id="staticBackdropLabel">Add User</h5>
	         	    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	         	      <span aria-hidden="true">&times;</span>
	         	    </button>
	         	  </div>
	         	  <div class="modal-body">
	         	    <label for="">Name</label>
	         	    <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Jhon">
	         	    <span id="user_name_error" class="text-danger"></span>  
	                <br>
	         	    <label for="">Date of birth</label>
	         	    <input type="date" value="1970-01-01" max="2020-01-24" min="1900-01-01" name="user_dob" id="user_dob" class="form-control">
	         	    <br>
	         	    <label for="">Email</label>
	         	    <input type="text" name="user_email" id="user_email" class="form-control" placeholder="jhon@cielo.com">
	         	    <span id="user_email_error" class="text-danger"></span>
	                <br>
	         	    <label for="">Favorite Color</label>
	         	    <input type="color" name="user_color" id="user_color" class="form-control">
	         	    <br>
	         	  </div>
	         	  <div class="modal-footer">
	         	    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	         	    <button type="submit" class="btn btn-primary" id="save_button">Save</button>
	         	  </div>
	         	</div>
	         </form>
	       </div>
	     </div>
	 
	    <footer class="container">
	      <p><center>&copy; CIELO 2020</center></p>
	    </footer>
  	</body>
</html>	