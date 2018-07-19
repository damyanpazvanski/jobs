<template>
    <div>
        <div class="alert alert-default bold col-md-6 col-md-offset-3 mb-0">Company Registration</div>

        <user-info
                v-show="page === 1"
                @continueBtn="continueBtn">
        </user-info>

        <company-info
                v-show="page === 2"
                :business-sectors="businessSectors"
                :countries="countries"
                @backBtn="backBtn"
                @continueBtn="continueBtn">
        </company-info>

        <choose-plan
                v-show="page === 3"
                :token="token"
                :plans="plans"
                :couponError="couponError"
                @backBtn="backBtn"
                @continueBtn="continueBtn"
                @register="register"
                @sendMessage="sendMessage">
        </choose-plan>

        <div class="loader-wrapper" v-show="loader">
            <div class="loader">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    import userInfo from './UserInfo.vue';
    import companyInfo from './CompanyInfo.vue';
    import choosePlan from './ChoosePlan.vue';

    export default {
        props: ['plans', 'businessSectors', 'countries', 'token'],
        components: {
            userInfo,
            companyInfo,
            choosePlan
        },
        data() {
            return {
                page: 1,
                couponError: '',
                loader: false,
                data: {}
            }
        },
        methods: {
            register(data) {
                let self = this;

                self.data['card'] = data;
                self.couponError = '';
                self.loader = true;

                axios.post('/ajax/register/store', this.data)
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
            sendMessage(data) {
                let self = this;

                this.data['message'] = data.message;
                self.loader = true;

                axios.post('/ajax/register/send-message', this.data)
                    .then(function (response) {
                        self.notification('Message', 'Successfully sent message.', 'success');

                        setTimeout(function () {
                            self.loader = false;
                            window.location.href = '/';
                        }, 4000);
                    }, function (error) {
                        self.loader = false;

                        for (let key in error.response.data.errors) {
                            self.notification(key.toUpperCase(), error.response.data.errors[key][0]);
                        }
                    });
            },
            continueBtn(data) {
                if (this.page === 1) {
                    this.data['user'] = data.user;
                } else if (this.page === 2) {
                    this.data['company'] = data.company;
                }

                this.page++;
            },
            backBtn() {
                this.page--;
            },
            notification(title, message, group = 'errors') {
                this.$notify({
                    group: group,
                    type: 'error',
                    title: title,
                    text: message
                });
            }
        }
    }
</script>
