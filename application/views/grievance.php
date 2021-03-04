<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Grievance</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="../css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <form action="<?php echo base_url()?>main/grievanceaction" method="post">
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Grievance</h2>
                </div>
                <div class="card-body">
                    <form method="POST">

                        <div class="form-row">
                            <div class="name">TO</div>
                            <div class="value">
                                <select class="input--style-6" name="griev_to">
                                  <option value="ADMIN">ADMIN
                                    <option value="TRAINER">TRAINER
                                </select>
                               
                            </div>
                        </div>
           
                        <div class="form-row">
                            <div class="name">subject</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="subject" placeholder="reason for leave">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Message</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" name="message" placeholder="Grievance description to the Trainer"></textarea>
                                </div>
                            </div>
                        </div>
           
                <div class="card-footer">
                    <button class="btn btn--radius-2 btn--blue-2" type="submit" name="submit">Send Application</button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>


    <!-- Main JS-->
    <script src="js/global.js"></script>


</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->


