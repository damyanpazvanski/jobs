<template xmlns:v-bind="http://www.w3.org/1999/xhtml" xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div v-bind:class="{ 'col-md-offset-3 col-md-6': trial, 'col-md-10 col-md-offset-1': !trial }">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body alert text-center mt-1 ml-1 mr-1">
                        <p>You are going to send us a message.</p>

                        <label>Leave a message</label>
                        <div class="form-group form-info">
                            <textarea v-model="customPlanMessage" placeholder="Message.."
                                      class="form-control border-gray" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-info" data-dismiss="modal" v-on:click="sendMessage">Send</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="alert alert-default bold">Choose plan</div>

            <div class="card-body">
                <div class="col-md-10 col-md-offset-1">
                    <div class="col-md-6 text-right">
                        <div class="radio radio-primary">
                            <label class="font-weight-bold">
                                <input type="radio" name="trial" :value="true" v-model="trial" checked="checked">
                                <span class="circle"></span>
                                <span class="check"></span>
                                Try it for FREE
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 text-left">
                        <div class="radio radio-inline">
                            <label class="font-weight-bold">
                                <input type="radio" name="trial" :value="false" v-model="trial">
                                <span class="circle"></span>
                                <span class="check"></span>
                                Pay now
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12"><hr></div>

                <div class="col-md-12 text-center alert" v-show="trial">
                    <h3>Try our system for a month.</h3>
                    <h2>Absolutely FREE.</h2>
                </div>

                <div class="col-md-12" v-show="!trial">
                    <div class="card-deck mb-3 text-center plans">
                        <h1 class="mt-0"><small class="">Select the best plan for you</small></h1>

                        <div class="col-md-3">
                            <div class="card mb-4 box-shadow" v-bind:class="{ 'chosen': chosenPlan === 1 }">
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
                                    <button type="button" class="mt-3 btn btn-block" v-on:click="select(1, 'm')"
                                            v-bind:class="{ 'chosenBtn': chosenPlan === 1 && period === 'm' }">$300/Monthly - Pay Annually ($3,600)</button>
                                    <button type="button" class="mb-0 btn btn-block btn-outline-secondary" v-on:click="select(1, 'a')"
                                            v-bind:class="{ 'chosenBtn': chosenPlan === 1 && period === 'a' }">$400/Monthly - Cancel any time</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mb-4 box-shadow" v-bind:class="{ 'chosen': chosenPlan === 2 }">
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
                                    <button type="button" class="btn btn-block btn-success" v-on:click="select(2, 'm')"
                                            v-bind:class="{ 'chosenBtn': chosenPlan === 2 && period === 'm' }">$450/Monthly - Pay Annually ($5,400)</button>
                                    <button type="button" class="mb-0 btn btn-block btn-outline-success" v-on:click="select(2, 'a')"
                                            v-bind:class="{ 'chosenBtn': chosenPlan === 2 && period === 'a' }">$600/Monthly - Cancel any time</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mb-4 box-shadow" v-bind:class="{ 'chosen': chosenPlan === 3 }">
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
                                    <button type="button" class="btn btn-block btn-warning" v-on:click="select(3, 'm')"
                                            v-bind:class="{ 'chosenBtn': chosenPlan === 3 && period === 'm' }">$650/Monthly - Pay Annually ($7,800)</button>
                                    <button type="button" class="mb-0 btn btn-block btn-outline-warning" v-on:click="select(3, 'a')"
                                            v-bind:class="{ 'chosenBtn': chosenPlan === 3 && period === 'a' }">$800/Monthly - Cancel any time</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mb-4 box-shadow">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="mt-0 mb-0 font-weight-normal">Custom plan</h4>
                                </div>
                                <h1 class="card-title pricing-card-title alert"><small class="text-muted">Just ask</small></h1>
                                <div class="card-body">
                                    <ul class="list-unstyled mt-2 mb-4">
                                        <li>If you have different needs</li>
                                        <hr>
                                        <li>Feel free to contact us</li>
                                        <hr>
                                        <li>Help center 24/7</li>
                                    </ul>
                                    <button type="button" class="btn btn-block btn-outline-info"
                                            data-toggle="modal" data-target="#exampleModal">Contact us</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-show="chosenPlan">

                        <v-braintree :token="token" :paypal="true"></v-braintree>

                        <!--<form method="POST">-->
                            <!--<div id="dropin-container"></div>-->
                            <!--<div class="col-md-12">-->
                                <!--<input type="text" class="form-control" placeholder="Enter you card information" />-->
                            <!--</div>-->
                        <!--</form>-->
                    </div>
                </div>

                <div class="form-group mb-0">
                    <div class="col-md-6">
                        <button class="btn btn-lg btn-block btn-outline-secondary border-secondary" v-on:click="backBtn">
                            Back
                        </button>
                    </div>
                    <div class="col-md-6" id="registerBtn">
                        <button class="btn btn-lg btn-block" :disabled="chosenPlan === 0 && trial === false" data-background-color="blue">
                            Register
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
        props: ['token'],
        data() {
            return {
                trial: false,
                chosenPlan: 0,
                period: '',
                customPlanMessage: ''
            }
        },
        methods: {
            backBtn() {
                this.$emit('backBtn');
            },
            select(id, period) {
                this.chosenPlan = id;
                this.period = period;
            },
            register() {
                this.$emit('register', {
                    trial: this.trial,
                    chosenPlan: this.chosenPlan,
                    period: this.period
                });
            },
            sendMessage() {
                this.$emit('sendMessage', {
                    message: this.customPlanMessage
                });
            }
        },
        mounted() {
            // braintree.setup(this.token, 'dropin', {
            //     container: 'dropin-container',
            //     onReady: function () {
            //         $('#registerBtn').removeClass('hidden');
            //     }
            // });
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
