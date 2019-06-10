<template xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div class="">
        <div v-if="page === 1">
            <verify-email @verifyEmail="verifyEmail"></verify-email>
        </div>

        <div v-if="page === 2">
            <div class="col-md-12" style="padding: 0">
                <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12 text-center">
                                <h2 class="result-title">Hello</h2>
                                <h4>Please fill the information below</h4>
                            </div>

                            <div class="form-group row form-info">
                                <label for="first_name" class="col-md-4 col-sm-3 col-form-label text-right">First name <span class="required-field-star">*</span></label>

                                <div class="col-md-6 col-sm-8">
                                    <input id="first_name" v-model="first_name" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row form-info">
                                <label for="last_name" class="col-md-4 col-sm-3 col-form-label text-right">Last name <span class="required-field-star">*</span></label>

                                <div class="col-md-6 col-sm-8">
                                    <input id="last_name" v-model="last_name" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row form-info">
                                <label for="phone" class="col-md-4 col-sm-3 col-form-label text-right">Phone <span class="required-field-star">*</span></label>

                                <div class="col-md-6 col-sm-8">
                                    <input id="phone" v-model="phone" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-11 col-lg-12 col-lg-offset-0 col-sm-11">
                                <div class="form-group form-info col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-info">
                                                CV Browse… <input type="file" @change="uploadCv">
                                            </span>
                                        </span>
                                        <input type="text" class="form-control" readonly disabled placeholder="PDF or Word document"/>
                                        <strong class="invalid row">The PDF format is better for your employer</strong>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12 text-center">
                                <button class="btn btn-info btn-lg" v-on:click="fillCandidateInformation">Continue</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="page === 3">
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
                                If you want to edit your information <a href="/login" class="text-info">Login</a>
                            </div>
                            <div class="col-md-12 text-center register">
                                If you still don't have an account <a href="/candidates/register" class="text-info">Register</a>
                            </div>

                            <!--<div class="col-md-12 text-center register">-->
                                <!--If you want more attempts go to <a href="/candidates/register" class="text-info">Register</a>-->
                            <!--</div>-->
                            <!--<div class="col-md-12 text-center more-attempts">-->
                                <!--Or if you have an account go for <a class="text-info">More Attempts</a>-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="page === 4">
            <questions @finishedQuestions="finishedQuestions" :questions="questions"></questions>
        </div>
        <div v-if="page === 5">
            <div class="col-md-12" style="padding: 0">
                <div class="col-lg-4 col-lg-offset-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12 text-center">
                                <h2 class="result-title">Congratulations</h2>

                                <h4>You completed the test sucsessfully</h4>
                                <h4>We are doing to keep your better result: {{ oldResult }}</h4>
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
    import verifyEmail from './VerifyEmail.vue';

    export default {
        props: ['questions'],
        data() {
            return {
                page: 1,
                email: '',
                first_name: '',
                last_name: '',
                phone: '',
                cv: null,
                attempts: 0,
                allowed_attempts: 0,
                result: 0,
                level: '',
                oldResult: 0,
                badResult: false
            }
        },
        components: {
            verifyEmail
        },
        methods: {
            verifyEmail(response) {
                this.email = response.data.email;
                this.attempts = response.data.attempts;
                this.allowed_attempts = response.data.allowed_attempts;
                this.oldResult = response.data.result;

                if (response.data.is_updated) {
                    this.page += 2;
                    return;
                }

                this.page++;
            },
            fillCandidateInformation() {
                let self = this;
                let formData = new FormData();

                formData.append('email', self.email);
                formData.append('first_name', self.first_name);
                formData.append('last_name', self.last_name);
                formData.append('phone', self.phone);
                formData.append('cv', self.cv);

                axios.post('/ajax/test/candidate-information', formData)
                    .then(function (response) {
                        self.page++;
                    }, function (error) {
                        for (let key in error.response.data.errors) {
                            self.error(key.toUpperCase(), error.response.data.errors[key][0]);
                        }
                    });
            },
            continueToTheTest() {
                if (this.attempts >= this.allowed_attempts) {
                    this.error('ATTEMPTS ERROR', 'You have reached the limit of the attempts');
                    return;
                }

                let self = this;

                axios.post('/ajax/test/attempt', {email: this.email})
                    .then(function (response) {
                        self.page++;
                    }, function (error) {
                        self.error('ERROR', 'Please try again later.');
                    });
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

                        if (response.data.result < self.oldResult) {
                            self.badResult = true;
                        }
                    }, function (error) {
                        for (let key in error.response.data.errors) {
                            self.error(key.toUpperCase(), error.response.data.errors[key][0]);
                        }
                    })
            },
            uploadCv(event) {
                this.cv = event.target.files[0];
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
<style scoped>
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
    .register {
        margin: 10px 0;
    }
    .more-attempts {
        margin-bottom: 10px;
    }
</style>
