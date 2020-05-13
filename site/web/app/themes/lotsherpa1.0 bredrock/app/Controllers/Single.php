<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Single extends Controller
{

  public function relatedPosts()
  {
    return get_field('related_posts');
  }

}
