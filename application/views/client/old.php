<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<head>
<!--     <link rel="stylesheet" href="trail_form.css">
 -->    <!-- <header id="call-cta">
        <div class="content-container">

            <a href="tel:+12038536626">Call Us At: (203) 853-6626</a>

        </div>
    </header> -->
    <img src="<?php echo WEB_IMG_PATH.'image/' ?>logo.png" alt="logo" class='logo' / style='margin-left: 10px;
    margin-top: 40px;width: 220px;'>
    <div class="top-left"><a href="tel:+12038536626">Call Us At: (203) 853-6626</a></div>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        .top-left {
          position: absolute;
          top: 8px;
          left: 16px;
        }
        #call-cta {
            -webkit-tap-highlight-color: transparent;
            font-size: 16px;
            display: inline-block;
            clear: both;
            width: 100%;
            box-sizing: border-box;
            background: #5CD4C0;
            font-family: 'Source Sans Pro', sans-serif;
            height: 4%;
        }

        .content-container {
            margin-left: 40%;
            margin-top: 0%;
        }

        body {

            background-repeat: no-repeat;
           /* background-size: cover;*/
            background-image: url("<?php echo WEB_IMG_PATH; ?>image/bgimage.jpg");
        }

        .form-style-51 {
/*            max-width: 30%;
*/            padding: 5px 5px;
            background: #f4f7f8;
            margin: 10px auto;
            padding: 20px;
            background: #f4f7f8;
            border-radius: 8px;
            font-family: Georgia, "Times New Roman", Times, serif;
            float: left;

        }

        .form-style-51 fieldset {
            border: none;
        }

        .form-style-51 legend {
            font-size: 1.4em;
            margin-bottom: 10px;
        }

        .form-style-51 label {
            display: block;
            margin-bottom: 8px;
        }

        .form-style-51 input[type="text"],
        .form-style-51 input[type="date"],
        .form-style-51 input[type="datetime"],
        .form-style-51 input[type="email"],
        .form-style-51 input[type="number"],
        .form-style-51 input[type="search"],
        .form-style-51 input[type="time"],
        .form-style-51 input[type="url"],
        .form-style-51 textarea,
        .form-style-51 select {
            font-family: Georgia, "Times New Roman", Times, serif;
            background: rgba(255, 255, 255, .1);
            border: none;
            border-radius: 4px;
            font-size: 15px;
            margin: 0;
            outline: 0;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            background-color: #e8eeef;
            color: #8a97a0;
            -webkit-box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03) inset;
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03) inset;
            margin-bottom: 30px;
        }

        .form-style-51 input[type="text"]:focus,
        .form-style-51 input[type="date"]:focus,
        .form-style-51 input[type="datetime"]:focus,
        .form-style-51 input[type="email"]:focus,
        .form-style-51 input[type="number"]:focus,
        .form-style-51 input[type="search"]:focus,
        .form-style-51 input[type="time"]:focus,
        .form-style-51 input[type="url"]:focus,
        .form-style-51 textarea:focus,
        .form-style-51 select:focus {
            background: #d2d9dd;
        }

        .form-style-51 select {
            -webkit-appearance: menulist-button;
            height: 35px;
        }

        .form-style-51 .number {
            background: #1abc9c;
            color: #fff;
            height: 30px;
            width: 30px;
            display: inline-block;
            font-size: 0.8em;
            margin-right: 4px;
            line-height: 30px;
            text-align: center;
            text-shadow: 0 1px 0 rgba(255, 255, 255, 0.2);
            border-radius: 15px 15px 15px 0px;
        }




        /* //// */


        .form-style-52 {
           /* max-width: 30%;*/
            padding: 10px 20px;
            background: #f4f7f8;
            margin: 10px auto;
            padding: 20px;
            background: #f4f7f8;
            border-radius: 8px;
            font-family: Georgia, "Times New Roman", Times, serif;
            float: right;


        }


        .form-style-52 fieldset {
            border: none;
        }

        .form-style-52 legend {
            font-size: 1.4em;
            margin-bottom: 10px;
        }

        .form-style-52 label {
            display: block;
            margin-bottom: 8px;
        }

        .form-style-52 input[type="text"],
        .form-style-52 input[type="date"],
        .form-style-52 input[type="datetime"],
        .form-style-52 input[type="email"],
        .form-style-52 input[type="number"],
        .form-style-52 input[type="search"],
        .form-style-52 input[type="time"],
        .form-style-52 input[type="url"],
        .form-style-52 textarea,
        .form-style-52 select {
            font-family: Georgia, "Times New Roman", Times, serif;
            background: rgba(255, 255, 255, .1);
            border: none;
            border-radius: 4px;
            font-size: 15px;
            margin: 0;
            outline: 0;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            background-color: #e8eeef;
            color: #8a97a0;
            -webkit-box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03) inset;
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03) inset;
            margin-bottom: 30px;
        }

        .form-style-52 input[type="text"]:focus,
        .form-style-52 input[type="date"]:focus,
        .form-style-52 input[type="datetime"]:focus,
        .form-style-52 input[type="email"]:focus,
        .form-style-52 input[type="number"]:focus,
        .form-style-52 input[type="search"]:focus,
        .form-style-52 input[type="time"]:focus,
        .form-style-52 input[type="url"]:focus,
        .form-style-52 textarea:focus,
        .form-style-52 select:focus {
            background: #d2d9dd;
        }

        .form-style-52 select {
            -webkit-appearance: menulist-button;
            height: 35px;
        }

        .form-style-52 .number {
            background: #1abc9c;
            color: #fff;
            height: 30px;
            width: 30px;
            display: inline-block;
            font-size: 0.8em;
            margin-right: 4px;
            line-height: 30px;
            text-align: center;
            text-shadow: 0 1px 0 rgba(255, 255, 255, 0.2);
            border-radius: 15px 15px 15px 0px;
        }

        input[type="submit"],
        input[type="button"] {
            position: relative;
            display: block;
            padding: 19px 39px 18px 39px;
            color: #FFF;
            margin: 0 auto;
            background: #1abc9c;
            font-size: 18px;
            text-align: center;
            font-style: normal;
            width: 40%;
            border: 1px solid #16a085;
            border-width: 1px 1px 3px;
            margin-bottom: 10px;
        }

        input[type="submit"]:hover,
        input[type="button"]:hover {
            background: #109177;
        }

        .form-style-53 {
           /* max-width: 28%;*/
            padding: 10px 20px;
            background: #f4f7f8;
            margin: 5px auto;
            padding: 17px;
            background: #f4f7f8;
            border-radius: 8px;
            font-family: Georgia, "Times New Roman", Times, serif;



        }


        .form-style-53 fieldset {
            border: none;
        }

        .form-style-53 legend {
            font-size: 1.4em;
            margin-bottom: 10px;
        }

        .form-style-53 label {
            display: inline- block;
            margin-bottom: 8px;
        }

        .form-style-53 input[type="text"],
        .form-style-53 input[type="date"],
        .form-style-53 input[type="datetime"],

        .form-style-53 input[type="number"],
        .form-style-53 input[type="search"],
        .form-style-53 input[type="time"],
        .form-style-53 input[type="url"],
        .form-style-53 textarea,
        .form-style-53 select {
            font-family: Georgia, "Times New Roman", Times, serif;
            background: rgba(255, 255, 255, .1);
            border: none;
            border-radius: 4px;
            font-size: 17px;
            margin: 0;
            outline: 0;
            padding: 2px;
            width: 100%;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            background-color: #e8eeef;
            color: #8a97a0;
            -webkit-box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03) inset;
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03) inset;
            margin-bottom: 30px;
        }

        .form-style-53 input[type="text"]:focus,
        .form-style-53 input[type="date"]:focus,
        .form-style-53 input[type="datetime"]:focus,

        .form-style-53 input[type="number"]:focus,
        .form-style-53 input[type="search"]:focus,
        .form-style-53 input[type="time"]:focus,
        .form-style-53 input[type="url"]:focus,
        .form-style-53 textarea:focus,
        .form-style-53 select:focus {
            background: #d2d9dd;
        }

        .form-style-53 select {
            -webkit-appearance: menulist-button;
            height: 35px;
        }

        .form-style-53 .number {
            background: #1abc9c;
            color: #fff;
            height: 30px;
            width: 30px;
            display: inline-block;
            font-size: 0.8em;
            margin-right: 4px;
            line-height: 30px;
            text-align: center;
            text-shadow: 0 1px 0 rgba(255, 255, 255, 0.2);
            border-radius: 15px 15px 15px 0px;
        }

        input[type="submit"],
        input[type="button"] {
            position: relative;
            display: block;
            padding: 19px 39px 18px 39px;
            color: #FFF;
            margin: 0 auto;
            background: #1abc9c;
            font-size: 18px;
            text-align: center;
            font-style: normal;
            width: 20%;
            border: 1px solid #16a085;
            border-width: 1px 1px 3px;
            margin-bottom: 10px;
            border-radius: 10px;
        }

        #photos_of_insurance {
            border: 1px solid rgb(78, 204, 145);
            display: inline-block;
            padding: 6px 1px;
            /* font-weight: 200; */
            cursor: pointer;
        }

        @media only screen and (min-width: 992px) and (min-width: 1200px) {
          /*  .form-style-51 {
                max-width: 30%!important;
            }
            .form-style-52 {
            max-width: 30%!important;
            }
             .form-style-53 {
            max-width: 28%!important;
        }*/
         #call-cta {
            height: 8%!important;
         }
         input[type="submit"]{
            width: 20%
         }

          .form-style-53 {
            margin-top: -70px!important;
          }
        
        }

         @media only screen and (max-width: 812px) and (min-width: 300px) {
             body{
            background-size: cover!important;
             }
             #call-cta {
            height: 7%!important;
         }
         input[type="submit"]{
            width: auto!important
         }
         .logo{
            margin-top: 73px!important;
         }
        }
        .col-md-4{
            padding: 24px!important;
        }
    </style>
