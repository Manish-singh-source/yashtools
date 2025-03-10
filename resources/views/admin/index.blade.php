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
            {{-- <div id="graph-data" style="display: none;">
                @foreach ($monthlyUserCounts as $key => $data)
                    <div class="year-{{$key}}">{{ $data['year'] }}</div>
                    <div class="month-{{$key}}">{{ $data['month'] }}</div>
                    <div class="count-{{$key}}">{{ $data['count'] }}</div>
                @endforeach
            </div> --}}
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card ic-chart-card">
                                <div class="card-header d-block border-0 pb-0">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-0">Total Customer</h6>
                                    </div>
                                    <span
                                        class="data-value">{{ $totalCustomers > 1000 ? $totalCustomers . ' K' : $totalCustomers }}</span>
                                </div>
                                {{-- <div class="card-body p-0 pb-3">
                                    <div id="handleOrderChart"></div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card ic-chart-card">
                                <div class="card-header d-block border-0">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-0">Total Enquiry</h6>
                                    </div>
                                    <span
                                        class="data-value">{{ $totalEnquiries > 1000 ? $totalEnquiries . ' K' : $totalEnquiries }}</span>
                                </div>
                                {{-- <div class="card-body p-0 pb-3">
                                    <div id="handleOrderChart"></div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card ic-chart-card">
                                <div class="card-header d-block border-0 pb-0">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-0">Total Ordered</h6>
                                    </div>
                                    <span
                                        class="data-value">{{ $totalOrders > 1000 ? $totalOrders . ' K' : $totalOrders }}</span>
                                </div>
                                {{-- <div class="card-body p-0 pb-3">
                                    <div id="handleOrderChart"></div>
                                </div> --}}
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
                                    {{-- <li class="nav-item spc" role="presentation">
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
                                    </li> --}}
                                    <li class="nav-item spc" role="presentation">
                                        <select class="default-select form-control" id="graph-year">
                                            <option value="0">Year</option>
                                            <option value="2025">2025</option>
                                            <option value="2024">2024</option>
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
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


@section('scripts')
    <script>
        $(document).ready(function() {
    // Set the CSRF token for secure AJAX requests
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // Get the year value from the input field or default to 2025 if not set
    let year = $('#graph-year').val() || 2025;

    console.log(year)
    // Check if the year is a valid and positive number
    if (year == 0) {
        // Check if the selected year is the current year
        year = new Date().getFullYear();
        console.log(year)
    }

    // Perform the AJAX request to fetch chart data
    $.ajax({
        url: "/chart-data",
        type: "GET",
        data: {
            year: year  // Sending the selected year to the server
        },
        success: function(response) {
            console.log(response.data); // Handle the data returned from the server

            // Example of processing the returned data:
            // You can now use the data to update a chart or populate a table
            if (response.data && Array.isArray(response.data)) {
                // Assuming the data is an array of monthly counts or similar
                let counts = response.data.map(item => item.count);
                console.log(counts); // Do something with the counts, e.g., draw a chart
            }
        },
        error: function(xhr, status, error) {
            console.error("Error fetching chart data:", error);
        }
    });
});


    </script>
@endsection