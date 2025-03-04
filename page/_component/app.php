<?php

function Loading($text = null){
    ?>
        <div class="d-flex justify-content-center py-2">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    <?php
}

function BreadCrumb(array $items){
    $html = "<ol class='breadcrumb'>";
    foreach ($items as $i => $item) {
        $class = $i === count($items) - 1 ? ' active' : '';
        $link = isset($item['url']) ? "<a href='{$item['url']}'>{$item['label']}</a>" : $item['label'];
        $html .= "<li class='breadcrumb-item{$class}'>{$link}</li>";
    }
    $html .= "</ol>";
    echo $html;
}