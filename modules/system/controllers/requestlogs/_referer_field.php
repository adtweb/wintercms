<?php if ($formModel->referer && count($formModel->referer) > 0) { ?>
    <div class="form-control control-simplelist with-icons">
        <ul>
            <?php foreach ((array) $formModel->referer as $referer) { ?>
                <li class="wn-icon-file-o"><?= e($referer) ?></li>
            <?php } ?>
        </ul>
    </div>
<?php } else { ?>
    <div class="form-control"><em>There were no detected referers to this URL.</em></div>
<?php } ?>
