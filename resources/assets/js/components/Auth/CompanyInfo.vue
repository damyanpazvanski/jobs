<template xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div class="card">
        <div class="card-header font-weight-bold" data-background-color="blue">
            <h3 class="title">Company Information</h3>
        </div>

        <div class="card-body">

            <div class="form-group row form-info">
                <label for="image" class="col-md-4 col-form-label text-md-right">Company Logo</label>

                <div class="col-md-6">
                    <label class="custom-file">
                        <input id="image" type="file" class="custom-file-input" required accept="image/*">


                        <button class="btn btn-block" data-background-color="blue">Upload image</button>
                    </label>
                    <!--<strong class="invalid">{{ errors['first_name'] }}</strong>-->
                </div>
            </div>

            <div class="form-group row form-info">
                <label for="companyName" class="col-md-4 col-form-label text-md-right">Company name</label>

                <div class="col-md-6">
                    <input id="companyName" type="text" class="form-control" required autofocus placeholder="Enter the company name">

                    <!--<strong class="invalid">{{ errors['first_name'] }}</strong>-->
                </div>
            </div>

            <div class="form-group row form-info">
                <label for="website" class="col-md-4 col-form-label text-md-right">Website</label>

                <div class="col-md-6">
                    <input id="website" type="text" class="form-control" required placeholder="Enter the website">

                    <!--<strong class="invalid">{{ errors['first_name'] }}</strong>-->
                </div>
            </div>

            <div class="form-group row form-info">
                <label for="businessSector" class="col-md-4 col-form-label text-md-right">Business Sector</label>

                <div class="col-md-6">
                    <select class="custom-select " name="businessSector" id="businessSector">
                        <option value="" selected disabled>Choose the business sector</option>

                    </select>

                    <!--<strong class="invalid">{{ errors['first_name'] }}</strong>-->
                </div>
            </div>

            <div class="form-group row form-info">
                <label for="address" class="col-md-4 col-form-label text-md-right">Company Address</label>

                <div class="col-md-6">
                    <input id="address" type="text" class="form-control" required placeholder="Enter the company address">

                    <!--<strong class="invalid">{{ errors['first_name'] }}</strong>-->
                </div>
            </div>

            <div class="form-group row form-info">
                <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>

                <div class="col-md-6">
                    <input id="phone" type="text" class="form-control" required placeholder="Enter the company phone">

                    <!--<strong class="invalid">{{ errors['first_name'] }}</strong>-->
                </div>
            </div>


            <div class="form-group row mb-0">
                <div class="col-md-6">
                    <button class="btn btn-lg btn-block" data-background-color v-on:click="backBtn">
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
        methods: {
            register() {

            },
            backBtn() {
                this.$emit('backBtn');
            },
            continueBtn() {
                this.$emit('continueBtn');
            }
        }
    }
</script>
