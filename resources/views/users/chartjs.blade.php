<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}"> <!-- bootstrap読み込み -->
    <link rel="stylesheet" href="{{ asset('css/chart.css') }}"> <!-- chart.cssと連携 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>週間グラフ画面</title>
</head>
<body>
    <div>
        <canvas id="myChart"></canvas>
    </div>

    <h1>週間グラフ画面</h1>

    <!-- グラフを描画 -->
    <script>
        import Chart from "chart.js/auto";
        const ctx = document.getElementById("myChart").getContext("2d");
        const myChart = new Chart(ctx, {
            type: "line",
            data: {
                labels: ["月", "火", "水", "木", "金", "土", "日"],
                datasets: [
                    {
                        label: "data 1",
                        data: [12, 19, 3, 5, 2, 3, -10],
                        borderColor: "#ffffff",
                        backgroundColor: "#212529",
                    }
                ],
            }
        });
    </script>
</body>
</html>