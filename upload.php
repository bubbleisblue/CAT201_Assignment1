<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Converter: PDF to TXT and TXT to PDF</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="topbar">
        <img src="images/TXT&PDF.png" alt="TXT&PDF" >
        <h1>Converter</h1>
        <div class="bar"><span>Easy</span>ToUse</div>
    </div>

    <div class="container">
        <h1>PDF to TXT Converter <h1>
        <h1 class="and">&<h1>
        <h1>TXT to PDF Converter</h1>
    </div>

    <div class = "file">
    <p class="upload">Upload your files</p>
    <div class ="images">
        <img src="images/Uploadfile.png" alt="Upload File" >
    </div>

    <div class ="choose">
<?php

$count_files = count($_FILES["file"]["name"]);
//echo $count_files;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $uploadDirectory = "./uploads";

    // Process each uploaded file
    foreach ($_FILES["file"]["name"] as $key => $fileName) {
        $tempFilePath = $_FILES["file"]["tmp_name"][$key];
        $targetFilePath = $uploadDirectory . "/" . $fileName;

        //$content = file_get_contents($targetFilePath);

        // Move the uploaded file to the target directory
        move_uploaded_file($tempFilePath, $targetFilePath);

        // Check if the file has a .pdf extension
        if (strtolower(pathinfo($fileName, PATHINFO_EXTENSION)) == "pdf") {
            // Escape the file name to handle spaces and special characters
            $escapedFileName = escapeshellarg($fileName);

            // Execute the Java command
            exec("java -jar Convertpdf.jar $escapedFileName", $output);
            unlink($targetFilePath);
        }

        else if (strtolower(pathinfo($fileName, PATHINFO_EXTENSION)) == "txt") {

            // Escape the file path to handle spaces and special characters
            $escapedFilePath = escapeshellarg($targetFilePath);
        
            // Execute the Java command
            exec("java -jar CAT201.jar $escapedFilePath", $output);
            unlink($targetFilePath);
        }
    }
}



$display_files = scandir("uploads");

for ($a =2;$a <count($display_files); $a++) {
	
    ?>
        <?php echo $display_files[$a];?>
        <p>
       <button class="button"><a download="<?php echo $display_files[$a] ?>" href="uploads/<?php echo $display_files[$a] ?>">Download</a></button>	
        </br>
        </P>
   <?php
}
?>  
    <button class="button"><a href="delete.php">Done</a></button> 
</div>
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="word">or</div>

        <p>Drop files here</p>
    </div>
    
    <div class="circle">
        <div >✓ Able to convert the file within seconds</div><br>
        <div >✓ No registration or installation needed</div><br>
        <div >✓ Drag and drop a file to begin</div><br>
        
    </div>
    <div class="area" >
        <ul class="circles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
        </ul>
</div>
</body>
</html>