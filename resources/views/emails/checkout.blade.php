<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head></head>
    <body>
    <?php $header = \App\HeaderTransaction::find($id);
    ?>
    <div id="checkoutConfirmPage">
        <div id="checkoutConfirmPageInner">
            Berikut ini merupakan detail pesanan anda:
            <h2>Informasi Pemesan</h2>
            <div class="row">
                <div class="col-6">
                    <div style="font-size:20px;"><strong>Shipping Data</strong></div>
                    <table class="shipment-data table-responsive">
                        <tr>
                            <td>Nama</td>
                            <td>: {{$header->shipping_name}}</td>
                        </tr>

                        <tr>
                            <td>Telepon</td>
                            <td>: {{$header->shipping_telephone}}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: {{$header->shipping_address}}</td>
                        </tr>
                    </table>
                </div>
                <br>
                <div class="col-6">
                    <div style="font-size:20px;"><strong>Billing Data</strong></div>
                    <table class="shipment-data table-responsive">
                        <tr>
                            <td>Nama</td>
                            <td>: {{$header->billing_name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>: {{$header->billing_email}}</td>
                        </tr>
                        <tr>
                            <td>Telepon</td>
                            <td>: {{$header->billing_telephone}}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: {{$header->billing_address}}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <h2>Informasi Pesanan</h2>
            <div id="infoPesanan">
                <table class="data table-bordered" border="1" style="text-align: left">
                    <thead>
                    <tr>
                        <th width="1%">ID</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Price/Unit</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody class="data-info">
                    @foreach($header->details as $detail)
                        <tr>
                            <td widtd="1%">#{{$detail->product_id}}</td>
                            <td>{{$detail->product->code}}</td>
                            <td>{{$detail->product->description}}</td>
                            <td>Rp. {{number_format($detail->price, 0)}},-</td>
                            <td>{{$detail->quantity}}</td>
                            <td>Rp. {{number_format($detail->price * $detail->quantity,0)}},-</td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot style="border: 0">
                    <tr>
                        <th class="lbl sub-total-lbl" colspan="2">Sub Total</th>
                        <th class="val sub-total">Rp. {{number_format($header->subtotal(),0)}},-</th>
                    </tr>
                    <tr>
                        <th class="lbl discount-lbl" colspan="2">Discount</th>
                        <th class="val discount">Rp. {{number_format($header->discount,0)}},-</th>
                    </tr>
                    <tr>
                        <th class="lbl shipment-lbl" colspan="2">Shipment {{$header->shipment_type}}</th>
                        <th class="val shipment">Rp. {{number_format($header->shipment_price, 0)}}</th>
                    </tr>
                    <tr>
                        <th class="lbl total-lbl" colspan="2">Total</th>
                        <th class="val total">Rp. {{number_format($header->grandtotal(),0)}}</th>
                    </tr>
                    </tfoot>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
        <a href="{{url('/cart/checkout/' . $header->id)}}"><button>Detail Pesanan</button></a>
    </body>
</html>