</head>

<body>
  <?php
  $attributes = array('id' => 'myform','enctype'=>'multipart/form-data');
  echo form_open(WEB_URL.'home/getofficeForm',$attributes);
  ?>
        <div class="row" style="margin-top: -20px;">
            <div class="col-md-4 col-sm-12">
                <div class="form-style-51">
                    <fieldset>
                        <legend><span class="number">1</span> Patient's Info</legend>
                        <input type="text" name="p_firstname" id="p_firstname" placeholder="First Name *" required>
                        <input type="text" name="p_lastname" id="p_lastname" placeholder="Last Name *" required>
                        <h5>Date Of Birth</h5>
                        <input type="date" name="p_dob" id="p_dob" placeholder="dd-mm-yyyy" required>
                        <!-- <textarea name="field3" placeholder="About yourself"></textarea> -->
                    </fieldset>
                    <fieldset>
                        <!-- <legend><span class="number">2</span> Additional Info</legend> -->
                        <!-- <textarea name="field3" placeholder="About Your School"></textarea> -->
                    </fieldset>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="form-style-53">
                    <fieldset>
                        <legend><span class="number">2</span>Enter Insurance Details</legend>
                        <label>Insurance</label>
                        <select class="form-control" name="insurance" onchange="insuranceChange(this)">
                            <?php foreach ($data['insurance'] as $iRow) { ?>
                                <option value="<?php echo $iRow['insurance_id'];?>"><?php echo $iRow['insurancename'];?></option>
                            <?php } ?>
                            <option value="New">New</option>
                        </select>
                        <div id="new-insurance"></div>
                        <label>Group</label>
                        <select class="form-control" name="plansid" onchange="insurancePlanChange(this)">
                            <?php foreach ($data['insurance_plans'] as $pRow) { ?>
                                <option value="<?php echo $pRow['insurance_plans_id'];?>"><?php echo $pRow['groupid'];?></option>
                            <?php } ?>
                            <option value="New">New</option>
                        </select>
                        <div id="new-insurance-plan">
                            
                        </div>
                        <label>Product Id</label><input type="text" name="product_id" placeholder="Product Id">
                        <label>Employer</label>
                        <select class="form-control" name="employer" onchange="insuranceEmployerChange(this)">
                            <?php foreach ($data['employers'] as $pRow) { ?>
                                <option value="<?php echo $pRow['employerid'];?>"><?php echo $pRow['employersname'];?></option>
                            <?php } ?>
                            <option value="New">New</option>
                        </select>
                        <div id="new-employer"></div>
                        <input type="text" name="member_id" placeholder="Member ID *" required>
                        <h5>Insurance Card Front</h5>
                        <input type="file" name="Insurance_card_front" id="photos_of_insurance" required>
                        <h5>Insurance Card Back[Optional]</h5>
                        <input type="file" name="Insurance_card_back" id="photos_of_insurance">


                        <!-- <h5>Date Of Birth</h5> -->
                        <!-- <input type="date" name="field2" placeholder="Your Email *">   -->
                        <!-- <textarea name="field3" placeholder="About yourself"></textarea>   -->

                    </fieldset>
                    <fieldset>
                        <!-- <legend><span class="number">2</span> Additional Info</legend> -->
                        <!-- <textarea name="field3" placeholder="About Your School"></textarea> -->
                    </fieldset>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="form-style-52">
                    <fieldset>
                        <legend><span class="number">3</span> Subscriber's Info</legend>
                        <label>Same as Patient's &nbsp <input type="checkbox" name="" id="checkbox" onclick="copyPatientForm(this)"></label>
                        <input type="text" name="s_firstname" id="s_firstname" placeholder="First Name *" required>
                        <input type="text" name="s_lastname" id="s_lastname" placeholder="Last Name *" required>
                        <h5>Date Of Birth</h5>
                        <input type="date" name="s_dob" id="s_dob" placeholder="dd-mm-yyyy" required>
                        <!-- <textarea name="field3" placeholder="About yourself"></textarea>   -->
                    </fieldset>
                    <fieldset>
                        <!-- <legend><span class="number">2</span> Additional Info</legend> -->
                        <!-- <textarea name="field3" placeholder="About Your School"></textarea> -->
                    </fieldset>
                </div>
            </div>
        <input type="submit" value="Submit" name="submit" />
    </div>
