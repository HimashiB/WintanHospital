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
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="selectDoc">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="selectDocLabel">Select Doctor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table>
                
                <tr>
                    <td class="text_right">Room No :</td>
                    <td class="roomID"><?php echo isset($_GET['roomID']) && $_GET['roomID']; ?></td>
                </tr>
                <tr>
                    <td class="text_right">day :</td>
                    <td class="day"></td>
                </tr>
                <tr>
                    <td class="text_right">time :</td>
                    <td class="time"></td>
                </tr>
                <tr>
                    <td  class="text_right">Doctors :</td>
                    <td>
                        <select id="slDoc">
                            <?php
                                $result = doctor::getAllDoctors();
                                while($row = $result->fetch_assoc()){
                            ?>
                                <option value="<?php echo $row['dID']; ?>"><?php echo $row['DName']; ?></option>
                            <?php
                                }
                            ?>
                            
                        </select>
                    </td>
                </tr>
                
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-sm saveInfo">Save info</button>
            <button type="button" class="btn btn-primary btn-sm saveInfoCh">Save info</button>
            <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  <?php include_once('template/header_staff.php'); ?>
                                
<!-- welcome_docmed_area_start -->
<div class="welcome_docmed_area">
   <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="pageHeader">Schedule Doctors</h2>
                        <div class="row room_select">
                            <div class="col-2">Select Room : </div>
                            <div class="col-10">
                                <select id="roomSelect">
                                    <?php
                                        $count = 1;
                                        while($count <= 8){
                                            if(isset($_GET['roomID']) && $_GET['roomID'] == $count){
                                    ?>
                                                <option value="<?php echo $count; ?>" selected>Room <?php echo $count; ?></option>
                                    <?php
                                            }
                                            else{
                                    ?>
                                                <option value="<?php echo $count; ?>">Room <?php echo $count; ?></option>
                                    <?php
                                            }
                                    ?>
                                        
                                    <?php
                                            $count++;
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <table id="shTable" class="display" width="100%">
                            <thead>
                                <tr>
                                    <th>Time</th>
                                    <?php
                                        $days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");

                                        $count = 0;
                                        while($count < 7){
                                    ?>
                                            <th><?php echo $days[$count]; ?></th>
                                    <?php
                                            $count++;
                                        }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $times = array("9 AM", "11 AM", "1 PM", "3 PM", "5 PM", "7 PM", "9 PM");

                                    $x = 0;
                                    while ($x < 6) {


                                ?>
                                        <tr>
                                            <td><?php echo $times[$x]; ?> to <?php echo $times[$x+1]; ?></td>
                                            <?php
                                                $count = 1;
                                                while($count <= 7){
                                                    $newTime = date("H:i:s", strtotime($times[$x]));
                                                    $room =  isset($_GET['roomID']); 
                                                    $day = $days[$count-1];


                                                    $str = "SELECT * FROM schedule INNER JOIN doctor ON schedule.dID = doctor.dID WHERE schedule.day = '". $day ."' AND schedule.RoomNo = '". $room ."' AND schedule.time = '". $newTime ."'";

                                                    $result = $conn->query($str);

                                                    if($result->num_rows > 0){
                                                        $row = [];
                                                        while($row = $result->fetch_assoc()){
                                                            break;
                                                        }
                                            ?>
                                                        <td height="40px">
                                                            
                                                            <button type="button" class="btn btn-success btn-sm" onClick='changeDoc("<?php echo $days[$count-1]; ?>", "<?php echo $times[$x]; ?>", "<?php echo $times[$x+1]; ?>", "<?php echo $row['dID']; ?>")'>
                                                                <?php echo $row['DName']; ?>
                                                            </button>  
                                                        </td>
                                            <?php
                                                    }
                                                    else{
                                            ?>
                                                    <td height="40px"><button type="button" class="btn btn-primary btn-sm" onClick='setDoc("<?php echo $days[$count-1]; ?>", "<?php echo $times[$x]; ?>", "<?php echo $times[$x+1]; ?>")'>Shedule a Doctor</button></td>
                                            <?php
                                                    }
                                                    $count++;
                                                }
                                            ?>
                                        </tr>
                                <?php
                                        $x++;
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

    <?php include_once('template/scripts_staff.php'); ?>
    
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

<script type="text/javascript">
        var submitData = { "day": null , "time": null , "dID": null, "RoomNo": ['roomID'] };

        $(document).ready( function () {
            $('#shTable').DataTable({searching: false, paging: false, info: false, ordering: false});
        });

        $("#roomSelect").change(function() {
            window.location.href = "staff_sdule.php?roomID="+$(this).val();
        });

        $("#slDoc").change(function(){
            submitData.dID = $(this).val();
        });

        $(".saveInfo").click(function(){
            $.ajax({
                type: "POST",
                url: "system/handler/shedule_doc.php",
                data: submitData,
                success: function(data)
                {
                    if(data == true){
                        window.location.reload();
                    }
                }
            });
        });

        $(".saveInfoCh").click(function(){
            $.ajax({
                type: "POST",
                url: "system/handler/change_doc.php",
                data: submitData,
                success: function(data)
                {
                    if(data == true){
                        window.location.reload();
                    }
                }
            });
        });
        
        function setDoc(day, time1, time2){
            $('.day').html(day);
            $('.time').html(time1 + " to " + time2);

            submitData.day = day;
            submitData.time = time1;
            submitData.dID = $("#slDoc").val();

            $('#selectDoc').modal('show');
            $('.saveInfoCh').hide();
            $('.saveInfo').show();
        }

        function changeDoc(day, time1, time2, dID, DName){
            $('.day').html(day);
            $('.time').html(time1 + " to " + time2);

            $("#slDoc").val(dID);
            submitData.day = day;
            submitData.time = time1;
            submitData.dID = dID;

            $('#selectDoc').modal('show');
            $('.saveInfoCh').show();
            $('.saveInfo').hide();
        }
    </script>
</body>

</html>