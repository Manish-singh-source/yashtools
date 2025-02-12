@extends('admin.layouts.app')

@section('content-body')
    <div class="content-body">
        <div class="container-fluid">
            <!-- Page Head -->
            <div class="page-head">
                <div class="row">
                    <div class="col-sm-6 mb-sm-4 mb-3">
                        <h3 class="mb-0">Good Morning, {{ Auth::user()->fullname }}</h3>
                        <p class="mb-0">Here’s what’s happening with your store today</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card ic-chart-card">
                                <div class="card-header d-block border-0 pb-0">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-0">Total Customer</h6>
                                    </div>
                                    <span class="data-value">{{ $totalCustomers }}</span>
                                </div>
                                <div class="card-body p-0 pb-3">
                                    <div id="handleOrderChart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card ic-chart-card">
                                <div class="card-header d-block border-0">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-0">Total Enquiry</h6>
                                    </div>
                                    <span class="data-value">₹34.2k</span>
                                </div>
                                <div class="card-body p-0 pb-3">
                                    <div id="handleOrderChart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card ic-chart-card">
                                <div class="card-header d-block border-0 pb-0">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-0">Total Ordered</h6>
                                    </div>
                                    <span class="data-value">₹92k</span>
                                </div>
                                <div class="card-body p-0 pb-3">
                                    <div id="handleOrderChart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card overflow-hidden">
                            <div class="card-header border-0 pb-0 flex-wrap">
                                <div class="blance-media">
                                    <h5 class="mb-0">Sales Revenues</h5>
                                    <h4 class="mb-0">$25,217k <span
                                            class="badge badge-sm badge-success light">+2.7%</span></h4>
                                </div>
                                <ul class="nav nav-pills mix-chart-tab" id="pills-tab" role="tablist">
                                    <li class="nav-item spc" role="presentation">
                                        <select class="default-select form-control">
                                            <option>Types</option>
                                            <option>Total Customer</option>
                                            <option>Total Enquiry</option>
                                            <option>Total Ordered</option>
                                        </select>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <select class="default-select form-control">
                                            <option>State</option>
                                            <option value="AN">Andaman and Nicobar Islands</option>
                                            <option value="AP">Andhra Pradesh</option>
                                            <option value="AR">Arunachal Pradesh</option>
                                            <option value="AS">Assam</option>
                                            <option value="BR">Bihar</option>
                                            <option value="CT">Chhattisgarh</option>
                                            <option value="DL">Delhi</option>
                                            <option value="GA">Goa</option>
                                            <option value="GJ">Gujarat</option>
                                            <option value="HR">Haryana</option>
                                            <option value="HP">Himachal Pradesh</option>
                                            <option value="JK">Jammu and Kashmir</option>
                                            <option value="JH">Jharkhand</option>
                                            <option value="KA">Karnataka</option>
                                            <option value="KL">Kerala</option>
                                            <option value="MP">Madhya Pradesh</option>
                                            <option value="MH">Maharashtra</option>
                                            <option value="MN">Manipur</option>
                                            <option value="ML">Meghalaya</option>
                                            <option value="MZ">Mizoram</option>
                                            <option value="NL">Nagaland</option>
                                            <option value="OD">Odisha</option>
                                            <option value="PB">Punjab</option>
                                            <option value="RJ">Rajasthan</option>
                                            <option value="SK">Sikkim</option>
                                            <option value="TN">Tamil Nadu</option>
                                            <option value="TS">Telangana</option>
                                            <option value="UP">Uttar Pradesh</option>
                                            <option value="UK">Uttarakhand</option>
                                            <option value="WB">West Bengal</option>
                                        </select>
                                    </li>
                                    <li class="nav-item spc" role="presentation">
                                        <select class="default-select form-control">
                                            <option>Month</option>
                                            <option value="1">January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </li>
                                    <li class="nav-item spc" role="presentation">
                                        <select class="default-select form-control">
                                            <option>Year</option>
                                            <option value="2025">2025</option>
                                            <option value="2024">2024</option>
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2019">2019</option>
                                            <option value="2018">2018</option>
                                            <option value="2017">2017</option>
                                            <option value="2016">2016</option>
                                            <option value="2015">2015</option>
                                        </select>
                                    </li>

                                </ul>
                            </div>
                            <div class="card-body p-0">
                                <div id="chartBarRunning" class="pt-0"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
