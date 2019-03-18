<?php

//устанавливаем внешний вид иконок сортировки столбцов
$titleAnotherOrder = $datetimeAnotherOrder = 'asc';

function setIconSortAttributes(&$anotherOrder, &$order, $field, $sortBy, $sortOrder)
{
    if ($sortBy == $field) {
        if (strtolower($sortOrder) !== 'desc') {
            $order = '-desc';
            $anotherOrder = 'desc';
        } else {
            $order = '-asc';
            $anotherOrder = 'asc';
        }
    }  else {
        $order = ' text-black-50';
    }
}

setIconSortAttributes($titleAnotherOrder, $titleOrder, 'title', $sortBy, $sortOrder);
setIconSortAttributes($datetimeAnotherOrder, $datetimeOrder, 'datetime', $sortBy, $sortOrder);
