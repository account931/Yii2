<php 
//For  2  column  template-SO  FAR  IS  NOT USED
//https://github.com/yiisoft/yii2/issues/1626
$this->beginContent('@app/views/layouts/main.php'); ?>

<div class="row">
   <div class="col-md-3">
    <div class="pg-sidebar">          
      <?= $this->blocks['sidebar']; ?>

      <?= $this->blocks['toolbar']; ?>
    </div>      
  </div>
  <div class="col-md-9">
    <?= $content; ?>
  </div>
</div>
<php $this->endContent(); ?>
