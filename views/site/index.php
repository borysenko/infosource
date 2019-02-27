<?php
use app\models\Tree;
use lo\widgets\modal\ModalAjax;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
$tree = Tree::getRandomAll();
//print_r($tree);die;
?>
<div class="site-index">
    <?php foreach(array_keys($tree) as $parent_id): ?>
        <?= $this->render('_tree_item', ['tree' => $tree, 'parent_id' => $parent_id])?>
    <?php endforeach;?>
</div>

<?php
echo ModalAjax::widget([
    'id' => 'modal',
    'header' => 'Test Captcha',
    'url' => Url::to(['/site/re-captcha']),
    'ajaxSubmit' => true,
]);
?>
