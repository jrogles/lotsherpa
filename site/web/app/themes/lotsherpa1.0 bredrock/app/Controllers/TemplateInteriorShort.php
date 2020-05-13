<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateInteriorShort extends Controller
{
  public function leftOrRight()
  {
    return strtolower(get_field('left_or_right'));
  }

  public function additionalContentOne()
  {
    return get_field('additional_content_one');
  }

  public function additionalContentTwo()
  {
    return get_field('additional_content_two');
  }

  public function multiCta()
  {
    return get_field('multi_cta');
  }

  public function disclosures()
  {
    return get_field('disclosures');
  }

}
