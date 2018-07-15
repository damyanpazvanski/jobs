<template xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div class="col-md-6 col-md-offset-3">
        <div class="card">
            <div class="alert alert-default bold">Company Information</div>


            <div class="card-body">

                <div class="form-group row form-info">
                    <label for="image" class="col-md-4 col-form-label text-right">Company Logo</label>

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
                    <label for="name" class="col-md-4 col-form-label text-right">Company name <span class="required-field-star">*</span></label>

                    <div class="col-md-6">
                        <input id="name" v-model="company.name" type="text" class="form-control" required autofocus placeholder="Enter the company name">

                        <strong class="invalid">{{ errors['name'] }}</strong>
                    </div>
                </div>

                <div class="form-group row form-info">
                    <label for="website" class="col-md-4 col-form-label text-right">Website</label>

                    <div class="col-md-6">
                        <input id="website" v-model="company.website" type="text" class="form-control" required placeholder="http://website.com">

                        <strong class="invalid" v-if="errors['website']">The format is: http://[USER SITE] or https://[YOUR SITE]</strong>
                    </div>
                </div>

                <div class="form-group row form-info">
                    <label for="business_sector_id" class="col-md-4 col-form-label text-right">Business Sector <span class="required-field-star">*</span></label>

                    <div class="col-md-6">
                        <select class="custom-select select" id="business_sector_id" name="business_sector_id" v-model="company.business_sector_id">
                            <option value="" selected disabled>Choose the business sector</option>
                            <option v-for="sector in businessSectors" :value="sector.id">{{ sector.name }}</option>
                        </select>

                        <strong class="invalid">{{ errors['business_sector_id'] }}</strong>
                    </div>
                </div>

                <div class="form-group row form-info">
                    <label for="country_id" class="col-md-4 col-form-label text-right">Country <span class="required-field-star">*</span></label>

                    <div class="col-md-6">
                        <select name="country_id" id="country_id" class="custom-select select" v-model="company.country_id">
                            <option value="">Choose the country</option>
                            <option v-for="country in countries" :value="country.id">{{ country.name }}</option>
                        </select>

                        <strong class="invalid">{{ errors['country_id'] }}</strong>
                    </div>
                </div>

                <div class="form-group row form-info">
                    <label for="city" class="col-md-4 col-form-label text-right">City <span class="required-field-star">*</span></label>

                    <div class="col-md-6">
                        <input id="city" v-model="company.city" type="text" class="form-control" required placeholder="Enter the city">

                        <strong class="invalid">{{ errors['city'] }}</strong>
                    </div>
                </div>

                <div class="form-group row form-info">
                    <label for="address" class="col-md-4 col-form-label text-right">Company Address <span class="required-field-star">*</span></label>

                    <div class="col-md-6">
                        <input id="address" v-model="company.address" type="text" class="form-control" required placeholder="Enter the company address">

                        <strong class="invalid">{{ errors['address'] }}</strong>
                    </div>
                </div>

                <div class="form-group row form-info">
                    <label class="col-md-4 col-form-label text-right">Company Phone</label>

                    <div class="col-md-6">
                        <input v-model="company.phone" type="text" class="form-control" required placeholder="Enter the company phone">

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
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        props: ['businessSectors', 'countries'],
        data() {
            return {
                company: {
                    image: '',
                    imageName: '',
                    name: '',
                    website: '',
                    business_sector_id: '',
                    country_id: '',
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
                this.$emit('backBtn', this.company);
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
