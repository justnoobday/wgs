<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href=" {{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <br>
        <form class="row" action="/cari">
            <div class="col-mb-3">
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="No Invoice">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>
    </div>
    <div class="container">
        <br>
        <form class="row">
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
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="sales" class="form-label">Sales Name</label>
                <br>
                <select class="form-select" aria-label="Default select example" id="sales">
                    @foreach($sales as $s)
                    <option value="{{$s->sales_name}}">{{$s->sales_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 mb-5">
                <label for="courier" class="form-label">Courier</label>
                <br>
                <select class="form-select" aria-label="Default select example" id="courier">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>

            <div class="container">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
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

</html>