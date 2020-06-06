<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateInteriorLong extends Controller
{
  public function contents()
    {
      return array_map(function($content) {
        return [
          'title' => $content['title'],
          'id' => str_replace(' ', '-', strtolower($content['title'])),
          'text' => $content['text'],
          'icon' => $content['icon'],
          'figure' => $content['figure'],
          'figure_side' => $content['figure_side'],
          'has_jumplink' => $content['has_jumplink'],
          'subtitle' => $content['jumplink']['subtitle'],
          'description' => $content['jumplink']['description'],
          'link' => $content['jumplink']['link_text'],
        ];
      }, get_field('content') ?? []);
    }

    public function disclosures()
    {
      return get_field('disclosures');
    }

    public static function hasJumplinks($contentsArr) {
     if (null !== array_search(True, array_column($contentsArr, 'has_jumplink'))){
      return true;
     }
     else {return false;}
    }

}
