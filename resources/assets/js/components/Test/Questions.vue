<template xmlns:v-on="http://www.w3.org/1999/xhtml" xmlns:v-bind="http://www.w3.org/1999/xhtml">
    <div class="col-md-10 col-md-offset-1">
        <div class="row col-md-9 col-lg-9 col-xl-10">
            <div class="card">
                <div class="card-header" data-background-color="blue">Example Component</div>

                <div class="card-body">
                    <div class="form-group row form-info">
                        <div class="col-md-11 text-right timerWrapper">Timer: <span ref="timer"></span></div>
                        <h5 class="col-md-8 col-md-offset-2 text-center text-dark font-weight-bold">
                            {{question.condition}}
                        </h5>

                        <div class="col-md-12">
                            <div class="col-md-7 col-md-offset-1 text-center">
                                <img v-bind:src="question.image" class="question-image">
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="form answers">

                                    <div class="radio radio-primary" v-for="answer in question.answers">
                                        <label class="font-weight-bold">
                                            <input type="radio" name="answer" :value="true"
                                                   v-on:click="chooseAnswer(question.id, answer.id)">
                                            <span class="circle"></span>
                                            <span class="check"></span>
                                            {{ answer.content }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <button class="btn btn-block btn-lg btn-outline-secondary">Back</button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-block btn-lg btn-info">Next</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-2 legend text-center col-sm-12 col-xs-12">
            <div class="col-md-offset-1">
                <span class="on-question btn btn-not-answered col-md-2">1</span>
                <span class="on-question btn btn-info col-md-2" v-for="i in 19">{{ i + 1 }}</span>
            </div>

        </div>
    </div>
</template>
<script>
    export default {
        props: ['questions'],
        data() {
            return {
                questionNumber: 1,
                question: {
                    id: 2,
                    condition: 'asdas',
                    image: '/images/image.png',
                    answers: [
                        {
                            id: 1,
                            content: 'Answer 1'
                        },
                        {
                            id: 2,
                            content: 'Answer 2'
                        },
                        {
                            id: 3,
                            content: 'Answer 3'
                        },
                        {
                            id: 4,
                            content: 'Answer 4'
                        },
                    ]
                }
            }
        },
        methods: {
            finishedQuestions() {
                this.$emit('finishedQuestions');
            },
            chooseAnswer(questionId, answerId) {
                console.log(questionId, answerId);
                this.questionNumber++;
            },
            timer(duration, display) {
                let self = this;
                let timer = duration, minutes, seconds;
                setInterval(function () {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    display.textContent = minutes + ":" + seconds;

                    if (--timer < 0) {
                        self.finishedQuestions();
                    }
                }, 1000);
            },
        },
        mounted() {
            this.timer(20 * 60, this.$refs.timer);
        }
    }
</script>
<style>
    .question-image {
        min-width: 80%;
        max-width: 80%;
    }
    .on-question {
        font-weight: bold;
        padding: 8px 7px;
        border-radius: 5px;
        margin: 1px 3px 3px 0;
    }
    .answers {
        margin-top: 50px;
    }
    .legend {
        margin-top: 25px;
        background-color: #FFFFFF;
        padding: 5px 0;
    }
    .legend span {
        margin-left: 2px;
    }
    .legend > .row {
        margin-top: 4px;
    }
    .btn-not-answered {
        color: #ffffff;
        background-color: #aebac2;
    }
    .btn-outline-secondary {
        border: 1px solid #aebac2;
    }
    .btn-outline-secondary:hover {
        background-color: #aebac2;
        color: #ffffff;
    }
    .timerWrapper {
        font-size: 17px;
        font-weight: bold;
        color: #87939b;
    }
</style>