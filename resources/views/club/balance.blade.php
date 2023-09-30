@extends('layouts.app')

@section('content')
<style>
  .overflow-auto {
    overflow-x: auto;
}

.overflow-auto table th {
    text-align: center;
}

.clen-box {
    padding: 25px 20px;
    margin: 10px;
}

.clen-box button {
    border: 0 !important
}

.clen-box h3 {
    font-weight: bold;
}

.clr-time {
    color: #929598;
}

.no-event {
    border: 2px dashed #737679;
    background: transparent;
    min-height: 200px;
}

.no-event .fa {
    font-size: 28px;
}

.content-area select {
    border: 1px solid #fff !important
}

.balance-input {
    background: #2B3238 !important;
    border: none !important;
    border-radius: 5px;
    text-align: center;
    padding: 0 70px !important;
}

.bg-primary {
    border-radius: 2px;
    background: #00b3ff;
}

.available-balance,
.pending-balance {
    color: #FFF;
    font-size: 24px;
    font-weight: 700;
    letter-spacing: 0.775px;
    padding: 12px 30px;
}

.balance {
    font-size: 24px;
}

.pending-balance {
    font-size: 20px;
    letter-spacing: 0.675px;
}

.pending-balance,
.bdb {
    border-bottom: 2px solid #8f9193;
}

.balance-data-info {
    color: #7b7e81;
    text-transform: uppercase;
    font-weight: 700;
    letter-spacing: 0.475px;
}

.balance-data {
    background: #252A2F;
    border-radius: 5px;
    margin-top: 35px;
    padding: 12px 30px;
    font-size: 18px;
}

.width100 {
    width: 80px
}

.letter-spa {
    letter-spacing: 1px;
    font-weight: 500;
}

.width750 {
    min-width: 800px;
}

.widthdrow-btn {
    background: #fff !important;
    color: #000 !important
}

@media only screen and (max-width:767px) {
    .balance-input {
        padding: 0 20px !important
    }
}
</style>
<div class="right-panel p-4">
    <div class="d-lg-flex pb-4 d-md-block">
        <div class="flex-grow-1 d-md-flex d-block align-items-center mb-4 mb-md-4 mb-lg-0">
            <h2 class="text-uppercase me-5 mb-3 mb-sm-3 mb-md-0">BALANCE</h2>
            <form action="">
                <div class="form-group">
                    <input type="search" class="form-control mb-0 balance-input" placeholder="Mon 22 2023 - Sun 29 2023" />
                </div>
            </form>
        </div>
        <div class="flex-shrink-0">
            <a href="#" class="btn button btn3 widthdrow-btn">Withdraw</a>
        </div>
    </div>


    <div class="py-4">
        <h2 class="text-center balance pb-4">$2,780.00</h2>
        <div class="overflow-auto">
            <div class="width750 px-4">
                <div class="d-flex justify-content-between available-balance bg-primary">
                    <div>Available</div>
                    <div>$128.00</div>
                </div>
                <div class="d-flex justify-content-between pending-balance">
                    <div>Pending</div>
                    <div>$64.00</div>
                </div>
                <div class="balance-data">
                    <div class="bdb px-3 pb-2">
                        <div class="d-flex balance-data-info">
                            <div class="flex-grow-1 d-flex">
                                <div class="col-3">JAN 14, 2022</div>
                                <div class="col-2">Rate</div>
                                <div class="col-2">Club fee</div>
                                <div class="col-5">Offseason fee</div>
                            </div>
                            <div class="width100">NET</div>
                        </div>
                        <div class="d-flex balance-data-info letter-spa text-light">
                            <div class="flex-grow-1 d-flex">
                                <div class="col-3">3:41 PM</div>
                                <div class="col-2">$80.00</div>
                                <div class="col-2">-$16.00</div>
                                <div class="col-5">-$8.00</div>
                            </div>
                            <div class="width100">$56.00</div>
                        </div>
                    </div>

                    <div class="d-flex text-light px-3 pt-2">
                        <div class="flex-grow-1 d-flex">
                            <div class="letter-spa"><strong>Booking from Makenna Meyers</strong></div>
                        </div>
                        <div class="width100">Scheduled</div>
                    </div>


                </div>
                <div class="balance-data">
                    <div class="bdb px-3 pb-2">
                        <div class="d-flex balance-data-info">
                            <div class="flex-grow-1 d-flex">
                                <div class="col-3">JAN 14, 2022</div>
                                <div class="col-2">Rate</div>
                                <div class="col-2">Club fee</div>
                                <div class="col-5">Offseason fee</div>
                            </div>
                            <div class="width100">NET</div>
                        </div>
                        <div class="d-flex balance-data-info letter-spa text-light">
                            <div class="flex-grow-1 d-flex">
                                <div class="col-3">3:41 PM</div>
                                <div class="col-2">$80.00</div>
                                <div class="col-2">-$16.00</div>
                                <div class="col-5">-$8.00</div>
                            </div>
                            <div class="width100">$56.00</div>
                        </div>
                    </div>

                    <div class="d-flex text-light px-3 pt-2">
                        <div class="flex-grow-1 d-flex">
                            <div class="letter-spa"><strong>Booking from Makenna Meyers</strong></div>
                        </div>
                        <div class="width100">Scheduled</div>
                    </div>


                </div>
                <div class="balance-data">
                    <div class="bdb px-3 pb-2">
                        <div class="d-flex balance-data-info">
                            <div class="flex-grow-1 d-flex">
                                <div class="col-3">JAN 14, 2022</div>
                                <div class="col-2">Rate</div>
                                <div class="col-2">Club fee</div>
                                <div class="col-5">Offseason fee</div>
                            </div>
                            <div class="width100">NET</div>
                        </div>
                        <div class="d-flex balance-data-info letter-spa text-light">
                            <div class="flex-grow-1 d-flex">
                                <div class="col-3">3:41 PM</div>
                                <div class="col-2">$80.00</div>
                                <div class="col-2">-$16.00</div>
                                <div class="col-5">-$8.00</div>
                            </div>
                            <div class="width100">$56.00</div>
                        </div>
                    </div>

                    <div class="d-flex text-light px-3 pt-2">
                        <div class="flex-grow-1 d-flex">
                            <div class="letter-spa"><strong>Booking from Makenna Meyers</strong></div>
                        </div>
                        <div class="width100">Scheduled</div>
                    </div>


                </div>
            </div>

        </div>

    </div>


  </div>
@endsection