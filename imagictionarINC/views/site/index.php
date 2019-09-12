<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = '.imagictionarINC';
?>

<div class="site-index">
    <div class="body-content">
    <div class="jumbotron">
        <h1 class="display-3">Welcome to the Yii powered web application</h1>
        <hr class="my-4">
        <h4 class="lead">Add words to your dictionary</h4>
        <p></p>
        <p class="lead">
          <a class="btn btn-info btn-md" href="<?php echo Url::to('dictionary/create');?>" role="button">Go</a>
        </p>
      </div>
    </div>
</div>
