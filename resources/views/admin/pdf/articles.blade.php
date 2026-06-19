<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Artikel - DENSO</title>
    <style>
        body { font-family: 'DejaVu Sans', sans-serif; font-size: 12px; color: #333; }
        h1 { text-align: center; color: #e3000f; font-size: 18px; margin-bottom: 5px; }
        .subtitle { text-align: center; color: #666; font-size: 11px; margin-bottom: 25px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { background-color: #e3000f; color: #fff; padding: 8px 10px; text-align: left; font-size: 11px; }
        td { padding: 8px 10px; border-bottom: 1px solid #ddd; font-size: 11px; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .footer { text-align: center; margin-top: 30px; font-size: 10px; color: #999; }
    </style>
</head>
<body>
    <h1>DENSO Indonesia</h1>
    <p class="subtitle">Laporan Data Artikel / Berita — Dicetak: {{ date('d F Y') }}</p>

    <table>
        <thead>
            <tr>
                <th style="width:30px;">No</th>
                <th>Judul</th>
                <th style="width:100px;">Tanggal Terbit</th>
                <th>Ringkasan Konten</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $i => $article)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->published_at ? $article->published_at->format('d M Y') : '-' }}</td>
                <td>{{ Str::limit($article->content, 80) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p class="footer">Total Artikel: {{ $articles->count() }} — © {{ date('Y') }} DENSO Indonesia</p>
</body>
</html>
