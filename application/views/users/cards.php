<?php if ( count($users ) > 0 ) { ?>
	<?php foreach ($users as $user) { ?>
			<div class="card bg-light mb-3" style="max-width: 18rem;">
			  <div class="card-header" style="background-color:<?php echo $user['fav_color'] ?>;"></div>
			  <div class="card-body">
			    <h5 class="card-title"><?php echo $user['name'] ?></h5>
			    <h6 class="card-subtitle mb-2 text-muted">Email:</h6>
			    <p class="card-text"><?php echo $user['email'] ?></p>
			    <h6 class="card-subtitle mb-2 text-muted">Date of Birth:</h6>
			    <p class="card-text"><?php echo $user['dob'] ?></p>
			  </div>
			</div>
	<?php } ?>		
<?php } else { ?>
			<div class="card bg-light mb-3" style="max-width: 18rem;">
			  <div class="card-header" style="background-color:red;"></div>
			  <div class="card-body">
			    <h5 class="card-title">Not data found!</h5>
			    <p class="card-text">Please start adding users</p>
			  </div>
			</div>
<?php } ?>