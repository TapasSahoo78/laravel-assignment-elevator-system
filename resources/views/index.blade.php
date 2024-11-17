<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elevator System - Optimal Route</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h1 class="text-center mb-4">Elevator System - Optimal Route</h1>

                <!-- Table of Passengers Start -->
                <div class="mb-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Person</th>
                                <th>Start Floor</th>
                                <th>Destination Floor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Person A</td>
                                <td>5</td>
                                <td>15</td>
                            </tr>
                            <tr>
                                <td>Person B</td>
                                <td>12</td>
                                <td>8</td>
                            </tr>
                            <tr>
                                <td>Person C</td>
                                <td>6</td>
                                <td>20</td>
                            </tr>
                            <tr>
                                <td>Person D</td>
                                <td>3</td>
                                <td>17</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Table of Passengers End -->

                <!-- Calculation Start -->
                <div class="mb-4">
                    <center><strong>Sorting First</strong></center>
                    <ul class="list-group">
                        <li class="list-group-item">Person D (starts at floor 3 to 17)</li>
                        <li class="list-group-item">Person A (starts at floor 5 to 15)</li>
                        <li class="list-group-item">Person C (starts at floor 6 to 20)</li>
                        <li class="list-group-item">Person B (starts at floor 12 to 8)</li>
                    </ul>
                    <center><strong>Calculation Logic</strong></center>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Start Point - Floor 1</strong></li>

                        <li class="list-group-item">1 to floor 3: 1−3 = 2 floors</li>
                        <li class="list-group-item">3 to floor 17: 3−17 = 14 floors</li>
                        <li class="list-group-item"><strong>D Total - 2 + 14 = 16</strong></li>

                        <li class="list-group-item">17 to floor 5: 17−5 = 12 floors</li>
                        <li class="list-group-item">5 to floor 15: 5−15 = 10 floors</li>
                        <li class="list-group-item"><strong>A Total - 16 + 12 + 10 = 38 floors</strong></li>

                        <li class="list-group-item">15 to floor 6: 15−6 = 9 floors</li>
                        <li class="list-group-item">6 to floor 20: 6−20 = 14 floors</li>
                        <li class="list-group-item"><strong>C Total - 38 + 9 + 14 = 61 floors</strong></li>

                        <li class="list-group-item">20 to floor 12: 20−12 = 8 floors</li>
                        <li class="list-group-item">12 to floor 8: 12−8 = 4 floors</li>
                        <li class="list-group-item"><strong>B Total - 61 + 8 + 4 = 73 floors</strong></li>
                    </ul>
                </div>
                <!-- Calculation End -->

                <!-- Total Travel Time Start -->
                <div class="alert alert-info">
                    <h4>Total Travel Time: {{ $totalTravelTime }} floors</h4>
                </div>
                <!-- Total Travel Time End -->

            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
