<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="p-5">
    <p>You must pay {{ Auth::user()->register_price }}</p>
    <form method="POST" action="{{ route('success-payment') }}" class="form-payment">
        @csrf
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="coin-field" class="col-form-label">Coin</label>
            </div>
            <div class="col-auto">
                <input type="number" id="coin-field" name="coin" class="form-control"
                    aria-describedby="passwordHelpInline" value="{{ old('coin') }}">
            </div>
        </div>
        <button type="button" class="btn-primary" id="pay-btn">Pay</button>
    </form>

    <!-- Button trigger modal -->
    <button id="underpaid-btn" type="button" class="btn btn-primary invisible" data-bs-toggle="modal"
        data-bs-target="#staticBackdrop">
        Launch static backdrop modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Underpaid</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="modal-content-text-1"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <button id="overpaid-btn" type="button" class="btn btn-primary invisible" data-bs-toggle="modal"
        data-bs-target="#staticBackdrop2">
        Launch static backdrop modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Overpaid</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="modal-content-text-2"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="yes-btn" class="btn btn-secondary" data-bs-dismiss="modal">Yes</button>
                    <button type="button" class="btn btn-primary">No</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        payBtn = document.querySelector('#pay-btn')
        register_price = {{ Auth::user()->register_price }};

        payBtn.addEventListener('click', function() {
            coins = parseInt(document.querySelector('#coin-field').value)

            if(coins == register_price){
                document.querySelector('.form-payment').submit()
            } else if(coins < register_price) {
                document.querySelector('.modal-content-text-1').textContent = "You are still underpaid " + (register_price - coins);
                document.querySelector('#underpaid-btn').click();
            } else if(coins > register_price) {
                document.querySelector('.modal-content-text-2').textContent = "Sorry you overpaid " + (coins - register_price) + " , would you like to enter a balance?" ;
                document.querySelector('#overpaid-btn').click();

                document.querySelector('#yes-btn').addEventListener('click', function() {
                    document.querySelector('.form-payment').submit()
                });
            }
        })
    </script>
</body>

</html>