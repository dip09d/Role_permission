@extends('master')

@section('title', 'New Admin | Admin')

@section('content')
<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="pe-7s-notebook icon-gradient bg-mixed-hopes"></i>
					</div>
					@if(isset($group_key))
					<div>{{ucwords(strtolower($group_key))}} Setting
						<div class="page-title-subheading">Settings &gt; {{ucwords(strtolower($group_key))}} Setting</div>
					</div>
					@else
					<div>Default Setting
						<div class="page-title-subheading">Settings &gt; Default Setting</div>
					</div>
					@endif
				</div>
				<div class="page-title-actions">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href=""> Home</a></li>
						<li class="breadcrumb-item active">Settings</li>
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
		<form action="">
			<input type="hidden" name="panel_open"  id="Settings_search">
			<section class="content-header mb-2">
				<div class="row">
					<div class="col-sm-3">
						<a href=" " onclick="" class="btn btn-box-tool" style="font-size: 1rem;">Advance Search &nbsp; <i class="fa fa-zoom-in fa-md"></i></a>
					</div>
					<div class="offset-sm-5 col-sm-4">
						<div class="input-group">
					 
						    @if(isset($group_key))
							<input class="form-control" placeholder="Search..." name="term" id="search" group_key="{{$group_key}}">
							@else
							<input class="form-control" placeholder="Search..." name="term" id="search" group_key="defualt">
							@endif
							<div class="input-group-append">
								<button type="submit" class="btn btn-site"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</div>
				</div>

				<div class="advance-search-panel" style="display:none;">

					<a href="">All</a> |
					<a href="">Editable</a>

				</div>

			</section>
		</form>

		<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav ml-0">
			<li class="nav-item">
				<a class="nav-link {{ Request::is('Settings') ? 'active' : '' }}" href="{{ url('/Settings') }}">
					<span>Default</span>
				</a>
			</li>
			@foreach($Settings as $settings)
			<li class="nav-item">
				<a class="nav-link {{ Request::is('Settings/' . $settings->group_key) ? 'active' : '' }}" href="{{ url('/Settings/' . $settings->group_key) }}">
					<span>{{ $settings->group_name }}</span>
				</a>
			</li>
			@endforeach
		</ul>
		<div class="main-card mb-3 card">
			<div class="card-body">
				<div class="card-header p-0">
					<i class="header-icon lnr-layers icon-gradient bg-plum-plate"> </i>
					@if(isset($group_key))
					{{$group_key}} Setting
					@else
					Default Setting
					@endif
					<div class="btn-actions-pane-right">

						<div class="btn-group" id="global_action_btn" style="display:none">
							<button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="" onclick="deleteSelected()" data-original-title="Delete selected"><i class="fa fa-trash"></i></button>
							<button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="" onclick="changeStatusAll(1)" data-original-title="Make active"><i class="fa fa-thumbs-up"></i></button>
							<button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="" onclick="changeStatusAll(0)" data-original-title="Make inactive"><i class="fa  fa-thumbs-o-down"></i></button>
						</div>
						&nbsp;
						<button type="button" class="btn btn-site btn-sm btn-success" id="allSettingsaddButton">
							<i class="fa fa-plus"></i>
							Add new Setting
						</button>
					</div>
				</div>

				<div class="table-responsive" id="main_table">
					<table class="mb-0 table">
						<thead>
							<tr>
								<th style="width:20%">Setting Name</th>
								<th style="width:30%">Key</th>
								<th style="width:40%">Value</th>
								<th class="text-right" style="padding-right:15px;">Action</th>
							</tr>
						<thead>
						<tbody id="allSettingBody">
							@foreach($allSettings as $allSetting)

							<tr>
								<td>{{$allSetting->title}}</td>
								<td>{{$allSetting->setting_key}}</td>
								<td style="width:40%;word-break: break-all;">{{$allSetting->setting_value}}</td>
								<td class="text-right" style="padding-right:15px;">
									@if($allSetting->editable != 0)

									<a data-toggle="tooltip" title="" class="allSettingsEditButton" data-placement="top" data-original-title="Edit" id="{{$allSetting->id}}"><i class="fa fa-edit text-success fa-md"></i></a>
									&nbsp;
									@endif
								</td>
							</tr> 
							@endforeach
						</tbody>
						
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade " id="SettingsModel" tabindex="-1" role="dialog" aria-labelledby="addEditModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="settingsAddEditModalLabel"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<!-- Example form -->
					<form id="settinngsformData">
						@csrf
						<!-- Hidden input for user ID -->
						<input type="text" class='d-none' id="settingsId" name="settingsId">
						<input type="text" id="group_key" class='d-none' value="{{$group_key}}" name="group_key">
						<div class="form-group" id="Groups">
							<label for="Groups">Setting Groups</label>
							<select class="form-control" id="Groups_data" name="Groups" required>
								<option value=" ">Default</option>

								@foreach($Settings as $settings)
								<option value="{{strtolower($settings->group_name) }}">{{($settings->group_name) }}</option>
								@endforeach
							</select>

						</div>
						<div class="form-group">
							<label for="setting_name">Setting Name</label>
							<input type="text" class="form-control" id="setting_name" name="setting_name" required>
							<div class="invalid-feedback" id="setting_name_error"></div>

						</div>
						<div class="form-group">
							<label for="setting_Key">Setting Key</label>
							<input type="text" class="form-control" id="setting_Key" name="setting_Key" required>
							<div class="invalid-feedback" id="setting_Key_error"></div>
						</div>

						<div class="form-group">
							<label for="setting_Value">Setting Value</label>
							<input type="text" class="form-control" id="setting_Value" name="setting_Value" required>
							<div class="invalid-feedback" id="setting_Value_error"></div>
						</div>

						<div class="form-group">
							<label for="Display_Order">Display Order</label>
							<input type="text" class="form-control" id="Display_Order" name="Display_Order" required>
							<div class="invalid-feedback" id="Display_Order_error"></div>
						</div>

						<div class="form-group" id="Editable">
							<label class="form-label">Editable</label>
							<div class="radio-inline">
								<input type="radio" name="Editable" value=1 class="magic-radio" id="Editable_1" checked required>
								<label for="Editable_1">Yes</label>
								<input type="radio" name="Editable" value=0 class="magic-radio" id="Editable_2">
								<label for="Editable_2">No</label>
							</div>
						</div>

						<div class="form-group" id="Deletable">
							<label class="form-label">Deletable</label>
							<div class="radio-inline">
								<input type="radio" name="Deletable" value=1 class="magic-radio" id="Deletable_1" checked required>
								<label for="Deletable_1">Yes</label>
								<input type="radio" name="Deletable" value=0 class="magic-radio" id="Deletable_2">
								<label for="Deletable_2">No</label>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" id="SettingsButton" class="btn btn-primary">Save</button>
				</div>
			</div>


		</div>
	</div>
	@endsection