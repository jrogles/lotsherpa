@if ($figure['image_or_gallery'] === 'image' || 'Image')
  @include('partials.img-srcset', ['img' => $figure['image']])
@else
  @include('partials.gallery.gallery', ['gallery' => $figure['gallery']])
@endif
