<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('/bootstrap/css/bootstrap.css') }}">
</head>

<body>
    <?php foreach ($data_invoice as $dat_inv) { ?>
        <div class="container">
            <br>
            <form class="row" action="{{url('cari')}}" method="POST">
                {{ csrf_field() }}
                <div class="col-mb-3">
                    <input type="text" class="form-control" id="no_invoice" placeholder="No Invoice" name="no_invoice">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </form>
        </div>
        <div class="container">
            <br>
            <form class="row" action="{{url('cari/save')}}" method="POST">
                {{ csrf_field() }}
                <div class="col-md-6">
                    <label for="invoice_date" class="form-label">Invoice Date</label>
                    <input type="date" class="form-control" id="invoice_date" value="<?= $dat_inv->invoice_date ?>" name="invoice_date">
                </div>
                <div class="col-md-6">
                    <label for="ship_to" class="form-label">Ship To</label>
                    <input type="textarea" class="form-control" id="ship_to" value="<?= $dat_inv->ship_to ?>" name="ship_to">
                </div>
                <div class="col-md-6">
                    <label for="to" class="form-label">To</label>
                    <input type="textarea" class="form-control" id="to" value="<?= $dat_inv->to ?>" name="to">
                </div>
                <div class="col-md-6">
                    <label for="payment" class="form-label">Payment Type</label>
                    <br>
                    <select class="form-select" aria-label="Default select example" id="payment" name="payment_type">
                        <option selected value="<?= $dat_inv->payment_type ?>"><?= $dat_inv->payment_type ?></option>
                        <option value="CASH">Cash</option>
                        <option value="PAY LATER">Pay Later</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="sales" class="form-label">Sales Name</label>
                    <br>
                    <select class="form-select" aria-label="Default select example" id="sales" name="id_sales">
                        <option selected value="<?= $dat_inv->id_sales ?>"><?= $dat_inv->sales_name ?></option>
                        <?php foreach ($sales as $s) { ?>
                            <option value="<?= $s->id_sales ?>"><?= $s->sales_name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-12 mb-5">
                    <label for="courier" class="form-label">Courier</label>
                    <br>
                    <select class="form-select" aria-label="Default select example" id="courier" name="id_courier">
                        <option selected value="<?= $dat_inv->id_courier ?>"><?= $dat_inv->courier_name ?></option>
                        <?php foreach ($courier as $c) { ?>
                            <option value="<?= $c->id_courier ?>"><?= $c->courier_name ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="container">
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">item</th>
                                    <th scope="col">Weight(Kg)</th>
                                    <th scope="col">QTY</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($data_barang == null) { ?>
                                    <tr>Data Kosong</tr>
                                <?php } else { ?>
                                    <?php foreach ($data_barang as $dat_brg) { ?>
                                        <tr>
                                            <td><?= $dat_brg->item ?></td>
                                            <td><?= $dat_brg->weight ?></td>
                                            <td><?= $dat_brg->qty ?></td>
                                            <td><?= $dat_brg->unit_price ?></td>
                                            <td><?= $dat_brg->unit_price * $dat_brg->qty ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-6">
                        <input type="hidden" name="id_invoice" value="<?= $dat_inv->id_invoice ?>">
                        <h3>Sub Total : <?= $dat_brg->unit_price * $dat_brg->qty ?></h3>
                        <h3>Courier Fee : <?= $dat_inv->courier_fee * $dat_brg->qty ?></h3>
                        <h3>Total : <?= ($dat_brg->unit_price * $dat_brg->qty) + ($dat_inv->courier_fee * $dat_brg->qty) ?></h3>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            <?php } ?>
            </form>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
</body>
<script type="text/javascript" src="{{ asset('/bootstrap/js/bootstrap.js') }}"></script>

<body>

</body>

</html>