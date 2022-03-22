<?php

function validateTopic($topic)
{
    $errors = array();

    if (empty($topic['name'])) {
        array_push($errors, 'Nom de catégorie requis');
    }

    $existingTopic = selectOne('topics', ['name' => $post['name']]);
    if ($existingTopic) {
        if (isset($post['update-topic']) && $existingTopic['id'] != $post['id']) {
            array_push($errors, 'Ce nom est déjà pris');
        }

        if (isset($post['add-topic'])) {
            array_push($errors, 'Ce nom est déjà pris');
        }
    }

    return $errors;
}
