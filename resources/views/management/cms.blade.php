@extends('master')

@section('title', 'dashboard')

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
				<div>Content					<div class="page-title-subheading">Content Management &gt; All Content List</div>
				</div>
			</div>
			<div class="page-title-actions">	
				<ol class="breadcrumb float-sm-right"><li class="breadcrumb-item"><a href="https://scriptlisting.com/selfgood-live/hackground/"> Home</a></li> <li class="breadcrumb-item active">Content</li></ol>			</div>
		</div>
	</div>
	<style>
.advance-search-panel{
	background-color: #fff;
	box-shadow: 0 1px 3px rgb(0 0 0 / 10%);
    padding: 1rem;
    margin-top: 1rem;
}
</style>
<form action="">
<section class="content-header mb-2">
  <div class="row">
	<div class="offset-sm-8 col-sm-4">
		<div class="input-group">
			<input class="form-control" placeholder="Search..." name="term" value="">
			<div class="input-group-append">
			  <button type="submit" class="btn btn-site"><i class="fa fa-search"></i></button>
			</div>
		  </div>
	</div>
  </div>
</section>
</form>
	<div class="main-card mb-3 card">
		<div class="card-body">
			<div class="card-header p-0">
				<i class="header-icon lnr-layers icon-gradient bg-plum-plate"> </i> Content				<div class="btn-actions-pane-right">
															<div class="btn-group" id="global_action_btn" style="display:none">
						<button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="" onclick="deleteSelected()" data-original-title="Delete selected"><i class="fa fa-trash"></i></button>
						<button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" title="" onclick="changeStatusAll(1)" data-original-title="Make active"><i class="fa fa-thumbs-up"></i></button>
						<button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="" onclick="changeStatusAll(0)" data-original-title="Make inactive"><i class="fa  fa-thumbs-down"></i></button>
					</div>
					&nbsp;
										<button type="button" class="btn btn-site btn-sm" onclick="add()"> <i class="fa fa-plus"></i> Add Content </button>
				</div>
      		</div>

     		<div class="table-responsive" id="main_table">
				<table class="mb-0 table">
					<tbody>
						<tr>
							<th style="width:30px">
								<div class="custom-checkbox custom-control">
									<input type="checkbox" data-target=".check_all" id="all_item" class="custom-control-input check_all_main">
									<label class="custom-control-label" for="all_item"></label>
								</div>
							</th>
						<th style="width:5%">ID</th>
						<th style="width:35%">Title</th>
						<th style="width:30%">Slug</th>
						<th style="width:10%">Status</th>
						<th class="text-right">Action</th>
						</tr>
												<tr>
						<td>
							<div class="custom-checkbox custom-control">
								<input type="checkbox" id="item_3" class="custom-control-input check_all" name="ID[]" value="3">
								<label class="custom-control-label" for="item_3"></label>
							</div>	
						</td>
						<td>3</td>
						<td>Members Terms &amp; Conditions</td>
						<td>members-terms-and-conditions</td>
						<td><div class="toggle btn btn-success btn-xs" data-toggle="toggle" style="width: 70.4687px; height: 18.5938px;"><input onchange="changeStatusSwitch(3,this)" type="checkbox" checked="" data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger" data-size="mini"><div class="toggle-group"><label class="btn btn-success btn-xs toggle-on">Active</label><label class="btn btn-danger btn-xs toggle-off">Inactive</label><span class="toggle-handle btn btn-light btn-xs"></span></div></div></td>
						<td class="text-right">							
							<!-- <a href="javascript:void(0)" onclick="edit('3')" data-toggle="tooltip" title="Edit"><i class="fa fa-edit text-success fa-md"></i></a> --> 
							<a href="https://scriptlisting.com/selfgood-live/hackground/cms/addedit/3" class="mr-1" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit text-success fa-md"></i></a><a href="javascript:void(0)" onclick="return deleteRecord('3')" data-toggle="tooltip" title="" data-original-title="Delete"><i class="fa fa-trash text-danger fa-md"></i></a>
							</td>
						</tr>
												<tr>
						<td>
							<div class="custom-checkbox custom-control">
								<input type="checkbox" id="item_2" class="custom-control-input check_all" name="ID[]" value="2">
								<label class="custom-control-label" for="item_2"></label>
							</div>	
						</td>
						<td>2</td>
						<td>Privacy Policy</td>
						<td>privacy-policy</td>
						<td><div class="toggle btn btn-success btn-xs" data-toggle="toggle" style="width: 70.4687px; height: 18.5938px;"><input onchange="changeStatusSwitch(2,this)" type="checkbox" checked="" data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger" data-size="mini"><div class="toggle-group"><label class="btn btn-success btn-xs toggle-on">Active</label><label class="btn btn-danger btn-xs toggle-off">Inactive</label><span class="toggle-handle btn btn-light btn-xs"></span></div></div></td>
						<td class="text-right">							
							<!-- <a href="javascript:void(0)" onclick="edit('2')" data-toggle="tooltip" title="Edit"><i class="fa fa-edit text-success fa-md"></i></a> --> 
							<a href="https://scriptlisting.com/selfgood-live/hackground/cms/addedit/2" class="mr-1" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit text-success fa-md"></i></a><a href="javascript:void(0)" onclick="return deleteRecord('2')" data-toggle="tooltip" title="" data-original-title="Delete"><i class="fa fa-trash text-danger fa-md"></i></a>
							</td>
						</tr>
												<tr>
						<td>
							<div class="custom-checkbox custom-control">
								<input type="checkbox" id="item_1" class="custom-control-input check_all" name="ID[]" value="1">
								<label class="custom-control-label" for="item_1"></label>
							</div>	
						</td>
						<td>1</td>
						<td>Terms and conditions</td>
						<td>terms-and-conditions</td>
						<td><div class="toggle btn btn-success btn-xs" data-toggle="toggle" style="width: 70.4687px; height: 18.5938px;"><input onchange="changeStatusSwitch(1,this)" type="checkbox" checked="" data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger" data-size="mini"><div class="toggle-group"><label class="btn btn-success btn-xs toggle-on">Active</label><label class="btn btn-danger btn-xs toggle-off">Inactive</label><span class="toggle-handle btn btn-light btn-xs"></span></div></div></td>
						<td class="text-right">							
							<!-- <a href="javascript:void(0)" onclick="edit('1')" data-toggle="tooltip" title="Edit"><i class="fa fa-edit text-success fa-md"></i></a> --> 
							<a href="https://scriptlisting.com/selfgood-live/hackground/cms/addedit/1" class="mr-1" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit text-success fa-md"></i></a><a href="javascript:void(0)" onclick="return deleteRecord('1')" data-toggle="tooltip" title="" data-original-title="Delete"><i class="fa fa-trash text-danger fa-md"></i></a>
							</td>
						</tr>
											</tbody>
		  		</table>
			</div>
					</div>
	</div>
