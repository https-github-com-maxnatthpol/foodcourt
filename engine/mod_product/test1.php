 
 <?php include('../template/header.php');?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
<?php require_once('../template/menu.php');?>
        <!-- ============================================================== -->


<?php
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';
$db = new DB();
?>
 <section  style="background-color: rgba(255,255,255,255); margin-top: 10px;"  >

<?php

$id_course = $_GET["id_course"];

 $str = "SELECT count(course_review.score) AS  countratting 
FROM course_review
WHERE   id_course in ('$id_course')
GROUP BY course_review.id_course ASC";
$objQuery = $db->Query($str);
$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
$sum = $objResult['countratting'];



 $strSQL = "SELECT count(course_review.score) AS  countratting ,score
FROM course_review
WHERE   id_course in ('$id_course')
GROUP BY course_review.score ASC";
$objQuery = $db->Query($strSQL);
 //var_dump($strSQL);
 $resultArray = array(1,2,3,4,5);
 $resultArray2 = array(0,0,0,0,0);

while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {

    $resultArray[$objResult['score']-1] = $objResult['score'];
    $resultArray2[$objResult['score']-1] = $objResult['countratting'];
    
}




?>


        <style>
         
            .fa {
              font-size: 15px;
                }

            .checked {
              color: orange;
              
            }
            .notcheckd{
                color: darkcyan;
            }
            /* Individual bars */
            .bar1 {width: <?php echo sumratting($resultArray2[0],$sum).'%' ?>; height: 18px; background-color: #2196F3;}
            .bar2 {width: <?php echo sumratting($resultArray2[1],$sum).'%' ?>; height: 18px; background-color: #2196F3;}
            .bar3 {width:<?php echo sumratting($resultArray2[2],$sum).'%' ?>; height: 18px; background-color: #2196F3;}
            .bar4 {width: <?php echo sumratting($resultArray2[3],$sum).'%' ?>; height: 18px; background-color: #2196F3;}
            .bar5 {width: <?php echo sumratting($resultArray2[4],$sum).'%' ?>; height: 18px; background-color: #2196F3;}
          
        </style>
        



        <div class="container">

            <div class="col-sm-12" >

                    <div class="col-md-4" >
                        <h4 style="text-align: center;">
                            ความคิดเห็นผู้เรียน
                            
                        </h4><br>

                        <h1 style="text-align: center;">
                        <?php 
                        $a = $resultArray2[0]*5;
                        $b = $resultArray2[1]*4;
                        $c = $resultArray2[2]*3;
                        $d = $resultArray2[3]*2;
                        $e = $resultArray2[4]*1;

                        $sumall =  ($resultArray2[0]+$resultArray2[1]+$resultArray2[2]+$resultArray2[3]+$resultArray2[4])*5;


                        $all = (($a+$b+$c+$d+$e)*5)/$sumall;
                         
                         echo $all;
                         
                         ?>
                        
                        </h1>
                        <h1 style="text-align: center;">
                        <?php 
                        $m = 0;
                        for($m = 0 ; $m < 5; $m++ ){


                         if(floor($all) > $m){
                            ?>
                        <span class="fa fa-star checked"></span>
                        <?php 
                         } else{

                            ?>
                        <span class="fa fa-star notcheckd"></span>
                        <?php 
                         }  



                        };


                        ?>
                        <!-- <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star notcheckd"></span> -->
                         </h1><br>
                    </div>
                    <div class="col-md-4" style="padding-top: 20px;" >
                        <div class="middle">
                          
                              <div class="bar1"></div>
                       
                          </div>
                          <div class="middle" style="padding-top: 10px;">
                          
                            <div class="bar2"></div>
                     
                        </div>
                        <div class="middle" style="padding-top: 10px;">
                          
                            <div class="bar3"></div>
                     
                        </div>

                        <div class="middle" style="padding-top: 10px;">
                          
                            <div class="bar4"></div>
                     
                        </div>

                        <div class="middle" style="padding-top: 10px;">
                          
                            <div class="bar5"></div>
                     
                        </div>
                    </div>



                    <div class="col-md-4" style="margin-top: 9px;" >

                    
                        <div class="col-sm-12"  style="margin-top: 10px;">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <?php echo sumratting($resultArray2[0],$sum).'%' ?>
                            </div>



                        <div class="col-sm-12"  style="margin-top: 10px;">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star notcheckd"></span>
                            <?php echo sumratting($resultArray2[1],$sum).'%' ?>
                            </div>




                            <div class="col-sm-12" style="margin-top: 10px;" >
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star notcheckd"></span>
                            <span class="fa fa-star notcheckd"></span>
                            <?php echo sumratting($resultArray2[2],$sum).'%' ?>
                        </div>



                            <div class="col-sm-12" style="margin-top: 10px;" >
                     
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star notcheckd"></span>
                            <span class="fa fa-star notcheckd"></span>
                            <span class="fa fa-star notcheckd"></span>
                            <?php echo sumratting($resultArray2[3],$sum).'%' ?>
                        </div>


                            <div class="col-sm-12" style="margin-top: 10px;" >
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star notcheckd"></span>
                            <span class="fa fa-star notcheckd"></span>
                            <span class="fa fa-star notcheckd"></span>
                            <span class="fa fa-star notcheckd"></span>
                            <?php echo sumratting($resultArray2[4],$sum).'%' ?>
                        </div>

                


            <div>

        </div>

    </section>
    <?php include('../template/footer.php');?>