<style>
	:root {
		--hue: 223;
		--bg: hsl(var(--hue), 90%, 90%);
		--fg: hsl(var(--hue), 90%, 10%);
		--trans-dur: 0.3s;
		--trans-timing: cubic-bezier(0.65, 0, 0.35, 1);
	}

	#status-container>p {
		margin: auto 0 !important;
	}

	#confirm {
		position: absolute;
		right: 3em;
	}

	.switch,
	.switch__input {
		-webkit-tap-highlight-color: transparent;
	}

	.switch {
		position: relative;
		width: 4em;
		height: 2em;
		margin: auto 0;
		left: 1.5em;
	}

	.switch__check {
		display: block;
		transform: translateX(0) rotate(0);
		transition: transform var(--trans-dur) var(--trans-timing);
		z-index: 1;
	}

	.switch__check-line {
		background-color: red;
		transform: translate(0, 0);
		transition:
			stroke var(--trans-dur) var(--trans-timing),
			stroke-dashoffset var(--trans-dur) var(--trans-timing),
			transform var(--trans-dur) var(--trans-timing);
	}

	.switch__input {
		background-color: hsl(0deg 100% 46.77% / 100%);
		border-radius: 2em;
		box-shadow:
			0 0 0 0.0625em hsl(var(--hue), 10%, 50%) inset,
			0 0.25em 1em hsla(var(--hue), 90%, 10%, 0);
		cursor: pointer;
		display: block;
		outline: transparent;
		width: 100%;
		height: 100%;
		transition:
			background-color var(--trans-dur) var(--trans-timing),
			box-shadow var(--trans-dur) var(--trans-timing);
		-webkit-appearance: none;
		appearance: none;
	}

	.switch__input:before,
	.switch__input:after {
		content: "";
		display: block;
	}

	.switch__input:before {
		background-color: hsl(0, 0%, 100%);
		border-radius: 50%;
		box-shadow: 0 0.125em 0.25em hsla(var(--hue), 90%, 10%, 0);
		transition:
			box-shadow var(--trans-dur) var(--trans-timing),
			transform var(--trans-dur) var(--trans-timing);
	}

	.switch__input:after {
		border-radius: 0.75em;
		box-shadow: 0 0 0 0.125em hsla(var(--hue), 90%, 70%, 0);
		width: 100%;
		height: 100%;
		transition: box-shadow 0.15s linear;
	}

	.switch__input:focus-visible:after {
		box-shadow: 0 0 0 0.125em hsla(var(--hue), 90%, 70%, 1);
	}

	.switch__check,
	.switch__input:before {
		position: absolute;
		top: 0.25em;
		left: 0.25em;
		width: 1.5em;
		height: 1.5em;
	}

	.switch__input:checked {
		background-color: hsla(var(--hue), 90%, 50%, 1);
		box-shadow:
			0 0 0 0.0625em hsl(var(--hue), 90%, 50%) inset,
			0 0.25em 1em hsla(var(--hue), 90%, 10%, 0.5);
	}

	.switch__input:checked:before {
		box-shadow: 0 0.125em 0.25em hsla(var(--hue), 90%, 10%, 0.5);
		transform: translateX(2em);
	}

	.switch__input:checked+.switch__check {
		animation: switch-check var(--trans-dur) var(--trans-timing);
		transform: translateX(2em) rotate(-225deg);
	}

	.switch__input:checked+.switch__check .switch__check-line {
		stroke: hsl(var(--hue), 90%, 50%);
		stroke-dashoffset: 0;
		transform: translate(-1px, -1px);
		transition-delay: 0s, calc(var(--trans-dur) / 2), 0s;
	}

	.switch__sr {
		overflow: hidden;
		position: absolute;
		width: 3px;
		height: 3px;
	}

	/* Dark theme */
	@media (prefers-color-scheme: dark) {
		:root {
			--bg: hsl(var(--hue), 90%, 10%);
			--fg: hsl(var(--hue), 90%, 90%);
		}
	}

	/* Animations */
	@keyframes switch-check {
		from {
			transform: translateX(0) rotate(0);
		}

		to {
			transform: translateX(2em) rotate(135deg);
		}
	}

	.row.align-items-center {
		display: flex;
		flex-direction: row;
		justify-content: space-around;
	}

	.app-search.d-none.d-md-block.me-3 {
		width: 50%;
		margin: auto 0;
		display: flex !important;
		align-items: center;
	}

	.active {
		position: relative;
		left: -2em;
	}

	.col-lg-9.col-sm-8.col-md-8.col-xs-12 {
		width: max-content;
	}
