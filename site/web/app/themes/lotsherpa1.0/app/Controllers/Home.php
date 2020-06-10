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

  public function featuredId()
  {
    $cat = $this->featuredCategory();
    if ($cat !== null) {
      return $cat->term_id;
    }


  }

  public function featuredName()
  {
    $cat = $this->featuredCategory();
    if ($cat !== null) {
      return $cat->name;
    }


  }

  public function featuredPosts() {
    return App::postQuery(6,$this->featuredId());
  }


}