<?php echo form_close(); ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    function insuranceChange(e)
    {
        var id = $(e).val();
        if (id=='New') {
            $('#new-insurance').html('<input type="text" name="insurance_new" placeholder="Insurance *" required>');
        }else{
            $('#new-insurance').html('');
        }
    }

      function insurancePlanChange(e)
    {
        var id = $(e).val();
        if (id=='New') {
            $('#new-insurance-plan').html('<label>Group New</label><input type="text" name="plansid_new" placeholder="Group ID  *" required>');
        }else{
            $('#new-insurance-plan').html('');
        }
    }

    function insuranceEmployerChange(e)
    {
         var id = $(e).val();
        if (id=='New') {
                     console.log(id);

            $('#new-employer').html('<input type="text" name="employer_new" placeholder="Employer *" required>');
        }else{
            $('#new-employer').html('');
        }
    }

    function copyPatientForm(e)
    {
        if($("#checkbox").prop('checked') == true){
            var first_name= $('#p_firstname').val();
            var last_name = $('#p_lastname').val();
            var dob = $('#p_dob').val();
            $('#s_firstname').val(first_name);
            $('#s_lastname').val(last_name);
            $('#s_dob').val(dob);
        }else{
             $('#s_firstname').val('');
            $('#s_lastname').val('');
            $('#s_dob').val('');
        }
    }
</script>


</html>