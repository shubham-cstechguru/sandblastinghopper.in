<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

   @foreach($blog as $content )
   
   <url>

      <loc>{{ url('/') }}/blog/{{ $content->slug }}</loc>

      <lastmod>{{ date('c', strtotime($content->created_at)) }}</lastmod>

      <changefreq>weekly</changefreq>

      <priority>0.9</priority>

   </url>
   @endforeach
</urlset>