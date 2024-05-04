<?php

use App\Traits\ImageUploadTrait;
?>
@extends('master')

@section('title', 'New Admin | Admin')

@section('content')
<div class="app-main__outer">
	<div class="body-page-loader d-none">
		<div class="loader">
			<div class="line-scale-pulse-out">
				<div class="bg-warning"></div>
				<div class="bg-warning"></div>
				<div class="bg-warning"></div>
				<div class="bg-warning"></div>
				<div class="bg-warning"></div>
			</div>
		</div>
	</div>




	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="pe-7s-notebook icon-gradient bg-mixed-hopes"></i>
					</div>
					<div>Category Management <div class="page-title-subheading">Category Management &gt; All Category List</div>
					</div>
				</div>
				<div class="page-title-actions">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href=""> Home</a></li>
						<li class="breadcrumb-item active">Category Management</li>
					</ol>
				</div>
			</div>
		</div>
		<div id="successMessageContainer"></div>

		<style>
			.advance-search-panel {
				background-color: #fff;
				box-shadow: 0 1px 3px rgb(0 0 0 / 10%);
				padding: 1rem;
				margin-top: 1rem;
			}
		</style>

		<div class="main-card mb-3 card">
			<div class="card-body">
				<div class="card-header p-0">
					<i class="header-icon lnr-layers icon-gradient bg-plum-plate"> </i> Category Management <div class="btn-actions-pane-right">
						<div class="btn-group" id="global_action_btn" style="display:none">
							<button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="" onclick="deleteSelected()" data-original-title="Delete selected"><i class="fa fa-trash"></i></button>
							<button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" title="" onclick="changeStatusAll(1)" data-original-title="Make active"><i class="fa fa-thumbs-up"></i></button>
							<button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="" onclick="changeStatusAll(0)" data-original-title="Make inactive"><i class="fa  fa-thumbs-down"></i></button>
						</div>
						&nbsp;
						<button type="button" class="btn btn-site btn-sm btn-primary" id='addCatagory'> <i class="fa fa-plus"></i> Add Category </button>
					</div>
				</div>

				<div class="table-responsive" id="main_table">
					<table class="mb-0 table">
						<thead>
							<tr>
								<th style="width:3%">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" data-target=".check_all" id="all_item" class="custom-control-input check_all_main">
										<label class="custom-control-label" for="all_item"></label>
									</div>
								</th>
								<th style="width:10%">ID</th>
								<th style="width:60%">Name</th>
								<th style="width:10%">Status</th>
								<th class="text-right">Action</th>
							</tr>
						</thead>

						<tbody id="catagory">

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="CatagoryModal" tabindex="-1" role="dialog" aria-labelledby="CatagoryAddEditModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="CatagoryAddEditModalLabel"> </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<!-- Example form -->
					<form id="CategoryformData" enctype="multipart/form-data">
						@csrf
						<!-- Hidden input for user ID -->
						<input type="text" class='d-none' id="catagoryId" name="id">

						<div class="form-group">
							<label for="Name">Name</label>
							<input type="text" class="form-control" id="name" name="name">
							<div class="invalid-feedback" id="name_error"></div>

						</div>


						<div class="form-group">
							<label class="form-label">Status</label>
							<div class="radio-inline">
								<input type="radio" name="status" value=1 class="magic-radio" id="status_1" checked required>
								<label for="status_1">Active</label>
								<input type="radio" name="status" value=0 class="magic-radio" id="status_2">
								<label for="status_2">Inactive</label>
							</div>
						</div>

						<div class="form-group" id="previous_image_div" style="display: none">
							<label for="category_image">Previous Category Image</label><br>
							<img src="" id="previous_image" style="max-width: 50px;" alt="Previous Image">
						</div>

						<!-- Image Upload -->
						<div class="form-group">
							<label for="category_icon">Image</label>
							<input type="file" class="form-control-file" id="category_icon" name="category_icon">
							<div class="invalid-feedback" id="category_icon_error"></div>
						</div>
						<div id="imagePreview"></div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" id="CategoryButton" class="btn btn-primary">Save</button>
				</div>
			</div>


		</div>
	</div>
	@endsection