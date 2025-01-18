@extends('layouts')
@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <title>Laravel 11</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            crossorigin="anonymous">

        {{-- For Print --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('css/print.css') }}">
        <script type="text/javascript">
            function PrintDoc() {
                var toPrint = document.getElementById('printarea');
                //window.open(URL, name, specs, replace)
                var popupWin = window.open('', '_blank', 'width=900,height=900,location=no,left=200px');
                popupWin.document.open();
                popupWin.document.write('<html><title>Preview</title><head></head><body onload="window.print()">')
                popupWin.document.write(toPrint.innerHTML);
                popupWin.document.write('</html>');
                popupWin.document.close();
            }
        </script>
    </head>

    <body>
        {{-- For Search --}}
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            {{-- <form action="{{ route('viewsale.search') }}" method="GET">
                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date" required>

                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date" required>

                <button class="btn btn-success btn-sm" type="submit">Search</button>
            </form> --}}

            <form method="post">
                <button class="btn btn-success btn-sm" type="button" value="Print" onclick="PrintDoc()">
                    Print
                </button>
            </form>
        </div>

        <div id="printarea">
            {{--  For Chart --}}
            <div class="container">
                <div class="card mt-5">
                    <h3 class="card-header p-3">Sale Result</h3>
                    <div class="card-body">
                        <canvas id="myChart" height="100px"></canvas>
                    </div>
                </div>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <script type="text/javascript">
                    var labels = {{ Js::from($labels) }};
                    var orders = {{ Js::from($data) }};

                    const data = {
                        labels: labels,
                        datasets: [{
                            label: 'Sale',
                            backgroundColor: [
                                "#75bb11",
                                "#5969aa",
                                "#cf0cf8",
                                "#1194bb",
                                "#30d986",
                                "#ffc750",
                                "#006400",
                                "#00FFFF",
                                "#000080",
                                "#f71523",
                                "#FFD700",
                                "#FFA500",
                                "#00FF00",
                                "#6A5ACD",
                                "#ff407b",
                                "pink", "Green", "violet", "yellow", "blue"
                            ],
                            borderColor: '#46d5f1',
                            hoverBackgroundColor: '#CCCCCC',
                            hoverBorderColor: '#666666',
                            data: orders,
                        }]
                    };
                    const config = {
                        type: 'bar',
                        //type: 'pie',
                        // type: 'line',
                        // type: 'doughnut',
                        // type: 'horizontalBar',
                        data: data,
                        options: {}
                    };

                    const myChart = new Chart(
                        document.getElementById('myChart'),
                        config
                    );
                </script>
            </div>

            {{-- For Table   --}}
            {{-- <div class="container">
                <div class="card mt-5">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <table class="table table-bordered table-striped table-responsive text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product</th>
                                    <th>TotalSale</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp

                                @forelse ($sumproducts1 as $sumproduct)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $sumproduct->name }}</td>
                                        <td>{{ $sumproduct->sum }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">There are no data.</td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>
            </div> --}}
        </div>

    </html>
@endsection
