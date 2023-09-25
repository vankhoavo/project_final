@extends('client.master')
@section('content')
    <!-- checkout-section -->
    <section class="checkout-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 left-column">
                    <div class="inner-box">
                        <div class="billing-info">
                            <h4 class="sub-title">Billing Details</h4>
                            <form action="#" method="post" class="billing-form mb-n4">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-12 form-group">
                                        <label>Full Name</label>
                                        <div class="field-input">
                                            <input type="text" name="first_name">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <label>Phone Number</label>
                                        <div class="field-input">
                                            <input type="email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <label>Address</label>
                                        <div class="field-input">
                                            <input type="text" name="address" class="address">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <label>Town/City</label>
                                        <div class="field-input">
                                            <input type="text" name="town_city">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="additional-info">
                            <div class="note-book">
                                <label>Order Notes</label>
                                <textarea name="note_box" placeholder="Notes about your order, e.g. special notes for your delivery"></textarea>
                            </div>
                        </div>
                        <div class="payment-info mt-4">
                            <h4 class="sub-title">Payment Proccess</h4>
                            <div class="payment-inner">
                                <div class="option-block">
                                    <div class="custom-controls-stacked">
                                        <label class="custom-control material-checkbox">
                                            <input type="checkbox" class="material-control-input">
                                            <span class="material-control-indicator"></span>
                                            <span class="description">Direct bank transfer</span>
                                        </label>
                                    </div>
                                    <p>Please send a check to Store Name, Store Street, Store Town, Store State / County,
                                        Store Postcode.</p>
                                </div>
                                <div class="option-block">
                                    <div class="custom-controls-stacked">
                                        <label class="custom-control material-checkbox">
                                            <input type="checkbox" class="material-control-input">
                                            <span class="material-control-indicator"></span>
                                            <span class="description">Paypal<a href="checkout.html">What is
                                                    paypal?</a></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="btn-box">
                                    <a href="checkout.html" class="theme-btn-two">Place Your Order<i
                                            class="flaticon-right-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 right-column">
                    <div class="inner-box">
                        <div class="order-info mb-n1">
                            <h4 class="sub-title">Your Order</h4>
                            <div class="order-product">
                                <ul class="order-list clearfix">
                                    <li class="title clearfix">
                                        <p>Product</p>
                                        <span>Total</span>
                                    </li>
                                    <li>
                                        <div class="single-box clearfix">
                                            <img src="/client/images/resource/shop/order-1.jpg" alt="">
                                            <h6>Side-Tie Tank</h6>
                                            <span>$35.00</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-box clearfix">
                                            <img src="/client/images/resource/shop/order-2.jpg" alt="">
                                            <h6>Must-Have Easy Tank</h6>
                                            <span>$25.00</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-box clearfix">
                                            <img src="/client/images/resource/shop/order-3.jpg" alt="">
                                            <h6>Woven Crop Cami</h6>
                                            <span>$90.00</span>
                                        </div>
                                    </li>
                                    <li class="order-total clearfix">
                                        <h6>Order Total</h6>
                                        <span>$150.50</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- checkout-section end -->
@endsection
@section('js')
@endsection
