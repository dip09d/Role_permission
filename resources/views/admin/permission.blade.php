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
					<div>Menu Permission &nbsp; &nbsp; <span class="badge badge-secondary">Admin</span>
						<div class="page-title-subheading">Menu Permission &gt; Give Menu Permission</div>
					</div>
				</div>
				<div class="page-title-actions">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href=""> Home</a></li>
						<li class="breadcrumb-item active">Menu Permission</li>
					</ol>
				</div>
			</div>
		</div>
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
					<i class="header-icon lnr-layers icon-gradient bg-plum-plate"> </i> Menu Permission &nbsp; &nbsp; <span class="badge badge-secondary">Admin</span>
					<div class="btn-actions-pane-right">
						<select class="form-control form-control-sm" name="user_role">
							<option value="">Choose</option>
							<option value="1" selected="selected">Admin</option>
							<option value="4">hrhrh</option>
						</select>
					</div>
				</div>
				<div class="table-responsive" id="main_table">
					<form action="" method="post">
						<input type="hidden" name="admin_role" value="1">
						<table class="mb-0 table">
							<tbody>
								<tr>

									<th style="width:25%">Menu</th>
									<th style="width:25%">Sub Menu</th>
									<th style="width:25%">Menu Code</th>
									<th class="text-right" style="padding-right:15px;">Give Permission</th>
								</tr>
								<tr>
									<td>
										Setting <div><small>Website Setting</small></div>
									</td>
									<td>&nbsp;</td>
									<td>MEN0001</td>

									<td class="text-right">
										<span class="check-inline">
											<input type="checkbox" class="parent_menu magic-checkbox" name="menu_code[]" value="MEN0001|1" id="item_1" data-menu-id="1" checked="">
											<label for="item_1"></label>
										</span>
										<a href="javascript:void(0)" onclick="toggleSubMenu('1', this)" class="" style="display: inline-block; vertical-align: middle;"><i class="fa fa-chevron-down fa-lg"></i></a>
									</td>
								</tr>


								<tr class="tr-none child_menu childof-1 sub_trno_1" style="display: table-row;">

									<td>&nbsp;</td>
									<td>
										All Settings <div><small>All Settings</small></div>
									</td>
									<td>MEN0051_LIST</td>
									<td class="text-right">
										<span class="check-inline">
											<input type="checkbox" class="magic-checkbox child_menu_1" name="menu_code[]" value="MEN0051_LIST|51" id="item_51" data-menu-id="51" checked="">
											<label for="item_51"></label>
										</span>
									</td>
								</tr>

								<tr class="tr-none child_menu childof-1 sub_trno_1" style="display: table-row;">

									<td>&nbsp;</td>
									<td>
										Setting Group <div><small>Setting Group</small></div>
									</td>
									<td>MEN0052_LIST</td>
									<td class="text-right">
										<span class="check-inline">
											<input type="checkbox" class="magic-checkbox child_menu_1" name="menu_code[]" value="MEN0052_LIST|52" id="item_52" data-menu-id="52" checked="">
											<label for="item_52"></label>
										</span>
									</td>
								</tr>

								<tr>
									<td>
										Admin <div><small>Admin Control Panel</small></div>
									</td>
									<td>&nbsp;</td>
									<td>MEN0004</td>

									<td class="text-right">
										<span class="check-inline">
											<input type="checkbox" class="parent_menu magic-checkbox" name="menu_code[]" value="MEN0004|4" id="item_4" data-menu-id="4" checked="">
											<label for="item_4"></label>
										</span>
										<a href="javascript:void(0)" onclick="toggleSubMenu('4', this)" class="" style="display: inline-block; vertical-align: middle;"><i class="fa fa-chevron-down fa-lg"></i></a>
									</td>
								</tr>


								<tr class="tr-none child_menu childof-4 sub_trno_4" style="display: table-row;">

									<td>&nbsp;</td>
									<td>
										User <div><small>Admin User</small></div>
									</td>
									<td>MEN0005_LIST</td>
									<td class="text-right">
										<span class="check-inline">
											<input type="checkbox" class="magic-checkbox child_menu_4" name="menu_code[]" value="MEN0005_LIST|5" id="item_5" data-menu-id="5" checked="">
											<label for="item_5"></label>
										</span>
									</td>
								</tr>

								<tr class="tr-none child_menu childof-4 sub_trno_4" style="display: table-row;">

									<td>&nbsp;</td>
									<td>
										Role <div><small>Admin Role</small></div>
									</td>
									<td>MEN0006_LIST</td>
									<td class="text-right">
										<span class="check-inline">
											<input type="checkbox" class="magic-checkbox child_menu_4" name="menu_code[]" value="MEN0006_LIST|6" id="item_6" data-menu-id="6" checked="">
											<label for="item_6"></label>
										</span>
									</td>
								</tr>

								<tr class="tr-none child_menu childof-4 sub_trno_4" style="display: table-row;">

									<td>&nbsp;</td>
									<td>
										Permission <div><small>Menu Permission</small></div>
									</td>
									<td>MEN0007_EDIT</td>
									<td class="text-right">
										<span class="check-inline">
											<input type="checkbox" class="magic-checkbox child_menu_4" name="menu_code[]" value="MEN0007_EDIT|7" id="item_7" data-menu-id="7" checked="">
											<label for="item_7"></label>
										</span>
									</td>
								</tr>

								<tr>
									<td>
										Management <div><small>Management</small></div>
									</td>
									<td>&nbsp;</td>
									<td>MEN0010</td>

									<td class="text-right">
										<span class="check-inline">
											<input type="checkbox" class="parent_menu magic-checkbox" name="menu_code[]" value="MEN0010|10" id="item_10" data-menu-id="10" checked="">
											<label for="item_10"></label>
										</span>
										<a href="javascript:void(0)" onclick="toggleSubMenu('10', this)" class="" style="display: inline-block; vertical-align: middle;"><i class="fa fa-chevron-down fa-lg"></i></a>
									</td>
								</tr>


								<tr class="tr-none child_menu childof-10 sub_trno_10" style="display: table-row;">

									<td>&nbsp;</td>
									<td>
										Category <div><small>Category</small></div>
									</td>
									<td>MEN0011_LIST</td>
									<td class="text-right">
										<span class="check-inline">
											<input type="checkbox" class="magic-checkbox child_menu_10" name="menu_code[]" value="MEN0011_LIST|11" id="item_11" data-menu-id="11">
											<label for="item_11"></label>
										</span>
									</td>
								</tr>

								<tr class="tr-none child_menu childof-10 sub_trno_10" style="display: table-row;">

									<td>&nbsp;</td>
									<td>
										States <div><small>State Management</small></div>
									</td>
									<td>MEN0017_LIST</td>
									<td class="text-right">
										<span class="check-inline">
											<input type="checkbox" class="magic-checkbox child_menu_10" name="menu_code[]" value="MEN0017_LIST|17" id="item_17" data-menu-id="17">
											<label for="item_17"></label>
										</span>
									</td>
								</tr>

								<tr class="tr-none child_menu childof-10 sub_trno_10" style="display: table-row;">

									<td>&nbsp;</td>
									<td>
										Email Template <div><small>Email Template Management</small></div>
									</td>
									<td>MEN0029_LIST</td>
									<td class="text-right">
										<span class="check-inline">
											<input type="checkbox" class="magic-checkbox child_menu_10" name="menu_code[]" value="MEN0029_LIST|29" id="item_29" data-menu-id="29" checked="">
											<label for="item_29"></label>
										</span>
									</td>
								</tr>

								<tr class="tr-none child_menu childof-10 sub_trno_10" style="display: table-row;">

									<td>&nbsp;</td>
									<td>
										Notification Template <div><small>Notification Template Management</small></div>
									</td>
									<td>MEN0030_LIST</td>
									<td class="text-right">
										<span class="check-inline">
											<input type="checkbox" class="magic-checkbox child_menu_10" name="menu_code[]" value="MEN0030_LIST|30" id="item_30" data-menu-id="30">
											<label for="item_30"></label>
										</span>
									</td>
								</tr>

								<tr class="tr-none child_menu childof-10 sub_trno_10" style="display: table-row;">

									<td>&nbsp;</td>
									<td>
										CMS <div><small>Content Management System</small></div>
									</td>
									<td>MEN0032_LIST</td>
									<td class="text-right">
										<span class="check-inline">
											<input type="checkbox" class="magic-checkbox child_menu_10" name="menu_code[]" value="MEN0032_LIST|32" id="item_32" data-menu-id="32" checked="">
											<label for="item_32"></label>
										</span>
									</td>
								</tr>

								<tr class="tr-none child_menu childof-10 sub_trno_10" style="display: table-row;">

									<td>&nbsp;</td>
									<td>
										Testimonial <div><small>Testimonial</small></div>
									</td>
									<td>MEN0090_LIST</td>
									<td class="text-right">
										<span class="check-inline">
											<input type="checkbox" class="magic-checkbox child_menu_10" name="menu_code[]" value="MEN0090_LIST|90" id="item_90" data-menu-id="90">
											<label for="item_90"></label>
										</span>
									</td>
								</tr>

								<tr class="tr-none child_menu childof-10 sub_trno_10" style="display: table-row;">

									<td>&nbsp;</td>
									<td>
										Profession Management <div><small></small></div>
									</td>
									<td>MEN0105_LIST</td>
									<td class="text-right">
										<span class="check-inline">
											<input type="checkbox" class="magic-checkbox child_menu_10" name="menu_code[]" value="MEN0105_LIST|105" id="item_105" data-menu-id="105">
											<label for="item_105"></label>
										</span>
									</td>
								</tr>

								<tr>
									<td>
										User Contact <div><small>User Contact Management</small></div>
									</td>
									<td>&nbsp;</td>
									<td>MEN0059</td>

									<td class="text-right">
										<span class="check-inline">
											<input type="checkbox" class="parent_menu magic-checkbox" name="menu_code[]" value="MEN0059|59" id="item_59" data-menu-id="59">
											<label for="item_59"></label>
										</span>
										<a href="javascript:void(0)" onclick="toggleSubMenu('59', this)" class="" style="display: inline-block; vertical-align: middle;"><i class="fa fa-chevron-down fa-lg"></i></a>
									</td>
								</tr>


								<tr class="tr-none child_menu childof-59 sub_trno_59" style="display:none;">

									<td>&nbsp;</td>
									<td>
										Contact Request <div><small>User Contact Request Managment</small></div>
									</td>
									<td>MEN0060_LIST</td>
									<td class="text-right">
										<span class="check-inline">
											<input type="checkbox" class="magic-checkbox child_menu_59" name="menu_code[]" value="MEN0060_LIST|60" id="item_60" data-menu-id="60">
											<label for="item_60"></label>
										</span>
									</td>
								</tr>

								<tr>
									<td>
										Quote <div><small>Quote</small></div>
									</td>
									<td>&nbsp;</td>
									<td>MEN0099_LIST</td>

									<td class="text-right">
										<span class="check-inline">
											<input type="checkbox" class="parent_menu magic-checkbox" name="menu_code[]" value="MEN0099_LIST|99" id="item_99" data-menu-id="99">
											<label for="item_99"></label>
										</span>
										<a href="javascript:void(0)" onclick="toggleSubMenu('99', this)" class="" style="display: inline-block; vertical-align: middle;"><i class="fa fa-chevron-down fa-lg"></i></a>
									</td>
								</tr>


								<tr class="tr-none child_menu childof-99 sub_trno_99" style="display:none;">

									<td>&nbsp;</td>
									<td>
										Quote <div><small>Quote</small></div>
									</td>
									<td>MEN0100_LIST</td>
									<td class="text-right">
										<span class="check-inline">
											<input type="checkbox" class="magic-checkbox child_menu_99" name="menu_code[]" value="MEN0100_LIST|100" id="item_100" data-menu-id="100">
											<label for="item_100"></label>
										</span>
									</td>
								</tr>

								<tr>
									<td>
										Member <div><small>Member</small></div>
									</td>
									<td>&nbsp;</td>
									<td>MEN0101_LIST</td>

									<td class="text-right">
										<span class="check-inline">
											<input type="checkbox" class="parent_menu magic-checkbox" name="menu_code[]" value="MEN0101_LIST|101" id="item_101" data-menu-id="101">
											<label for="item_101"></label>
										</span>
										<a href="javascript:void(0)" onclick="toggleSubMenu('101', this)" class="" style="display: inline-block; vertical-align: middle;"><i class="fa fa-chevron-down fa-lg"></i></a>
									</td>
								</tr>


								<tr class="tr-none child_menu childof-101 sub_trno_101" style="display:none;">

									<td>&nbsp;</td>
									<td>
										Member <div><small>Member</small></div>
									</td>
									<td>MEN0102_LIST</td>
									<td class="text-right">
										<span class="check-inline">
											<input type="checkbox" class="magic-checkbox child_menu_101" name="menu_code[]" value="MEN0102_LIST|102" id="item_102" data-menu-id="102">
											<label for="item_102"></label>
										</span>
									</td>
								</tr>

								<tr>
									<td>
										Enrollment <div><small>Enrollment</small></div>
									</td>
									<td>&nbsp;</td>
									<td>MEN0103</td>

									<td class="text-right">
										<span class="check-inline">
											<input type="checkbox" class="parent_menu magic-checkbox" name="menu_code[]" value="MEN0103|103" id="item_103" data-menu-id="103">
											<label for="item_103"></label>
										</span>
										<a href="javascript:void(0)" onclick="toggleSubMenu('103', this)" class="" style="display: inline-block; vertical-align: middle;"><i class="fa fa-chevron-down fa-lg"></i></a>
									</td>
								</tr>


								<tr class="tr-none child_menu childof-103 sub_trno_103" style="display:none;">

									<td>&nbsp;</td>
									<td>
										Enrollment <div><small>Enrollment</small></div>
									</td>
									<td>MEN0104_LIST</td>
									<td class="text-right">
										<span class="check-inline">
											<input type="checkbox" class="magic-checkbox child_menu_103" name="menu_code[]" value="MEN0104_LIST|104" id="item_104" data-menu-id="104">
											<label for="item_104"></label>
										</span>
									</td>
								</tr>

								<tr class="tr-none child_menu childof-103 sub_trno_103" style="display:none;">

									<td>&nbsp;</td>
									<td>
										Api Enrollment <div><small>Api Enrollment</small></div>
									</td>
									<td>MEN0106_LIST</td>
									<td class="text-right">
										<span class="check-inline">
											<input type="checkbox" class="magic-checkbox child_menu_103" name="menu_code[]" value="MEN0106_LIST|106" id="item_106" data-menu-id="106">
											<label for="item_106"></label>
										</span>
									</td>
								</tr>

								<tr class="tr-none child_menu childof-103 sub_trno_103" style="display:none;">

									<td>&nbsp;</td>
									<td>
										Open Enrollment <div><small>Open Enrollment</small></div>
									</td>
									<td>MEN0107_LIST</td>
									<td class="text-right">
										<span class="check-inline">
											<input type="checkbox" class="magic-checkbox child_menu_103" name="menu_code[]" value="MEN0107_LIST|107" id="item_107" data-menu-id="107">
											<label for="item_107"></label>
										</span>
									</td>
								</tr>

								<tr class="tr-none child_menu childof-103 sub_trno_103" style="display:none;">

									<td>&nbsp;</td>
									<td>
										Direct Enrollment <div><small>Direct Enrollment</small></div>
									</td>
									<td>MEN0110_LIST</td>
									<td class="text-right">
										<span class="check-inline">
											<input type="checkbox" class="magic-checkbox child_menu_103" name="menu_code[]" value="MEN0110_LIST|110" id="item_110" data-menu-id="110">
											<label for="item_110"></label>
										</span>
									</td>
								</tr>

								<tr>
									<td>
										Agent Request <div><small>Agent Request</small></div>
									</td>
									<td>&nbsp;</td>
									<td>MEN0108_LIST</td>

									<td class="text-right">
										<span class="check-inline">
											<input type="checkbox" class="parent_menu magic-checkbox" name="menu_code[]" value="MEN0108_LIST|108" id="item_108" data-menu-id="108">
											<label for="item_108"></label>
										</span>
										<a href="javascript:void(0)" onclick="toggleSubMenu('108', this)" class="" style="display: inline-block; vertical-align: middle;"><i class="fa fa-chevron-down fa-lg"></i></a>
									</td>
								</tr>


								<tr class="tr-none child_menu childof-108 sub_trno_108" style="display:none;">

									<td>&nbsp;</td>
									<td>
										Agent <div><small>Agent</small></div>
									</td>
									<td>MEN0109_LIST</td>
									<td class="text-right">
										<span class="check-inline">
											<input type="checkbox" class="magic-checkbox child_menu_108" name="menu_code[]" value="MEN0109_LIST|109" id="item_109" data-menu-id="109">
											<label for="item_109"></label>
										</span>
									</td>
								</tr>


							</tbody>
						</table>
						<div class="p-3 text-right">
							<button type="submit" class="btn btn-site mr-2">Save</button>
							<a href="https://scriptlisting.com/selfgood-live/hackground/permission/list_menu" class="btn btn-secondary">Cancel</a>
						</div>
					</form>
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