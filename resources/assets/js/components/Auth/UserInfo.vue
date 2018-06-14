<template xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div class="card col-md-7" v-if="user">
        <div class="card-header font-weight-bold" data-background-color="blue">
            <h3 class="title">User Information</h3>
        </div>

        <div class="card-body">
            <div class="form-group row form-info">
                <label for="first_name" class="col-md-4 col-form-label text-md-right">First name</label>

                <div class="col-md-6">
                    <input id="first_name" @blur="check(user.firstName, 'firstName')"
                           type="text" v-model="user.firstName" class="form-control" required autofocus>

                    <strong class="invalid">{{ errors['firstName'] }}</strong>
                </div>
            </div>

            <div class="form-group row form-info">
                <label for="last_name" class="col-md-4 col-form-label text-md-right">Last name</label>

                <div class="col-md-6">
                    <input id="last_name" @blur="check(user.lastName, 'lastName')"
                           type="text" v-model="user.lastName" class="form-control" required>

                    <strong class="invalid">{{ errors['lastName'] }}</strong>
                </div>
            </div>

            <div class="form-group row form-info">
                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address'</label>

                <div class="col-md-6">
                    <input id="email" @blur="check(emailRegex.test(user.email), 'email')"
                           type="email" v-model="user.email" class="form-control" name="email" required>

                    <strong class="invalid">{{ errors['email'] }}</strong>
                </div>
            </div>

            <div class="form-group row form-info">
                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                <div class="col-md-6">
                    <input id="password" @blur="check(passwordRegex.test(user.password), 'password')"
                           type="password" v-model="user.password" class="form-control" name="password" required>

                    <strong class="invalid">{{ errors['password'] }}</strong>
                </div>
                <div class="col-md-6 col-md-offset-3">
                    <ul class="mt-2">
                        <li>At least 8 characters</li>
                        <li>At least one uppercase letter</li>
                        <li>At least one lowercase letter</li>
                    </ul>
                </div>
            </div>

            <div class="form-group row form-info">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                <div class="col-md-6">
                    <input id="password-confirm" @blur="check(user.confirmPassword == user.password, 'confirmPassword')"
                           type="password" v-model="user.confirmPassword" class="form-control" required>

                    <strong class="invalid">{{ errors['confirmPassword'] }}</strong>
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
                user: {
                    firstName: '',
                    lastName: '',
                    email: '',
                    password: '',
                    confirmPassword: ''
                },
                errors: [],
                passwordRegex: /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])+\w{8,}$/,
                emailRegex: /^\S+@\S+\.\S+$/,
            }
        },
        methods: {
            continueBtn() {
                let self = this;

                axis.post('/ajax/register/user-information', this.user).then(
                    function (response) {
                        self.$emit('continueBtn', {user: self.user});
                    }, function (error) {
                        self.errors = error.response.data.errors;
                    });
            },
            check(expression, key){
                this.errors[key] = expression ? '' : 'The field is not valid!';
            }
        },
        mounted() {
            this.errors = Object.assign({}, this.user);
        }
    }
</script>
<style>
    .invalid {
        color: #ff6347;
    }
</style>