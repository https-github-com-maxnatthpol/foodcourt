 <?php
 require_once '../lib/connect.php';
 $db = new DB();

$strSQL = "SELECT * FROM system WHERE id_system = '".$_POST['ids']."'";
$objQuery = $db->Query($strSQL);
$Result = mysqli_fetch_array($objQuery) ;
$level = $Result['level'];
              if ($level == '1') {
                  $dsbl = 'disabled';
                  $sltd = 'selected';
              } else {
                  $dsbl = '';
                  $sltd = '';
              }
$output ='';
$output .= '
        <select id="basic8" name="sub_system" class="selectpicker show-tick form-control" data-live-search="true">
          <option value="0-0-'.$Result['id_system'].'" '.$dsbl.' '.$sltd.'>เมนูหลัก</option>';
              $Choice1 = "SELECT * FROM system WHERE level = '1'";
              $queryChoice1 = $db->Query($Choice1);
              while ($resultChoice1 = mysqli_fetch_array($queryChoice1)) {
                  if ($level == '1') {
                      if ($resultChoice1['id_system'] == $Result['id_system']) {
                          $disabled = "disabled";
                          $select = '';
                      } else {
                          $select = '';
                          $disabled = "";
                      }
                  } elseif ($level =='2') {
                      if ($resultChoice1['id_system'] == $Result['groups']) {
                          $select = 'selected';
                          $disabled = "disabled";
                      } else {
                          $select = '';
                          $disabled = "";
                      }
                  } else {
                      $select = '';
                      $disabled = '';
                  }
                  $output .= '<option value="1-'.$resultChoice1['id_system'].'-'.$Result['id_system'].'-'.$resultChoice1['type'].'" '.$select.' '.$disabled.' data-id="'.$resultChoice1['level'].'">'.$resultChoice1['name_system'].'</option>';

                  $Choice2 = "SELECT * FROM system WHERE level = '2' AND groups = '".$resultChoice1['id_system']."'";
                  $queryChoice2 = $db->Query($Choice2);
                  while ($resultChoice2 = mysqli_fetch_array($queryChoice2)) {
                      if ($level == '1') {
                          if ($resultChoice2['groups'] == $Result['id_system']) {
                              $disabled = "disabled";
                              $select = '';
                          } else {
                              $select = '';
                              $disabled = "";
                          }
                      } elseif ($level =='2') {
                          if ($resultChoice2['id_system'] == $Result['id_system']) {
                              $select = '';
                              $disabled = "disabled";
                          } else {
                              $select = '';
                              $disabled = "";
                          }
                      } elseif ($level == '3') {
                          if ($resultChoice2['id_system'] == $Result['groups']) {
                              $select = 'selected';
                              $disabled = "disabled";
                          } else {
                              $select = '';
                              $disabled = "";
                          }
                      } else {
                          $disabled = '';
                          $select = '';
                      }
                      $output .= '<option value="2-'.$resultChoice2['id_system'].'-'.$Result['id_system'].'-'.$resultChoice2['type'].'" '.$select.' '.$disabled.' data-id="'.$resultChoice2['level'].'">- '.$resultChoice2['name_system'].'</option>';

                      $Choice3 = "SELECT * FROM system WHERE level = '3' AND groups = '".$resultChoice2['id_system']."'";
                      $queryChoice3 = $db->Query($Choice3);
                      while ($resultChoice3 = mysqli_fetch_array($queryChoice3)) {
                          $output .= '<option disabled>&nbsp;&nbsp;- '.$resultChoice3['name_system'].'</option>';
                      }
                  }
              }
    $output .= '</select>';
    echo $output;
?>   
<script type="text/javascript">
 $(document).ready(function(){
      $('#basic8').selectpicker({
        liveSearch: true,
        maxOptions: 1
      });
    });
</script>