</div> 
<div class="modal fade" id="ajaxModal">
  <div class="modal-dialog">
    <div class="modal-content"> </div>
  </div>
</div>
<script>

function add(){
	window.location.href="https://scriptlisting.com/selfgood-live/hackground/cms/addedit";
	/* var url = 'https://scriptlisting.com/selfgood-live/hackground/cms/load_ajax_page?page=add';
	load_ajax_modal(url); */
}

function edit(id){
	var url = 'https://scriptlisting.com/selfgood-live/hackground/cms/load_ajax_page?page=edit&id='+id;
	load_ajax_modal(url);
}

function deleteRecord(id, permanent){
	permanent = permanent || false;
	var c = confirm('Are you sure to delete this record ?');
	if(c){
		console.log('ok');
		var url = 'https://scriptlisting.com/selfgood-live/hackground/cms/delete_record/'+id;
		if(permanent){
			url += '?cmd=remove';
		}
		$.getJSON(url, function(res){
			if(res.cmd && res.cmd == 'reload'){
				location.reload();
			}
		});
	}else{
		return false;
	}
}

function changeStatus(sts, id, ele){
	var status = [1, 0];
	if(status.indexOf(sts) !== -1){
		var url = 'https://scriptlisting.com/selfgood-live/hackground/cms/change_status';
		$.ajax({
			url : url,
			data: {ID: id, status: sts},
			type: 'POST',
			dataType: 'json',
			success: function(res){
				if(res.cmd){
					if(res.cmd == 'reload'){
						location.reload();
					}else if(res.cmd == 'replace'){
						if(typeof ele !== 'undefined'){
							$('[data-toggle="tooltip"]').tooltip("dispose");
							$(ele).replaceWith(res.data.html);
							init_plugin();
						}
					}
				}
				
			}
		});
	}
	return false;
}
function changeStatusSwitch(id, ele){
	var status = [1, 0];
	var sts=0;
	if ($(ele).is(':checked')) {
		var sts=1;
	}
	if(status.indexOf(sts) !== -1){
		var url = 'https://scriptlisting.com/selfgood-live/hackground/cms/change_status';
		$.ajax({
			url : url,
			data: {ID: id, status: sts},
			type: 'POST',
			dataType: 'json',
			success: function(res){
				if(res.cmd){
					if(res.cmd == 'reload'){
						location.reload();
					}else if(res.cmd == 'replace'){
						/* if(typeof ele !== 'undefined'){
							$('[data-toggle="tooltip"]').tooltip("dispose");
							$(ele).replaceWith(res.data.html);
							init_plugin();
						} */
					}
					showToast("Request processed successfully",'Request Status');

				}
				
			}
		});
	}
	return false;
}
function changeStatusAll(sts){
	var data = $('#main_table').find('input').serialize();
	var status = [1, 0];
	if(status.indexOf(sts) !== -1){
		data += '&status=' + sts;
		data += '&action_type=multiple';
		var url = 'https://scriptlisting.com/selfgood-live/hackground/cms/change_status';
		$.ajax({
			url : url,
			data: data,
			type: 'POST',
			dataType: 'json',
			success: function(res){
				if(res.cmd){
					if(res.cmd == 'reload'){
						location.reload();
					}else if(res.cmd == 'replace'){
						if(typeof ele !== 'undefined'){
							$('[data-toggle="tooltip"]').tooltip("dispose");
							$(ele).replaceWith(res.data.html);
							init_plugin();
						}
					}
				}
				
			}
		});
	}
	return false;
}

