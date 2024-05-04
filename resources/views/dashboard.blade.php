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
        <div class="app-page-title app-page-title-simple">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        <div class="page-title-head center-elem">
                            <span class="d-inline-block pr-2">
                                <i class="lnr-apartment opacity-6"></i>
                            </span>
                            <span class="d-inline-block">Minimal Dashboard</span>
                        </div>
                        <div class="page-title-subheading opacity-10">

                        </div>
                    </div>
                </div>
                <div class="page-title-actions">


                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="widget-chart widget-chart2 text-left mb-3 card-btm-border card-shadow-primary border-primary card" onclick="location.href='https://scriptlisting.com/selfgood-live/hackground/enroll/list_record'">
                    <div class="widget-chat-wrapper-outer">
                        <div class="widget-chart-content">
                            <div class="widget-title opacity-5 text-uppercase">Enroll</div>
                            <div class="widget-numbers mt-2 fsize-4 mb-0 w-100">
                                <div class="widget-chart-flex align-items-center">
                                    <div>
                                        210 </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-chart widget-chart2 text-left mb-3 card-btm-border card-shadow-danger border-success card" onclick="location.href='https://scriptlisting.com/selfgood-live/hackground/quote/list_record'">
                    <div class="widget-chat-wrapper-outer">
                        <div class="widget-chart-content">
                            <div class="widget-title opacity-5 text-uppercase">Quote</div>
                            <div class="widget-numbers mt-2 fsize-4 mb-0 w-100">
                                <div class="widget-chart-flex align-items-center">
                                    <div>
                                        104 </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-chart widget-chart2 text-left mb-3 card-btm-border card-shadow-danger border-warning card" onclick="location.href='https://scriptlisting.com/selfgood-live/hackground/openenrollment/list_record'">
                    <div class="widget-chat-wrapper-outer">
                        <div class="widget-chart-content">
                            <div class="widget-title opacity-5 text-uppercase">Open Enrollment</div>
                            <div class="widget-numbers mt-2 fsize-4 mb-0 w-100">
                                <div class="widget-chart-flex align-items-center">
                                    <div>
                                        0 </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-chart widget-chart2 text-left mb-3 card-btm-border card-shadow-danger border-danger card" onclick="location.href='https://scriptlisting.com/selfgood-live/hackground/admin_notification/list_record'">
                    <div class="widget-chat-wrapper-outer">
                        <div class="widget-chart-content">
                            <div class="widget-title opacity-5 text-uppercase">Notification</div>
                            <div class="widget-numbers mt-2 fsize-4 mb-0 w-100">
                                <div class="widget-chart-flex align-items-center">
                                    <div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-chart widget-chart2 text-left mb-3 card-btm-border card-shadow-warning border-info card" onclick="location.href='https://scriptlisting.com/selfgood-live/hackground/contact/list_record'">
                    <div class="widget-chat-wrapper-outer">
                        <div class="widget-chart-content">
                            <div class="widget-title opacity-5 text-uppercase">Contact</div>
                            <div class="widget-numbers mt-2 fsize-4 mb-0 w-100">
                                <div class="widget-chart-flex align-items-center">
                                    <div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-chart widget-chart2 text-left mb-3 card-btm-border card-shadow-success border-alternate card" onclick="location.href='https://scriptlisting.com/selfgood-live/hackground/member/list_record'">
                    <div class="widget-chat-wrapper-outer">
                        <div class="widget-chart-content">
                            <div class="widget-title opacity-5 text-uppercase">Member</div>
                            <div class="widget-numbers mt-2 fsize-4 mb-0 w-100">
                                <div class="widget-chart-flex align-items-center">
                                    <div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="mb-3 card">
                    <div class="card-header-tab card-header">
                        <div class="card-header-title font-size-lg text-capitalize font-weight-normal">Enrollment &amp; Quote Status</div>
                        <div class="btn-actions-pane-right text-capitalize">
                            <button class="btn btn-warning" hidden="">Actions</button>
                        </div>
                    </div>
                    <div class="pt-0 card-body" style="position: relative;">
                        <div id="chart-combined-data" style="min-height: 411px;">
                            <div id="apexcharts2c70ws0j" class="apexcharts-canvas apexcharts2c70ws0j zoomable" style="width: 969px; height: 397px;"><svg id="SvgjsSvg1231" width="969" height="397" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                    <foreignObject x="0" y="0" width="969" height="397">
                                        <div class="apexcharts-legend center position-bottom" xmlns="http://www.w3.org/1999/xhtml" style="inset: auto 0px 10px; position: absolute;">
                                            <div class="apexcharts-legend-series" rel="1" data:collapsed="false" style="margin: 0px 5px;"><span class="apexcharts-legend-marker" rel="1" data:collapsed="false" style="background: rgb(0, 143, 251); color: rgb(0, 143, 251); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="1" data:collapsed="false" style="color: rgb(55, 61, 63); font-family: Helvetica, Arial, sans-serif;">New Enroll</span></div>
                                            <div class="apexcharts-legend-series" rel="2" data:collapsed="false" style="margin: 0px 5px;"><span class="apexcharts-legend-marker" rel="2" data:collapsed="false" style="background: rgb(0, 227, 150); color: rgb(0, 227, 150); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="2" data:collapsed="false" style="color: rgb(55, 61, 63); font-family: Helvetica, Arial, sans-serif;">Quote</span></div>
                                            <div class="apexcharts-legend-series" rel="3" data:collapsed="false" style="margin: 0px 5px;"><span class="apexcharts-legend-marker" rel="3" data:collapsed="false" style="background: rgb(254, 176, 25); color: rgb(254, 176, 25); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="3" data:collapsed="false" style="color: rgb(55, 61, 63); font-family: Helvetica, Arial, sans-serif;">Open Enrollment</span></div>
                                        </div>
                                        <style type="text/css">
                                            .apexcharts-legend {
                                                display: flex;
                                                overflow: auto;
                                                padding: 0 10px;
                                            }

                                            .apexcharts-legend.position-bottom,
                                            .apexcharts-legend.position-top {
                                                flex-wrap: wrap
                                            }

                                            .apexcharts-legend.position-right,
                                            .apexcharts-legend.position-left {
                                                flex-direction: column;
                                                bottom: 0;
                                            }

                                            .apexcharts-legend.position-bottom.left,
                                            .apexcharts-legend.position-top.left,
                                            .apexcharts-legend.position-right,
                                            .apexcharts-legend.position-left {
                                                justify-content: flex-start;
                                            }

                                            .apexcharts-legend.position-bottom.center,
                                            .apexcharts-legend.position-top.center {
                                                justify-content: center;
                                            }

                                            .apexcharts-legend.position-bottom.right,
                                            .apexcharts-legend.position-top.right {
                                                justify-content: flex-end;
                                            }

                                            .apexcharts-legend-series {
                                                cursor: pointer;
                                            }

                                            .apexcharts-legend.position-bottom .apexcharts-legend-series,
                                            .apexcharts-legend.position-top .apexcharts-legend-series {
                                                display: flex;
                                                align-items: center;
                                            }

                                            .apexcharts-legend-text {
                                                position: relative;
                                                font-size: 14px;
                                            }

                                            .apexcharts-legend-text *,
                                            .apexcharts-legend-marker * {
                                                pointer-events: none;
                                            }

                                            .apexcharts-legend-marker {
                                                position: relative;
                                                display: inline-block;
                                                cursor: pointer;
                                                margin-right: 3px;
                                            }

                                            .apexcharts-legend.right .apexcharts-legend-series,
                                            .apexcharts-legend.left .apexcharts-legend-series {
                                                display: inline-block;
                                            }

                                            .apexcharts-legend-series.no-click {
                                                cursor: auto;
                                            }

                                            .apexcharts-legend .apexcharts-hidden-zero-series,
                                            .apexcharts-legend .apexcharts-hidden-null-series {
                                                display: none !important;
                                            }

                                            .inactive-legend {
                                                opacity: 0.45;
                                            }
                                        </style>
                                    </foreignObject>
                                    <g id="SvgjsG1233" class="apexcharts-inner apexcharts-graphical" transform="translate(58.95833333333333, 40)">
                                        <defs id="SvgjsDefs1232">
                                            <clipPath id="gridRectMask2c70ws0j">
                                                <rect id="SvgjsRect1256" width="854.75" height="297.348" x="-2" y="-2" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                            </clipPath>
                                            <clipPath id="gridRectMarkerMask2c70ws0j">
                                                <rect id="SvgjsRect1257" width="868.75" height="311.348" x="-9" y="-9" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                            </clipPath>
                                        </defs>
                                        <rect id="SvgjsRect1239" width="1" height="293.348" x="0" y="0" rx="0" ry="0" fill="#b1b9c4" opacity="1" stroke-width="0" stroke-dasharray="0" class="apexcharts-xcrosshairs" filter="none" fill-opacity="0.9"></rect>
                                        <g id="SvgjsG1341" class="apexcharts-xaxis" transform="translate(0, 0)">
                                            <g id="SvgjsG1342" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text id="SvgjsText1343" font-family="Helvetica, Arial, sans-serif" x="24.405604621822818" y="322.348" text-anchor="middle" dominate-baseline="central" font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label apexcharts-xaxis-label" style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1344" style="font-family: Helvetica, Arial, sans-serif;">02 Mar</tspan>
                                                    <title>02 Mar</title>
                                                </text><text id="SvgjsText1345" font-family="Helvetica, Arial, sans-serif" x="97.62241848729127" y="322.348" text-anchor="middle" dominate-baseline="central" font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label apexcharts-xaxis-label" style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1346" style="font-family: Helvetica, Arial, sans-serif;">03 Mar</tspan>
                                                    <title>03 Mar</title>
                                                </text><text id="SvgjsText1347" font-family="Helvetica, Arial, sans-serif" x="170.83923235275972" y="322.348" text-anchor="middle" dominate-baseline="central" font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label apexcharts-xaxis-label" style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1348" style="font-family: Helvetica, Arial, sans-serif;">04 Mar</tspan>
                                                    <title>04 Mar</title>
                                                </text><text id="SvgjsText1349" font-family="Helvetica, Arial, sans-serif" x="244.05604621822818" y="322.348" text-anchor="middle" dominate-baseline="central" font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label apexcharts-xaxis-label" style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1350" style="font-family: Helvetica, Arial, sans-serif;">05 Mar</tspan>
                                                    <title>05 Mar</title>
                                                </text><text id="SvgjsText1351" font-family="Helvetica, Arial, sans-serif" x="317.2728600836966" y="322.348" text-anchor="middle" dominate-baseline="central" font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label apexcharts-xaxis-label" style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1352" style="font-family: Helvetica, Arial, sans-serif;">06 Mar</tspan>
                                                    <title>06 Mar</title>
                                                </text><text id="SvgjsText1353" font-family="Helvetica, Arial, sans-serif" x="390.4896739491651" y="322.348" text-anchor="middle" dominate-baseline="central" font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label apexcharts-xaxis-label" style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1354" style="font-family: Helvetica, Arial, sans-serif;">07 Mar</tspan>
                                                    <title>07 Mar</title>
                                                </text><text id="SvgjsText1355" font-family="Helvetica, Arial, sans-serif" x="463.70648781463353" y="322.348" text-anchor="middle" dominate-baseline="central" font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label apexcharts-xaxis-label" style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1356" style="font-family: Helvetica, Arial, sans-serif;">08 Mar</tspan>
                                                    <title>08 Mar</title>
                                                </text><text id="SvgjsText1357" font-family="Helvetica, Arial, sans-serif" x="536.923301680102" y="322.348" text-anchor="middle" dominate-baseline="central" font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label apexcharts-xaxis-label" style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1358" style="font-family: Helvetica, Arial, sans-serif;">09 Mar</tspan>
                                                    <title>09 Mar</title>
                                                </text><text id="SvgjsText1359" font-family="Helvetica, Arial, sans-serif" x="610.1401155455704" y="322.348" text-anchor="middle" dominate-baseline="central" font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label apexcharts-xaxis-label" style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1360" style="font-family: Helvetica, Arial, sans-serif;">10 Mar</tspan>
                                                    <title>10 Mar</title>
                                                </text><text id="SvgjsText1361" font-family="Helvetica, Arial, sans-serif" x="683.3569294110389" y="322.348" text-anchor="middle" dominate-baseline="central" font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label apexcharts-xaxis-label" style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1362" style="font-family: Helvetica, Arial, sans-serif;">11 Mar</tspan>
                                                    <title>11 Mar</title>
                                                </text><text id="SvgjsText1363" font-family="Helvetica, Arial, sans-serif" x="756.5737432765073" y="322.348" text-anchor="middle" dominate-baseline="central" font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label apexcharts-xaxis-label" style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1364" style="font-family: Helvetica, Arial, sans-serif;">12 Mar</tspan>
                                                    <title>12 Mar</title>
                                                </text><text id="SvgjsText1365" font-family="Helvetica, Arial, sans-serif" x="829.7905571419758" y="322.348" text-anchor="middle" dominate-baseline="central" font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label apexcharts-xaxis-label" style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1366" style="font-family: Helvetica, Arial, sans-serif;">13 Mar</tspan>
                                                    <title>13 Mar</title>
                                                </text></g>
                                            <line id="SvgjsLine1367" x1="0" y1="294.348" x2="850.75" y2="294.348" stroke="#78909c" stroke-dasharray="0" stroke-width="1"></line>
                                        </g>
                                        <g id="SvgjsG1385" class="apexcharts-grid">
                                            <line id="SvgjsLine1386" x1="24.405604621822818" y1="294.348" x2="24.405604621822818" y2="300.348" stroke="#78909c" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1387" x1="97.62241848729127" y1="294.348" x2="97.62241848729127" y2="300.348" stroke="#78909c" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1388" x1="170.83923235275972" y1="294.348" x2="170.83923235275972" y2="300.348" stroke="#78909c" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1389" x1="244.05604621822818" y1="294.348" x2="244.05604621822818" y2="300.348" stroke="#78909c" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1390" x1="317.2728600836966" y1="294.348" x2="317.2728600836966" y2="300.348" stroke="#78909c" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1391" x1="390.4896739491651" y1="294.348" x2="390.4896739491651" y2="300.348" stroke="#78909c" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1392" x1="463.70648781463353" y1="294.348" x2="463.70648781463353" y2="300.348" stroke="#78909c" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1393" x1="536.923301680102" y1="294.348" x2="536.923301680102" y2="300.348" stroke="#78909c" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1394" x1="610.1401155455704" y1="294.348" x2="610.1401155455704" y2="300.348" stroke="#78909c" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1395" x1="683.3569294110389" y1="294.348" x2="683.3569294110389" y2="300.348" stroke="#78909c" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1396" x1="756.5737432765073" y1="294.348" x2="756.5737432765073" y2="300.348" stroke="#78909c" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1397" x1="829.7905571419758" y1="294.348" x2="829.7905571419758" y2="300.348" stroke="#78909c" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1398" x1="0" y1="0" x2="850.75" y2="0" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1399" x1="0" y1="48.891333333333336" x2="850.75" y2="48.891333333333336" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1400" x1="0" y1="97.78266666666667" x2="850.75" y2="97.78266666666667" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1401" x1="0" y1="146.674" x2="850.75" y2="146.674" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1402" x1="0" y1="195.56533333333334" x2="850.75" y2="195.56533333333334" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1403" x1="0" y1="244.45666666666668" x2="850.75" y2="244.45666666666668" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1404" x1="0" y1="293.348" x2="850.75" y2="293.348" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1406" x1="0" y1="293.348" x2="850.75" y2="293.348" stroke="transparent" stroke-dasharray="0"></line>
                                            <line id="SvgjsLine1405" x1="0" y1="1" x2="0" y2="293.348" stroke="transparent" stroke-dasharray="0"></line>
                                        </g>
                                        <g id="SvgjsG1259" class="apexcharts-bar-series apexcharts-plot-series" clip-path="url(#gridRectMask2c70ws0j)">
                                            <g id="SvgjsG1260" class="apexcharts-series New-Enroll" rel="1" data:realIndex="0">
                                                <path id="apexcharts-bar-area-0" d="M -3.2540806162430442 293.348L -3.2540806162430442 293.348L 47.997689089584874 293.348L 47.997689089584874 293.348L -3.2540806162430442 293.348" fill="rgba(0,143,251,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2c70ws0j)" pathTo="M -3.2540806162430442 293.348L -3.2540806162430442 293.348L 47.997689089584874 293.348L 47.997689089584874 293.348L -3.2540806162430442 293.348" pathFrom="M -3.2540806162430442 293.348L -3.2540806162430442 293.348L 47.997689089584874 293.348L 47.997689089584874 293.348L -3.2540806162430442 293.348" cy="293.348" cx="47.997689089584874" j="0" val="0" barWidth="51.25176970582792"></path>
                                                <path id="apexcharts-bar-area-0" d="M 69.96273324922541 293.348L 69.96273324922541 293.348L 121.21450295505332 293.348L 121.21450295505332 293.348L 69.96273324922541 293.348" fill="rgba(0,143,251,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2c70ws0j)" pathTo="M 69.96273324922541 293.348L 69.96273324922541 293.348L 121.21450295505332 293.348L 121.21450295505332 293.348L 69.96273324922541 293.348" pathFrom="M 69.96273324922541 293.348L 69.96273324922541 293.348L 121.21450295505332 293.348L 121.21450295505332 293.348L 69.96273324922541 293.348" cy="293.348" cx="121.21450295505332" j="1" val="0" barWidth="51.25176970582792"></path>
                                                <path id="apexcharts-bar-area-0" d="M 143.17954711469386 293.348L 143.17954711469386 293.348L 194.43131682052177 293.348L 194.43131682052177 293.348L 143.17954711469386 293.348" fill="rgba(0,143,251,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2c70ws0j)" pathTo="M 143.17954711469386 293.348L 143.17954711469386 293.348L 194.43131682052177 293.348L 194.43131682052177 293.348L 143.17954711469386 293.348" pathFrom="M 143.17954711469386 293.348L 143.17954711469386 293.348L 194.43131682052177 293.348L 194.43131682052177 293.348L 143.17954711469386 293.348" cy="293.348" cx="194.43131682052177" j="2" val="0" barWidth="51.25176970582792"></path>
                                                <path id="apexcharts-bar-area-0" d="M 216.3963609801623 293.348L 216.3963609801623 293.348L 267.6481306859902 293.348L 267.6481306859902 293.348L 216.3963609801623 293.348" fill="rgba(0,143,251,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2c70ws0j)" pathTo="M 216.3963609801623 293.348L 216.3963609801623 293.348L 267.6481306859902 293.348L 267.6481306859902 293.348L 216.3963609801623 293.348" pathFrom="M 216.3963609801623 293.348L 216.3963609801623 293.348L 267.6481306859902 293.348L 267.6481306859902 293.348L 216.3963609801623 293.348" cy="293.348" cx="267.6481306859902" j="3" val="0" barWidth="51.25176970582792"></path>
                                                <path id="apexcharts-bar-area-0" d="M 289.6131748456308 293.348L 289.6131748456308 293.348L 340.86494455145873 293.348L 340.86494455145873 293.348L 289.6131748456308 293.348" fill="rgba(0,143,251,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2c70ws0j)" pathTo="M 289.6131748456308 293.348L 289.6131748456308 293.348L 340.86494455145873 293.348L 340.86494455145873 293.348L 289.6131748456308 293.348" pathFrom="M 289.6131748456308 293.348L 289.6131748456308 293.348L 340.86494455145873 293.348L 340.86494455145873 293.348L 289.6131748456308 293.348" cy="293.348" cx="340.86494455145873" j="4" val="0" barWidth="51.25176970582792"></path>
                                                <path id="apexcharts-bar-area-0" d="M 362.82998871109925 293.348L 362.82998871109925 293.348L 414.0817584169272 293.348L 414.0817584169272 293.348L 362.82998871109925 293.348" fill="rgba(0,143,251,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2c70ws0j)" pathTo="M 362.82998871109925 293.348L 362.82998871109925 293.348L 414.0817584169272 293.348L 414.0817584169272 293.348L 362.82998871109925 293.348" pathFrom="M 362.82998871109925 293.348L 362.82998871109925 293.348L 414.0817584169272 293.348L 414.0817584169272 293.348L 362.82998871109925 293.348" cy="293.348" cx="414.0817584169272" j="5" val="0" barWidth="51.25176970582792"></path>
                                                <path id="apexcharts-bar-area-0" d="M 436.0468025765677 293.348L 436.0468025765677 293.348L 487.29857228239564 293.348L 487.29857228239564 293.348L 436.0468025765677 293.348" fill="rgba(0,143,251,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2c70ws0j)" pathTo="M 436.0468025765677 293.348L 436.0468025765677 293.348L 487.29857228239564 293.348L 487.29857228239564 293.348L 436.0468025765677 293.348" pathFrom="M 436.0468025765677 293.348L 436.0468025765677 293.348L 487.29857228239564 293.348L 487.29857228239564 293.348L 436.0468025765677 293.348" cy="293.348" cx="487.29857228239564" j="6" val="0" barWidth="51.25176970582792"></path>
                                                <path id="apexcharts-bar-area-0" d="M 509.2636164420361 293.348L 509.2636164420361 293.348L 560.515386147864 293.348L 560.515386147864 293.348L 509.2636164420361 293.348" fill="rgba(0,143,251,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2c70ws0j)" pathTo="M 509.2636164420361 293.348L 509.2636164420361 293.348L 560.515386147864 293.348L 560.515386147864 293.348L 509.2636164420361 293.348" pathFrom="M 509.2636164420361 293.348L 509.2636164420361 293.348L 560.515386147864 293.348L 560.515386147864 293.348L 509.2636164420361 293.348" cy="293.348" cx="560.515386147864" j="7" val="0" barWidth="51.25176970582792"></path>
                                                <path id="apexcharts-bar-area-0" d="M 582.4804303075045 293.348L 582.4804303075045 293.348L 633.7322000133324 293.348L 633.7322000133324 293.348L 582.4804303075045 293.348" fill="rgba(0,143,251,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2c70ws0j)" pathTo="M 582.4804303075045 293.348L 582.4804303075045 293.348L 633.7322000133324 293.348L 633.7322000133324 293.348L 582.4804303075045 293.348" pathFrom="M 582.4804303075045 293.348L 582.4804303075045 293.348L 633.7322000133324 293.348L 633.7322000133324 293.348L 582.4804303075045 293.348" cy="293.348" cx="633.7322000133324" j="8" val="0" barWidth="51.25176970582792"></path>
                                                <path id="apexcharts-bar-area-0" d="M 655.697244172973 293.348L 655.697244172973 293.348L 706.9490138788009 293.348L 706.9490138788009 293.348L 655.697244172973 293.348" fill="rgba(0,143,251,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2c70ws0j)" pathTo="M 655.697244172973 293.348L 655.697244172973 293.348L 706.9490138788009 293.348L 706.9490138788009 293.348L 655.697244172973 293.348" pathFrom="M 655.697244172973 293.348L 655.697244172973 293.348L 706.9490138788009 293.348L 706.9490138788009 293.348L 655.697244172973 293.348" cy="293.348" cx="706.9490138788009" j="9" val="0" barWidth="51.25176970582792"></path>
                                                <path id="apexcharts-bar-area-0" d="M 728.9140580384415 293.348L 728.9140580384415 293.348L 780.1658277442693 293.348L 780.1658277442693 293.348L 728.9140580384415 293.348" fill="rgba(0,143,251,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2c70ws0j)" pathTo="M 728.9140580384415 293.348L 728.9140580384415 293.348L 780.1658277442693 293.348L 780.1658277442693 293.348L 728.9140580384415 293.348" pathFrom="M 728.9140580384415 293.348L 728.9140580384415 293.348L 780.1658277442693 293.348L 780.1658277442693 293.348L 728.9140580384415 293.348" cy="293.348" cx="780.1658277442693" j="10" val="0" barWidth="51.25176970582792"></path>
                                                <path id="apexcharts-bar-area-0" d="M 802.1308719039099 293.348L 802.1308719039099 293.348L 853.3826416097378 293.348L 853.3826416097378 293.348L 802.1308719039099 293.348" fill="rgba(0,143,251,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2c70ws0j)" pathTo="M 802.1308719039099 293.348L 802.1308719039099 293.348L 853.3826416097378 293.348L 853.3826416097378 293.348L 802.1308719039099 293.348" pathFrom="M 802.1308719039099 293.348L 802.1308719039099 293.348L 853.3826416097378 293.348L 853.3826416097378 293.348L 802.1308719039099 293.348" cy="293.348" cx="853.3826416097378" j="11" val="0" barWidth="51.25176970582792"></path>
                                                <g id="SvgjsG1261" class="apexcharts-datalabels"></g>
                                            </g>
                                        </g>
                                        <g id="SvgjsG1286" class="apexcharts-line-series apexcharts-plot-series">
                                            <g id="SvgjsG1314" class="apexcharts-series Open-Enrollment" data:longestSeries="true" rel="2" data:realIndex="2">
                                                <path id="apexcharts-line-1" d="M 0 293.348" fill="none" fill-opacity="1" stroke="rgba(254,176,25,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="1" stroke-dasharray="0" class="apexcharts-line" index="2" clip-path="url(#gridRectMask2c70ws0j)" pathTo="M 22.371804236670915 NaNL 95.58861810213936 NaNL 168.80543196760783 NaNL 242.02224583307628 NaNL 315.23905969854474 NaNL 388.4558735640132 NaNL 461.67268742948164 NaNL 534.88950129495 NaNL 608.1063151604185 NaNL 681.3231290258869 NaNL 754.5399428913554 NaNL 827.7567567568238 NaN" pathFrom="M -1 293.348L -1 293.348L 95.58861810213936 293.348L 168.80543196760783 293.348L 242.02224583307628 293.348L 315.23905969854474 293.348L 388.4558735640132 293.348L 461.67268742948164 293.348L 534.88950129495 293.348L 608.1063151604185 293.348L 681.3231290258869 293.348L 754.5399428913554 293.348L 827.7567567568238 293.348"></path>
                                                <g id="SvgjsG1315" class="apexcharts-series-markers-wrap">
                                                    <g id="SvgjsG1317" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask2c70ws0j)">
                                                        <circle id="SvgjsCircle1318" r="0" cx="22.371804236670915" cy="0" class="apexcharts-nullpoint" stroke="#ffffff" fill="#feb019" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="0" j="0" index="2" default-marker-size="5"></circle>
                                                        <circle id="SvgjsCircle1319" r="0" cx="95.58861810213936" cy="0" class="apexcharts-nullpoint" stroke="#ffffff" fill="#feb019" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="1" j="1" index="2" default-marker-size="5"></circle>
                                                    </g>
                                                    <g id="SvgjsG1320" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask2c70ws0j)">
                                                        <circle id="SvgjsCircle1321" r="0" cx="168.80543196760783" cy="0" class="apexcharts-nullpoint" stroke="#ffffff" fill="#feb019" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="2" j="2" index="2" default-marker-size="5"></circle>
                                                    </g>
                                                    <g id="SvgjsG1322" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask2c70ws0j)">
                                                        <circle id="SvgjsCircle1323" r="0" cx="242.02224583307628" cy="0" class="apexcharts-nullpoint" stroke="#ffffff" fill="#feb019" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="3" j="3" index="2" default-marker-size="5"></circle>
                                                    </g>
                                                    <g id="SvgjsG1324" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask2c70ws0j)">
                                                        <circle id="SvgjsCircle1325" r="0" cx="315.23905969854474" cy="0" class="apexcharts-nullpoint" stroke="#ffffff" fill="#feb019" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="4" j="4" index="2" default-marker-size="5"></circle>
                                                    </g>
                                                    <g id="SvgjsG1326" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask2c70ws0j)">
                                                        <circle id="SvgjsCircle1327" r="0" cx="388.4558735640132" cy="0" class="apexcharts-nullpoint" stroke="#ffffff" fill="#feb019" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="5" j="5" index="2" default-marker-size="5"></circle>
                                                    </g>
                                                    <g id="SvgjsG1328" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask2c70ws0j)">
                                                        <circle id="SvgjsCircle1329" r="0" cx="461.67268742948164" cy="0" class="apexcharts-nullpoint" stroke="#ffffff" fill="#feb019" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="6" j="6" index="2" default-marker-size="5"></circle>
                                                    </g>
                                                    <g id="SvgjsG1330" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask2c70ws0j)">
                                                        <circle id="SvgjsCircle1331" r="0" cx="534.88950129495" cy="0" class="apexcharts-nullpoint" stroke="#ffffff" fill="#feb019" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="7" j="7" index="2" default-marker-size="5"></circle>
                                                    </g>
                                                    <g id="SvgjsG1332" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask2c70ws0j)">
                                                        <circle id="SvgjsCircle1333" r="0" cx="608.1063151604185" cy="0" class="apexcharts-nullpoint" stroke="#ffffff" fill="#feb019" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="8" j="8" index="2" default-marker-size="5"></circle>
                                                    </g>
                                                    <g id="SvgjsG1334" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask2c70ws0j)">
                                                        <circle id="SvgjsCircle1335" r="0" cx="681.3231290258869" cy="0" class="apexcharts-nullpoint" stroke="#ffffff" fill="#feb019" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="9" j="9" index="2" default-marker-size="5"></circle>
                                                    </g>
                                                    <g id="SvgjsG1336" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask2c70ws0j)">
                                                        <circle id="SvgjsCircle1337" r="0" cx="754.5399428913554" cy="0" class="apexcharts-nullpoint" stroke="#ffffff" fill="#feb019" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="10" j="10" index="2" default-marker-size="5"></circle>
                                                    </g>
                                                    <g id="SvgjsG1338" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask2c70ws0j)">
                                                        <circle id="SvgjsCircle1339" r="0" cx="827.7567567568238" cy="0" class="apexcharts-nullpoint" stroke="#ffffff" fill="#feb019" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="11" j="11" index="2" default-marker-size="5"></circle>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1316" class="apexcharts-datalabels"></g>
                                            </g>
                                            <g id="SvgjsG1287" class="apexcharts-series Quote" data:longestSeries="true" rel="1" data:realIndex="1">
                                                <path id="apexcharts-line-0" d="M 22.371804236670915 293.348L 95.58861810213936 293.348L 168.80543196760783 0L 242.02224583307628 293.348L 315.23905969854474 293.348L 388.4558735640132 293.348L 461.67268742948164 293.348L 534.88950129495 293.348L 608.1063151604185 293.348L 681.3231290258869 293.348L 754.5399428913554 293.348L 827.7567567568238 293.348" fill="none" fill-opacity="1" stroke="rgba(0,227,150,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="4" stroke-dasharray="0" class="apexcharts-line" index="1" clip-path="url(#gridRectMask2c70ws0j)" pathTo="M 22.371804236670915 293.348L 95.58861810213936 293.348L 168.80543196760783 0L 242.02224583307628 293.348L 315.23905969854474 293.348L 388.4558735640132 293.348L 461.67268742948164 293.348L 534.88950129495 293.348L 608.1063151604185 293.348L 681.3231290258869 293.348L 754.5399428913554 293.348L 827.7567567568238 293.348" pathFrom="M -1 293.348L -1 293.348L 95.58861810213936 293.348L 168.80543196760783 293.348L 242.02224583307628 293.348L 315.23905969854474 293.348L 388.4558735640132 293.348L 461.67268742948164 293.348L 534.88950129495 293.348L 608.1063151604185 293.348L 681.3231290258869 293.348L 754.5399428913554 293.348L 827.7567567568238 293.348"></path>
                                                <g id="SvgjsG1288" class="apexcharts-series-markers-wrap">
                                                    <g id="SvgjsG1290" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask2c70ws0j)">
                                                        <circle id="SvgjsCircle1291" r="5" cx="22.371804236670915" cy="293.348" class="apexcharts-marker wo7x0ouxq" stroke="#ffffff" fill="#00e396" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="0" j="0" index="1" default-marker-size="5"></circle>
                                                        <circle id="SvgjsCircle1292" r="5" cx="95.58861810213936" cy="293.348" class="apexcharts-marker wxneq3njj" stroke="#ffffff" fill="#00e396" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="1" j="1" index="1" default-marker-size="5"></circle>
                                                    </g>
                                                    <g id="SvgjsG1293" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask2c70ws0j)">
                                                        <circle id="SvgjsCircle1294" r="5" cx="168.80543196760783" cy="0" class="apexcharts-marker wmsz9d7bd" stroke="#ffffff" fill="#00e396" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="2" j="2" index="1" default-marker-size="5"></circle>
                                                    </g>
                                                    <g id="SvgjsG1295" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask2c70ws0j)">
                                                        <circle id="SvgjsCircle1296" r="5" cx="242.02224583307628" cy="293.348" class="apexcharts-marker wzd1j6f7u" stroke="#ffffff" fill="#00e396" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="3" j="3" index="1" default-marker-size="5"></circle>
                                                    </g>
                                                    <g id="SvgjsG1297" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask2c70ws0j)">
                                                        <circle id="SvgjsCircle1298" r="5" cx="315.23905969854474" cy="293.348" class="apexcharts-marker w1ovdayxhf" stroke="#ffffff" fill="#00e396" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="4" j="4" index="1" default-marker-size="5"></circle>
                                                    </g>
                                                    <g id="SvgjsG1299" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask2c70ws0j)">
                                                        <circle id="SvgjsCircle1300" r="5" cx="388.4558735640132" cy="293.348" class="apexcharts-marker wtzgwdtdg" stroke="#ffffff" fill="#00e396" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="5" j="5" index="1" default-marker-size="5"></circle>
                                                    </g>
                                                    <g id="SvgjsG1301" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask2c70ws0j)">
                                                        <circle id="SvgjsCircle1302" r="5" cx="461.67268742948164" cy="293.348" class="apexcharts-marker w390sfolv" stroke="#ffffff" fill="#00e396" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="6" j="6" index="1" default-marker-size="5"></circle>
                                                    </g>
                                                    <g id="SvgjsG1303" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask2c70ws0j)">
                                                        <circle id="SvgjsCircle1304" r="5" cx="534.88950129495" cy="293.348" class="apexcharts-marker wexxw5f4" stroke="#ffffff" fill="#00e396" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="7" j="7" index="1" default-marker-size="5"></circle>
                                                    </g>
                                                    <g id="SvgjsG1305" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask2c70ws0j)">
                                                        <circle id="SvgjsCircle1306" r="5" cx="608.1063151604185" cy="293.348" class="apexcharts-marker w5bhonsdbl" stroke="#ffffff" fill="#00e396" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="8" j="8" index="1" default-marker-size="5"></circle>
                                                    </g>
                                                    <g id="SvgjsG1307" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask2c70ws0j)">
                                                        <circle id="SvgjsCircle1308" r="5" cx="681.3231290258869" cy="293.348" class="apexcharts-marker wgisu5q3r" stroke="#ffffff" fill="#00e396" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="9" j="9" index="1" default-marker-size="5"></circle>
                                                    </g>
                                                    <g id="SvgjsG1309" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask2c70ws0j)">
                                                        <circle id="SvgjsCircle1310" r="5" cx="754.5399428913554" cy="293.348" class="apexcharts-marker wnlcev0j6" stroke="#ffffff" fill="#00e396" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="10" j="10" index="1" default-marker-size="5"></circle>
                                                    </g>
                                                    <g id="SvgjsG1311" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask2c70ws0j)">
                                                        <circle id="SvgjsCircle1312" r="5" cx="827.7567567568238" cy="293.348" class="apexcharts-marker w24ojmto4" stroke="#ffffff" fill="#00e396" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="11" j="11" index="1" default-marker-size="5"></circle>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1289" class="apexcharts-datalabels"></g>
                                            </g>
                                        </g>
                                        <line id="SvgjsLine1407" x1="0" y1="0" x2="850.75" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line>
                                        <line id="SvgjsLine1408" x1="0" y1="0" x2="850.75" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line>
                                        <g id="SvgjsG1409" class="apexcharts-yaxis-annotations"></g>
                                        <g id="SvgjsG1410" class="apexcharts-xaxis-annotations"></g>
                                        <g id="SvgjsG1411" class="apexcharts-point-annotations"></g>
                                        <rect id="SvgjsRect1412" width="0" height="0" x="0" y="0" rx="0" ry="0" fill="#fefefe" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" class="apexcharts-zoom-rect"></rect>
                                        <rect id="SvgjsRect1413" width="0" height="0" x="0" y="0" rx="0" ry="0" fill="#fefefe" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" class="apexcharts-selection-rect"></rect>
                                    </g>
                                    <g id="SvgjsG1368" class="apexcharts-yaxis" rel="0" transform="translate(31.83333333333333, 0)">
                                        <g id="SvgjsG1369" class="apexcharts-yaxis-texts-g"><text id="SvgjsText1370" font-family="Helvetica, Arial, sans-serif" x="20" y="41.1" text-anchor="end" dominate-baseline="central" font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label apexcharts-yaxis-label" style="font-family: Helvetica, Arial, sans-serif;">1</text><text id="SvgjsText1371" font-family="Helvetica, Arial, sans-serif" x="20" y="334.54800000000006" text-anchor="end" dominate-baseline="central" font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label apexcharts-yaxis-label" style="font-family: Helvetica, Arial, sans-serif;">0</text></g>
                                        <g id="SvgjsG1372" class="apexcharts-yaxis-title"><text id="SvgjsText1373" font-family="Helvetica, Arial, sans-serif" x="25.745361328125" y="186.674" text-anchor="end" dominate-baseline="central" font-size="11px" fill="#373d3f" class="apexcharts-yaxis-title-text apexcharts-yaxis-title" style="font-family: Helvetica, Arial, sans-serif;" transform="rotate(-90 -0.57177734375 182.6739959716797)">New Enroll</text></g>
                                    </g>
                                    <g id="SvgjsG1374" class="apexcharts-yaxis" rel="1" transform="translate(953.7083333333334, 0)">
                                        <g id="SvgjsG1375" class="apexcharts-yaxis-texts-g"><text id="SvgjsText1376" font-family="Helvetica, Arial, sans-serif" x="-20" y="41.6" text-anchor="start" dominate-baseline="central" font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label apexcharts-yaxis-label" style="font-family: Helvetica, Arial, sans-serif;">3</text><text id="SvgjsText1377" font-family="Helvetica, Arial, sans-serif" x="-20" y="90.59133333333332" text-anchor="start" dominate-baseline="central" font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label apexcharts-yaxis-label" style="font-family: Helvetica, Arial, sans-serif;">3</text><text id="SvgjsText1378" font-family="Helvetica, Arial, sans-serif" x="-20" y="139.58266666666665" text-anchor="start" dominate-baseline="central" font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label apexcharts-yaxis-label" style="font-family: Helvetica, Arial, sans-serif;">2</text><text id="SvgjsText1379" font-family="Helvetica, Arial, sans-serif" x="-20" y="188.57399999999998" text-anchor="start" dominate-baseline="central" font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label apexcharts-yaxis-label" style="font-family: Helvetica, Arial, sans-serif;">2</text><text id="SvgjsText1380" font-family="Helvetica, Arial, sans-serif" x="-20" y="237.5653333333333" text-anchor="start" dominate-baseline="central" font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label apexcharts-yaxis-label" style="font-family: Helvetica, Arial, sans-serif;">1</text><text id="SvgjsText1381" font-family="Helvetica, Arial, sans-serif" x="-20" y="286.5566666666667" text-anchor="start" dominate-baseline="central" font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label apexcharts-yaxis-label" style="font-family: Helvetica, Arial, sans-serif;">1</text><text id="SvgjsText1382" font-family="Helvetica, Arial, sans-serif" x="-20" y="335.548" text-anchor="start" dominate-baseline="central" font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label apexcharts-yaxis-label" style="font-family: Helvetica, Arial, sans-serif;">0</text></g>
                                        <g id="SvgjsG1383" class="apexcharts-yaxis-title"><text id="SvgjsText1384" font-family="Helvetica, Arial, sans-serif" x="16.109375" y="186.674" text-anchor="end" dominate-baseline="central" font-size="11px" fill="#373d3f" class="apexcharts-yaxis-title-text apexcharts-yaxis-title" style="font-family: Helvetica, Arial, sans-serif;" transform="rotate(90 1.125 182.6739959716797)">Quote</text></g>
                                    </g>
                                </svg>
                                <div class="apexcharts-tooltip light">
                                    <div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                    <div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 143, 251);"></span>
                                        <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                    <div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 227, 150);"></span>
                                        <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                    <div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(254, 176, 25);"></span>
                                        <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom">
                                    <div class="apexcharts-xaxistooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="resize-triggers">
                            <div class="expand-trigger">
                                <div style="width: 1010px; height: 432px;"></div>
                            </div>
                            <div class="contract-trigger"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-4" hidden="">
                <div class="mb-3 card">
                    <div class="card-header-tab card-header">
                        <div class="card-header-title font-size-lg text-capitalize font-weight-normal">Income</div>
                        <div class="btn-actions-pane-right text-capitalize actions-icon-btn">
                            <div class="btn-group">
                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-icon btn-icon-only btn btn-link">
                                    <i class="lnr-cog btn-icon-wrapper"></i>
                                </button>
                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-right rm-pointers dropdown-menu-shadow dropdown-menu-hover-link dropdown-menu dropdown-menu-right">
                                    <h6 tabindex="-1" class="dropdown-header">
                                        Header
                                    </h6>
                                    <button type="button" tabindex="0" class="dropdown-item"><i class="dropdown-icon lnr-inbox"> </i><span>Menus</span></button>
                                    <button type="button" tabindex="0" class="dropdown-item"><i class="dropdown-icon lnr-file-empty"> </i><span>Settings</span></button>
                                    <button type="button" tabindex="0" class="dropdown-item"><i class="dropdown-icon lnr-book"> </i><span>Actions</span></button>
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <div class="p-1 text-right">
                                        <button class="mr-2 btn-shadow btn-sm btn btn-link">View Details</button>
                                        <button class="mr-2 btn-shadow btn-sm btn btn-primary">Action</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-0 card-body" style="position: relative;">
                        <div id="chart-radial" style="min-height: 355px;">
                            <div id="apexcharts1fjgx76s" class="apexcharts-canvas apexcharts1fjgx76s" style="width: 0px; height: 350px;"><svg id="SvgjsSvg1423" width="0" height="350" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                    <g id="SvgjsG1425" class="apexcharts-inner apexcharts-graphical">
                                        <defs id="SvgjsDefs1424"></defs>
                                    </g>
                                </svg>
                                <div class="apexcharts-legend"></div>
                            </div>
                        </div>

                        <div class="widget-content pt-0 w-100">
                            <div class="widget-content-outer">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left pr-2 fsize-1">
                                        <div class="widget-numbers mt-0 fsize-3 text-warning">32%</div>
                                    </div>
                                    <div class="widget-content-right w-100">
                                        <div class="progress-bar-xs progress">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100" style="width: 32%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left fsize-1">
                                    <div class="text-muted opacity-6">Spendings Target</div>
                                </div>
                            </div>
                        </div>
                        <div class="resize-triggers">
                            <div class="expand-trigger">
                                <div style="width: 1px; height: 1px;"></div>
                            </div>
                            <div class="contract-trigger"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" hidden="">
            <div class="col-md-6 col-lg-3">
                <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
                    <div class="widget-chat-wrapper-outer">
                        <div class="widget-chart-content">
                            <h6 class="widget-subheading">Income</h6>
                            <div class="widget-chart-flex">
                                <div class="widget-numbers mb-0 w-100">
                                    <div class="widget-chart-flex">
                                        <div class="fsize-4">
                                            <small class="opacity-5">$</small>
                                            5,456
                                        </div>
                                        <div class="ml-auto">
                                            <div class="widget-title ml-auto font-size-lg font-weight-normal text-muted"><span class="text-success pl-2">+14%</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
                    <div class="widget-chat-wrapper-outer">
                        <div class="widget-chart-content">
                            <h6 class="widget-subheading">Expenses</h6>
                            <div class="widget-chart-flex">
                                <div class="widget-numbers mb-0 w-100">
                                    <div class="widget-chart-flex">
                                        <div class="fsize-4 text-danger">
                                            <small class="opacity-5 text-muted">$</small>
                                            4,764
                                        </div>
                                        <div class="ml-auto">
                                            <div class="widget-title ml-auto font-size-lg font-weight-normal text-muted">
                                                <span class="text-danger pl-2">
                                                    <span class="pr-1">
                                                        <i class="fa fa-angle-up"></i>
                                                    </span>
                                                    8%
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
                    <div class="widget-chat-wrapper-outer">
                        <div class="widget-chart-content">
                            <h6 class="widget-subheading">Spendings</h6>
                            <div class="widget-chart-flex">
                                <div class="widget-numbers mb-0 w-100">
                                    <div class="widget-chart-flex">
                                        <div class="fsize-4">
                                            <span class="text-success pr-2">
                                                <i class="fa fa-angle-down"></i>
                                            </span>
                                            <small class="opacity-5">$</small>
                                            1.5M
                                        </div>
                                        <div class="ml-auto">
                                            <div class="widget-title ml-auto font-size-lg font-weight-normal text-muted">
                                                <span class="text-success pl-2">
                                                    <span class="pr-1">
                                                        <i class="fa fa-angle-down"></i>
                                                    </span>
                                                    15%
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
                    <div class="widget-chat-wrapper-outer">
                        <div class="widget-chart-content">
                            <h6 class="widget-subheading">Totals</h6>
                            <div class="widget-chart-flex">
                                <div class="widget-numbers mb-0 w-100">
                                    <div class="widget-chart-flex">
                                        <div class="fsize-4">
                                            <small class="opacity-5">$</small>
                                            31,564
                                        </div>
                                        <div class="ml-auto">
                                            <div class="widget-title ml-auto font-size-lg font-weight-normal text-muted">
                                                <span class="text-warning pl-2">+76%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row" hidden="">
            <div class="col-md-6 col-lg-3">
                <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
                    <div class="widget-content p-0 w-100">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left pr-2 fsize-1">
                                    <div class="widget-numbers mt-0 fsize-3 text-danger">71%</div>
                                </div>
                                <div class="widget-content-right w-100">
                                    <div class="progress-bar-xs progress">
                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" style="width: 71%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content-left fsize-1">
                                <div class="text-muted opacity-6">Income Target</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
                    <div class="widget-content p-0 w-100">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left pr-2 fsize-1">
                                    <div class="widget-numbers mt-0 fsize-3 text-success">54%</div>
                                </div>
                                <div class="widget-content-right w-100">
                                    <div class="progress-bar-xs progress">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 54%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content-left fsize-1">
                                <div class="text-muted opacity-6">Expenses Target</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
                    <div class="widget-content p-0 w-100">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left pr-2 fsize-1">
                                    <div class="widget-numbers mt-0 fsize-3 text-warning">32%</div>
                                </div>
                                <div class="widget-content-right w-100">
                                    <div class="progress-bar-xs progress">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100" style="width: 32%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content-left fsize-1">
                                <div class="text-muted opacity-6">Spendings Target</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
                    <div class="widget-content p-0 w-100">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left pr-2 fsize-1">
                                    <div class="widget-numbers mt-0 fsize-3 text-info">89%</div>
                                </div>
                                <div class="widget-content-right w-100">
                                    <div class="progress-bar-xs progress">
                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content-left fsize-1">
                                <div class="text-muted opacity-6">Totals Target</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" hidden="">
            <div class="col-sm-12 col-lg-4">
                <div class="mb-3 card">
                    <div class="card-header-tab card-header">
                        <div class="card-header-title font-size-lg text-capitalize font-weight-normal">Total Sales</div>
                        <div class="btn-actions-pane-right text-capitalize actions-icon-btn">
                            <div class="btn-group dropdown">
                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-icon btn-icon-only btn btn-link">
                                    <i class="lnr-cog btn-icon-wrapper"></i>
                                </button>
                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-right rm-pointers dropdown-menu-shadow dropdown-menu-hover-link dropdown-menu">
                                    <h6 tabindex="-1" class="dropdown-header">Header</h6>
                                    <button type="button" tabindex="0" class="dropdown-item"><i class="dropdown-icon lnr-inbox"> </i><span>Menus</span></button>
                                    <button type="button" tabindex="0" class="dropdown-item"><i class="dropdown-icon lnr-file-empty"> </i><span>Settings</span></button>
                                    <button type="button" tabindex="0" class="dropdown-item"><i class="dropdown-icon lnr-book"> </i><span>Actions</span></button>
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <div class="p-1 text-right">
                                        <button class="mr-2 btn-shadow btn-sm btn btn-link">View Details</button>
                                        <button class="mr-2 btn-shadow btn-sm btn btn-primary">Action</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="position: relative;">
                        <div id="chart-col-1" style="min-height: 200px;">
                            <div id="apexcharts1wujf2ft" class="apexcharts-canvas apexcharts1wujf2ft" style="width: 0px; height: 200px;"><svg id="SvgjsSvg1414" width="0" height="200" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                    <g id="SvgjsG1416" class="apexcharts-inner apexcharts-graphical">
                                        <defs id="SvgjsDefs1415"></defs>
                                    </g>
                                </svg>
                                <div class="apexcharts-legend"></div>
                            </div>
                        </div>
                        <div class="resize-triggers">
                            <div class="expand-trigger">
                                <div style="width: 1px; height: 1px;"></div>
                            </div>
                            <div class="contract-trigger"></div>
                        </div>
                    </div>
                    <div class="p-0 d-block card-footer">
                        <div class="grid-menu grid-menu-2col">
                            <div class="no-gutters row">
                                <div class="p-2 col-sm-6">
                                    <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-dark">
                                        <i class="lnr-car text-primary opacity-7 btn-icon-wrapper mb-2"> </i>
                                        Admin
                                    </button>
                                </div>
                                <div class="p-2 col-sm-6">
                                    <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-dark">
                                        <i class="lnr-bullhorn text-danger opacity-7 btn-icon-wrapper mb-2"> </i>
                                        Blog
                                    </button>
                                </div>
                                <div class="p-2 col-sm-6">
                                    <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-dark">
                                        <i class="lnr-bug text-success opacity-7 btn-icon-wrapper mb-2"> </i>
                                        Register
                                    </button>
                                </div>
                                <div class="p-2 col-sm-6">
                                    <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-dark">
                                        <i class="lnr-heart text-warning opacity-7 btn-icon-wrapper mb-2"> </i>
                                        Directory
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="mb-3 card">
                    <div class="card-header-tab card-header">
                        <div class="card-header-title font-size-lg text-capitalize font-weight-normal">Daily Sales</div>
                        <div class="btn-actions-pane-right text-capitalize">
                            <button class="btn-wide btn-outline-2x btn btn-outline-focus btn-sm">View All</button>
                        </div>
                    </div>
                    <div class="card-body" style="position: relative;">
                        <div id="chart-col-2" style="min-height: 200px;">
                            <div id="apexcharts7o5j0ggxg" class="apexcharts-canvas apexcharts7o5j0ggxg" style="width: 0px; height: 200px;"><svg id="SvgjsSvg1417" width="0" height="200" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                    <g id="SvgjsG1419" class="apexcharts-inner apexcharts-graphical">
                                        <defs id="SvgjsDefs1418"></defs>
                                    </g>
                                </svg>
                                <div class="apexcharts-legend"></div>
                            </div>
                        </div>
                        <div class="resize-triggers">
                            <div class="expand-trigger">
                                <div style="width: 1px; height: 1px;"></div>
                            </div>
                            <div class="contract-trigger"></div>
                        </div>
                    </div>
                    <div class="p-0 d-block card-footer">
                        <div class="grid-menu grid-menu-2col">
                            <div class="no-gutters row">
                                <div class="p-2 col-sm-6">
                                    <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-dark">
                                        <i class="lnr-apartment text-dark opacity-7 btn-icon-wrapper mb-2"> </i>
                                        Overview
                                    </button>
                                </div>
                                <div class="p-2 col-sm-6">
                                    <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-dark">
                                        <i class="lnr-database text-dark opacity-7 btn-icon-wrapper mb-2"> </i>
                                        Support
                                    </button>
                                </div>
                                <div class="p-2 col-sm-6">
                                    <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-dark">
                                        <i class="lnr-printer text-dark opacity-7 btn-icon-wrapper mb-2"> </i>
                                        Activities
                                    </button>
                                </div>
                                <div class="p-2 col-sm-6">
                                    <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-dark">
                                        <i class="lnr-store text-dark opacity-7 btn-icon-wrapper mb-2"> </i>
                                        Marketing
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="mb-3 card">
                    <div class="card-header-tab card-header">
                        <div class="card-header-title font-size-lg text-capitalize font-weight-normal">Total Expenses</div>
                        <div class="btn-actions-pane-right text-capitalize">
                            <button class="btn-wide btn-outline-2x btn btn-outline-primary btn-sm">View All</button>
                        </div>
                    </div>
                    <div class="card-body" style="position: relative;">
                        <div id="chart-col-3" style="min-height: 200px;">
                            <div id="apexchartsrqkifgzj" class="apexcharts-canvas apexchartsrqkifgzj" style="width: 0px; height: 200px;"><svg id="SvgjsSvg1420" width="0" height="200" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                    <g id="SvgjsG1422" class="apexcharts-inner apexcharts-graphical">
                                        <defs id="SvgjsDefs1421"></defs>
                                    </g>
                                </svg>
                                <div class="apexcharts-legend"></div>
                            </div>
                        </div>
                        <div class="resize-triggers">
                            <div class="expand-trigger">
                                <div style="width: 1px; height: 1px;"></div>
                            </div>
                            <div class="contract-trigger"></div>
                        </div>
                    </div>
                    <div class="p-0 d-block card-footer">
                        <div class="grid-menu grid-menu-2col">
                            <div class="no-gutters row">
                                <div class="p-2 col-sm-6">
                                    <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-success">
                                        <i class="lnr-lighter text-success opacity-7 btn-icon-wrapper mb-2"> </i>
                                        Accounts
                                    </button>
                                </div>
                                <div class="p-2 col-sm-6">
                                    <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-warning">
                                        <i class="lnr-construction text-warning opacity-7 btn-icon-wrapper mb-2"> </i>
                                        Contacts
                                    </button>
                                </div>
                                <div class="p-2 col-sm-6">
                                    <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-info">
                                        <i class="lnr-bus text-info opacity-7 btn-icon-wrapper mb-2"> </i>
                                        Products
                                    </button>
                                </div>
                                <div class="p-2 col-sm-6">
                                    <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-alternate">
                                        <i class="lnr-gift text-alternate opacity-7 btn-icon-wrapper mb-2"> </i>
                                        Services
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-card mb-3 card">
            <div class="card-header">
                <div class="card-header-title font-size-lg text-capitalize font-weight-normal">Latest Enrollment</div>
                <div class="btn-actions-pane-right">
                    <a href="https://scriptlisting.com/selfgood-live/hackground/enroll/" class="btn-icon btn-wide btn-outline-2x btn btn-outline-focus btn-sm d-flex">
                        View All
                        <span class="pl-2 align-middle opacity-7">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>


                </div>
            </div>
            <div class="table-responsive">
                <table class="align-middle text-truncate mb-0 table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Effective Date</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center text-muted" style="width: 80px;">#8282910701</td>
                            <td class="text-center"><a href="javascript:void(0)">guna jay</a></td>
                            <td class="text-center"><a href="javascript:void(0)">gowthu4594@gmail.com</a></td>
                            <td class="text-center"><a href="javascript:void(0)">4554545454</a></td>


                            <td class="text-center">
                                <span class="pr-2 opacity-6">
                                    <i class="fa fa-business-time"></i>
                                </span>
                                01 Apr, 2024
                            </td>

                            <td class="text-center">
                                <div role="group" class="btn-group-sm btn-group">
                                    <a class="btn-shadow btn btn-primary" href="https://scriptlisting.com/selfgood-live/hackground/enroll/view_details/210">View</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center text-muted" style="width: 80px;">#2853767601</td>
                            <td class="text-center"><a href="javascript:void(0)">Anusha k</a></td>
                            <td class="text-center"><a href="javascript:void(0)">anusha.krishnan@qualibar.com</a></td>
                            <td class="text-center"><a href="javascript:void(0)">34242424242434</a></td>


                            <td class="text-center">
                                <span class="pr-2 opacity-6">
                                    <i class="fa fa-business-time"></i>
                                </span>
                                01 Apr, 2024
                            </td>

                            <td class="text-center">
                                <div role="group" class="btn-group-sm btn-group">
                                    <a class="btn-shadow btn btn-primary" href="https://scriptlisting.com/selfgood-live/hackground/enroll/view_details/209">View</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center text-muted" style="width: 80px;">#5496339401</td>
                            <td class="text-center"><a href="javascript:void(0)">Katie Test</a></td>
                            <td class="text-center"><a href="javascript:void(0)">katie.feeney@selfgood.com</a></td>
                            <td class="text-center"><a href="javascript:void(0)">6097909875</a></td>


                            <td class="text-center">
                                <span class="pr-2 opacity-6">
                                    <i class="fa fa-business-time"></i>
                                </span>
                                01 Apr, 2024
                            </td>

                            <td class="text-center">
                                <div role="group" class="btn-group-sm btn-group">
                                    <a class="btn-shadow btn btn-primary" href="https://scriptlisting.com/selfgood-live/hackground/enroll/view_details/208">View</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center text-muted" style="width: 80px;">#9895933601</td>
                            <td class="text-center"><a href="javascript:void(0)">gowthami dm</a></td>
                            <td class="text-center"><a href="javascript:void(0)">gowthu4594@gmail.com</a></td>
                            <td class="text-center"><a href="javascript:void(0)">4554545454</a></td>


                            <td class="text-center">
                                <span class="pr-2 opacity-6">
                                    <i class="fa fa-business-time"></i>
                                </span>
                                01 Apr, 2024
                            </td>

                            <td class="text-center">
                                <div role="group" class="btn-group-sm btn-group">
                                    <a class="btn-shadow btn btn-primary" href="https://scriptlisting.com/selfgood-live/hackground/enroll/view_details/207">View</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center text-muted" style="width: 80px;">#2360623201</td>
                            <td class="text-center"><a href="javascript:void(0)">test good</a></td>
                            <td class="text-center"><a href="javascript:void(0)">gowthu4594@gmail.com</a></td>
                            <td class="text-center"><a href="javascript:void(0)">6545678765</a></td>


                            <td class="text-center">
                                <span class="pr-2 opacity-6">
                                    <i class="fa fa-business-time"></i>
                                </span>
                                01 Apr, 2024
                            </td>

                            <td class="text-center">
                                <div role="group" class="btn-group-sm btn-group">
                                    <a class="btn-shadow btn btn-primary" href="https://scriptlisting.com/selfgood-live/hackground/enroll/view_details/206">View</a>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="d-block p-4 text-center card-footer">
                <a href="https://scriptlisting.com/selfgood-live/hackground/enroll/" class="btn-pill btn-shadow btn-wide fsize-1 btn btn-dark btn-lg">
                    <span class="mr-2 opacity-7"><i class="fa fa-cog fa-spin"></i>
                    </span>
                    <span class="mr-1">View Complete Report</span>
                </a>
            </div>
        </div>
    </div>
    <script>
        var options777r = {
            chart: {
                height: 397,
                type: 'line',
                toolbar: {
                    show: false,
                }
            },
            series: [{
                name: 'New Enroll',
                type: 'column',
                data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
            }, {
                name: 'Quote',
                type: 'line',
                data: [0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0]
            }, {
                name: 'Open Enrollment',
                type: 'line',
                data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
            }],
            stroke: {
                width: [0, 4]
            },
            // labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            labels: ["2024-03-02", "2024-03-03", "2024-03-04", "2024-03-05", "2024-03-06", "2024-03-07", "2024-03-08", "2024-03-09", "2024-03-10", "2024-03-11", "2024-03-12", "2024-03-13"],
            xaxis: {
                type: 'datetime'
            },
            yaxis: [{
                title: {
                    text: 'New Enroll',
                },

            }, {
                opposite: true,
                title: {
                    text: 'Quote'
                }
            }]

        };
        $(document).ready(function() {
            var chart777r = new ApexCharts(
                document.querySelector("#chart-combined-data"),
                options777r
            );
            chart777r.render();
        })
    </script>


@endsection