</style>
<?php $selectedUser ?>
<div class="modal fade" id="addexampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-md  modal-dialog-centered" role="document">
		<div class="modal-content rounded-0">
			<div class="modal-body py-0">
				<div class="d-flex main-content">
					<div class="content-text p-4" style="width:100%">
						<h3 style="margin:0 auto; width:fit-content">Add User</h3>
						<form action="<?php echo site_url('admin/users/add'); ?>" method="post">
							<div class="form-group">
								<label for="add-name">Name</label>
								<input type="text" name="add-name" class="form-control" id="add-name"
									placeholder="Enter Name">
							</div>
							<div class="form-group">
								<label for="add-name">Username/Email</label>
								<input type="email" name="add-email" class="form-control" id="add-email"
									placeholder="Enter Email">
							</div>
							<div class="form-group">
								<label for="add-password">Password</label>
								<input type="text" name="add-password" class="form-control" id="add-password"
									placeholder="Enter Password">
							</div>
							<div class="mb-3">
								<label class="form-label">Role</label>
								<select class="edit form-select" data-placeholder="Choose a Category" tabindex="1"
									name="role">
									<option value="0">Admin</option>
									<option value="1">Evaluator</option>
									<option value="2">Author</option>
								</select>
							</div>
							<div class="form-group d-flex align-items-center" id="status-container">
								<p>Status</p>
								<label class="switch">
									<input name="add-status" class="add switch__input" type="checkbox" role="switch">
									<svg class="switch__check" viewBox="0 0 16 16" width="16px" height="16px">
										<polyline class="switch__check-line" fill="none"
											stroke="hsl(var(--hue),10%,50%)" stroke-dasharray="9 9"
											stroke-dashoffset="3.01" stroke-linecap="round" stroke-linejoin="round"
											stroke-width="2" points="5,8 11,8 11,11" />
									</svg>
									<span class="switch__sr">Power</span>
								</label>
								<p id="add-switch-label" style="margin-left:35px !important;">Inactive</p>
								<input type="submit" value="Confirm" class="btn btn-primary mr-3 px-5" id="confirm">
							</div>
							<p class="custom-note mb-0"><a href="#">Forgot password</a></p>
							<div class="form-group ">
								<p class="custom-note"><small>If you don't have account yet <a href="#">Sign up
											here</a></small></p>
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<!-- Edit-Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-md  modal-dialog-centered" role="document">
		<div class="modal-content rounded-0">
			<div class="modal-body py-0">
				<div class="d-flex main-content">
					<div class="content-text p-4" style="width:100%">
						<h3 style="margin:0 auto; width:fit-content">Edit User</h3>
						<form action="<?php echo site_url('admin/users/update'); ?>" method="post">
							<input type="hidden" name="userId" id="userId">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
							</div>
							<div class="form-group">
								<label for="name">Username/Email</label>
								<input type="email" name="email" class="form-control" id="email"
									placeholder="Enter Email">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="text" name="password" class="form-control" id="password"
									placeholder="Enter Password">
							</div>
							<div class="mb-3">
								<label class="form-label">Role</label>
								<select class="editselect form-select" data-placeholder="Choose a Category" tabindex="1"
									name="role">
									<option value="0">Admin</option>
									<option value="1">Evaluator</option>
									<option value="2">Author</option>
								</select>
							</div>
							<div class="form-group d-flex align-items-center" id="status-container">
								<p>Status</p>
								<label class="switch">
									<input name="status" class="edit switch__input" type="checkbox" role="switch">
									<svg class="switch__check" viewBox="0 0 16 16" width="16px" height="16px">
										<polyline class="switch__check-line" fill="none"
											stroke="hsl(var(--hue),10%,50%)" stroke-dasharray="9 9"
											stroke-dashoffset="3.01" stroke-linecap="round" stroke-linejoin="round"
											stroke-width="2" points="5,8 11,8 11,11" />
									</svg>
									<span class="switch__sr">Power</span>
								</label>
								<p id="switch-label" style="margin-left:35px !important;">Inactive</p>
								<input type="submit" value="Confirm" class="btn btn-primary mr-3 px-5" id="confirm">
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb bg-white">
		<div class="header row align-items-center">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title" style="margin:">Manage Authors</h4>
			</div>
			<form role="search" class="header app-search d-none d-md-block me-3" id="searchForm">
				<input type="text" placeholder="Search..." class="header form-control mt-0" id="searchInput">
				<a href="" class="active">
					<i class="fa fa-search"></i>
				</a>
			</form>
			<div class="header col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<div class="header d-md-flex">
					<ol class="breadcrumb ms-auto">
						<li><a href="#" class="fw-normal"><img /></a></li>
					</ol>
					<a href="" id="editUserLink" data-toggle="modal" data-target="#addexampleModalCenter"
						class="btn btn-danger d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Add</a>


				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="white-box">
					<div class="table-responsive">
						<table class="table text-nowrap">
							<thead>
								<tr>
									<th class="border-top-0">Name</th>
									<th class="border-top-0">Email</th>
									<th class="border-top-0">Password</th>
									<th class="border-top-0">Role</th>
									<th class="border-top-0">Status</th>
									<th class="border-top-0">Date_Created</th>
									<th class="border-top-0">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($users as $user): ?>
									<tr>
										<td>
											<a style="color:#3e5569"
												href="<?php echo base_url('/pages/toprofile/' . $user['user_id']); ?>">
												<?php echo $user['complete_name'] ?>
											</a>
										</td>
										<td>
											<?php echo $user['email'] ?>
										</td>
										<td>
											<?php echo $user['pword'] ?>
										</td>
										<td>
											<?php
											if ($user['role'] == 0) {
												echo ("admin");
											} elseif ($user['role'] == 1) {
												echo ("Evaluator");
											} else {
												echo ("Author");
											}
											?>
										</td>
										<td>
											<?php
											if ($user['status'] == 1) {
												echo ("active");
											} else {
												echo ("deactivated");
											}
											?>
										</td>
										<td>
											<?php $formattedDate = date('F j, Y', strtotime($user['date_created']));
											echo $formattedDate; ?>
										</td>
										<td
											style="display: flex;flex-direction: row;align-content: center;align-items: center;">

											<form action="<?php echo site_url('admin/users/delete'); ?>" method="post"
												style="margin:unset">
												<input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
												<button type="submit" style="border-style: none; background-color: unset;<?php if ($user['role'] == 0) {
													echo "visibility:hidden;";
												} ?>">
													<i class="fas fa-trash-alt" aria-hidden="true"></i>
												</button>
											</form>
											<a style="width: 5em;" href="#" data-user-id="<?php echo $user['user_id']; ?>"
												data-toggle="modal" data-target="#exampleModalCenter"
												class="edit-btn btn btn-danger d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Edit</a>

										</td>
									</tr>

								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- End PAge Content -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Right sidebar -->
		<!-- ============================================================== -->
		<!-- .right-sidebar -->
		<!-- ============================================================== -->
		<!-- End Right sidebar -->
		<!-- ============================================================== -->
	</div>
	<!-- ============================================================== -->
	<!-- End Container fluid  -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- footer -->
	<!-- ============================================================== -->
	<footer class="footer text-center"> 2021 © Ample Admin brought to you by <a
			href="https://www.wrappixel.com/">wrappixel.com</a>
	</footer>
	<!-- ============================================================== -->
	<!-- End footer -->
	<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<script src="<?php echo base_url("assets/js/jquery-3.3.1.min.js") ?>"></script>
