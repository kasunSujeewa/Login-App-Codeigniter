<?php include 'Layouts/baseHeader.php' ?>
<div class="container">
	<div class="row justify-content-center my-5">
		<div class="card col-sm-8">
			<div class="card-header">
				<h1>Login</h1>
				<?php if ($this->session->flashdata('message')) {
					echo "<h3>" . $this->session->flashdata('message') . "</h3>";
				}
				?>
			</div>
			<div class="card-body">
				<?php echo validation_errors(); ?>
				<?php echo form_open('login/loginIt'); ?>
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
					<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" class="form-control" id="exampleInputPassword1" name="password">
				</div>
				<div class="form-group form-check">
					<input type="checkbox" class="form-check-input" id="exampleCheck1">
					<label class="form-check-label" for="exampleCheck1">Check me out</label>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<?php include 'Layouts/baseFooter.php' ?>
