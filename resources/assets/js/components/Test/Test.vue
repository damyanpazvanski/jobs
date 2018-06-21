<template>
    <div class="">
        <div v-if="page === 1">
            <verify-email @verifyEmail="verifyEmail"></verify-email>
        </div>
        <div v-if="page === 2">
            <questions @finishedQuestions="finishedQuestions"></questions>
        </div>
    </div>
</template>
<script>
    import verifyEmail from './VerifyEmail.vue';

    export default {
        data() {
            return {
                page: 2
            }
        },
        components: {
            verifyEmail
        },
        methods: {
            verifyEmail() {
                this.page++;
            },
            finishedQuestions() {

            }
        }
    }
</script>
