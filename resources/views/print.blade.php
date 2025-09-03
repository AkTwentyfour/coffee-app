<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Receipt</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
</head>

<body
    style="display: flex; justify-content: center; align-items:center; min-height:100vh; background:#f9f9f9; font-family: poppins, sans-serif;">
    <div style="width: 320px; background:#fff; padding:15px; border-radius:10px; box-shadow:0 4px 10px rgba(0,0,0,0.1);">
        <div id="receipt" style="font-size:14px; line-height:1.4;">
            <h2 style="text-align:center; margin:0;">BKK Cafe</h2>
            <p style="text-align:center; margin:5px 0 15px 0; font-size:12px;">
                Jl. Garuda No.99, Bulak, Babakan,<br>
                Kec. Kramat, Kabupaten Tegal,<br>
                Jawa Tengah 52181
            </p>

            <hr>
            <div style="display: flex; justify-content: space-between; margin-bottom:10px; font-size:12px;">
                <div>
                    {{ $sale->created_at->format('Y-m-d') }}<br>
                    {{ $sale->created_at->format('H:i:s') }}<br>
                    No. {{ $sale->id }}
                </div>
                <div style="text-align:right;">Kasir<br>BKK Cafe</div>
            </div>
            <hr>

            @foreach ($saleItem as $item)
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom:8px;">
                    <div>
                        {{ $item->comodity->name }}<br>
                        <span style="font-size:12px;">{{ $item->quantity }} x Rp
                            {{ number_format($item->price, 0, ',', '.') }}</span>
                    </div>
                    <div>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</div>
                </div>
            @endforeach

            <hr>
            <div style="display: flex; justify-content: space-between; margin-bottom:5px; font-weight:bold;">
                <div>Total</div>
                <div>Rp {{ $sale->formatted_total_amount }}</div>
            </div>
            <div style="display: flex; justify-content: space-between; margin-bottom:5px;">
                <div>Cash</div>
                <div>Rp {{ $sale->formatted_cash_paid }}</div>
            </div>
            <div style="display: flex; justify-content: space-between; margin-bottom:10px;">
                <div>Change</div>
                <div>Rp {{ $sale->formatted_change_amount }}</div>
            </div>

            <p style="text-align:center; font-size:12px; margin-top:15px;">
                Powered by cdtwin.corp <br>
                instagram @cdtwin.corp <br>
                www.cdtwin.tech
            </p>
        </div>

        <div style="display:flex; justify-content:space-between; margin-top:15px;">
            <button id="printButton"
                style="flex:1; margin-right:5px; padding:8px; border:none; border-radius:5px; background:#4caf50; color:white; font-weight:bold; cursor:pointer;">
                Cetak
            </button>
            <a href="javascript:window.history.back()"
                style="flex:1; margin-left:5px; text-align:center; text-decoration:none; padding:8px; border-radius:5px; background:#f44336; color:white; font-weight:bold;">
                Kembali
            </a>
        </div>
    </div>

    <script>
        function printReceipt() {
            printJS({
                printable: 'receipt',
                type: 'html',
                targetStyles: ['*'],
                css: ['{{ asset('css/receipt.css') }}']
            });
        }
        window.onload = printReceipt;
        document.getElementById('printButton').addEventListener('click', () => {
            printReceipt();
        });
    </script>
</body>


</html>
