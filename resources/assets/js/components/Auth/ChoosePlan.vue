<template xmlns:v-bind="http://www.w3.org/1999/xhtml" xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div v-bind:class="{ 'col-md-6': trial, 'col-md-12': !trial }">
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

                        <div class="card mb-4 box-shadow">
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
                                <button type="button" class="btn btn-block btn-outline-secondary">Get started</button>
                            </div>
                        </div>
                        <div class="card mb-4 box-shadow">
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
                                <button type="button" class="btn btn-block btn-outline-success">Choose</button>
                            </div>
                        </div>
                        <div class="card mb-4 box-shadow">
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
                                <button type="button" class="btn btn-block btn-outline-warning">Choose</button>
                            </div>
                        </div>
                        <div class="card mb-2 box-shadow">
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
                                <button type="button" class="btn btn-block btn-outline-info">Contact us</button>
                            </div>
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
                        <button class="btn btn-lg btn-block nv-disabled" disabled data-background-color="blue">
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
                trial: true
            }
        },
        methods: {
            backBtn() {
                this.$emit('backBtn');
            }
        }
    }
</script>