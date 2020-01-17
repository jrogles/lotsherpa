<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class FrontPage extends Controller
{

  public function hero()
  {
    return get_field('hero');
  }

  public function cmulti()
  {
    return get_field('cmulti');
  }

  public function blog()
  {
    return get_field('blog');
  }

  public function csingle()
  {
    return get_field('csingle');
  }

  public function affiliates()
  {
    return get_field('affiliates');
  }

  public static function titleToId($object)
  {
    return str_replace(' ', '-', strtolower($object['title']));
  }
}