<script src="<?php echo base_url("assets/js/popper.min.js") ?>"></script>
<script src="<?php echo base_url("assets/js/bootstrap.min.js") ?>"></script>
<script src="<?php echo base_url("assets/js/main.js") ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	$(document).ready(function () {
		$(document).on('click', '.edit-btn', function (event) {
			const switchInput = document.querySelector('.edit.switch__input');
			const switchLabel = document.getElementById('switch-label');
			console.log('Button Clicked');
			event.preventDefault();
			var userId = $(this).data('user-id');
			$.ajax({
				url: '<?php echo site_url('users/get_user_by_id'); ?>',
				type: 'GET',
				data: {
					id: userId
				},
				dataType: 'json',
				success: function (userData) {
					console.log(userData.complete_name);
					const selectElement = document.querySelector('.editselect');
					for (let i = 0; i < selectElement.options.length; i++) {
						const option = selectElement.options[i];

						if (option.value === userData.role) {
							selectElement.selectedIndex = i;
							break;
						}
					}

					$('#name').val(userData.complete_name);
					$('#email').val(userData.email);
					$('#password').val(userData.pword);
					if (userData.status == 1) {

						switchInput.checked = true;
						switchLabel.textContent = 'Active';
					} else {
						switchInput.checked = false;
						switchLabel.textContent = 'Inactive';
					}
					$('#userId').val(userData.user_id)
				},
				error: function (jqXHR, textStatus, errorThrown) {
					console.error('Error fetching user data:', textStatus, errorThrown);
				}
			});
		});
	});

	document.addEventListener('DOMContentLoaded', function () {
		const switchInput = document.querySelector('.switch__input');
		const switchLabel = document.getElementById('switch-label');

		switchInput.addEventListener('change', function () {
			if (this.checked) {
				switchLabel.textContent = 'Active';
			} else {
				switchLabel.textContent = 'Inactive';
			}
		});
	});

	$(document).ready(function () {
		$('#searchForm').on('keyup', function (e) {
			var searchInput = $('#searchInput').val();
			e.preventDefault();
			console.log(searchInput);
			console.log("searching");
			$.ajax({
				url: '<?php echo site_url("admin/users/search"); ?>',
				type: 'GET',
				data: { query: searchInput },
				dataType: 'json',
				success: function (response) {
					// Clear existing table content
					$('.table tbody').empty();

					// Loop through the JSON data and create table rows
					$.each(response, function (index, user) {
						console.log(user.user_id)
						console.log(user.complete_name)
						var row = $('<tr></tr>');
						row.append('<td><a href="users/pages/toprofile/' + user.user_id + '">' + user.complete_name + '</a></td>');
						row.append('<td>' + user.email + '</td>');
						row.append('<td>' + user.pword + '</td>');
						row.append('<td>' + (user.role == 0 ? "Admin" : user.role == 1 ? "Evaluator" : "Contributor") + '</td>');
						row.append('<td>' + (user.status == 1 ? "active" : "deactivated") + '</td>');
						row.append('<td>' + new Date(user.date_created).toLocaleDateString() + '</td>');
						row.append('<td><form action="<?php echo site_url('admin/users/delete'); ?>" method="post" style="margin:unset"><input type="hidden" name ="user_id" value = "<?php echo $user['user_id']; ?>" ><button type="submit" style="border-style: none; background-color: unset"><i class="fas fa-trash-alt" aria-hidden="true"></i></button></form ></td>');
						row.append('<td><a href="#" data-user-id="' + user.user_id + '" data-toggle="modal" data-target="#exampleModalCenter" class="edit-btn btn btn-danger d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Edit</a></td>');

						$('.table tbody').append(row);
					});
				},
				error: function (jqXHR, textStatus, errorThrown) {
					console.error('Error fetching search results:', textStatus, errorThrown);
				}
			});


		});
	});

	$(document).ready(function () {
		$('#role').on('change', function () {
			$('form[action="<?php site_url("admin/users") ?>"]').submit();
		});
	});

	<?php if (!is_null($submit_status) && 1 == $submit_status) {
		echo "document.addEventListener('DOMContentLoaded', (event) => {
			// Check if the form exists before trying to submit it
			const myForm = document.getElementById('filter_form');
			if(myForm) {
				// Submit the form
				myForm.submit();
			}
		});";
	} else {
	} ?>
</script>