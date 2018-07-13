<template xmlns:v-bind="http://www.w3.org/1999/xhtml" xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div v-bind:class="{ 'col-md-6': trial, 'col-md-12': !trial }">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body alert mb-4 col-md-8 col-md-offset-2 text-center">
                        <p>You are going to send us a message.</p>
                        <p>Are you sure?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-info" data-dismiss="modal" v-on:click="sendMessage">Send</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header font-weight-bold" data-background-color="blue">
                <h3 class="title">Choose plan</h3>
            </div>
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
                    <div class="card-deck mb-3 text-center">

                        <div class="card mb-4 box-shadow" v-bind:class="{ 'chosen': chosenPlan == 1 }">
                            <div class="card-header" data-background-color>
                                <h4 class="my-0 font-weight-normal">Beginners</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title">$15 <small class="text-muted">/ mo</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>20 users included</li>
                                    <li>10 GB of storage</li>
                                    <li>Priority email support</li>
                                    <li>Help center access</li>
                                </ul>
                                <button type="button" class="btn btn-block btn-outline-secondary" v-on:click="select(1)"
                                        v-bind:class="{ 'chosenBtn': chosenPlan == 1 }">Get started</button>
                            </div>
                        </div>
                        <div class="card mb-4 box-shadow" v-bind:class="{ 'chosen': chosenPlan == 2 }">
                            <div class="card-header" data-background-color="green">
                                <h4 class="my-0 font-weight-normal">Ordinary</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title">$29 <small class="text-muted">/ mo</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>30 users included</li>
                                    <li>15 GB of storage</li>
                                    <li>Phone and email support</li>
                                    <li>Help center access</li>
                                </ul>
                                <button type="button" class="btn btn-block btn-outline-success" v-on:click="select(2)"
                                        v-bind:class="{ 'chosenBtn': chosenPlan == 2 }">Choose</button>
                            </div>
                        </div>
                        <div class="card mb-4 box-shadow" v-bind:class="{ 'chosen': chosenPlan == 3 }">
                            <div class="card-header" data-background-color="orange">
                                <h4 class="my-0 font-weight-normal">Pro</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title">$29 <small class="text-muted">/ mo</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>30 users included</li>
                                    <li>15 GB of storage</li>
                                    <li>Phone and email support</li>
                                    <li>Help center access</li>
                                </ul>
                                <button type="button" class="btn btn-block btn-outline-warning" v-on:click="select(3)"
                                        v-bind:class="{ 'chosenBtn': chosenPlan == 3 }">Choose</button>
                            </div>
                        </div>
                        <div class="card mb-4 box-shadow">
                            <div class="card-header" data-background-color="blue">
                                <h4 class="my-0 font-weight-normal">Enterprise</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title">$29 <small class="text-muted">/ mo</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>30 users included</li>
                                    <li>15 GB of storage</li>
                                    <li>Phone and email support</li>
                                    <li>Help center access</li>
                                </ul>
                                <button type="button" class="btn btn-block btn-outline-info"
                                        data-toggle="modal" data-target="#exampleModal">Contact us</button>
                            </div>
                        </div>
                    </div>
                    <div v-show="chosenPlan">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Enter you card information" />
                        </div>
                    </div>
                </div>

                <div class="form-group mb-0">
                    <div class="col-md-6">
                        <button class="btn btn-lg btn-block btn-outline-secondary border-secondary" v-on:click="backBtn">
                            Back
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-lg btn-block" :disabled="chosenPlan == 0 && trial == false" data-background-color="blue">
                            Register
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                trial: true,
                chosenPlan: 0
            }
        },
        methods: {
            backBtn() {
                this.$emit('backBtn');
            },
            select(id) {
                this.chosenPlan = id;
            },
            register() {
                this.$emit('register');
            },
            sendMessage() {
                console.log(242);
                window.location.replace("/");
            }
        }
    }
</script>
<style>
    .chosen {
        border: 2px solid #01ff00;
    }
    .chosenBtn {
        background: #01ff00 !important;
        border: 1px solid #01ff00 !important;
        color: #FFFFFF!important;
    }
</style>