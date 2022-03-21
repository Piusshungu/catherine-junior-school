<!DOCTYPE html>
<html lang="en">

<x-sidebar />

<style>
    svg > g[class^="raphael-group-"] > text{
    display: none !important;
}
</style>

<div class="w-full px-4 py-2 bg-gray-200 lg:w-full">
    <div class="container mx-auto mt-16">
        <div class="grid gap-4 lg:grid-cols-3">
            <div class="flex items-center px-4 py-6 bg-white rounded-md shadow-md">
                <div class="p-3 bg-indigo-600 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>

                <div class="mx-4">
                    <h4 class="text-2xl font-semibold text-gray-700">100</h4>
                    <div class="text-gray-500">All Users</div>
                </div>
            </div>

            <div class="flex items-center px-4 py-6 bg-white rounded-md shadow-md">
                <div class="p-3 bg-indigo-600 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                    </svg>
                </div>


                <div class="mx-4">

                    <h4 class="text-2xl font-semibold text-gray-700">30</h4>
                    <div class="text-gray-500">All Students</div>
                </div>
            </div>

            <div class="flex items-center px-4 py-6 bg-white rounded-md shadow-md">
                <div class="p-3 bg-indigo-600 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-5 0a3 3 0 110 6H9l3 3m-3-6h6m6 1a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="mx-4">
                    <h4 class="text-2xl font-semibold text-gray-700">1000</h4>
                    <div class="text-gray-500">All Teachers</div>
                </div>

            </div>
        </div>

        <div class="grid grid-cols-2 gap-">

        <div id="chart-container" class="ml-15 mt-10 col"></div>

        <div id="staff-container" class="ml-15 mt-10 col"></div>
        

        <script>
        FusionCharts.ready(function () {
            // chart instance
            var male = "<?php echo $male; ?>";

            var female = "<?php echo $female; ?>";

            var chart = new FusionCharts({
               
                type: "pie3d",
                renderAt: "chart-container",
                width: "500",
                height: "350",
                dataFormat: "json",
                dataSource: {
                    // chart configuration
                    chart: {
                        caption: "Male Vs Female",
                        subcaption: "Number of Male and Female Students"
                    },
                    // chart data
                    data: [
                       
                        { label: "Female", value: female, color: "#0A9AF8" },
                        { label: "Male", value: male }   
                    ]
                }
            }).render();
        });
    </script>

<script>
        FusionCharts.ready(function () {
            // chart instance
            var maleStaff = "<?php echo  $maleStaff; ?>";

            var femaleStaff = "<?php echo $femaleStaff; ?>";

            var chart = new FusionCharts({
               
                type: "pie3d",
                renderAt: "staff-container",
                width: "500",
                height: "350",
                dataFormat: "json",
                dataSource: {
                    // chart configuration
                    chart: {
                        caption: "Male Vs Female",
                        subcaption: "Number of Male and Female Staff"
                    },
                    // chart data
                    data: [
                       
                        { label: "Female", value: femaleStaff, color: "#0A9AF8" },
                        { label: "Male", value: maleStaff }   
                    ]
                }
            }).render();
        });
    </script>

    </body>

    </html>