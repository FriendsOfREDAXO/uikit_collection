<?php
$class_group = trim('form-group ' . $this->getHTMLClass() . ' ' . $this->getWarningClass());
?>
<div class="<?= $class_group ?>" id="<?php echo $this->getHTMLId() ?>">
    <?php echo $article->getArticle() ?>
</div>
