<?php
/**
 * @var rex_fragment $this
 * @psalm-scope-this rex_fragment
 */
?>
<?php
    /** @var rex_pager $pager */
    $pager = $this->pager;
    /** @var rex_url_provider_interface $urlProvider */
    $urlProvider = $this->urlprovider;
    $firstPage = $pager->getFirstPage();
    $lastPage = $pager->getLastPage();
    $from = max($firstPage + 1, $pager->getCurrentPage() - 3);
    $to = min($lastPage - 1, $from + 6);
    $from = max($firstPage + 1, $to - 6);
    $from = $firstPage + 2 == $from ? $firstPage + 1 : $from;
    $to = $lastPage - 2 == $to ? $lastPage - 1 : $to;
?>
        <?php if ($pager->getRowCount() > $pager->getRowsPerPage()): ?>
<div class="uk-section uk-padding-large">
<nav class="uk-container">
                <ul class="uk-pagination uk-padding-small">
                    <li class="rex-prev<?= $pager->isActivePage($firstPage) ? ' disabled' : ''; ?>">
                        <a href="<?= $urlProvider->getUrl([$pager->getCursorName() => $pager->getCursor($pager->getPrevPage())]) ?>" uk-tooltip title="<?= $this->i18n('list_previous') ?>">
                            <span title="<?= $this->i18n('list_next') ?>" uk-icon="icon: chevron-left "></span> 
                        </a>
                    </li>

                    <li class="<?= $pager->isActivePage($firstPage) ? ' uk-active' : '' ?>">
                        <a href="<?= $urlProvider->getUrl([$pager->getCursorName() => $pager->getCursor($firstPage)]) ?>">
                            <?= $firstPage + 1 ?>
                        </a>
                    </li>

                    <?php if ($from > $firstPage + 1): ?>
                        <li class="uk-disabled">
                            <span>…</span>
                        </li>
                    <?php endif; ?>

                    <?php for ($page = $from; $page <= $to; ++$page): ?>
                        <li class="<?= $pager->isActivePage($page) ? ' uk-active ' : '' ?>">
                            <a href="<?= $urlProvider->getUrl([$pager->getCursorName() => $pager->getCursor($page)]) ?>">
                                <?= $page + 1 ?>
                            </a>
                        </li>
                    <?php endfor; ?>

                    <?php if ($to < $lastPage - 1): ?>
                        <li class="uk-disabled">
                            <span>…</span>
                        </li>
                    <?php endif; ?>

                    <li class="<?= $pager->isActivePage($lastPage) ? ' uk-active' : '' ?>">
                        <a href="<?= $urlProvider->getUrl([$pager->getCursorName() => $pager->getCursor($lastPage)]) ?>">
                            <?= $lastPage + 1 ?>
                        </a>
                    </li>

                    <li class="<?= $pager->isActivePage($lastPage) ? ' uk-disabled' : ''; ?>">
                        <a href="<?= $urlProvider->getUrl([$pager->getCursorName() => $pager->getCursor($pager->getNextPage())]) ?>" uk-tooltip  title="<?= $this->i18n('list_next') ?>">
                            <span title="<?= $this->i18n('list_next') ?>" uk-icon="icon: chevron-right"></span> 
                        </a>
                    </li>
                </ul>
                <div class="rex-pagination-count"><?= $this->i18n('list_rows_found', $pager->getRowCount()) ?></div>
    </nav></div>
        <?php endif;
