<template xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div class="">
        <notifications group="errors" position="top center" width="80%" classes="alert text-center error-alert"/>
        <div v-if="page === 1">
            <verify-email @verifyEmail="verifyEmail"></verify-email>
        </div>
        <div v-if="page === 2">
            <div class="col-md-12" style="padding: 0">
                <div class="col-lg-4 col-lg-offset-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12 text-center">
                                <h2 class="result-title">Successfully</h2>
                                <h3 class="alert">You have {{ allowed_attempts }} attempts more</h3>
                                <h4>You have completed the test {{ attempts }} time/s</h4>
                            </div>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-info btn-lg" v-on:click="continueToTheTest">Continue</button>
                            </div>
                            <div class="col-md-12 text-center register">
                                If you want more attempts go to <a href="/register" class="text-info">Register</a>
                            </div>
                            <div class="col-md-12 text-center more-attempts">
                                Or if you have an account go for <a class="text-info">More Attempts</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="page === 3">
            <questions @finishedQuestions="finishedQuestions" :questions="questions"></questions>
        </div>
        <div v-if="page === 4">
            <div class="col-md-12" style="padding: 0">
                <div class="col-lg-4 col-lg-offset-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12 text-center">
                                <h2 class="result-title">Congratulations</h2>

                                <h4>You completed the test sucsessfully</h4>
                                <h3 class="alert">Your result is: {{ result }}%</h3>
                                <h4>Your level is: {{ level }}</h4>
                            </div>
                            <div class="results col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-12 text-center col-sm-12 col-xs-12">
                                    <div class="col-md-1 col-sm-1 col-xs-1"></div>
                                    <div class="col-md-2 col-sm-2 col-xs-2">low</div>
                                    <div class="col-md-2 col-sm-2 col-xs-2">below..</div>
                                    <div class="col-md-2 col-sm-2 col-xs-2">middle</div>
                                    <div class="col-md-2 col-sm-2 col-xs-2">above..</div>
                                    <div class="col-md-2 col-sm-2 col-xs-2">high</div>
                                </div>
                                <div class="text-center percents col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-md-1 col-sm-1 col-xs-1"></div>
                                    <div class="col-md-2 col-sm-2 col-xs-2" data-background-color="red">40%</div>
                                    <div class="col-md-2 col-sm-2 col-xs-2" data-background-color="orange">55%</div>
                                    <div class="col-md-2 col-sm-2 col-xs-2" data-background-color="blue">70%</div>
                                    <div class="col-md-2 col-sm-2 col-xs-2" data-background-color="green">85%</div>
                                    <div class="col-md-2 col-sm-2 col-xs-2" data-background-color="purple">100%</div>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="/test" class="btn btn-link" data-background-color="blue">Try again</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    import Notifications from 'vue-notification';
    import verifyEmail from './VerifyEmail.vue';

    Vue.use(Notifications);

    export default {
        props: ['questions'],
        data() {
            return {
                page: 1,
                email: '',
                attempts: 0,
                allowed_attempts: 0,
                result: 0,
                level: ''
            }
        },
        components: {
            verifyEmail
        },
        methods: {
            verifyEmail(response) {
                console.log(response);
                this.email = response.data.email;
                this.attempts = response.data.attempts;
                this.allowed_attempts = response.data.allowed_attempts;
                this.page++;
            },
            continueToTheTest() {
                if (this.attempts >= this.allowed_attempts) {
                    this.error('Attempts error', 'You have reached the limit of the attempts');
                    return;
                }

                this.page++;
            },
            finishedQuestions(questions) {
                let self = this;

                axios.post('/ajax/test', {
                    email: this.email,
                    questions: questions.questions,
                    bonus: questions.bonus
                })
                    .then(function (response) {
                        self.page++;
                        self.level = response.data.level;
                        self.result = response.data.result;
                    }, function (error) {
                        console.log(error);
                    })
            },
            error(title, message) {
                this.$notify({
                    group: 'errors',
                    type: 'error',
                    title: title,
                    text: message
                });
            }
        }
    }
</script>
<style>
    .result-title {
        font-weight: bold;
        color: #00bcd4;
        margin: 20px;
        box-shadow: 0 12px 20px -10px rgba(0, 188, 212, 0.28), 0 4px 20px 0 rgba(0, 0, 0, 0.12), 0 7px 8px -5px rgba(0, 188, 212, 0.2);
    }
    .results {
        margin: 20px 0;
        padding: 0;
    }
    .results > div {
        padding: 0;
    }
    .percents div {
        padding: 6px 0;
    }
    .percents div:nth-of-type(2) {
        border-bottom-left-radius: 10px;
        border-top-left-radius: 10px;
    }
    .percents div:nth-of-type(6) {
        border-bottom-right-radius: 10px;
        border-top-right-radius: 10px;
    }
    h3 {
        font-weight: bold;
    }
    .error-alert {
        margin-top: 20px;
        color: #ffffff;
        text-align: center!important;
        background: linear-gradient(60deg, #ef5350, #e53935);
        box-shadow: 0 12px 20px -10px rgba(244, 67, 54, 0.28), 0 4px 20px 0px rgba(0, 0, 0, 0.12), 0 7px 8px -5px rgba(244, 67, 54, 0.2);
    }
    .register {
        margin: 10px 0;
    }
    .more-attempts {
        margin-bottom: 10px;
    }
</style>