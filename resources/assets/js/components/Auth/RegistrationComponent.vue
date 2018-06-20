<template>
    <div class="row justify-content-center">

            <user-info
                    v-show="page == 1"
                    @continueBtn="continueBtn">
            </user-info>

            <company-info
                    v-show="page == 2"
                    :business-sectors="businessSectors"
                    :countries="countries"
                    @backBtn="backBtn"
                    @continueBtn="continueBtn">
            </company-info>

            <choose-plan
                    v-show="page == 3"
                    @backBtn="backBtn"
                    @continueBtn="continueBtn">
            </choose-plan>

    </div>
</template>
<script>
    import axios from 'axios';
    import userInfo from './UserInfo.vue';
    import companyInfo from './CompanyInfo.vue';
    import choosePlan from './ChoosePlan.vue';

    export default {
        props: ['businessSectors', 'countries'],
        components: {
            userInfo,
            companyInfo,
            choosePlan
        },
        data() {
            return {
                page: 1,
                data: {}
            }
        },
        methods: {
            continueBtn(data) {

                if (this.page == 1) {
                    this.data['user'] = data.user;
                    this.page++;
                } else if (this.page == 2) {
                    this.data['company'] = data.company;

                    console.log(this.data, this);

                    axios.post('/ajax/register/store', this.data);
                }
            },
            backBtn() {
                this.page--;
            }
        }
    }
</script>
