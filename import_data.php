<?php   include("config.php");
        $sqlTruncate = mysqli_query($conn,"TRUNCATE TABLE schedule");

        $row = 1;$i=0;
        if (($handle = fopen("scheduleImport.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
           
            if($i!=0)
            {
                include("config.php");
                $sql = mysqli_query($conn,"INSERT INTO `schedule` (`s_id`, `s_day`, `s_level`, `s_year`, `s_group`, `s_class`, `s_time`, `s_lecType`, `s_subject`) 
                VALUES (NULL, '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$data[7]', '$data[8]');");
            }
        $i++;
        $row++;    
    } 
    if($sql) 
    fclose($handle);
}
?>
<h2 style="margin-left:43%;">Data Is Imported</h2>
<form method="post" action="index.php">
<button  style="background-color:lightgreen; margin-left:45%; border:1px solid green; padding:10px; ">Return Back Home</button>
</form>