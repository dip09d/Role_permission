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
					<div>Notification <div class="page-title-subheading">Admin Notification &gt; All Notification List</div>
					</div>
				</div>
				<div class="page-title-actions">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href=""> Home</a></li>
						<li class="breadcrumb-item active">Notification</li>
					</ol>
				</div>
			</div>
		</div>
		<div id="#successMessageContainer"></div>
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
					<i class="header-icon lnr-layers icon-gradient bg-plum-plate"> </i> Notification <div class="btn-actions-pane-right">

						<div class="btn-group" id="global_action_btn" style="display:none">
							<button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="" onclick="deleteSelected()" data-original-title="Delete selected"><i class="fa fa-trash"></i></button>
							<button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" title="" onclick="changeStatusAll(1)" data-original-title="Mark as read"><i class="fa fa-thumbs-up"></i></button>
							<button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="" onclick="changeStatusAll(0)" data-original-title="Mark as unread"><i class="fa  fa-thumbs-down"></i></button>
						</div>
						&nbsp;
					</div>
				</div>

				<div class="table-responsive" id="main_table">
					<table class="mb-0 table">
						<thead>
							<tr>
								<th style="width:20px">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" data-target=".check_all" id="all_item" class="custom-control-input check_all_main">
										<label class="custom-control-label" for="all_item"></label>
									</div>
								</th>
								<th>ID</th>
								<th style="min-width:300px; width:85%">Notification</th>
								<th>Date</th>
								<th class="text-right">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($notifications as $notification)
							@if($notification->read_status!=config('constants.STATUS_DELETED'))
							<tr>

								<td>
									<div class="custom-checkbox custom-control">
										<input type="checkbox" id="item_229" class="custom-control-input check_all" name="ID[]" value="229">
										<label class="custom-control-label" for="item_229"></label>
									</div>
								</td>
								<td>{{$notification->id}}</td>
								<td>{{$notification->message}}
									<div><small class="text-muted"> <i class="fa fa-clock"></i> {{$notification->created_date}}</small></div>
								</td>
								<td>
									<input data-id="{{$notification->id}}" class="toggle-class d-none" type="checkbox" data-toggle="toggle" data-on="Read" data-off="Unread" data-onstyle="success" data-offstyle="danger" data-size="mini" {{ $notification->read_status ? 'checked' : '' }}>

								</td>
								<td class="text-right">
									<a id="{{$notification->id}}" class="delete-notification" title="" data-original-title="Delete Permanently"><i class="fa fa-trash text-danger fa-md"></i></a>


								</td>
							</tr>
							@endif
							@endforeach

						</tbody>
					</table>
				</div>
				<div class="card-footer pagination-rounded clearfix justify-content-center">
					<ul class="pagination small mb-0">
						<li class="page-item {{ ($notifications->currentPage() == 1) ? 'disabled' : '' }}">
							<a class="page-link" href="{{ $notifications->previousPageUrl() }}" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>
						@for ($i = 1; $i <= $notifications->lastPage(); $i++)
						@if($i==6)
						<li class="page-item {{ ($notifications->currentPage() == $i) ? 'active' : '' }}">
								<a class="page-link" href="{{ $notifications->url($i) }}"> Last </a>
							</li>
						@else
							<li class="page-item {{ ($notifications->currentPage() == $i) ? 'active' : '' }}">
								<a class="page-link" href="{{ $notifications->url($i) }}">{{ $i }}</a>
							</li>
						@endif
						@endfor
							<li class="page-item {{ ($notifications->currentPage() == $notifications->lastPage()) ? 'disabled' : '' }}">
								<a class="page-link" href="{{ $notifications->nextPageUrl() }}" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
								</a>
							</li>
					</ul>
				</div>

			</div>
		</div>
	</div>
	<div class="modal fade" id="ajaxModal">
		<div class="modal-dialog">
			<div class="modal-content">

			</div>
		</div>
	</div>


	@endsection