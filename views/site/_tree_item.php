<?php
use yii\helpers\Html;
?>

<?php if(!empty($tree[$parent_id])): ?>
<ul>
<?php foreach ($tree[$parent_id] as $key => $value):
    unset($tree[$parent_id]);
?>
    <li>
        <?= Html::a($value, ['#'], ['data-toggle' => "modal", 'data-target' => "#modal"])?>
        <?= $this->render('_tree_item', ['tree' => $tree, 'parent_id' => $key])?>
    </li>
<?php endforeach;?>
</ul>
<?php endif;?>