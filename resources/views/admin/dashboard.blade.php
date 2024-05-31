@extends('admin.homeadmin')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
        <h1>Admin Dashboard</h1>

        <div class="chart-container">
            <div class="chart-wrapper">
                <h2>Category Popularity</h2>
                <canvas id="categoryChart" width="400" height="200"></canvas>
            </div>

            <div class="chart-wrapper">
                <h2>Questions Per Day</h2>
                <canvas id="questionsPerDayChart" width="400" height="200"></canvas>
            </div>

        </div>

        <div class="chart-container">

            <div class="chart-wrapper">
                <h2>Likes Per Day</h2>
                <canvas id="likesBarChart" width="400" height="200"></canvas>
            </div>
            <div class="chart-wrapper">
                <h2>Users</h2>
                <canvas id="userChart" width="400" height="200"></canvas>
            </div>
        </div>

    </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Category Popularity Chart
        var ctxCategory = document.getElementById('categoryChart').getContext('2d');
        var categoryChart = new Chart(ctxCategory, {
            type: 'pie',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Number of Questions',
                    data: {!! json_encode($data) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        // Ensure proper formatting of PHP variables for JavaScript
        var questionLabels = {!! $questionLabels->toJson() !!};
        var questionData = {!! $questionData->toJson() !!};

        // Questions Per Day Chart
        var ctxQuestionsPerDay = document.getElementById('questionsPerDayChart').getContext('2d');
        var questionsPerDayChart = new Chart(ctxQuestionsPerDay, {
            type: 'line',
            data: {
                labels: questionLabels,
                datasets: [{
                    label: 'Number of Questions',
                    data: questionData,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                    ],
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                scales: {
                    x: [{
                        type: 'time',
                        time: {
                            unit: 'day',
                            displayFormats: {
                                day: 'MMM D'
                            }
                        }
                    }],
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                var label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += context.parsed.y;
                                return label;
                            }
                        }
                    }
                }
            }
        });
    </script>
    <script>

        var ctxLikesBarChart = document.getElementById('likesBarChart').getContext('2d');

        // Dummy data, replace with actual data from your backend
        var articleTitles =  {!! json_encode($articleTitles) !!};
        var likePercentages = {!! json_encode($likePercentages) !!};

        var likesBarChart = new Chart(ctxLikesBarChart, {
            type: 'bar',
            data: {
                labels: articleTitles,
                datasets: [{
                    label: 'Pourcentage of Likes %',
                    data: likePercentages,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: [{
                        type: 'linear',
                        ticks: {
                            min: 0, // Start at zero
                            max: 100, // End at 100
                            beginAtZero: true,
                        }
                    }]
                }
            }
        });

    </script>
    <script>
        var userLabels = {!! $userLabels->toJson() !!};
        var userData = {!! $userData->toJson() !!};

        var ctxUserChart = document.getElementById('userChart').getContext('2d');
        var userChart = new Chart(ctxUserChart, {
            type: 'line',
            data: {
                labels: userLabels,
                datasets: [{
                    label: 'Number of Users',
                    data: userData,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                scales: {
                    x: [{
                        type: 'time',
                        time: {
                            unit: 'day',
                            displayFormats: {
                                day: 'MMM D'
                            }
                        }
                    }],
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <style>
        .admin-dashboard {
            margin: auto;
            padding: 20px;
        }

        .chart-container {
            margin-top: 20px;
            display: flex;

            justify-content: space-between;
        }

        .chart-wrapper {
            height:40%;
            width:40%;
            margin-top: 20px;
            flex: 0 0 48%; /* Adjust the percentage to control the width of each chart */
        }

        /* Adjust the width of the charts for smaller screens */
        @media (max-width: 768px) {
            .chart-wrapper {
                flex: 0 0 100%; /* Full width for smaller screens */
            }
        }

    </style>
@endsection
