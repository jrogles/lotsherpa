<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Index extends Controller
{

  public function getUrlInfo()
  {
    return get_permalink();
  }


}
