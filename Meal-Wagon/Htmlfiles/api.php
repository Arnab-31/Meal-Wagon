<?php
// create & initialize a curl session
//$curl = curl_init();

// set our url with curl_setopt()
//curl_setopt($curl, CURLOPT_URL, "https://api.spoonacular.com/recipes/complexSearch?query=paneer&apiKey=9d29dd77f35b4d199ea2925104bb46d8");


// return the transfer as a string, also with setopt()
//curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

// curl_exec() executes the started curl session
// $output contains the output string
//$output = curl_exec($curl);
//echo $output;

// close curl resource to free up system resources
// (deletes the variable made by curl_init)
//curl_close($curl);
?> 

<?php
    if(!empty($_GET['search'])){
        $search = $_GET['search'];
        $meals_url = 'https://api.spoonacular.com/recipes/complexSearch?query=' . $search . '&apiKey=9d29dd77f35b4d199ea2925104bb46d8';
        $meals_json = file_get_contents($meals_url);
        $meals_array = json_decode($meals_json, true);

        $meals_calorie=array();
        $meals_summary=array();

        for($i=0;$i<9;$i++)
        {
            $meal_id = $meals_array['results'][$i]['id'];
            $info_url = 'https://api.spoonacular.com/recipes/' . $meal_id . '/information?apiKey=9d29dd77f35b4d199ea2925104bb46d8&includeNutrition=true';
            $info_json = file_get_contents($info_url);
            $info_array = json_decode($info_json, true);
            array_push($meals_summary,substr($info_array['summary'],0,50));
            array_push($meals_calorie,$info_array['nutrition']['nutrients'][0]['amount']);
        }
    }
?>

<form action="" method="GET">
    <input type="text" name="search">
    <button>Submit</button>
</form>

<?php
    if(!empty($meals_array))
    {
        $meals = $meals_array['results'];
        for($i=0;$i<3;$i++){
            echo $meals[$i]['title'] . '<br>';
            echo $meals_calorie[$i] . '<br>';
            echo $meals_summary[$i] . '...<br>';
        }
    }
?>