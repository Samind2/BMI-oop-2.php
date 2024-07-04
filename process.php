<?php
include "./model/HumanBeing.php";
include "./model/BmiIndexer.php";
include "./model/HealthAnalyzer.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if height and weight parameters are set
    if (isset($_POST['height']) && isset($_POST['weight'])) {
        $height = $_POST['height'];
        $weight = $_POST['weight'];

        // Create a new instance of HumanBeing
        $hb = new HumanBeing();
        $hb->setHeight($height);
        $hb->setWeight($weight);
        $hb->calculateBMI();

        // Display the results
        echo "Height: $height cm<br>";
        echo "Weight: $weight kg<br>";
        echo "BMI: " . $hb->getBmi() . "<br>";
        echo "Result: " . $hb->analyzeBmi();
    } else {
        // Handle case where height or weight parameters are missing
        echo "Please provide both height and weight parameters.";
    }
} else {
    // Handle other HTTP request methods if needed
    echo "Unsupported request method.";
}
