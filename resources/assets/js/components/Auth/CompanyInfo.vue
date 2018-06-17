<template xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div class="card col-md-7">
        <div class="card-header font-weight-bold" data-background-color="blue">
            <h3 class="title">Company Information</h3>
        </div>

        <div class="card-body">

            <div class="form-group row form-info">
                <label for="image" class="col-md-4 col-form-label text-md-right">Company Logo</label>

                <div class="col-md-6">
                    <p v-show="company.image">{{ company.imageName }}</p>
                    <label class="btn btn-block" data-background-color="blue">
                        Upload image
                        <input id="image" type="file" class="btn custom-file-input" required accept="image/*"
                               @change="uploadImage($event)" />

                    </label>
                    <strong class="invalid">{{ errors['image'] }}</strong>
                </div>
            </div>

            <div class="form-group row form-info">
                <label for="name" class="col-md-4 col-form-label text-md-right">Company name</label>

                <div class="col-md-6">
                    <input id="name" v-model="company.name" type="text" class="form-control" required autofocus placeholder="Enter the company name">

                    <strong class="invalid">{{ errors['name'] }}</strong>
                </div>
            </div>

            <div class="form-group row form-info">
                <label for="website" class="col-md-4 col-form-label text-md-right">Website</label>

                <div class="col-md-6">
                    <input id="website" v-model="company.website" type="text" class="form-control" required placeholder="http://website.com">

                    <strong class="invalid" v-if="errors['website']">The format is: http://[USER SITE] or https://[YOUR SITE]</strong>
                </div>
            </div>

            <div class="form-group row form-info">
                <label for="business_sector" class="col-md-4 col-form-label text-md-right">Business Sector</label>

                <div class="col-md-6">
                    <select class="custom-select" id="business_sector" name="business_sector" v-model="company.business_sector">
                        <option value="" selected disabled>Choose the business sector</option>
                        <option v-for="sector in businessSectors" :value="sector.id">{{ sector.name }}</option>
                    </select>

                    <strong class="invalid">{{ errors['business_sector'] }}</strong>
                </div>
            </div>

            <div class="form-group row form-info">
                <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>

                <div class="col-md-6">
                    <select name="country" id="country" class="custom-select" v-model="company.country">
                        <option value="">Choose the country</option>

                    </select>

                    <strong class="invalid">{{ errors['country'] }}</strong>
                </div>
            </div>

            <div class="form-group row form-info">
                <label for="city" class="col-md-4 col-form-label text-md-right">City</label>

                <div class="col-md-6">
                    <input id="city" v-model="company.city" type="text" class="form-control" required placeholder="Enter the city">

                    <strong class="invalid">{{ errors['city'] }}</strong>
                </div>
            </div>

            <div class="form-group row form-info">
                <label for="address" class="col-md-4 col-form-label text-md-right">Company Address</label>

                <div class="col-md-6">
                    <input id="address" v-model="company.address" type="text" class="form-control" required placeholder="Enter the company address">

                    <strong class="invalid">{{ errors['address'] }}</strong>
                </div>
            </div>

            <div class="form-group row form-info">
                <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>

                <div class="col-md-6">
                    <input id="phone" v-model="company.phone" type="text" class="form-control" required placeholder="Enter the company phone">

                    <strong class="invalid" v-if="errors['phone']">The format is: XXX-XXX-XXXX or +XXXX-XXX-XXXX</strong>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6">
                    <button class="btn btn-lg btn-block btn-outline-secondary border-secondary" v-on:click="backBtn">
                        Back
                    </button>

                </div>
                <div class="col-md-6">
                    <button class="btn btn-lg btn-block" data-background-color="blue" v-on:click="continueBtn">
                        Continue
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        props: ['businessSectors'],
        data() {
            return {
                company: {
                    image: '',
                    imageName: '',
                    name: '',
                    website: '',
                    business_sector: '',
                    country: '',
                    city: '',
                    address: '',
                    phone: ''
                },
                errors: [],
                phoneRegex: /^([\+]{1}[0-9]{3}|[0-9]{1}?)+([\-])([0-9]{3})([\-])([0-9]{3,8})$/
            }
        },
        methods: {
            register() {

            },
            backBtn() {
                this.$emit('backBtn');
            },
            continueBtn() {
                let self = this;

                axios.post('/ajax/register/company-information', this.company).then(
                    function (response) {
                        self.$emit('continueBtn', {company: self.company});
                    }, function (error) {
                        self.errors = error.response.data.errors;
                    });
            },
            uploadImage(event) {
                this.company.imageName = event.target.files[0].name;
                this.company.image = event.target.files[0];
            }
        },
        mounted() {
            this.errors = Object.assign({}, this.company);
        }
    }
</script>
