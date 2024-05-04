@extends('master')

@section('title', 'dashboard')

@section('content')
<div class="app-main__outer"> 
<div class="app-main__inner">  
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon">
					<i class="pe-7s-notebook icon-gradient bg-mixed-hopes"></i>
				</div>
				<div>Default Setting					<div class="page-title-subheading">Settings &gt; Default Setting</div>
				</div>
			</div>
			<div class="page-title-actions">	
				<ol class="breadcrumb float-sm-right"><li class="breadcrumb-item"><a href=""> Home</a></li> <li class="breadcrumb-item active">Settings</li></ol>			</div>
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
<input type="hidden" name="panel_open" value="0" id="advance_search_panel_state">
<section class="content-header mb-2">
  <div class="row">
	<div class="col-sm-3">
		<a href=" " onclick="" class="btn btn-box-tool" style="font-size: 1rem;">Advance Search &nbsp; <i class="fa fa-zoom-in fa-md"></i></a>
	</div>
	<div class="offset-sm-5 col-sm-4">
		<div class="input-group">
			<input class="form-control" placeholder="Search..." name="term" value="">

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

<script>
(function(){
	
var panel_open = false;
function toggleAdvanceSearch(){
	if(panel_open){
		$('#advance_search_panel_state').val(0);
		panel_open = false;
		$('.advance-search-panel').hide('fast');
	}else{
		panel_open = true;
		$('#advance_search_panel_state').val(1);
		$('.advance-search-panel').show('fast');
	}
}	

window.toggleAdvanceSearch = toggleAdvanceSearch;
	
})();
	
</script>
	<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav ml-0">
		<li class="nav-item"><a class="nav-link " href="{{url('/Settings')}}"><span>Default</span></a></li>
				<li class="nav-item"><a class="nav-link  " href="{{url('/general')}}"><span>General</span></a></li>
				<li class="nav-item"><a class="nav-link " href="{{url('/custom')}}"><span>Custom</span></a></li>
				<li class="nav-item"><a class="nav-link " href="{{url('/api')}}"><span>API</span></a></li>
				<li class="nav-item"><a class="nav-link " href="{{url('/email')}}"><span>Email</span></a></li>
				<li class="nav-item"><a class="nav-link " href="{{url('/payment')}}"><span>Payment</span></a></li>
				<li class="nav-item"><a class="nav-link " href="{{url('/constants')}}"><span>Constants</span></a></li>
				<li class="nav-item"><a class="nav-link " href="{{url('/social')}}"><span>Social</span></a></li>
			
	</ul>
	<div class="main-card mb-3 card">
				<div class="card-body">
			<div class="card-header p-0">
				<i class="header-icon lnr-layers icon-gradient bg-plum-plate"> </i> Default Setting				<div class="btn-actions-pane-right">
							   
										<div class="btn-group" id="global_action_btn" style="display:none">
						<button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="" onclick="deleteSelected()" data-original-title="Delete selected"><i class="fa fa-trash"></i></button>
						<button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="" onclick="changeStatusAll(1)" data-original-title="Make active"><i class="fa fa-thumbs-up"></i></button>
						<button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="" onclick="changeStatusAll(0)" data-original-title="Make inactive"><i class="fa  fa-thumbs-o-down"></i></button>
					</div>
					&nbsp;
										<button type="button" class="btn btn-site btn-sm" onclick="add()">
					<i class="fa fa-plus"></i>
						Add new Setting
					</button>
          		</div>
        	</div>
       
			<div class="table-responsive" id="main_table">
				<table class="mb-0 table">
					<tbody>
					<tr>
						<th style="width:20%">Setting Name</th>
						<th style="width:30%">Key</th>
						<th style="width:40%">Value</th>
						<th class="text-right" style="padding-right:15px;">Action</th>
					</tr>
										<tr>
					<td>Lanaguage</td>
					<td>language</td>
					<td style="width:40%;word-break: break-all;">en</td>
					<td class="text-right" style="padding-right:15px;">	
												<a href="" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"><i class="fa fa-edit text-success fa-md"></i></a>
												&nbsp;
												
					</td>
					</tr>
										<tr>
					<td>SEO Site Title</td>
					<td>default_seo_site_title</td>
					<td style="width:40%;word-break: break-all;">Selfgood</td>
					<td class="text-right" style="padding-right:15px;">	
												<a href="" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"><i class="fa fa-edit text-success fa-md"></i></a>
												&nbsp;
												
					</td>
					</tr>
										<tr>
					<td>Site Default language</td>
					<td>default_lang</td>
					<td style="width:40%;word-break: break-all;">en</td>
					<td class="text-right" style="padding-right:15px;">	
												<a href="" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"><i class="fa fa-edit text-success fa-md"></i></a>
												&nbsp;
												
					</td>
					</tr>
										<tr>
					<td>Site Title</td>
					<td>site_title</td>
					<td style="width:40%;word-break: break-all;">New Admin</td>
					<td class="text-right" style="padding-right:15px;">	
												<a href="" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"><i class="fa fa-edit text-success fa-md"></i></a>
												&nbsp;
												
					</td>
					</tr>
										
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


@endsection