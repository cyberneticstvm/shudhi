<div class="fixed-bottom shadow-sm osahan-footer p-3">
    <div class="row m-0 footer-menu overflow-hiddem bg-black rounded shadow links">
        <div class="col-3 p-0 text-center">
            <a class="p-2 d-inline-block {{ (request()->segment(1) == '') ? 'text-warning' : 'text-white' }} w-100" href="{{ route('index') }}">
                <span><i class="bi bi-house h4"></i></span>
                <p class="m-0 small">HOME</p>
            </a>
        </div>
        <div class="col-3 p-0 text-center">
            <a class="p-2 d-inline-block {{ (request()->segment(1) == 'cart') ? 'text-warning' : 'text-white' }} w-100" href="/cart">
                <span><i class="bi bi-basket h4"></i></span>
                <p class="m-0 small">MY CART</p>
            </a>
        </div>
        <div class="col-3 p-0 text-center">
            <a class="p-2 d-inline-block {{ (request()->segment(1) == 'orders') ? 'text-warning' : 'text-white' }} w-100" href="/orders">
                <span><i class="bi bi-gift h4"></i></span>
                <p class="m-0 small">MY ORDERS</p>
            </a>
        </div>
        <div class="col-3 p-0 text-center">
            <a class="p-2 d-inline-block {{ (request()->segment(1) == 'profile') ? 'text-warning' : 'text-white' }} w-100" href="{{ (Auth::user()) ? route('account') : route('login') }}">
                <span><i class="bi bi-person h4"></i></span>
                <p class="m-0 small">ACCOUNT</p>
            </a>
        </div>
    </div>
</div>