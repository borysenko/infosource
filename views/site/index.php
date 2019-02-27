<?php
use app\models\Tree;
use lo\widgets\modal\ModalAjax;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <?= $this->render('_tree_item', ['tree' => Tree::getRandomAll(), 'parent_id' => Tree::getMinParentID()])?>

</div>

<?php
echo ModalAjax::widget([
    'id' => 'modal',
    'header' => 'Test Captcha',
    'url' => Url::to(['/site/re-captcha']),
    'ajaxSubmit' => true,
]);
?>
