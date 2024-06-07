<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Recommendation</title>
    <style>
        body {
            background-color: #ADD8E6; /* Light blue background */
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }
        h1, h2, h3 {
            color: #00509E;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
        }
        input[type="number"],
        select {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #00509E;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #003f7f;
        }
        p {
            margin: 10px 0;
        }
        .charts {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        canvas {
            margin-top: 20px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Food Recommendation</h1>
        <form action="" method="post">
            <label for="age">How old are you (in years)?</label>
            <input type="number" id="age" name="age" required><br>
            
            <label for="sport_frequency">Frequency of sport:</label>
            <select id="sport_frequency" name="sport_frequency">
                <option value="rarely">Once a week or less (rarely)</option>
                <option value="frequently">2-3 times a week (frequently)</option>
                <option value="sportively">4-6 times a week (sportively)</option>
            </select><br>
            
            <label for="work_type">Type of work:</label>
            <select id="work_type" name="work_type" required>
                <option value="no_physical">No physical work</option>
                <option value="medium_physical">Medium physical work</option>
                <option value="physical">Physical work</option>
            </select><br>
            
            <label for="diet_plan">What's your diet plan?</label>
            <select id="diet_plan" name="diet_plan" required>
                <option value="regular">Regular</option>
                <option value="vegetarian">Vegetarian</option>
                <option value="vegan">Vegan</option>
            </select><br>
            
            <!-- <input type="submit" value="Submit"> -->
        </form>

        <div class="charts">
            <canvas id="sport-frequency-chart" width="400" height="200"></canvas>
            <canvas id="work-type-chart" width="400" height="200"></canvas>
            <canvas id="diet-plan-chart" width="400" height="200"></canvas>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get user input
            $age = $_POST['age'];
            $sport_frequency = isset($_POST['sport_frequency']) ? $_POST['sport_frequency'] : "";
            $work_type = $_POST['work_type'];
            $diet_plan = $_POST['diet_plan'];

            // Food recommendations based on age, sport frequency, work type, and diet plan
            echo "<h2>Food Recommendations</h2>";

            // Age-based recommendations
            if ($age < 18) {
                echo "<p>You're under 18. We recommend a balanced diet with plenty of fruits, vegetables, and whole grains.</p>";
                echo "<p>Food suggestions: whole grain bread, milk, cheese, lean meats, fruits, and vegetables.</p>";
            } elseif ($age >= 18 && $age <= 60) {
                echo "<p> We recommend a diet rich in protein, healthy fats, and complex carbohydrates.</p>";
            } else {
                echo "<p>You're over 60. We recommend a diet that supports bone health and maintains muscle mass.</p>";
                echo "<p>Food suggestions: dairy products, fish, leafy greens, lean meats, and fortified cereals.</p>";
            }

            // Work type-based recommendations
            if ($work_type == "no_physical") {
                echo "<p>You have no physical work. We recommend a diet rich in nutrients and vitamins to maintain overall health.</p>";
                echo "<p>Food suggestions:  leafy greens, whole grains, nuts, and seeds.</p>";
            } elseif ($work_type == "medium_physical") {
                echo "<p>You have medium physical work. You need a diet to support your energy needs and maintain muscle mass.</p>";
                // echo "<p>Food suggestions: lean meats, beans, nuts, fruits, vegetables, whole grains, and dairy products.</p>";
            } else {
                echo "<p>You have physical work. You require a diet to fuel your high activity levels and aid muscle recovery.</p>";
                // echo "<p>Food suggestions: lean meats, eggs, quinoa, sweet potatoes, fruits, vegetables, and dairy products.</p>";
            }

            // // Sport frequency-based recommendations
            // if (!empty($sport_frequency)) {
            //     if ($sport_frequency == "rarely") {
            //         echo "<p>You rarely engage in sports. Include foods rich in vitamins and minerals for overall health.</p>";
            //         echo "<p>Food suggestions: fruits, vegetables, whole grains, lean meats, and dairy products.</p>";
            //     } elseif ($sport_frequency == "frequently") {
            //         echo "<p>You engage in sports 2-3 times a week. Focus on foods that aid in muscle recovery and provide sustained energy.</p>";
            //         echo "<p>Food suggestions: lean meats, fish, eggs, whole grains, nuts, seeds, and dairy products.</p>";
            //     } else {
            //         echo "<p>You engage in sports 4-6 times a week. Opt for foods that provide sustained energy and aid in muscle repair.</p>";
            //         echo "<p>Food suggestions: lean meats, fish, eggs, quinoa, sweet potatoes, fruits, vegetables, nuts, and seeds.</p>";
            //     }
            // }

            // Diet plan-based recommendations
            if ($diet_plan == "regular") {
                echo "<p>Your diet plan is regular. Ensure a balanced intake of protein, carbohydrates, and healthy fats.</p>";
                echo "<p>Food suggestions: grilled chicken, fish, lean meats, eggs, dairy products, whole grains, fruits, and vegetables.</p>";
            } elseif ($diet_plan == "vegetarian") {
                echo "<p>Your diet plan is vegetarian. Include plant-based sources of protein such as beans, lentils, and tofu.</p>";
                echo "<p>Food suggestions: beans, lentils, tofu, tempeh, nuts, seeds, whole grains, fruits, and vegetables.</p>";
            } else {
                echo "<p>Your diet plan is vegan. Focus on whole plant foods and incorporate sources of vitamin B12, iron, and omega-3 fatty acids.</p>";
                echo "<p>Food suggestions: beans, lentils, tofu, tempeh, nuts, seeds, whole grains, fruits, vegetables, and fortified foods.</p>";
            }

            // Fruit recommendations
            echo "<h3>Fruit Recommendations</h3>";
            echo "<p>Some recommended fruits based on your profile:</p>";
            if ($age < 18) {
                echo "<p>Apples, bananas, oranges, berries, and grapes.</p>";
            } elseif ($age > 60) {
                echo "<p>Apples, berries, oranges, pears, and grapes.</p>";
            } else {
                echo "<p>Bananas, oranges, berries, grapes, and kiwi.</p>";
            }
        }
        ?>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var sportFrequencyCtx = document.getElementById('sport-frequency-chart').getContext('2d');
            var workTypeCtx = document.getElementById('work-type-chart').getContext('2d');
            var dietPlanCtx = document.getElementById('diet-plan-chart').getContext('2d');

            // Function to update the chart based on the selected frequency of sport
            function updateSportFrequencyChart(frequency) {
                // Define membership functions for the frequency of sport
                function rarelyMembership(x) {
                    if (x >= 0 && x <= 1) {
                        return 1;
                    } else if (x > 1 && x < 2) {
                        return (2 - x);
                    } else {
                        return 0;
                    }
                }

                function frequentlyMembership(x) {
                    if (x >= 1 && x <= 2) {
                        return (x - 1);
                    } else if (x > 2 && x < 4) {
                        return 1;
                    } else if (x >= 4 && x < 5) {
                        return (5 - x);
                    } else {
                        return 0;
                    }
                }

                function sportivelyMembership(x) {
                    if (x >= 4 && x <= 5) {
                        return (x - 4);
                    } else if (x > 5 && x <= 6) {
                        return 1;
                    } else if (x > 6 && x < 7) {
                        return (7 - x);
                    } else {
                        return 0;
                    }
                }

                // Generate data for the chart based on the selected frequency
                var data = {
                    labels: [],
                    datasets: [{
                        label: 'Rarely',
                        borderColor: frequency === 'rarely' ? 'red' : 'rgba(255, 99, 132, 0.2)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        data: []
                    }, {
                        label: 'Frequently',
                        borderColor: frequency === 'frequently' ? 'blue' : 'rgba(54, 162, 235, 0.2)',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        data: []
                    }, {
                        label: 'Sportively',
                        borderColor: frequency === 'sportively' ? 'green' : 'rgba(75, 192, 192, 0.2)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        data: []
                    }]
                };

                for (var x = 0; x <= 7; x += 0.1) {
                    data.labels.push(x.toFixed(1));
                    data.datasets[0].data.push(rarelyMembership(x).toFixed(2));
                    data.datasets[1].data.push(frequentlyMembership(x).toFixed(2));
                    data.datasets[2].data.push(sportivelyMembership(x).toFixed(2));
                }

                // Create or update the chart
                if (window.sportFrequencyChart) {
                    window.sportFrequencyChart.data = data;
                    window.sportFrequencyChart.update();
                } else {
                    window.sportFrequencyChart = new Chart(sportFrequencyCtx, {
                        type: 'line',
                        data: data,
                        options: {
                            scales: {
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Frequency of Sport'
                                    }
                                },
                                y: {
                                    title: {
                                        display: true,
                                        text: 'Membership Degree'
                                    },
                                    suggestedMin: 0,
                                    suggestedMax: 1
                                }
                            }
                        }
                    });
                }
            }

            // Function to update the chart based on the selected work type
            function updateWorkTypeChart(type) {
                // Define membership functions for the work type
                function noPhysicalMembership(x) {
                    if (x >= 0 && x <= 1) {
                        return 1;
                    } else if (x > 1 && x < 2) {
                        return (2 - x);
                    } else {
                        return 0;
                    }
                }

                function mediumPhysicalMembership(x) {
                    if (x >= 1 && x <= 2) {
                        return (x - 1);
                    } else if (x > 2 && x < 4) {
                        return 1;
                    } else if (x >= 4 && x < 5) {
                        return (5 - x);
                    } else {
                        return 0;
                    }
                }

                function physicalMembership(x) {
                    if (x >= 4 && x <= 5) {
                        return (x - 4);
                    } else if (x > 5 && x <= 6) {
                        return 1;
                    } else if (x > 6 && x < 7) {
                        return (7 - x);
                    } else {
                        return 0;
                    }
                }

                // Generate data for the chart based on the selected work type
                var data = {
                    labels: [],
                    datasets: [{
                        label: 'No Physical Work',
                        borderColor: type === 'no_physical' ? 'red' : 'rgba(255, 99, 132, 0.2)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        data: []
                    }, {
                        label: 'Medium Physical Work',
                        borderColor: type === 'medium_physical' ? 'blue' : 'rgba(54, 162, 235, 0.2)',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        data: []
                    }, {
                        label: 'Physical Work',
                        borderColor: type === 'physical' ? 'green' : 'rgba(75, 192, 192, 0.2)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        data: []
                    }]
                };

                for (var x = 0; x <= 7; x += 0.1) {
                    data.labels.push(x.toFixed(1));
                    data.datasets[0].data.push(noPhysicalMembership(x).toFixed(2));
                    data.datasets[1].data.push(mediumPhysicalMembership(x).toFixed(2));
                    data.datasets[2].data.push(physicalMembership(x).toFixed(2));
                }

                // Create or update the chart
                if (window.workTypeChart) {
                    window.workTypeChart.data = data;
                    window.workTypeChart.update();
                } else {
                    window.workTypeChart = new Chart(workTypeCtx, {
                        type: 'line',
                        data: data,
                        options: {
                            scales: {
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Work Type'
                                    }
                                },
                                y: {
                                    title: {
                                        display: true,
                                        text: 'Membership Degree'
                                    },
                                    suggestedMin: 0,
                                    suggestedMax: 1
                                }
                            }
                        }
                    });
                }
            }

            // Function to update the chart based on the selected diet plan
            function updateDietPlanChart(plan) {
                // Define membership functions for the diet plan
                function regularMembership(x) {
                    if (x >= 0 && x <= 1) {
                        return 1;
                    } else if (x > 1 && x < 2) {
                        return (2 - x);
                    } else {
                        return 0;
                    }
                }

                function vegetarianMembership(x) {
                    if (x >= 1 && x <= 2) {
                        return (x - 1);
                    } else if (x > 2 && x < 4) {
                        return 1;
                    } else if (x >= 4 && x < 5) {
                        return (5 - x);
                    } else {
                        return 0;
                    }
                }

                function veganMembership(x) {
                    if (x >= 4 && x <= 5) {
                        return (x - 4);
                    } else if (x > 5 && x <= 6) {
                        return 1;
                    } else if (x > 6 && x < 7) {
                        return (7 - x);
                    } else {
                        return 0;
                    }
                }

                // Generate data for the chart based on the selected diet plan
                var data = {
                    labels: [],
                    datasets: [{
                        label: 'Regular',
                        borderColor: plan === 'regular' ? 'red' : 'rgba(255, 99, 132, 0.2)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        data: []
                    }, {
                        label: 'Vegetarian',
                        borderColor: plan === 'vegetarian' ? 'blue' : 'rgba(54, 162, 235, 0.2)',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        data: []
                    }, {
                        label: 'Vegan',
                        borderColor: plan === 'vegan' ? 'green' : 'rgba(75, 192, 192, 0.2)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        data: []
                    }]
                };

                for (var x = 0; x <= 7; x += 0.1) {
                    data.labels.push(x.toFixed(1));
                    data.datasets[0].data.push(regularMembership(x).toFixed(2));
                    data.datasets[1].data.push(vegetarianMembership(x).toFixed(2));
                    data.datasets[2].data.push(veganMembership(x).toFixed(2));
                }

                // Create or update the chart
                if (window.dietPlanChart) {
                    window.dietPlanChart.data = data;
                    window.dietPlanChart.update();
                } else {
                    window.dietPlanChart = new Chart(dietPlanCtx, {
                        type: 'line',
                        data: data,
                        options: {
                            scales: {
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Diet Plan'
                                    }
                                },
                                y: {
                                    title: {
                                        display: true,
                                        text: 'Membership Degree'
                                    },
                                    suggestedMin: 0,
                                    suggestedMax: 1
                                }
                            }
                        }
                    });
                }
            }

            // Get form elements
            var sportFrequencySelect = document.getElementById('sport_frequency');
            var workTypeSelect = document.getElementById('work_type');
            // var dietPlanSelect = document.getElementById('diet_plan');

            // Add event listeners to update charts dynamically
            sportFrequencySelect.addEventListener('change', function() {
                updateSportFrequencyChart(this.value);
            });

            workTypeSelect.addEventListener('change', function() {
                updateWorkTypeChart(this.value);
            });

            // dietPlanSelect.addEventListener('change', function() {
            //     updateDietPlanChart(this.value);
            // });

            // Initial chart updates
            updateSportFrequencyChart(sportFrequencySelect.value);
            updateWorkTypeChart(workTypeSelect.value);
            // updateDietPlanChart(dietPlanSelect.value);
        });
    </script>
</body>
</html>
