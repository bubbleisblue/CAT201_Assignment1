<!DOCTYPE html>
<html lang="en">
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
        <h1 class="and">&amp;<h1>
        <h1>TXT to PDF Converter</h1>
    </div>

    <div class = "file">
        <p class="upload">Upload your files</p>
        <div class ="images">
            <img src="images/Uploadfile.png" alt="Upload File" >
        </div>

        <div class ="choose">
			<form action="upload.php" method="POST" enctype="multipart/form-data">
			<input type="file" name="file[]"multiple>
			<input type='submit' value="Upload ">
			</form>  
        </div>
        
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="word">or</div>

        <p>Drop files here</p>
    </div>
    
    <div class="circle">
        <div >&#10003; Able to convert the file within seconds</div><br>
        <div >&#10003; No registration or installation needed</div><br>
        <div >&#10003; Drag and drop a file to begin</div><br>
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
</div >

</html>