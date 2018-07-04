<template xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div class="col-md-6 col-md-offset-3">
        <div class="card">
            <div class="card-header" data-background-color="blue">Verify Your Email</div>
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
