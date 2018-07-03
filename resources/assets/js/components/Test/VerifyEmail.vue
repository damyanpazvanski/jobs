<template xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div class="col-md-6 col-md-offset-3">
        <div class="card">
            <div class="card-header" data-background-color="blue">Verify Your Email</div>
            <h5 class="invalid text-center">{{ error }}</h5>
            <div class="card-body">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group form-info">
                        <input type="email" required class="form-control" v-model="email" placeholder="Your email">
                        <button class="btn btn-block btn-lg btn-info" v-on:click="verify">VERIFY</button>
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
                error: '',
                emailRegex: /^\S+@\S+\.\S+$/
            }
        },
        methods: {
            verify() {
                let self = this;

                if (!self.emailRegex.test(self.email)) {
                    self.error = 'The email must be a valid email address.';
                    return;
                }

                axios.post('/ajax/test/email', {email: this.email})
                    .then(function (response) {
                        self.$emit('verifyEmail', response);
                    }, function (error) {
                        self.error = error.response.data.errors.email[0];
                    });
            }
        }
    }
</script>
