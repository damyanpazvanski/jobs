<template xmlns:v-on="http://www.w3.org/1999/xhtml" xmlns:v-bind="http://www.w3.org/1999/xhtml"
          xmlns:data="http://www.w3.org/1999/xhtml">
    <div class="col-md-12" style="padding: 0">
        <div class="col-lg-5 col-lg-offset-3">
            <div class="card">
                <div class="card-header" data-background-color="blue">Intelligence</div>

                <div class="card-body">
                    <div class="form-group row form-info">
                        <div class="col-md-11 text-right timerWrapper">Timer: <span ref="timer"></span></div>
                        <h5 class="col-md-8 col-md-offset-2 text-center text-dark font-weight-bold">
                            Press on the chosen option
                        </h5>

                        <div class="col-md-12 row">
                            <div class="col-md-7 text-center">
                                <img :src="'data:image/gif;base64,' + question.image" class="question-image">
                            </div>
                            <div class="text-center col-md-5 answers-wrapper">
                                <div class="form answers">

                                    <div class="radio-primary col-md-5 col-xs-3 answer"
                                         v-for="answer in question.answers">
                                        <label class="font-weight-bold" style="padding: 0">
                                            <input type="radio" name="answer" hidden
                                                   v-on:click="chooseAnswer(question.id, answer.id)">
                                            <img :src="'data:image/gif;base64,' + answer.image" class="answer-image">
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 action-buttons">
                                <div class="col-md-6">
                                    <button class="btn btn-block btn-lg btn-outline-secondary"
                                            :class="{'disabled': questionNumber === 0}" v-on:click="back">Back
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-block btn-lg btn-info" v-on:click="next">
                                        <span v-if="questionNumber < 19">Next</span>
                                        <span v-if="questionNumber === 19">Submit</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-1 col-lg-2 col-md-12 col-sm-12 col-xs-12 row legend">
            <div class="text-center">
                <span class="on-question btn col-xl-2 col-lg-2 col-md-0"
                      v-for="i in 20" v-on:click="chooseNumber(i - 1)"
                      v-bind:class="{'btn-warning': (i - 1) === questionNumber,
                      'btn-info': answeredQuestions[i - 1] && answeredQuestions[i - 1]['questionId'] == questions[i - 1].id}"
                >{{ i }}</span>
                <span v-if="questionNumber === 19 && Object.keys(this.answeredQuestions).length < 19">
                    You have answered {{ Object.keys(this.answeredQuestions).length }} questions
                </span>
            </div>
        </div>

        <div class="modal" ref="modal">
            <div class="modal-dialog">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <h5 class="modal-title">Are you sure?</h5>
                    </div>
                    <div class="modal-body">
                        <p>You are going to submit the test.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" v-on:click="submit">Submit</button>
                        <button type="button" class="btn btn-secondary" v-on:click="onSubmitCancel">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['questions'],
        data() {
            return {
                questionNumber: 0,
                question: {
                    id: 0,
                    condition: '',
                    image: '',
                    answers: [],
                    answer: null
                },
                answeredQuestions: [],
                bonus: 0,
                minutes: 0
            }
        },
        methods: {
            chooseAnswer(questionId, answerId) {
                this.answeredQuestions[this.questionNumber] = {
                    questionId: questionId,
                    answerId: answerId
                };

                this.next();
            },
            chooseNumber(index) {
                this.questionNumber = index;
                this.question = this.questions[this.questionNumber];
            },
            next() {
                if (this.questionNumber < 19) {
                    this.question = this.questions[++this.questionNumber];
                    return true;
                }

                this.$refs.modal.classList.add('visible');
                return false;
            },
            back() {
                if (this.questionNumber > 0) {
                    this.question = this.questions[--this.questionNumber];
                    return true;
                }
            },
            submit() {
                if (this.minutes < 3) {
                    this.bonus = -2;
                } else if (this.minutes < 5) {
                    this.bonus = -1;
                } else if (this.minutes < 10) {
                    this.bonus = 1;
                } else {
                    this.bonus = 2;
                }

                this.$emit('finishedQuestions', {
                    questions: this.answeredQuestions,
                    bonus: this.bonus
                });
            },
            onSubmitCancel() {
                this.$refs.modal.classList.remove('visible');
            },
            timer(duration, display) {
                let self = this;
                let timer = duration, minutes, seconds;
                let interval = setInterval(function () {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    self.minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    display.textContent = self.minutes + ":" + seconds;

                    if (--timer < 0) {
                        clearInterval(interval);
                        self.submit();
                    }
                }, 1000);
            }
        },
        mounted() {
            this.timer(20 * 60, this.$refs.timer);
            this.question = this.questions[0];
        }
    }
</script>
<style>
    .visible {
        display: block !important;
    }

    .question-image {
        min-width: 80%;
        max-width: 80%;
    }

    .answers-wrapper {
        padding: 0;
    }

    .answer {
        margin: 20px 0;
    }

    .answer img {
        cursor: pointer;
    }

    .on-question {
        font-weight: bold;
        padding: 8px 7px;
        border-radius: 5px;
        margin: 1px 3px 3px 0;
    }

    .legend {
        margin-top: 25px;
        background-color: #FFFFFF;
        padding: 5px 0;
    }

    .legend span {
        margin-left: 2px;
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

    .action-buttons {
        margin-top: 40px;
    }
</style>