var icChartlist = (function () {
    var screenWidth = $(window).width();

    var chartBarRunning = function () {
        let countCustomers = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        for (let i = 0; i < 12; i++) {
            let customerMonthCount = parseInt(
                $(`#graph-data-customers .customer-month-${i}`).text()
            );
            let customerCount = parseInt(
                $(`#graph-data-customers .customer-count-${i}`).text()
            );

            if (isNaN(customerMonthCount)) {
                customerMonthCount = i;
            }
            if (isNaN(customerCount)) {
                customerCount = 0;
            }
            countCustomers[customerMonthCount - 1] = customerCount;

        }

        let countEnquiries = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        for (let j = 0; j < 12; j++) {
            // Get the text content and parse it to an integer (or float if needed)

            let monthEnquiryCount = parseInt(
                $(`#graph-data-enquiry .enquiry-month-${j}`).text()
            );
            let EnquiryCount = parseInt(
                $(`#graph-data-enquiry .enquiry-count-${j}`).text()
            );
            // // If the text content is not a valid number, set the count as 0
            if (isNaN(monthEnquiryCount)) {
                monthEnquiryCount = j;
            }
            // If the text content is not a valid number, set the count as 0
            if (isNaN(EnquiryCount)) {
                EnquiryCount = 0;
            }

            // Push the count value for the current month into the array
            // yearEnquiry.push(yearEnquiryCount);
            // monthEnquiry.push(monthEnquiryCount);
            countEnquiries[monthEnquiryCount] = EnquiryCount;

        }

        var options = {
            series: [
                {
                    name: "Customers",
                    data: countCustomers,
                },
                {
                    name: "Enquiries",
                    data: countEnquiries,
                },
            ],
            chart: {
                type: "bar",
                height: 300,

                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    endingShape: "rounded",
                    columnWidth: "45%",
                    borderRadius: 3,
                },
            },
            colors: ["#0074FF", "#01BD9B"],
            dataLabels: {
                enabled: false,
            },

            legend: {
                show: true,
                fontSize: "13px",
                labels: {
                    colors: "#888888",
                },
                markers: {
                    width: 10,
                    height: 10,
                    strokeWidth: 0,
                    strokeColor: "#fff",
                    fillColors: ["var(--primary)", "#01BD9B"],
                    radius: 30,
                },
            },
            stroke: {
                show: true,
                width: 6,
                colors: ["transparent"],
            },
            grid: {
                show: true,
                borderColor: "#EEF0F7",
                strokeDashArray: 3,
                xaxis: {
                    lines: {
                        show: false,
                    },
                },
                yaxis: {
                    lines: {
                        show: true,
                    },
                },
            },
            xaxis: {
                categories: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                labels: {
                    style: {
                        colors: ["#1C2430"],
                        fontSize: "13px",
                        fontFamily: "poppins",
                        fontWeight: 100,
                        cssClass: "apexcharts-xaxis-label",
                    },
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                    borderType: "solid",
                    color: "#1C2430",
                    height: 6,
                    offsetX: 0,
                    offsetY: 0,
                },
                crosshairs: {
                    show: true,
                },
            },
            yaxis: {
                labels: {
                    offsetX: -16,
                    style: {
                        colors: ["#1C2430"],
                        fontSize: "15px",
                        fontFamily: "poppins",
                        fontWeight: 100,
                        cssClass: "apexcharts-xaxis-label",
                    },
                },
            },
            // Customers bar color -- primary
            // Enquiries bar color -- #01BD9B
            fill: {
                opacity: 1,
                colors: ["var(--primary)", "#01BD9B"],
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + "";
                    },
                },
            },
            responsive: [
                {
                    breakpoint: 575,
                    options: {
                        plotOptions: {
                            bar: {
                                columnWidth: "1%",
                                borderRadius: -1,
                            },
                        },
                        chart: {
                            height: 250,
                        },
                        series: [
                            {
                                name: "Customers",
                                data: countCustomers,
                            },
                            {
                                name: "Enquiries",
                                data: countEnquiries,
                            },
                        ],
                    },
                },
            ],
        };

        if (jQuery("#chartBarRunning").length === 0) {
            console.warn("Chart container #chartBarRunning not found.");
            return;
        }
        
        if (jQuery("#chartBarRunning").length > 0) {
            if (window.chartBarRunningInstance) {
                window.chartBarRunningInstance.destroy();
            }
            var chart = new ApexCharts(document.querySelector("#chartBarRunning"), options);
            chart.render();
            window.chartBarRunningInstance = chart;
            
            // var chart = new ApexCharts(
            //     document.querySelector("#chartBarRunning"),
            //     options
            // );
            // chart.render();

            jQuery("#dzIncomeSeries").on("click", function () {
                let isDisabled = jQuery(this).hasClass("disabled");
                jQuery(this).toggleClass("disabled");
                isDisabled
                    ? chart.showSeries("Customers")
                    : chart.hideSeries("Customers");
            });

            jQuery("#dzExpenseSeries").on("click", function () {
                let isDisabled = jQuery(this).hasClass("disabled");
                jQuery(this).toggleClass("disabled");
                isDisabled
                    ? chart.showSeries("Enquiries")
                    : chart.hideSeries("Enquiries");
            });
        }
    };

    /* Function ============ */
    return {
        init: function () {},

        load: function () {
            chartBarRunning();
        },

        resize: function () {},
    };
})();

// jQuery(window).on("load", function () {
//     setTimeout(function () {
//         icChartlist.load();
//     }, 1000);
// });
