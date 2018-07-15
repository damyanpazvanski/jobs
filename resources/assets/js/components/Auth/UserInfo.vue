<template xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div class="col-md-6 col-md-offset-3">
        <div class="card" v-if="user">
            <div class="alert alert-default bold">User Information</div>

            <div class="card-body">
                <div class="form-group row form-info">
                    <label for="first_name" class="col-md-4 col-form-label text-right">First name <span class="required-field-star">*</span></label>

                    <div class="col-md-6">
                        <input id="first_name" @blur="check(user.first_name, 'first_name')"
                               type="text" v-model="user.first_name" class="form-control" required autofocus>

                        <strong class="invalid">{{ errors['first_name'] }}</strong>
                    </div>
                </div>

                <div class="form-group row form-info">
                    <label for="last_name" class="col-md-4 col-form-label text-right">Last name <span class="required-field-star">*</span></label>

                    <div class="col-md-6">
                        <input id="last_name" @blur="check(user.last_name, 'last_name')"
                               type="text" v-model="user.last_name" class="form-control" required>

                        <strong class="invalid">{{ errors['last_name'] }}</strong>
                    </div>
                </div>

                <div class="form-group row form-info">
                    <label for="email" class="col-md-4 col-form-label text-right">E-Mail Address <span class="required-field-star">*</span></label>

                    <div class="col-md-6">
                        <input id="email" @blur="check(emailRegex.test(user.email), 'email')"
                               type="email" v-model="user.email" class="form-control" name="email" required>

                        <strong class="invalid">{{ errors['email'] }}</strong>
                    </div>
                </div>

                <div class="form-group row form-info">
                    <label for="phone" class="col-md-4 col-form-label text-right">Phone <span class="required-field-star">*</span></label>

                    <div class="col-md-6">
                        <input id="phone" @blur="check(user.phone, 'phone')"
                               type="email" v-model="user.phone" class="form-control" name="email" required>

                        <strong class="invalid">{{ errors['phone'] }}</strong>
                    </div>
                </div>

                <div class="form-group row form-info">
                    <label for="password" class="col-md-4 col-form-label text-right">Password <span class="required-field-star">*</span></label>

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
                    <label for="password-confirm" class="col-md-4 col-form-label text-right">Confirm Password <span class="required-field-star">*</span></label>

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
    </div>
</template>
<script>
    import axis from 'axios';

    export default {
        data() {
            return {
                user: {
                    first_name: '',
                    last_name: '',
                    email: '',
                    phone: '',
                    password: '',
                    confirmPassword: ''
                },
                errors: [],
                passwordRegex: /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])+\w{8,}$/,
                emailRegex: /^\S+@\S+\.\S+$/
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
