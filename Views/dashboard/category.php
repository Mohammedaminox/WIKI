<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="assets/css/dashboard.css">

	<title>My Categories</title>
</head>
<style>

</style>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Admin</span>
		</a>
		<ul class="side-menu top">
			<li lass="active">
				<a href="/">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">My Categories</span>
				</a>
			</li>
			<li  >
				<a href="/tags">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">My Tags</span>
				</a>
			</li>
			<li c>
				<a href="user_page.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">users</span>
				</a>
			</li>
			<li >
				<a href="vente.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Vente</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text">Team</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>My Categories</h1>
				</div>
				
			</div>


			<div class="container-xl">
				<div class="table-responsive">
					<div class="table-wrapper">
						<div class="table-title">
							<div class="row">
								<div class="col-sm-5">
									<h2>Categories <b>Management</b></h2>
								</div>
								<div class="modal" id="addCategorieModal">
									<div class="modal-dialog">
										<div class="modal-content">
											<!-- Modal Header -->
											<div class="modal-header">
												<h4 class="modal-title text-primary">Add New Categories</h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<!-- Modal Body -->
											<div class="modal-body">
												<!-- Add medicine form -->
												<form method="POST" action="/addCategory">
													<!-- Input fields for medicine details -->
													<div class="form-group">
														<label for="CategorieName">Categorie Name:</label>
														<input type="text" class="form-control" id="CategorieName" placeholder="CategorieName" name="category_name" required>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-primary">Add Categorie</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-7">
									<!-- <a href="" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New Categories</span></a> -->
									<a href="" class="btn btn-secondary" data-toggle="modal" data-target="#addCategorieModal"><i class="material-icons">&#xE147;</i> <span>Add New Categories</span></a>				
								</div>
							</div>
						</div>
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Categories Name</th>						
									<th>Action</th>
								</tr>
							</thead>
							<tbody>	
								<?php foreach ($categories as $category): ?>
								<tr>
									<td><?php echo $category['id']; ?></td>
									<td><?php echo $category['category_name']; ?></td>
									<td>
											<a href="#" class="settings" title="Settings" data-toggle="modal" data-target="#updateCategoryModal<?= $category['id'] ?>">
												<i class="material-icons">&#xE8B8;</i>
											</a>
											<a href="#" class="delete" title="Delete" data-toggle="modal" data-target="#deleteCategoryModal<?= $category['id'] ?>">
												<i class="material-icons">&#xE5C9;</i>
											</a>
										</td>
								</tr>
								<!-- modal de update -->
								<div class="modal" id="updateCategoryModal<?= $category['id'] ?>">
								<div class="modal-dialog">
											<div class="modal-content">
												<!-- Modal Header -->
												<div class="modal-header">
													<h4 class="modal-title">Update Category</h4>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>
												<!-- Modal Body -->
												<div class="modal-body">
													<!-- Update medicine form -->
													<form method="POST" action="/Category/update">
														<input type="hidden" name="action" value="update">
														<input type="hidden" name="id" value="<?= $category['id'] ?>">

														<!-- Input fields for updated medicine details -->
														<div class="form-group">
															<label for="updateMedicineName">Category Name:</label>
															<input type="text" class="form-control" id="updateCategoryName" name="updateCategoryName" value="<?= $category['category_name'] ?>" required>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-primary">Update Category</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>

									<!-- Delete Medicine Modal -->
									<div class="modal" id="deleteCategoryModal<?= $category['id']?>">										<div class="modal-dialog">
											<div class="modal-content">
												<!-- Modal Header -->
												<div class="modal-header">
													<h4 class="modal-title">Delete category</h4>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>
												<!-- Modal Body -->
												<div class="modal-body">
													<!-- Delete medicine form -->
													<form method="POST" action="/Category/delete">
													<input type="hidden" name="action" value="delete">
														<input type="hidden" name="id" value="<?= $category['id'] ?>">
														<p>Are you sure you want to delete this category?</p>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
															<button type="submit" class="btn btn-danger">Delete category</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</tbody>
						</table>
					
					</div>
				</div>
			</div>  
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../../public/assets/js/script.js"></script>
</body>
</html>