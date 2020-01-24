<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	<!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <title>Hello, world!</title>
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
				
		    </div>
		</div>

	<main>

	 <!-- <div class="container">

	 	<nav aria-label="Page navigation example">
	 	  <ul class="pagination justify-content-center">
	 	    <li class="page-item disabled">
	 	      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
	 	    </li>
	 	    <li class="page-item"><a class="page-link" href="#">1</a></li>
	 	    <li class="page-item"><a class="page-link" href="#">2</a></li>
	 	    <li class="page-item"><a class="page-link" href="#">3</a></li>
	 	    <li class="page-item">
	 	      <a class="page-link" href="#">Next</a>
	 	    </li>
	 	  </ul>
	 	</nav>

	 </div> -->
     
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
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
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

    <!-- Optional JavaScript -->
    <!-- jQuery first then Bootstrap JS -->
	<script src="assets/js/vendor/jquery-3.4.1.min.js"></script>
    <script src="assets/js/vendor/jquery.validate.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script>
    	$(document).ready(()=> {
    		function fetch_data() {
    			$.ajax({
    				url:"/api/action",
    				method: "POST",
    				data: {data_action: 'fetch'},
    				success: data => {
    					$('#card-columns').html(data);
    				},
                    error: ()=> { console.log('Error fetching data!');}
    			});
    		}

    		fetch_data();

            $(document).on('submit', '#user_form', event => {
                event.preventDefault();              
                $.ajax({
                    url: "/api/insert",
                    method: "POST",
                    data: $('#user_form').serialize(),
                    dataType: "json",
                }).done( data => {
                    if (data.success) {
                        $('#user_form')[0].reset();
                        $('#user_modal_add').modal('hide');
                        $('#success_message').html('<div class="alert alert-success">User added</div>');
                        fetch_data();
                    }
                    if (data.error) {
                        $('#user_name_error').html(data.user_name_error);
                        $('#user_email_error').html(data.user_email_error);
                    }    
                }).fail((jqXHR, textStatus, errorThrown) => {
                    console.log(errorThrown);
                });
            });

            $('#user_form').validate({
                rules: {
                    user_name: {
                        required: true,
                        maxlenght: 22,
                        minlength: 5
                    },
                    user_email: {
                        required: true,
                        email: true,
                        maxlenght: 25
                    }    
                }
            });
    	});
    </script>
  </body>
</html>