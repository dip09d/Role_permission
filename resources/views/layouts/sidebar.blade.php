<?php

use App\Helpers\NotificationHelper;
use Illuminate\Support\Facades\Auth;
use App\Helpers\permissionHelper;

$total = NotificationHelper::getUnreadNotificationCount();
$user = Auth::guard('admin')->user();
$rolePermissions = $user ? permissionHelper::getUserPermissions($user->role_id) : [];

?>
<div class="app-main ">
    <div class="app-sidebar sidebar-shadow">
        <div class="app-header__logo">
            <div class="logo-src"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
            <span>
                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                </button>
            </span>
        </div>
        <div class="scrollbar-sidebar">
            <div class="app-sidebar__inner">
                <ul class="vertical-nav-menu">
                    <li class="app-sidebar__heading">Menu</li>
                    <li>
                        <a href="{{url('/dashboard')}}">
                            <i class="metismenu-icon pe-7s-rocket"></i> Dashboards
                        </a>
                        <a href="{{url('/Notification')}}">

                            <i class="metismenu-icon lnr-alarm"></i> Notification

                            <span class="badge badge-pill badge-danger">{{ $total }}</span>

                        </a>

                    </li>
                    @if (in_array('Setting', $rolePermissions))
                    <li>
                        <a href="#">
                            <i class="metismenu-icon lnr-cog"></i> Setting
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>

                                <a href="{{url('/Settings')}}">

                                    <i class="metismenu-icon"></i> All Settings
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/Settings_group')}}">
                                    <i class="metismenu-icon">
                                    </i>Settings Groups
                                </a>
                            </li>

                        </ul>
                    </li>
@endif
@if (in_array('Admin', $rolePermissions))
                    <li>

                        <a href="#">
                            <i class="metismenu-icon lnr-user"></i> Admin
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="{{url('/user')}}">
                                    <i class="metismenu-icon">
                                    </i>user
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/role')}}">
                                    <i class="metismenu-icon">
                                    </i>role
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/permission')}}">
                                    <i class="metismenu-icon">
                                    </i>permission
                                </a>
                            </li>
                        </ul>
                    </li>
 @endif 
 @if (in_array('Management', $rolePermissions))
                    <li>
                        <a href="#">
                            <i class="metismenu-icon pe-7s-tools"></i> Management
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>

                                <ul>
                                    <li>
                                        <a href="buttons-standard.html">
                                            <i class="metismenu-icon">
                                            </i>
                                    </li>
                                    <li>
                                        <a href="buttons-pills.html">
                                            <i class="metismenu-icon">
                                            </i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="buttons-square.html">
                                            <i class="metismenu-icon">
                                            </i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="buttons-shadow.html">
                                            <i class="metismenu-icon">
                                            </i>Shadow
                                        </a>
                                    </li>
                                    <li>
                                        <a href="buttons-icons.html">
                                            <i class="metismenu-icon">
                                            </i>With Icons
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{url('catagory')}}">
                                    <i class="metismenu-icon">
                                    </i>Category
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/country')}}">
                                    <i class="metismenu-icon">
                                    </i>Country
                                </a>
                            </li>
                            <li>
                                <a href="{{url('email_template')}}">
                                    <i class="metismenu-icon">
                                    </i>Email Template
                                </a>
                            </li>
                            <li>
                                <a href="{{url('notification_template')}}">
                                    <i class="metismenu-icon">
                                    </i>Notification Template
                                </a>
                            </li>
                            <li>
                                <a href="{{url('testimonial')}}">
                                    <i class="metismenu-icon">
                                    </i>Testimonial
                                </a>
                            </li>
                            <li>
                                <a href="{{url('profession')}}">
                                    <i class="metismenu-icon">
                                    </i>Profession Management
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if (in_array('User Contact', $rolePermissions))   
                    <li>
                        <a href="#">
                            <i class="metismenu-icon "></i> User Contact
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="tabs.html">
                                    <i class="metismenu-icon">
                                    </i>Contact Request
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if (in_array('Quote', $rolePermissions))
                    <li>
                        <a href="#">
                            <i class="metismenu-icon pe-7s-menu"></i> Quote
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="data-tables.html">
                                    <i class="metismenu-icon">
                                    </i>Quote
                                </a>
                            </li>
                        </ul>
                    </li>
@endif
@if (in_array('Member', $rolePermissions))
                    <li>
                        <a href="#">
                            <i class="metismenu-icon lnr-user"></i> Member
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="Member">
                                    <i class="metismenu-icon">
                                    </i>Member
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if (in_array('Enrollment', $rolePermissions))
                    <li>
                        <a href="">
                            <i class="metismenu-icon pe-7s-menu"></i> Enrollment
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="datepicker.html">
                                    <i class="metismenu-icon">
                                    </i>Enrollment
                                </a>
                            </li>
                            <li>
                                <a href="range-slider.html">
                                    <i class="metismenu-icon">
                                    </i>Api Enrollment
                                </a>
                            </li>
                            <li>
                                <a href="input-selects.html">
                                    <i class="metismenu-icon">
                                    </i>Open Enrollment
                                </a>
                            </li>
                            <li>
                                <a href="toggle-switch.html">
                                    <i class="metismenu-icon">
                                    </i>Direct Enrollment
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if (in_array('Agent Request', $rolePermissions))
                    <li>
                        <a href="#">
                            <i class="metismenu-icon pe-7s-add-user"></i> Agent Request
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="datepicker.html">
                                    <i class="metismenu-icon">
                                    </i>Agent
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>