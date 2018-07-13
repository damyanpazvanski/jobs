<template xmlns:v-on="http://www.w3.org/1999/xhtml">
        <div class="col-md-12" style="padding: 0">
            <div class="col-lg-4 col-lg-offset-4">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12 text-center">
                            <h2 class="result-title">Verify Your Email</h2>
                        </div>

                        <div class="form-group form-info">
                            <div class="col-md-10 col-md-offset-1">
                                <input type="email" required class="form-control" v-model="email" placeholder="Your email">
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-block btn-lg btn-info" v-on:click="verify">VERIFY</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>
<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                email: '',
                emailRegex: /^\S+@\S+\.\S+$/
            }
        },
        methods: {
            verify() {
                let self = this;

                if (!self.emailRegex.test(self.email)) {
                    this.$notify({
                        group: 'errors',
                        type: 'error',
                        title: 'EMAIL',
                        text: 'The email must be a valid email address.'
                    });
                    return;
                }

                axios.post('/ajax/test/email', {email: this.email})
                    .then(function (response) {
                        self.$emit('verifyEmail', response);
                    }, function (error) {
                        this.$notify({
                            group: 'errors',
                            type: 'error',
                            title: 'EMAIL',
                            text: error.response.data.errors.email[0]
                        });
                    });
            }
        }
    }
</script>
