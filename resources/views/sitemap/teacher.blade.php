<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
    @foreach($institutes as $institute)
        <url>
            <loc>{{ route('teacher.frontend', $institute) }}</loc>
            <changefreq>monthly</changefreq>
            <lastmod>{{ gmdate('Y-m-d\TH:i:s+00:00', strtotime($institute->updated_at)) }}</lastmod>
            <priority>0.8</priority>
            @isset($institute->photo)
            <image:image>
                <image:loc>{{ asset('storage/' . $institute->photo->filePath()) }}</image:loc>
                <image:caption>پازل استودیو - {{ $institute->first_name . ' ' . $institute->last_name }}</image:caption>
                <image:title>{{ $institute->first_name . ' ' . $institute->last_name }}</image:title>
            </image:image>
            @endisset
        </url>
    @endforeach
    @foreach($teachers as $teacher)
        <url>
            <loc>{{ route('teacher.frontend', $teacher) }}</loc>
            <changefreq>monthly</changefreq>
            <lastmod>{{ gmdate('Y-m-d\TH:i:s+00:00', strtotime($teacher->updated_at)) }}</lastmod>
            <priority>0.8</priority>
            @isset($teacher->photo)
            <image:image>
                <image:loc>{{ asset('storage/' . $teacher->photo->filePath()) }}</image:loc>
                <image:caption>پازل استودیو - {{ $teacher->first_name . ' ' . $teacher->last_name }}</image:caption>
                <image:title>{{ $teacher->first_name . ' ' . $teacher->last_name }}</image:title>
            </image:image>
            @endisset
        </url>
    @endforeach
</urlset>