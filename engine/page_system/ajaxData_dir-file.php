<script src="../../plugins_b/bootstrap-select/bootstrap-select.min.js"></script>
<?php
require_once '../lib/connect.php';
// echo "<input type='hidden' name='name_root' value='".$_POST['file']."'>";
echo "<select class='form-control' id='basic5' name='name_file'>";
 $dir = "../../engine/".$_POST['file'];
  if (is_dir($dir)) {
      if ($dh = opendir($dir)) {
          while (($file = readdir($dh)) !== false) {
              if ($file=='.' || $file=='..') {
                  continue;
              }
              if (strpos($file, '.php') !== false || strpos($file, '.html') !== false) {
                  echo "<option value=".$_POST['file'].'/'.$file.">" . $file . "</option>";
              }
          }
          closedir($dh);
      }
  }
echo "</select>";
?>
<script type="text/javascript">
    $('#basic5').selectpicker({
        liveSearch: true,
        maxOptions: 1
      });
</script>