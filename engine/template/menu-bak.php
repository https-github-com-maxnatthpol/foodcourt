<?php
require_once '../lib/connect.php';
require_once '../lib/service.php';

$url = $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
$cut_url = explode('/', $url);

$num_fo = count($cut_url) - 2;
$num_fi = count($cut_url) - 1;

$folder = $cut_url[$num_fo];
$file = $cut_url[$num_fi];

//$local = $cut_url[$num_fo] . '/' . $cut_url[$num_fi];
$local = $cut_url[$num_fo];
$local .= isset($cut_url[$num_fi]) && $cut_url[$num_fi] != '' ? '/' . $cut_url[$num_fi] : '';
$result_local = getLinkSystem($local);

//query member for get id_data_role
$result_member = getCurrentUser();

$query_tbl = checkTable('user_permissions');
if ($num = mysqli_num_rows($query_tbl) == 1) {
    $result_em = getUserPermissions($result_member['id_user']);

    $module = array();
    if ($result_em) {
        while ($obResult = mysqli_fetch_array($result_em)) {
            array_push($module, $obResult['id_system']);
        }
    }
} else {
    $module = '';
}

?>
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->

        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!--<li><a class="waves-effect waves-dark" href="../system/front-manage.php" aria-expanded="false" style="padding-top: 12px; padding-bottom: 8px"><i class="mdi mdi-laptop-windows"></i><span class="hide-menu">SYSTEM </span></a>
                        </li>-->
                <?php
                if ($result_member['admin'] == '1') {
                    if ($system_config == '1') {
                        if ($cut_url[$num_fo] == 'system') {
                            $active = 'active';
                            $link = 'front-manage.php';
                        } else {
                            $active = '';
                            $link = '../page_system/front-manage.php';
                        }
                    } ?>
                <li class="<?php echo $active; ?>">
                    <a class="waves-effect waves-dark" aria-expanded="false"
                        style="padding-top: 12px; padding-bottom: 8px" href="<?php echo $link; ?>">
                        <i class="mdi mdi-laptop-windows"></i>
                        <span class="hide-menu">SYSTEM </span>
                    </a>
                </li>
                <?php
                }
                ?>
                <li>
                    <div class="waves-effect waves-dark hide-menu" id="realtime" style="padding-left: 15px;"></div>
                </li>
                <li class="nav-devider"></li>
                <li class="nav-small-cap">หน้าแรก</li>

                <?php
                if ($cut_url[$num_fo] == 'page_home') {
                    $active = 'active';
                    $link = 'index.php';
                } else {
                    $active = '';
                    $link = '../page_home/index.php';
                }
                ?>
                <li class="<?php echo $active; ?>">
                    <a class="waves-effect waves-dark" aria-expanded="false" href="<?php echo $link; ?>">
                        <i class="mdi mdi-gauge"></i> <span class="hide-menu">แดชบอร์ด</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
                <li class="nav-devider"></li>
                <li class="nav-small-cap">จัดการระบบ</li>
                <?php
                $objQuery = getSystemMenu('1', '1', null);
                if ($objQuery) {
                    while ($objResult = mysqli_fetch_array($objQuery)) {
                        //check task_view in system of level 1
                        if ($result_member['admin'] != '1') {
                            if (!in_array($objResult['id_system'], $module)) {
                                continue;
                            }
                        }
                        //------end check--------
                        $link_b = $objResult['link_system'];
                        $cut_link = explode('/', $link_b);
                        if ($objResult['link_system'] == '#') {
                            $link = '#';
                            $tree = 'treeview';
                            if ($folder == $cut_link[0]) {
                                $active = 'active';
                            } else {
                                $active = '';
                            }
                        } else {
                            if ($folder == $cut_link[0]) { //------------------------------mod_product == mod_product
                                $link = $cut_link[1];    //------------------------------front-add.php
                                if ($file == $cut_link[1]) {
                                    $active = 'active';
                                    $id_cookie = $objResult['id_system'];
                                } else {
                                    $active = '';
                                }
                            } else {
                                $link = '../' . $link_b;   //------------------------------mod_nmorder/front-add.php
                                $active = '';
                            }

                            $tree = '';
                        }
                        if ($objResult['icon'] == '') {
                            $icon = '<i class="mdi mdi-checkbox-blank-circle-outline"></i>';
                        } else {
                            $icon = $objResult['icon'];
                        } ?>
                <li class="check_system_level1
                       check_top_level1-<?php echo $objResult['id_system']; ?> 
                       <?php echo $tree . ' ' . $active; ?>">
                    <a href="<?php echo $link; ?>" data-link="<?php echo $link; ?>" aria-expanded="false"
                        data-id="<?php echo $objResult['id_system']; ?>" class="setcookie">
                        <?php echo $icon ?> <span class="hide-menu"><?php echo $objResult['name_system']; ?></span>
                        <?php
                                        $objQuery1 = getSystemMenu('1', '2', $objResult['id_system']);
                        $numQuery1 = mysqli_num_rows($objQuery1);
                        if ($numQuery1 <= 0) {
                            ?>
                    </a>
                </li>
                <?php
                                continue;
                        } else {
                            ?>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu" aria-expanded="false">
                    <?php
                        }
                        while ($objResult1 = mysqli_fetch_array($objQuery1)) {
                            //check task_view in system of level 2
                            if ($result_member['admin'] != '1') {
                                if (!in_array($objResult1['id_system'], $module)) {
                                    continue;
                                }
                            }
                            //------end check--------
                            $link_b1 = $objResult1['link_system'];
                            $cut_link1 = explode('/', $link_b1);
                            if ($objResult1['link_system'] == '#') {
                                $link1 = '#';
                                $tree1 = 'treeview';
                                if ($folder == $cut_link[0]) {
                                    $active1 = 'active';
                                } else {
                                    $active1 = '';
                                }
                            } else {
                                if ($folder == $cut_link1[0]) {
                                    $link1 = $cut_link1[1];
                                    if ($file == $cut_link1[1]) {
                                        $active1 = 'active';
                                        $id_cookie = $objResult1['id_system'];
                                    } else {
                                        $active1 = '';
                                    }
                                } else {
                                    $link1 = '../' . $link_b1;
                                    $active1 = '';
                                }

                                $tree1 = '';
                            }
                            if ($objResult1['icon'] == '') {
                                $icon1 = '<i class="mdi mdi-checkbox-blank-circle-outline"></i> ';
                            } else {
                                $icon1 = $objResult1['icon'];
                            } ?>
                    <li class="check_system_level2
                           check_top_level2-<?php echo $objResult1['id_system']; ?>                                               
                           <?php echo $tree1 . ' ' . $active1; ?>" data-top1="<?php echo $objResult['id_system']; ?>">
                        <a href="<?php echo $link1; ?>" data-link="<?php echo $link1; ?>" aria-expanded="false"
                            data-id="<?php echo $objResult1['id_system']; ?>" class="setcookie">
                            <span><?php echo $icon1; ?> <?php echo $objResult1['name_system']; ?></span>
                            <?php
                                                $objQuery2 = getSystemMenu('1', '3', $objResult1['id_system']);
                            $numQuery2 = mysqli_num_rows($objQuery2);
                            if ($numQuery2 <= 0) {
                                ?>
                        </a>
                    </li>
                    <?php
                                        continue;
                            } else {
                                ?>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu" aria-expanded="false">
                        <?php
                            }
                            while ($objResult2 = mysqli_fetch_array($objQuery2)) {
                                //check task_view in system of level 3
                                if ($result_member['admin'] != '1') {
                                    if (!in_array($objResult2['id_system'], $module)) {
                                        continue;
                                    }
                                }
                                //------end check--------
                                $link_b2 = $objResult2['link_system'];
                                $cut_link2 = explode('/', $link_b2);
                                if ($objResult2['link_system'] == '#') {
                                    $link2 = '#';
                                    $tree2 = 'treeview';
                                } else {
                                    if ($folder == $cut_link2[0]) {
                                        $link2 = $cut_link2[1];
                                    } else {
                                        $link2 = '../' . $link_b2;
                                    }

                                    $tree2 = '';
                                }
                                if ($objResult2['icon'] == '') {
                                    $icon2 = '<i class="mdi mdi-checkbox-blank-circle-outline"></i>';
                                } else {
                                    $icon2 = $objResult2['icon'];
                                }

                                if ($folder == $cut_link2[0]) {
                                    if ($file == $cut_link2[1]) {
                                        $active2 = 'active';
                                        $id_cookie = $objResult2['id_system'];
                                    } else {
                                        $active2 = '';
                                    }
                                } else {
                                    $active2 = '';
                                } ?>
                        <li class="check_system_level3 <?php echo $tree2 . ' ' . $active2; ?> "
                            data-top1="<?php echo $objResult['id_system']; ?>"
                            data-top2="<?php echo $objResult1['id_system']; ?>">
                            <a href="<?php echo $link2 ?>" data-link="<?php echo $link2 ?>" aria-expanded="false"
                                data-id="<?php echo $objResult2['id_system']; ?>" class="setcookie">
                                <?php echo $icon2; ?> <?php echo $objResult2['name_system']; ?>
                            </a>
                        </li>
                        <?php
                            } ?>
                    </ul>
                    </li>
                    <?php
                        } ?>
                </ul>
                </li>
                <?php
                    }
                } // END LEVEL 1
                ?>
                <li class="nav-devider"></li>
                <li class="nav-small-cap">จัดการดีไซน์</li>
                <?php
                $objQuery = getSystemMenu('2', '1', null);
                if ($objQuery) {
                    while ($objResult = mysqli_fetch_array($objQuery)) {
                        //check task_view in design of level 1
                        if ($result_member['admin'] != '1') {
                            if (!in_array($objResult['id_system'], $module)) {
                                continue;
                            }
                        }
                        //------end check--------
                        $link_b = $objResult['link_system'];
                        $cut_link = explode('/', $link_b);
                        if ($objResult['link_system'] == '#') {
                            $link = '#';
                            $tree = 'treeview';
                            if ($folder == $cut_link[0]) {
                                $active = 'active';
                            } else {
                                $active = '';
                            }
                        } else {
                            if ($folder == $cut_link[0]) { //------------------------------mod_product == mod_product
                                $link = $cut_link[1];    //------------------------------front-add.php
                                if ($file == $cut_link[1]) {
                                    $active = 'active';
                                    $id_cookie = $objResult['id_system'];
                                } else {
                                    $active = '';
                                }
                            } else {
                                $link = '../' . $link_b;   //------------------------------mod_nmorder/front-add.php
                                $active = '';
                            }

                            $tree = '';
                        }
                        if ($objResult['icon'] == '') {
                            $icon = '<i class="mdi mdi-checkbox-blank-circle-outline"></i>';
                        } else {
                            $icon = $objResult['icon'];
                        } ?>
                <li class="check_design_level1
                       check_top_level1-<?php echo $objResult['id_system']; ?> 
                      <?php echo $tree . ' ' . $active; ?>">
                    <a class="left-design setcookie" href="#" data-link="<?php echo $link; ?>"
                        data-id="<?php echo $objResult['id_system']; ?>">
                        <?php echo $icon ?> <span class="hide-menu"><?php echo $objResult['name_system']; ?></span>
                        <?php

                                        $objQuery1 = getSystemMenu('2', '2', $objResult['id_system']);
                        $numQuery1 = mysqli_num_rows($objQuery1);
                        if ($numQuery1 <= 0) {
                            ?>
                    </a>
                </li>
                <?php
                                continue;
                        } else {
                            ?>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <?php
                        }
                        while ($objResult1 = mysqli_fetch_array($objQuery1)) {
                            //check task_view in design of level 2
                            if ($result_member['admin'] != '1') {
                                if (!in_array($objResult1['id_system'], $module)) {
                                    continue;
                                }
                            }
                            //------end check-------
                            $link_b1 = $objResult1['link_system'];
                            $cut_link1 = explode('/', $link_b1);
                            if ($objResult1['link_system'] == '#') {
                                $link1 = '#';
                                $tree1 = 'treeview';
                                if ($folder == $cut_link[0]) {
                                    $active1 = 'active';
                                } else {
                                    $active1 = '';
                                }
                            } else {
                                if ($folder == $cut_link1[0]) {
                                    $link1 = $cut_link1[1];
                                    if ($file == $cut_link1[1]) {
                                        $active1 = 'active';
                                        $id_cookie = $objResult1['id_system'];
                                    } else {
                                        $active1 = '';
                                    }
                                } else {
                                    $link1 = '../' . $link_b1;
                                    $active1 = '';
                                }

                                $tree1 = '';
                            }
                            if ($objResult1['icon'] == '') {
                                $icon1 = '<i class="mdi mdi-checkbox-blank-circle-outline"></i> ';
                            } else {
                                $icon1 = $objResult1['icon'];
                            } ?>
                    <li class="check_design_level2
                           check_top_level2-<?php echo $objResult1['id_system']; ?>     
                          <?php echo $tree1 . ' ' . $active1; ?>" data-top1="<?php echo $objResult['id_system']; ?>">
                        <a class="left-design setcookie" href="#" data-link="<?php echo $link1; ?>"
                            data-id="<?php echo $objResult2['id_system']; ?>">
                            <?php echo $icon1; ?><?php echo $objResult1['name_system']; ?>
                            <?php
                                                $objQuery2 = getSystemMenu('2', '3', $objResult1['id_system']);
                            $numQuery2 = mysqli_num_rows($objQuery2);
                            if ($numQuery2 <= 0) {
                                ?>
                        </a>
                    </li>
                    <?php
                                        continue;
                            } else {
                                ?>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php
                            }
                            while ($objResult2 = mysqli_fetch_array($objQuery2)) {
                                //check task_view in design of level 3
                                if ($result_member['admin'] != '1') {
                                    if (!in_array($objResult2['id_system'], $module)) {
                                        continue;
                                    }
                                }
                                //------end check--------
                                $link_b2 = $objResult2['link_system'];
                                $cut_link2 = explode('/', $link_b2);
                                if ($objResult2['link_system'] == '#') {
                                    $link2 = '#';
                                    $tree2 = 'treeview';
                                } else {
                                    if ($folder == $cut_link2[0]) {
                                        $link2 = $cut_link2[1];
                                    } else {
                                        $link2 = '../' . $link_b2;
                                    }

                                    $tree2 = '';
                                }
                                if ($objResult2['icon'] == '') {
                                    $icon2 = '<i class="mdi mdi-checkbox-blank-circle-outline"></i> ';
                                } else {
                                    $icon2 = $objResult2['icon'];
                                }

                                if ($file == $cut_link2[1]) {
                                    $active2 = 'active go_to-top';
                                    $id_cookie = $objResult2['id_system'];
                                } else {
                                    $active2 = '';
                                } ?>
                        <li class="check_design_level3 <?php echo $tree2 . ' ' . $active2; ?> "
                            data-top1="<?php echo $objResult['id_system']; ?>"
                            data-top2="<?php echo $objResult1['id_system']; ?>">
                            <a class="left-design setcookie" href="#" data-link="<?php echo $link2 ?>"
                                data-id="<?php echo $objResult3['id_system']; ?>">
                                <?php echo $icon2; ?><?php echo $objResult2['name_system']; ?>
                            </a>
                        </li>
                        <?php
                            } ?>
                    </ul>
                    </li>
                    <?php
                        } ?>
                </ul>
                </li>
                <?php
                    }
                } // END LEVEL 1
                ?>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
    </div>
    <!-- End Bottom points-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->

<script src="../../plugins_b/jquery/jquery.min.js"></script>
<script type="text/javascript">
function setCookie(key, value) {
    console.log('set cookie');
    var expires = new Date();
    expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000));
    document.cookie = key + '=' + value + ';expires=' + expires.toUTCString() + ';path=/';
}

function getCookie(key) {
    var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
    return keyValue ? keyValue[2] : null;
}
$(document).ready(function() {

    $(document).on('click', '.setcookie', function() {
        var i = $(this).attr('data-id');
        var link = $(this).attr('data-link');
        // alert(i);
        setCookie('id_system', i);
        location.href = link;
    })
});
</script>