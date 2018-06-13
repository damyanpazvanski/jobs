<template>
    <div class="container" style="margin-top: 50px">
        <div class="row justify-content-center">
            <div class="col-md-9">

                <user-info
                        v-show="page == 1"
                        @continueBtn="continueBtn">
                </user-info>

                <company-info
                        v-show="page == 2"
                        @backBtn="backBtn"
                        @continueBtn="continueBtn">
                </company-info>

                <choose-plan
                        v-show="page == 3"
                        @backBtn="backBtn"
                        @continueBtn="continueBtn">
                </choose-plan>

            </div>
        </div>
    </div>
</template>
<script>
    import userInfo from './UserInfo.vue';
    import companyInfo from './CompanyInfo.vue';
    import choosePlan from './ChoosePlan.vue';

    export default {
        components: {
            userInfo,
            companyInfo,
            choosePlan
        },
        data() {
            return {
                page: 3
            }
        },
        methods: {
            continueBtn() {
                this.page++;
            },
            backBtn() {
                this.page--;
            }
        }
    }
</script>
