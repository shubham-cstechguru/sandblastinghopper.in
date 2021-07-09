<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    
   @foreach( $category as $category )
   <url>

      <loc>{{ url('/') }}/category/{{ $category->slug_category }}</loc>

      <lastmod>{{ date('c', strtotime($category->created_at)) }}</lastmod>

      <changefreq>weekly</changefreq>

      <priority>0.9</priority>

   </url>
   @endforeach
   
</urlset>