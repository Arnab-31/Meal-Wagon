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
        foreach($meals as $meal){
            echo $meal['title'];
        }
    }
?>