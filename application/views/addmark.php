<!---------------
    addmark form
       @asha
       @5/03/2021
       @module trainer
    ---->


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
    <title>Add mark</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="../css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <form action="<?php echo base_url()?>main/addmarkaction" method="post">
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Enter The Marks</h2>
                </div>
                <div class="card-body">
                    <form method="POST">

                        <div class="form-row">
                            <div class="name">Assessments</div>
                            <div class="value">
                                <select class="input--style-6" name="assesment">
                                  <option value="1">1
                                    <option value="2">2
                                        <option value="3">3
                                            <option value="4">4
                                                <option value="5">5
                                                    <option value="SSC">ssc

                                </select>
                                
                            </div>
                        </div>
            
                        <div class="form-row">
                            <div class="name">subject1</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="sub1" placeholder="Enter the subject">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">mark1</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" name="sub1mark" placeholder="Enter the mark">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">subject2</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" name="sub2" placeholder=" Enter the subject">
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="name">mark2</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" name="sub2mark" placeholder=" Enter the mark">
                                </div>
                            </div>
                        </div>

                       <div class="form-row">
                            <div class="name">subject3</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" name="sub3" placeholder=" Enter the subject">
                                </div>
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="name">mark3</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" name="sub3mark" placeholder=" Enter the mark">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">subject4</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" name="sub4" placeholder=" Enter the subject">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">mark4</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" name="sub4mark" placeholder=" Enter the mark">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">subject5</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" name="sub5" placeholder=" Enter the subject">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">mark5</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" name="sub5mark" placeholder=" Enter the mark">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Lab1</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" name="lab1" placeholder=" Enter the Lab1 mark">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Lab2</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" name="lab2" placeholder=" Enter the Lab2 mark">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Total</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" name="total" placeholder=" Enter the Total mark">
                                </div>
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="name">percentage</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" name="percentage" placeholder=" Enter the Total percentage">
                                </div>
                            </div>
                        </div>
                        



                <div class="card-footer">
                    <button class="btn btn--radius-2 btn--blue-2" type="submit" name="submit">Send Marks</button>
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