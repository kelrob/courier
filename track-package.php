<?php
    require_once 'classes/Database.php';
    require_once 'classes/Util.php';

    $db = new Database();
    $conn = $db->getConnection();

    $util = new Util($conn);

    # Check value exist
    $key = $util->sanitize($_GET['key']);

    if ($util->checkValueExist('packages', 'tracking_key', $key)) {
        $keyExist = true;
    } else {
        $keyExist = false;
    }
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <?php include_once 'includes/head.php'; ?>
</head>

<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->


<!-- header-start -->
<?php include_once 'includes/header.php'; ?>
<!-- header-end -->
<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Tracking Information</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->
<!-- service_area  -->
<div class="service_area">
    <div class="container">
        <?php
            if ($keyExist == false) {
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="text-center">Invalid Tracking Key</h1>
                    </div>
                </div>
                <?php
            } else {
                ?>

                <div class="row" style="border: 1px solid #e6e6e6;">
                    <div class="col-md-12" style="padding: 1%; background-color: #E6E6E6;">
                        <h5 style="font-weight: 500; ">SHIPPING DETAILS</h5>
                    </div>
                    <div class="col-md-12" style="padding: 1%; background-color: #F5F5F5;">
                        <div class="row">
                            <div class="col-md-5" align="left">
                                <table class="table" style="font-weight: 500;" align="left">
                                    <tr>
                                        <td><b>Package Id: </b></td>
                                        <td>PId<?php echo $util->getTableFieldViaColumn('packages', 'id', 'tracking_key', $key); ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Status:</b></td>
                                        <td><?php echo $util->getTableFieldViaColumn('packages', 'status', 'tracking_key', $key); ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Date Initiated:</b></td>
                                        <td><?php echo $util->getTableFieldViaColumn('packages', 'time_initiated', 'tracking_key', $key); ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Package Type:</b></td>
                                        <td><?php echo $util->getTableFieldViaColumn('packages', 'package_type', 'tracking_key', $key); ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Current Location:</b></td>
                                        <td><?php echo $util->getTableFieldViaColumn('packages', 'sender_address', 'tracking_key', $key); ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Package Description:</b></td>
                                        <td><?php echo $util->getTableFieldViaColumn('packages', 'package_description', 'tracking_key', $key); ?></td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-12" style="background-color: #E6E6E6; padding: 3%;">
                                        <h5 style="font-weight: 500;" class="text-center">FROM</h5>
                                    </div>
                                    <div class="col-md-12" style="background-color: #FFF; padding: 4%; color: #000;">
                                        <p style="font-weight: 500; color: #000;" class="text-center;">
                                            <b>Sender Name</b> <br/>
                                            <?php echo $util->getTableFieldViaColumn('packages', 'sender_fullname', 'tracking_key', $key); ?> </p>
                                        <hr style="margin: 0;"/>
                                        <p style="margin-top: 4%; color: #000;">
                                            <b>Sender Phone</b> <br/>
                                            <?php echo $util->getTableFieldViaColumn('packages', 'sender_phone', 'tracking_key', $key); ?> <br/><br/>

                                            <b>Sender Address</b> <br/>
                                            <?php echo $util->getTableFieldViaColumn('packages', 'sender_address', 'tracking_key', $key); ?> <br/><br/>

                                            <b>Sender State</b> <br/>
                                            <?php echo $util->getTableFieldViaColumn('packages', 'sender_state', 'tracking_key', $key); ?> <br/><br/>

                                            <b>Sender Zip Code</b> <br/>
                                            <?php echo $util->getTableFieldViaColumn('packages', 'sender_zip_code', 'tracking_key', $key); ?> <br/><br/>

                                            <b>Sender Country</b> <br/>
                                            <?php echo $util->getTableFieldViaColumn('packages', 'sender_country', 'tracking_key', $key); ?> <br/><br/>

                                            <b>Secret Question</b> <br/>
                                            <?php echo $util->getTableFieldViaColumn('packages', 'secret_question', 'tracking_key', $key); ?> <br/><br/>
                                        </p>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3" style="margin-left: 3%;">
                                <div class="row">
                                    <div class="col-md-12" style="background-color: #E6E6E6; padding: 3%;">
                                        <h5 style="font-weight: 500;" class="text-center">TO</h5>
                                    </div>
                                    <div class="col-md-12" style="background-color: #FFF; padding: 4%; color: #000;">
                                        <p style="font-weight: 500; color: #000;" class="">
                                            <b>Receiver Name</b> <br/>
                                            <?php echo $util->getTableFieldViaColumn('packages', 'receiver_fullname', 'tracking_key', $key); ?> </p>
                                        <hr style="margin: 0;"/>
                                        <p style="margin-top: 4%; color: #000;">
                                            <b>Receiver Phone</b> <br/>
                                            <?php echo $util->getTableFieldViaColumn('packages', 'receiver_phone', 'tracking_key', $key); ?> <br/><br/>

                                            <b>Receiver Address</b> <br/>
                                            <?php echo $util->getTableFieldViaColumn('packages', 'receiver_address', 'tracking_key', $key); ?> <br/><br/>

                                            <b>Receiver State</b> <br/>
                                            <?php echo $util->getTableFieldViaColumn('packages', 'receiver_state', 'tracking_key', $key); ?> <br/><br/>

                                            <b>Receiver Zip Code</b> <br/>
                                            <?php echo $util->getTableFieldViaColumn('packages', 'receiver_zip_code', 'tracking_key', $key); ?> <br/><br/>

                                            <b>Receiver Country</b> <br/>
                                            <?php echo $util->getTableFieldViaColumn('packages', 'receiver_country', 'tracking_key', $key); ?> <br/><br/>

                                            <b>Secret Answer</b> <br/>
                                            ******* <br/><br/>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <?php
            }
        ?>
        <p style="margin-top: 2%;" align="center">
            <a href="index" class="btn btn-outline-primary">Go Back</a>
        </p>
    </div>
</div>
<!--/ service_area  -->


<!-- contact_location  -->
<div class="contact_location">
    <?php include_once 'includes/footer.php'; ?>
</div>

<!--/ contact_location  -->


<!-- Modal -->
<div class="modal fade custom_search_pop" id="exampleModalCenter" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="serch_form">
                <input type="text" placeholder="search">
                <button type="submit">search</button>
            </div>
        </div>
    </div>
</div>
<!-- JS here -->
<script src="js/vendor/modernizr-3.5.0.min.js"></script>
<script src="js/vendor/jquery-1.12.4.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/ajax-form.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/scrollIt.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/nice-select.min.js"></script>
<script src="js/jquery.slicknav.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/plugins.js"></script>
<!-- <script src="js/gijgo.min.js"></script> -->
<script src="js/slick.min.js"></script>


<!--contact js-->
<script src="js/contact.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/mail-script.js"></script>


<script src="js/main.js"></script>


</body>

</html>