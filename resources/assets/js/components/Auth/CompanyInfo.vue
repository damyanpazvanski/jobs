<template xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div class="card col-md-7">
        <div class="card-header font-weight-bold" data-background-color="blue">
            <h3 class="title">Company Information</h3>
        </div>

        <div class="card-body">

            <div class="form-group row form-info">
                <label for="image" class="col-md-4 col-form-label text-md-right">Company Logo</label>

                <div class="col-md-6">
                    <label class="custom-file">
                        <p v-show="company.image">{{ company.imageName }}</p>

                        <input id="image" type="file" class="custom-file-input" required accept="image/*"
                               @change="uploadImage($event)" />

                        <button class="btn btn-block" data-background-color="blue">Upload image</button>
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
                    <input id="website" v-model="company.website" type="text" class="form-control" required placeholder="Enter the website">

                    <strong class="invalid">{{ errors['website'] }}</strong>
                </div>
            </div>

            <div class="form-group row form-info">
                <label for="business_sector_id" class="col-md-4 col-form-label text-md-right">Business Sector</label>

                <div class="col-md-6">
                    <select class="custom-select" id="business_sector_id">
                        <option value="" selected disabled>Choose the business sector</option>
                        <option v-for="sector in businessSectors" :value="sector.id">{{ sector.name }}</option>
                    </select>

                    <strong class="invalid">{{ errors['business_sector_id'] }}</strong>
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
                    <input id="phone" v-model="company.phone" type="number" class="form-control" required placeholder="Enter the company phone">

                    <strong class="invalid">{{ errors['phone'] }}</strong>
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
    export default {
        props: ['businessSectors'],
        data() {
            return {
                company: {
                    image: '',
                    imageName: '',
                    name: '',
                    website: '',
                    business_sector_id: '',
                    address: '',
                    phone: ''
                },
                errors: []
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

                axis.post('/ajax/register/company-information', this.user).then(
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
