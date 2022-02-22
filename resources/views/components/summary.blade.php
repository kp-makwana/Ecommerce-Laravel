<div class="">
    <div>
        <h5><b>Summary</b></h5>
    </div>
    <hr>
    <div class="row py-2">
        <div class="col" style="padding-left:0;">ITEMS ({{ $summary['total_item'] }})</div>
        <div class="col text-right">&#8377;{{ $summary['price'] }}</div>
    </div>
    <div class="row py-2">
        <div class="col" style="padding-left:0;">Discount</div>
        <div class="col text-right">&#8377;{{ $summary['discount'] }}</div>
    </div>
    <div class="row py-2">
        <div class="col" style="padding-left:0;">Delivery Charges
            <div class="text-muted small">
                Free Delivery Order > 499
            </div>

        </div>
        <div class="col text-right">&#8377;{{ $summary['delivery_Charges'] }}</div>
    </div>
    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
        <div class="col">TOTAL PRICE</div>
        <div class="col text-right">&#8377;{{ $summary['total_price'] }}</div>
    </div>
    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
        <div class="col text-success">You will save ₹{{ $summary['discount'] }} on this order</div>
    </div>
</div>
