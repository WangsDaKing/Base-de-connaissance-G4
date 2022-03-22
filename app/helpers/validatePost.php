<?php


function validatePost($post)
{
    $errors = array();

    if (empty($post['title'])) {
        array_push($errors, 'Titre requis');
    }

    if (empty($post['body'])) {
        array_push($errors, 'Texte de fiche requis');
    }

    if (empty($post['topic_id'])) {
        array_push($errors, 'Choisis une catégorie');
    }

    $existingPost = selectOne('posts', ['title' => $post['title']]);
    if ($existingPost) {
        if (isset($post['update-post']) && $existingPost['id'] != $post['id']) {
            array_push($errors, 'Une fiche avec ce nom existe déjà');
        }

        if (isset($post['add-post'])) {
            array_push($errors, 'Une fiche avec ce nom existe déjà');
        }
    }

    return $errors;
}
