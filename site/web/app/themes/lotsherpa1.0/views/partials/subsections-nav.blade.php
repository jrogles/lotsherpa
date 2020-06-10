<a href="#{!!$id!!}" class="subsection-link">
  <h5 class="subsection-link__title">{{ $title }}</h5>
  <p class="subsection-link__subtitle">{{ $subtitle }}</p>
    <div class="subsection-link__icon">
     @includeWhen($icon, 'partials.img-srcset', ['img' => $icon, 'class' => 'subsection-link__icon'])
   </div>
  <div class="subsection-link__desc">{{ $description }}</div>
  <div class="subsection-link__cta">{{ $link }}</div>
</a>