function deleteSelected(){
	var c = confirm('Are you sure to delete selected record ?');
	if(c){
		var data = $('#main_table').find('input').serialize();
		data += '&action_type=multiple';
		var url = 'https://scriptlisting.com/selfgood-live/hackground/cms/delete_record';
		$.ajax({
			url : url,
			data: data,
			type: 'POST',
			dataType: 'json',
			success: function(res){
				if(res.cmd){
					if(res.cmd == 'reload'){
						location.reload();
					}
				}
				
			}
		});
	}
	
	return false;
}

function init_event(){
	
	var item  = $('.check_all_main').data('target');
	
	$(item).on('change', function(){
		checkSelected();
	});
	
	$('.check_all_main').on('change', function(){
		var is_checked = $(this).is(':checked');
		var target = $(this).data('target');
		if(is_checked){
			$(target).prop('checked', true);
		}else{
			$(target).prop('checked', false);
		}
		$(target).triggerHandler('change');
	});
	
	function checkSelected(){
		var target  = $('.check_all_main').data('target');
		var l = $(target + ':checked').length;
		if(l == 0){
			$('#global_action_btn').find('button').attr('disabled', 'disabled');
			$('#global_action_btn').hide();
		}else{
			$('#global_action_btn').find('button').removeAttr('disabled');
			$('#global_action_btn').show();
		}
	} 
}

$(function(){
	
	init_plugin(); /* global.js */
	init_event();
	
	
});
</script> 

@endsection