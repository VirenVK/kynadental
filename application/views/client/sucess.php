<html>

<head>
    <title>Form Filled</title>
    <img src="<?php echo WEB_IMG_PATH.'image/'?>logo.png" alt="logo" />
    <style>
        body {
            background-image: url(uploads/image/bgimag3.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }

        div {

            padding-top: 5%;
            padding-left: 30%;
        }

        #box {
            background-color: lightblue;
            width: 300px;
            text-align: center;

            border: 15px solid #1aa3ff;
            padding: 50px;
            margin: 20px;
        }
        #yesbutton{
            margin-left:-45% ;
        }
        #nobutton{
            margin-left:39% ;
        }
    </style>
</head>

<body>
    <div>
    <?php
        if(strlen($this->session->flashdata('message')) > 0) {
        echo "<script>alert('Form filled ,thanks for your patience!');</script>";
        }
        ?>

        <div id="box">
            <h4>Fill another form?</h4>
            <br>

            <div id="buttons">
            
                    <button id="yesbutton">
                        <strong><a href="https://www.kynadental.com/norwalkdentalcare" class="button">Yes</a></strong>
                    </button>
            
                    <button id="nobutton">
                        <strong><a href="https://www.norwalkdentalcare.com/" class="button">No</a></strong>
                    </button>
                    </div>
                
        </div>
    </div>

</body>

</html>