<?php
$this->beginContent('//layouts/main');
?>
    <div class="span-19">
        <div id="content">
            <?php echo $content; ?>
        </div>
        <!-- content -->
    </div>
    <div class="span-5 last">
        <div id="sidebar">
            <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title' => Yii::t('main-ui', 'Operations'),
            ));
            $this->widget('zii.widgets.CMenu', array(
                'items' => $this->menu,
                'htmlOptions' => array('class' => 'nav nav-pills nav-stacked'),
                'encodeLabel' => false,
            ));
            $this->endWidget();
            ?>
        </div>
        <!-- sidebar -->
    </div>
<?php $this->endContent(); ?>