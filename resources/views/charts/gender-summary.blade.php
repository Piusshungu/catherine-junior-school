<!doctype html>
<html>

<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<head>
    <script src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
</head>
<body>
    <div id="chart-container" class="ml-20 mt-20 bg-gray-800"></div>
    <script>
        FusionCharts.ready(function () {
            // chart instance
            var chart = new FusionCharts({
                type: "pie2d",
                renderAt: "chart-container", // container where chart will render
                width: "600",
                height: "400",
                dataFormat: "json",
                dataSource: {
                    // chart configuration
                    chart: {
                        caption: "Number of Male and Female Students",
                        subcaption: "In MMbbl = One Million barrels"
                    },
                    // chart data
                    data: [
                        { label: "Venezuela", value: "290000" },
                        { label: "Saudi", value: "260000" },
                        { label: "Canada", value: "180000" },
                        { label: "Iran", value: "140000" },
                        { label: "Russia", value: "115000" },
                        { label: "UAE", value: "100000" },
                        { label: "US", value: "30000" },
                        { label: "China", value: "30000" }
                    ]
                }
            }).render();
        });
    </script>
</body>
</html>