<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
    @foreach($courses as $course)
        <url>
            <loc>{{ route('webinar.frontend', $course->id) }}</loc>
            <lastmod>{{ gmdate('Y-m-d\TH:i:s+00:00', strtotime($course->updated_at)) }}</lastmod>
            <changefreq>hourly</changefreq>
            <priority>0.7</priority>
            <image:image>
                <image:loc>{{ asset('storage/' . $course->photo->filePath()) }}</image:loc>
                <image:caption>پازل استودیو - {{ $course->name }}</image:caption>
                <image:title>{{ $course->name }}</image:title>
            </image:image>
        </url>
    @endforeach
</urlset>