<!-- <link href="../../../resources/custom/print_format.css" media="print" rel="stylesheet" /> -->
<style type="text/css">
  @page {
    size:letter;
    margin-top: 0.7in; 
    margin-left: 0.7in;
    margin-right: 0.7in;
    margin-bottom: 0.7in;
   
  }
  hr {
     border: none; 
     border-bottom: 1px solid black;
  }
  table {
    border-collapse: collapse;
  }

  table, th, td {
    border: 1px solid black;
  }

  #rlogo {
    margin-left: 290px;
    width: 100px;
  }

</style>


<div style="display: none">
  <div id="demo" class="panel-body" style="color: black">
     <!-- begin panel-body -->
     <!--For Details-->
     
     <!--For Details-->
     <div class="panel" style="font-family: arial;">
        <!-- <p style="font-size: 14px; text-align: center">
           Republic of the Philippines<br>
           Province of Batangas<br>
           Municipality of Tuy<br>
        </p> -->
        <p><img id="rlogo" src="../../../resources/images/nvyc.png"></p>
        <p style="font-size: 16px; font-weight:bold; text-align: center; margin-top: 20px; margin-bottom: 40px">NATIONAL YOUTH VOLUNTEERS COALITION</p>
        <table>
          <tr>
            <td style="width: 480px;border-color: white">
              Date Created: <?php echo date('F d, Y')?>
            </td>
            <td style="width: 380px; text-align: right;border-color: white">
              Report No: ITEMS<?php echo date('Ymd')?>
            </td>
          </tr>
        </table>
        <hr>
        <p style="font-size: 19px; font-weight:bold; text-align: center; margin-top: 20px">REPORT ON RECEIVED ITEMS FROM SPONSORS</p>
        <hr>

        <p style="font-size: 16px; text-align: justify">
          <b>Report Description:</b><br><br>
           &nbsp;&nbsp;&nbsp;
           This report contains the details of received items from the sponsor.
           <br>
           &nbsp;&nbsp;&nbsp;
           <!-- Details in this report may be filtered according to the specifications and preferences set by the report generator. -->
        </p>
         <p style="font-size: 16px; text-align: justify">
          <b>Table Description:</b><br><br>
           &nbsp;&nbsp;&nbsp;
           The table contains the following fields: item name, quantity, event, sponsor, and date received.
           <br>

        </p>
        <table id="data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                          <th>Item Name</th>
                                          <th>Quantity</th>
                                            <th>Event</th>
                                            <th>Sponsor</th>
                                            <th>Date Received</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                      <?php

                                        $query = "SELECT * FROM ems_r_logistics AS L INNER JOIN ems_r_sponsor AS S ON L.rl_sponsor_id = S.rs_sponsor_id INNER JOIN ems_r_event AS E ON E.re_event_id = L.rl_event_id WHERE rl_status = 1";

                                        $runquery = mysqli_query($connection, $query);

                                        while ($row = mysqli_fetch_assoc($runquery)){

                                          $item = $row['rl_item_name'];
                                          $quantity = $row['rl_quantity'];
                                          $event = $row['re_event_name'];
                                          $sponsor = $row['rs_sponsor_name'];
                                          $date_received = $row['rl_date_received'];
                                          $rlid = $row['rl_id'];

                                          echo "<tr>
                                              <td>".$item."</td>
                                              <td>".$quantity."</td>
                                              <td>".$event."</td>
                                              <td>".$sponsor."</td>
                                              <td>".$date_received."</td>
                                              </tr> ";
                                        }

                                      ?>
                                    </tbody>
                                 
                                </table>
        <hr>
        <br>
        <p style="font-size: 15px; margin-top:30px; margin-bottom: 20px">
          Report Generated By:<br><br><br>
          <i>Juan Dela Cruz</i> <br>
          <i>President</i>
        </p>
     </div>
     <!-- end panel-body -->
  </div>
</div>