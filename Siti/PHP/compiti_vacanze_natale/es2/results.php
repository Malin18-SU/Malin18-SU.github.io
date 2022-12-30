<?php session_start(); ?>
<html>
<head>
    <title>Risultati</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body class="bg-warning bg-opacity-50">
<div class="container-fluid bg-gradient bg-light p-3 border-bottom border-1">
    <h2 class="">Risultati</h2>
</div>

<div class="bg-light text-dark m-auto container rounded p-2 w-50 mt-5 border-top border-5 border-warning">
    <canvas id="True" style="width:100%;max-width:800px"></canvas>
    <script>
        let xValuesTrue = <?php  echo json_encode(array_keys($_SESSION["questions"])); ?>;
        let yValuesTrue = <?php echo json_encode(array_column($_SESSION["questions"], "T"))?>;
        let barColors = ["red", "green","blue","orange","purple"];

        new Chart("True", {
            type: "bar",
            data: {
                labels: xValuesTrue,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValuesTrue
                }]
            },
            options: {
                legend: {display: false},
                title: {
                    display: true,
                    text: 'Clienti che hanno votato "Vero"'
                }
            }
        });
    </script>

    <canvas id="False" style="width:100%;max-width:800px"></canvas>
    <script>
        let xValuesFalse = <?php  echo json_encode(array_keys($_SESSION["questions"])); ?>;
        let yValuesFalse = <?php echo json_encode(array_column($_SESSION["questions"], "F"))?>;

        new Chart("False", {
            type: "bar",
            data: {
                labels: xValuesFalse,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValuesFalse
                }]
            },
            options: {
                legend: {display: false},
                title: {
                    display: true,
                    text: 'Clienti che hanno votato "Falso"'
                }
            }
        });
    </script>
</div>
</body>
</html>