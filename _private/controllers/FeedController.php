<?php

namespace Website\Controllers;


class FeedController {

public function feed() {

    $posts = getAllPosts();

    $gebruiker = get_current_user();

    $template_engine = get_template_engine();
    echo $template_engine->render('feed', ['posts' => $posts]);
}

}