<?php

use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(0);
?>
<nav aria-label="Project pagination">
    <ul class="pagination pagination-md justify-content-center">
        <?php if ($pager->hasPrevious()) : ?>
            <li class="page-item">
                <a class="page-link rounded-start" href="<?= $pager->getPrevious() ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span> Previous
                </a>
            </li>
        <?php else: ?>
            <li class="page-item disabled">
                <span class="page-link rounded-start">
                    <span aria-hidden="true">&laquo;</span> Previous
                </span>
            </li>
        <?php endif ?>
        
        <li class="page-item active">
            <span class="page-link">
                Page <?= $pager->getCurrentPageNumber() ?> of <?= $pager->getPageCount() ?>
            </span>
        </li>
        
        <?php if ($pager->hasNext()) : ?>
            <li class="page-item">
                <a class="page-link rounded-end" href="<?= $pager->getNext() ?>" aria-label="Next">
                    Next <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        <?php else: ?>
            <li class="page-item disabled">
                <span class="page-link rounded-end">
                    Next <span aria-hidden="true">&raquo;</span>
                </span>
            </li>
        <?php endif ?>
    </ul>
</nav>

