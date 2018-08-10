<template xmlns:v-bind="http://www.w3.org/1999/xhtml" xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div class="col-md-10 col-md-offset-1">
        <div class="loader-wrapper" v-show="loader">
            <div class="loader">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>

        <div class="card">
            <div class="alert alert-default bold text-center">Choose plan</div>

            <div class="card-body">
                <div class="col-md-12">
                    <div class="card-deck mb-3 text-center plans">
                        <h1 class="mt-0"><small class="">Select the best plan for you</small></h1>

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card mb-4 box-shadow" v-bind:class="{ 'chosen': chosenPlanIndex === 1 }">
                                <div class="card-header" data-background-color>
                                    <h4 class="mt-0 mb-0 font-weight-normal">Beginners</h4>
                                </div>
                                <h1 class="card-title pricing-card-title">$300 <small class="text-muted">/ mo</small></h1>
                                <div class="card-body">
                                    <ul class="list-unstyled mt-2 mb-4">
                                        <li>Limit up to 10 jobs</li>
                                        <hr>
                                        <li>Limit up to 200 candidates</li>
                                        <hr>
                                        <li>Help center access</li>
                                    </ul>
                                    <button type="button" class="mt-3 btn btn-block" v-on:click="select(1, 'small', 'annually')"
                                            v-bind:class="{ 'chosenBtn': chosenPlanIndex === 1 && period === 'annually' }">$300/Monthly - Annually ($3,600)</button>
                                    <button type="button" class="mb-0 btn btn-block btn-outline-secondary" v-on:click="select(1, 'small', 'monthly')"
                                            v-bind:class="{ 'chosenBtn': chosenPlanIndex === 1 && period === 'monthly' }">$400/Monthly - Cancel any time</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card mb-4 box-shadow" v-bind:class="{ 'chosen': chosenPlanIndex === 2 }">
                                <div class="card-header" data-background-color="green">
                                    <h4 class="mt-0 mb-0 font-weight-normal">Ordinary</h4>
                                </div>
                                <h1 class="card-title pricing-card-title">$450 <small class="text-muted">/ mo</small></h1>
                                <div class="card-body">
                                    <ul class="list-unstyled mt-2 mb-4">
                                        <li>No limit on jobs</li>
                                        <hr>
                                        <li>Limit up to 2000 candidates</li>
                                        <hr>
                                        <li>Help center access</li>
                                    </ul>
                                    <button type="button" class="btn btn-block btn-success" v-on:click="select(2, 'pro', 'annually')"
                                            v-bind:class="{ 'chosenBtn': chosenPlanIndex === 2 && period === 'annually' }">$450/Monthly - Annually ($5,400)</button>
                                    <button type="button" class="mb-0 btn btn-block btn-outline-success" v-on:click="select(2, 'pro', 'monthly')"
                                            v-bind:class="{ 'chosenBtn': chosenPlanIndex === 2 && period === 'monthly' }">$600/Monthly - Cancel any time</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card mb-4 box-shadow" v-bind:class="{ 'chosen': chosenPlanIndex === 3 }">
                                <div class="card-header" data-background-color="orange">
                                    <h4 class="mt-0 mb-0 font-weight-normal">Pro</h4>
                                </div>
                                <h1 class="card-title pricing-card-title">$650 <small class="text-muted">/ mo</small></h1>
                                <div class="card-body">
                                    <ul class="list-unstyled mt-2 mb-3">
                                        <li>No limit on jobs</li>
                                        <hr>
                                        <li>Limit up to 5000 candidates</li>
                                        <hr>
                                        <li>Phone and email support</li>
                                        <hr>
                                        <li>Help center access</li>
                                    </ul>
                                    <button type="button" class="btn btn-block btn-warning" v-on:click="select(3, 'enterprise', 'annually')"
                                            v-bind:class="{ 'chosenBtn': chosenPlanIndex === 3 && period === 'annually' }">$650/Monthly - Annually ($7,800)</button>
                                    <button type="button" class="mb-0 btn btn-block btn-outline-warning" v-on:click="select(3, 'enterprise', 'monthly')"
                                            v-bind:class="{ 'chosenBtn': chosenPlanIndex === 3 && period === 'monthly' }">$800/Monthly - Cancel any time</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" v-show="chosenPlanIndex">
                        <div class="col-md-3">
                            <div class="col-md-12 col-sm-12 col-xs-12 alert alert-info pt-0 pb-0 pl-0 pr-0 text-right">
                                <div class="col-sm-3 col-xs-3 hidden-md hidden-lg" style="height: 50px">
                                    <i class="material-icons animated-vertical-arrow">arrow_downward</i>
                                </div>
                                <div class="col-md-7 col-sm-9 col-xs-9 pt-0 pb-0 pl-0 pr-0 text-center">
                                    <h5>If you want to pay with PayPal click here!</h5>
                                </div>
                                <div class="col-md-5 hidden-xs hidden-sm">
                                    <i class="material-icons animated-horizontal-arrow">arrow_right_alt</i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <form method="post">
                                <div class="col-md-8">
                                    <div id="dropin-container"></div>
                                    <div class="mt-1 form-group form-info">
                                        <label class="col-md-2 col-form-label text-right">Coupon: </label>
                                        <div class="col-md-10">
                                            <input type="text" v-model="coupon" class="form-control" :class="{'invalid-input': couponError}">
                                        </div>
                                    </div>
                                    <div class="text-center invalid">{{ couponError }}</div>
                                </div>
                                <div class="col-md-4 pt-0">
                                    <button id="payment-button" class="btn btn-info" type="submit" v-if="!paymentData">Check The Card</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-0">
                    <div class="col-md-12">
                        <button class="btn btn-lg btn-block" v-if="paymentData" data-background-color="blue" v-on:click="change">
                            Change
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import braintree from 'braintree-web';

    export default {
        props: ['token', 'couponError'],
        data() {
            return {
                chosenPlanIndex: 0,
                chosenPlanName: '',
                period: '',
                coupon: '',
                paymentData: null,
                loader: false
            }
        },
        methods: {
            select(id, name, period) {
                this.chosenPlanIndex = id;
                this.chosenPlanName = name;
                this.period = period;
            },
            change() {
                let self = this;

                self.couponError = '';
                self.loader = true;

                axios.put('/ajax/subscriptions', {
                    chosenPlanName: this.chosenPlanName,
                    period: this.period,
                    coupon: this.coupon,
                    paymentData: this.paymentData
                })
                    .then(function (response) {
                        self.notification('Message', 'Successfully created.', 'success');

                        setTimeout(function () {
                            self.loader = false;
                            window.location.href = '/companies/login';
                        }, 4000);
                    }, function (error) {
                        self.loader = false;

                        if (error.response.data.errors.coupon) {
                            self.couponError = error.response.data.errors.coupon[0];
                            return;
                        }

                        self.notification('ERROR', 'We have a problem, please try again later');
                    });
            },
            notification(title, message, group = 'errors') {
                this.$notify({
                    group: group,
                    type: 'error',
                    title: title,
                    text: message
                });
            }
        },
        mounted() {
            let self = this;
            braintree.setup(this.token, 'dropin', {
                container: 'dropin-container',
                onPaymentMethodReceived: function (paymentMethod) {
                    self.paymentData = paymentMethod;
                }
            });
        }
    }
</script>
<style>
    .chosen {
        border: 2px solid #01ff00;
    }
    .chosenBtn {
        background: #01e600 !important;
        border: 1px solid #01ff00 !important;
        color: #FFFFFF!important;
    }
    .plans .card {
        height: 480px;
        justify-content: space-between;
        flex-direction: column;
        display: flex;
        padding: 10px;
    }
</style>
