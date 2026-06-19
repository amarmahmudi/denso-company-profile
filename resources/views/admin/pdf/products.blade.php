<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Produk - DENSO</title>
    <style>
        body { font-family: 'DejaVu Sans', sans-serif; font-size: 12px; color: #333; }
        h1 { text-align: center; color: #e3000f; font-size: 18px; margin-bottom: 5px; }
        .subtitle { text-align: center; color: #666; font-size: 11px; margin-bottom: 25px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { background-color: #e3000f; color: #fff; padding: 8px 10px; text-align: left; font-size: 11px; }
        td { padding: 8px 10px; border-bottom: 1px solid #ddd; font-size: 11px; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .badge-active { background: #28a745; color: #fff; padding: 2px 8px; border-radius: 3px; font-size: 10px; }
        .badge-inactive { background: #6c757d; color: #fff; padding: 2px 8px; border-radius: 3px; font-size: 10px; }
        .footer { text-align: center; margin-top: 30px; font-size: 10px; color: #999; }
    </style>
</head>
<body>
    <h1>DENSO Indonesia</h1>
    <p class="subtitle">Laporan Data Produk / Layanan — Dicetak: {{ date('d F Y') }}</p>

    <table>
        <thead>
            <tr>
                <th style="width:30px;">No</th>
                <th>Nama Produk</th>
                <th>Deskripsi</th>
                <th style="width:100px;">Harga</th>
                <th style="width:60px;">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $i => $product)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ Str::limit($product->description, 60) }}</td>
                <td>{{ $product->price ? 'Rp ' . number_format($product->price, 0, ',', '.') : '-' }}</td>
                <td>
                    @if($product->is_active)
                        <span class="badge-active">Aktif</span>
                    @else
                        <span class="badge-inactive">Nonaktif</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p class="footer">Total Produk: {{ $products->count() }} — © {{ date('Y') }} DENSO Indonesia</p>
</body>
</html>
