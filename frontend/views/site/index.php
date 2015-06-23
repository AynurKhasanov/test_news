<?php
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
$this->title = 'News';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col-md-4">
                

            <div><ul class="list-group">
                    <li class="list-group-item">
                            <a href="/frontend/web/index.php">Показать все</a>
                    </li>
                <?php  foreach ($theme as $arrTh) {
                    $k=0;
                    foreach ($newsl as $arrN) {
                        if ($arrTh->id_theme == $arrN->theme_news)
                        {
                            $k++;
                        }
                    }
                    if ($k>0){?>
                        <div>
                            
                            <li class="list-group-item">
                            <span class="badge"><?php echo $k; ?></span>
                            <a href="/frontend/web/index.php?T=<?= $arrTh->id_theme ?>"><?= $arrTh->name_theme ?></a>
                            </li>
                        </div>
                   <?php }
                } ?></ul>
                
               
             <?php  
                $Mtest = array();
                 $stackYear = array();
                $stackYearMonth = array();
                $monthM = array(11 => 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
                foreach ($newsl as $arrN) 
                    {
                        $y=0;
                        $d=0;
                        $m=0;
                        $Ymd = $arrN->date_news;
                        list($year, $month, $day) = explode("-", $Ymd);
                        foreach ($newsl as $arrl) 
                        {
                            $Ymdl = $arrl->date_news;
                            list($yearl, $monthl, $dayl) = explode("-", $Ymdl);
                            if ($year == $yearl and $month == $monthl)
                                {
                                    $d++;
                                }
                            if ($year == $yearl)
                                {
                                    $y++;
                                }
                        }
                        if (!in_array($year, $stackYear)) {
                            array_push($stackYear,$year);
                            //echo $year."(".$y.")";?>
                <p><span class="glyphicon glyphicon-menu-down"></span>
                        <a href="/frontend/web/index.php?Y=<?php echo $year; ?>" ><?php echo $year."(".$y.")"; ?></a>

                           <?php echo '</br>';
                            }
                        $year.='-'.$month;
                        if (!in_array($year, $stackYearMonth)) {
                            array_push($stackYearMonth,$year);
                            list($year2, $month2) = explode("-", $year);
                            //echo "*".$monthM[$month2+10]."(".$d.")";?>
                        <p><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;";?><span class="glyphicon glyphicon-menu-right"></span>
                            <a href="/frontend/web/index.php?Ym=<?php echo $year; ?>"><?php echo $monthM[$month2+10]."&nbsp;(".$d.")"; ?></a>

                            <?php echo '</br>';
                            }
                    }
                            ?>
                
            </div>
            </div>
            <div>
                <div class="col-md-8">
                        <?php foreach ($news as $arr){
                            $M = $_GET["M"];
                            $T = $_GET["T"];
                            $Ymd = $arr->date_news;
                            list($year, $month, $day) = explode("-", $Ymd);

                            ?>
                            <h3><?= $arr->name_news ?></h3>
                            <span class="label label-default"><?= $arr->date_news ?></span>
                            <span class="label label-info">
                            <?php  foreach ($theme as $arrTh) {
                                    if($arr->theme_news == $arrTh->id_theme){
                                        echo $arrTh->name_theme;
                                    }
                                    }?></span>
                            <p><?= StringHelper::truncate($arr->text_news, 256) ?></p>
                            <p><a href="/frontend/web/index.php?r=admin%2Fnews%2Fnews&id=<?= $arr->id_news ?>" class="btn btn-primary" role="button">читать далее..</a> 
                            </p>
                        <?php } ?> 
                    <?= LinkPager::widget(['pagination' => $pagination]) ?> 
                </div>
            </div>
        </div>
    </div>
</div>
