<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Home extends Controller
{

  public function featuredCategory()
  {
    return get_field('featured_category',
      get_option('page_for_posts'));
  }


}
