<template xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div class="card col-md-7">
        <div class="card-header font-weight-bold" data-background-color="blue">
            <h3 class="title">User Information</h3>
        </div>

        <div class="card-body">
            <div class="form-group row form-info">
                <label for="name" class="col-md-4 col-form-label text-md-right">First name</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" required autofocus>

                    <strong class="invalid">{{ errors['first_name'] }}</strong>
                </div>
            </div>

            <div class="form-group row form-info">
                <label for="name" class="col-md-4 col-form-label text-md-right">Last name</label>

                <div class="col-md-6">
                    <input id="last_name" type="text" class="form-control" required>

                    <strong class="invalid">{{ errors['last_name'] }}</strong>
                </div>
            </div>

            <div class="form-group row form-info">
                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address'</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" required>

                    <strong class="invalid">{{ errors['email'] }}</strong>
                </div>
            </div>

            <div class="form-group row form-info">
                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    <strong class="invalid">{{ errors['password'] }}</strong>
                </div>
            </div>

            <div class="form-group row form-info">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <button class="btn btn-lg btn-block" data-background-color="blue" v-on:click="continueBtn">
                        Continue
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axis from 'axios';

    export default {
        data() {
            return {
                newUser: {
                    'first_name': '',
                    'last_name': '',
                    email: '',
                    password: '',
                    confirmPassword: ''
                },
                errors: []
            }
        },
        methods: {
            continueBtn() {
                let self = this;

                this.$emit('continueBtn');

//                this.checkUser('', this.newUser,
//                    function (response) {
//                        console.log(response);
//                        this.$emit('continueRegistration',{user: this.newUser});
//                }, function (error) {
//                    self.errors = error.response.data.errors;
//                });
            },
            checkUser(url, data, callback, error) {
                axis.post(url, data).then(callback, error);
            }
        },
        mounted() {
            this.errors = this.newUser;
        }
    }
</script>
<style>
    .invalid {
        color: #ff6347;
    }
</style>