@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-sm-8 mt-2">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Statistics</h3>

                        <div class="card-text">
                            <div id="barchart_values"></div>

                        </div>


                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-2">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Statistics</h3>

                        <div class="card-text">
                            <h6>Total count of blogs:    <b>{{$posts}}</b></h6>
                            <h6>Total count of comments: <b>{{$comments}}</b></h6>
                            <h6>Total count of users:    <b>{{$users}}</b></h6>
                        </div>


                    </div>
                </div>
            </div>

        </div>


    </div>

    <script type="text/javascript">
        google.charts.load("current", {packages: ["corechart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Element", "Density", {role: "style"}],
                ["Total count of blogs", {{$posts}}, " #76A7FA"],
                ["Total count of comments", {{$comments}}, "silver"],
                ["Total count of users", {{$users}}, "gold"],
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                },
                2]);

            var options = {
                title: "statistics",
                width: 600,
                height: 400,
                bar: {groupWidth: "95%"},
                legend: {position: "none"},
            };
            var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
            chart.draw(view, options);
        }
    </script>
@endsection
