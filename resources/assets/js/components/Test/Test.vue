<template>
    <div class="">
        <div v-if="page === 1">
            <verify-email @verifyEmail="verifyEmail"></verify-email>
        </div>
        <div v-if="page === 2">
            <questions @finishedQuestions="finishedQuestions" :questions="questions"></questions>
        </div>
        <div v-if="page === 3">
            Success
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    import verifyEmail from './VerifyEmail.vue';

    export default {
        props: ['questions'],
        data() {
            return {
                page: 1,
                email: ''
            }
        },
        components: {
            verifyEmail
        },
        methods: {
            verifyEmail(email) {
                this.email = email;
                this.page++;
            },
            finishedQuestions(questions) {
                axios.post('/ajax/test', {
                    email: this.email,
                    questions: questions.questions,
                    bonus: questions.bonus
                })
                    .then(function (response) {
                        this.page++;
                    }, function (error) {
                        console.log(error);
                    })
            }
        }
    }
</script>
