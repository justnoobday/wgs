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
        <form class="row">
            {{ csrf_field() }}
            <div class="col-md-6">
                <label for="invoice_date" class="form-label">Invoice Date</label>
                <input type="date" class="form-control" id="invoice_date">
            </div>
            <div class="col-md-6">
                <label for="ship_to" class="form-label">Ship To</label>
                <input type="textarea" class="form-control" id="ship_to">
            </div>
            <div class="col-md-6">
                <label for="to" class="form-label">To</label>
                <input type="textarea" class="form-control" id="to">
            </div>
            <div class="col-md-6">
                <label for="payment" class="form-label">Payment Type</label>
                <br>
                <select class="form-select" aria-label="Default select example" id="payment">
                    <option value="CASH">Cash</option>
                    <option value="PAY LATER">Pay Later</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="sales" class="form-label">Sales Name</label>
                <br>
                <select class="form-select" aria-label="Default select example" id="sales">
                    <?php foreach ($sales as $s) { ?>
                        <option value="<?= $s->id_sales ?>"><?= $s->sales_name ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-12 mb-5">
                <label for="courier" class="form-label">Courier</label>
                <br>
                <select class="form-select" aria-label="Default select example" id="courier">
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
                            <tr>
                                <td colspan="5">Data Kosong</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
<script type="text/javascript" src="{{ asset('/bootstrap/js/bootstrap.js') }}"></script>

<body>

</body>

</html>