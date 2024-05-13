<?php
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
	include_once("system/system.php");
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Docmed</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include_once('template/links.php'); ?>

</head>

<body id="top">
   
  <?php include_once('template/header_staff.php'); ?>

<!-- welcome_docmed_area_start -->
<div class="welcome_docmed_area">
    <div class="container">
            <div class="row">        
                <div class="col-lg-12">
                <h2 class="pageHeader">Doctors Information</h2>

                        <table id="appTable" class="display">
                        <thead>
                                <tr>
                                    <th>Doctor ID</th>
                                    <th>Doctor Name</th>
                                    <th>Specialisation</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $result = doctor::getAllDoctors();
                                    
                                while($row = $result->fetch_assoc()){

                            ?>
                                <tr>
                                    <td>
                                        <?php echo $row['dID']; ?>        
                                    </td>
                                    <td>
                                        <?php echo $row['DName']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['Specialisation']; ?>        
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
    <!-- welcome_docmed_area_end -->

    <?php include_once('template/footer_staff.php'); ?>

    <!-- link that opens popup -->

    <?php include_once('template/scripts.php'); ?>
    
    <style type="text/css">

        .pageHeader{
            font-size: 28px;
            margin-bottom: 30px;
        }
        </style>

    <script type="text/javascript">
        $(document).ready( function () {
            $('#appTable').DataTable();
        });
    </script>
</body>

</html>