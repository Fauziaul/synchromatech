<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faktur Pesanan</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        .invoice-box { max-width: 800px; margin: auto; padding: 20px; border: 1px solid #eee; }
        .invoice-title { text-align: center; font-size: 20px; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        .footer { text-align: center; margin-top: 20px; font-size: 12px; color: #555; }
    </style>
</head>
<body>
    <div class="invoice-box">
        <div class="row" style="display: flex; align-items: center; gap: 10px;">
            <img src="{{ public_path('background/logo.png') }}" style="width: 100px; height: auto; border-radius: 50%;">
            <p class="invoice-title" style="margin: 0; font-size: 20px; font-weight: bold;">FAKTUR PESANAN</p>
        </div>
        <hr>
        <table>
            <tr>
                <td><strong>No. Faktur:</strong> {{ $invoice_number }}</td>
                <td><strong>Tanggal:</strong> {{ $date }}</td>
            </tr>
            <tr>
                <td><strong>Nama Pelanggan:</strong> {{ $customer_name }}</td>
                <td><strong>Email:</strong> {{ $customer_email }}</td>
            </tr>
            <tr>
                <td colspan="2"><strong>No HP:</strong> {{ $customer_phone }}</td>
            </tr>
            <tr>
                <td colspan="2"><strong>Alamat:</strong> {{ $customer_address }}</td>
            </tr>
        </table>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>S</th>
                    <th>M</th>
                    <th>L</th>
                    <th>XL</th>
                    <th>XXL</th>
                    <th>XXXL</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['sizes']['S'] }}</td>
                        <td>{{ $item['sizes']['M'] }}</td>
                        <td>{{ $item['sizes']['L'] }}</td>
                        <td>{{ $item['sizes']['XL'] }}</td>
                        <td>{{ $item['sizes']['XXL'] }}</td>
                        <td>{{ $item['sizes']['XXXL'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p><strong>Catatan:</strong> {{ $notes }}</p>

        <p class="footer">Terima kasih telah melakukan pesanan!</p>
    </div>
</body>
</html>
