<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="img/pdftojpg_logo.png" />
        <title>PDF to JPG</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script> 
        <link href="css/dropzone.css" type="text/css" rel="stylesheet" />
        <script src="js/dropzone.js"></script>
        <script src="https://use.typekit.net/jmv4yyp.js"></script>
        <script>try {
                Typekit.load({async: true});
            } catch (e) {
            }</script>
    </head>
    <body onunload='exit()'>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.3.3/underscore-min.js" type="text/javascript"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/backbone.js/0.9.2/backbone-min.js" type="text/javascript"></script>
        <div id='load' class="fadeMe" style="display: none;"><img src='img/ajax-loader.gif' height='150px' width='150px'></div>
        <div class="jumbotron">

            <div class="container">
                <br>
                <a href='#'><img src="img/pdftojpg_logo.png"></a>
                <h2 class='header'>Get the file type you need when you need it.</h2>
                <h3 class='header'><font color='#33d6e2'>FREE</font> Online file conversion in three simple steps.</h3>
            </div></div>
        <div id="home">
            <div class="container">
                <p id='tagline'>Convert files from anywhere without downloading any software. Follow the steps below to get started.</p>
                <div id="dZUpload" class="dropzone col-md-4" style="overflow-y:auto; " ><h1>Step 1:</h1><br>
                    <div class="dz-default dz-message " id='message' style="height: 5px">
                        <h4>Drag and drop the file you want to convert or select it manually.</h4><br>
                        <button class="btn btn-info">Choose File</button></div>
                </div>         

                <form id='convert' method="post" enctype="multipart/form-data">
                    <div class="col-md-4" id='main'><h1>Step 2:</h1><br><h4>Select the format you want to convert your file to.</h4>
                        <br>
                        <select class="selectpicker" name="type" style="width:inherit;" id='type' >
                            <option value="jpg">JPG</option>
                            <option value="gif">GIF</option>
                            <option value="png">PNG</option>
                        </select>
                    </div>
                    <div class="col-md-4" id='main'>
                        <h1>Step 3:</h1><br>
                        <h4>Convert your file and download it from the box below.</h4><br>
                        <input type="submit" value="Convert File" name="submit" class="btn btn-info" id='submit' disabled="disabled" >

                    </div>
                </form>

                <div class='col-md-12' id='second'>
                    <h2 id="secondary">Your files will appear here for download once you convert them</h2>
                    <h2 style="color:#252525;font-size:24px; display: none; text-align: left;" id="dwnld">
                        <img alt='Thumbnail' id='thumbnail' height='50px' width='60px'>
                        <span id="test">Your file is ready for download:</span>
                        <span id='fileName' style="font-size: 24px;font-family: .tk-proxima-nova medium;color:#464646; "></span>
                        <form action="php/download.php" method="post" style="float: right;">
                            <input type="text" name="extension" style="display: none;"  id='extension'>
                            <input id='dwnldBtn' type="submit" style="display: none;"class="btn btn-info" value="Download File" onclick="resetPage()">
                        </form>
                    </h2>
                </div>

            </div>  </div>

        <div id="about" style="display: none;">
            <div class="container" id='main'>
                <div class='col-md-12'><h1>About us</h1></div>
            </div>
        </div>

        <div id="terms" style="display: none;">
            <div class="container" id='main'>
                <div class='col-md-12'><h1>Terms and Conditions</h1></div>
            </div>
        </div>

        <div id="privacy" style="display: none;">
            <div class="container" id='main'>
                <div class='col-md-12'><h1>Privacy Policy</h1></div>
            </div>
        </div>
        <br><br><br>




        <footer class="footer">
            <div class="container" >
                <div class='col-md-12'>
                    <p style="text-align:left;">
                        <font color='grey'>
                        <a href='#about'>About Us</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='#terms'>Terms and Conditions</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='#privacy'>Privacy Policy</a>
                        </font>
                        <span style="float:right;">
                            <font color='grey'>©2016 pdftojpg.com - Made with</font>
                            <font color='#33d6e2'> ♥ by <a href="https://directnic.com/" target='new' class='direct'>Directnic.com</a></font>
                        </span>
                    </p>
                </div>
            </div>
        </footer>
        <script src="js/main.js"></script>

    </body>
</html>
