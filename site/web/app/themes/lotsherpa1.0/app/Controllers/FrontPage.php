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

  public function subNum()
  {
    $multi = get_field('cmulti');
    if ($multi) {
      return count($multi['subsections']);
    }
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

  public static function titleToId($obj)
  {
    if ($obj !== null || $obj !== ''){
      return str_replace(' ', '-', strtolower($obj));
    } else {
      return null;
    }

  }
}
