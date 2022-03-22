<?php

function validateUser($user)
{
    $errors = array();

    if (empty($user['username'])) {
        array_push($errors, "Un nom d'utilisateur est requis");
    }

    if (empty($user['email'])) {
        array_push($errors, 'Une adresse mail est requise');
    }

    if (empty($user['password'])) {
        array_push($errors, 'Un mot de passe est requis');
    }

    if ($user['passwordConf'] !== $user['password']) {
        array_push($errors, 'Les mots de passe sont différents');
    }

    // $existingUser = selectOne('users', ['email' => $user['email']]);
    // if ($existingUser) {
    //     array_push($errors, 'Email already exists');
    // }

    $existingUser = selectOne('users', ['email' => $user['email']]);
    if ($existingUser) {
        if (isset($user['update-user']) && $existingUser['id'] != $user['id']) {
            array_push($errors, 'Adresse mail déjà utilisée');
        }

        if (isset($user['create-admin'])) {
            array_push($errors, 'Adresse mail déjà utilisée');
        }
    }

    return $errors;
}


function validateLogin($user)
{
    $errors = array();

    if (empty($user['username'])) {
        array_push($errors, "Un nom d'utilisateur est requis");
    }

    if (empty($user['password'])) {
        array_push($errors, 'Un mot de passe est requis');
    }

    return $errors;
}
