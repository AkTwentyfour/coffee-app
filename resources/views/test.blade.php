<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
<link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">


<div id="receipt">
    <div class="header text-center">
        <h3>BKK Cafe</h3>
        <p>Jl. Garuda No.99, Bulak, Babakan, Kec. Kramat,<br>
           Kabupaten Tegal, Jawa Tengah 52181</p>
        <hr>
    </div>

    <table class="receipt-table">
        <thead>
            <tr>
                <th>Menu</th>
                <th>Value</th>
                <th>Prices</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Kopi Susuu</td>
                <td>1</td>
                <td>15.000</td>
            </tr>
            <tr>
                <td>Kopi Hitam</td>
                <td>3</td>
                <td>13.000</td>
            </tr>
        </tbody>
    </table>

    <hr>

    <div class="totals">
        <div class="line"><span>Total</span><span>54.000</span></div>
        <div class="line"><span>Kembali</span><span>6.000</span></div>
        <div class="line"><span>Uang</span><span>60.000</span></div>
    </div>

    <hr>

    <div class="footer text-center">
        <p>Cashier by Ahmad Kamaludin</p>
    </div>
</div>



Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus numquam odit dolor eum cupiditate laboriosam
culpa animi, libero molestias, sit deserunt laudantium expedita rerum fuga dicta officia enim voluptatum eligendi!

<button onclick="printReceipt()">Print</button>

<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
<link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">

<script>
function printReceipt() {
    printJS({
        printable: 'receipt',
        type: 'html',
        css: '{{ asset('css/receipt.css') }}' // pastikan style.css sudah berisi CSS thermal di atas
    })
}
</script>
