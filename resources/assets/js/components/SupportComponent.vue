<template>
    <div id="chat-wrapper" class="col-md-3 col-xs-10 col-xs-offset-1" :class="{'expanded': isExpanded}">
        <div class="chat-title shake-chat" v-on:click="toggleSupport">
            <h5 class="bold" v-if="!isExpanded">Support</h5>
            <h5 class="bold" v-if="isExpanded">Close</h5>
        </div>
        <div class="col-md-12 form" :class="{'fade': isExpanded}">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="support-email" class="col-md-12 col-form-label text-center">Email</label>
                            <div class="col-md-12">
                                <input id="support-email" v-model="fields.email" type="email" class="form-control" name="support-email" required>

                                <span v-if="errors.email" class="invalid">
                                    <strong>{{ errors.email }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="support-phone" class="col-md-12 col-form-label text-center">Phone Number</label>
                            <div class="col-md-12">
                                <input id="support-phone" v-model="fields.phone" type="number" class="form-control" name="support-phone" required>

                                <span v-if="errors.phone" class="invalid">
                                    <strong>{{ errors.phone }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="support-subject" class="col-md-12 col-form-label text-center">Subject</label>
                            <div class="col-md-12">
                                <input id="support-subject" v-model="fields.subject" type="text" class="form-control" name="support-subject" required>

                                <span v-if="errors.subject" class="invalid">
                                    <strong>{{ errors.subject }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="support-message" class="col-md-12 col-form-label text-center">Message</label>
                            <div class="col-md-12">
                                <textarea name="support-message" v-model="fields.message" id="support-message" rows="3" class="form-control"></textarea>

                                <span v-if="errors.message" class="invalid">
                                    <strong>{{ errors.message }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group mb-0 mt-4">
                            <div class="col-md-8 col-md-offset-2 text-center">
                                <button type="submit" v-on:click="send" class="btn btn-block btn-lg" data-background-color="blue">
                                    Send
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                isExpanded: false,
                fields: {
                    email: '',
                    phone: '',
                    subject: '',
                    message: ''
                },
                errors: {
                    email: '',
                    phone: '',
                    subject: '',
                    message: ''
                }
            }
        },
        methods: {
            toggleSupport() {
                this.isExpanded = !this.isExpanded
            },
            send() {
                let self = this;

                axios.post('ajax/support/ticket', this.fields)
                    .then(response => {
                        self.$notify({
                            group: 'success',
                            type: 'error',
                            title: 'Message',
                            text: 'Successfully Sent'
                        });

                        self.isExpanded = false;

                        Object.keys(self.fields).forEach((key) => {
                            self.fields[key] = '';
                        });
                    }, error => {
                        self.errors = error.response.data.errors;
                    });
            }
        }
    }
</script>
<style>
    #chat-wrapper {
        position: fixed;
        z-index: 9999;
        right: 30px;
        bottom: 10px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        overflow-y: scroll;
    }
    .chat-title {
        height: 35px;
        padding-top: 3px;
        text-align: center;
        background: #03a8f5;
        color: #FFFFFF;
        cursor: pointer;
        border-radius: 15px;
    }
    .chat-title h5 {
        margin-top: 5px!important;
    }
    .shake-chat:hover {
        animation: shake 0.60s cubic-bezier(.36,.07,.19,.97) both;
    }
    .expanded {
        bottom: 10px!important;
    }
    .form {
        display: none;
        opacity: 0;
    }
    .fade {
        opacity: 1;
        animation: fade 0.5s linear;
        display: block;
    }
    @keyframes fade {
        0% { opacity: 0 }
        100% { opacity: 1 }
    }
</style>
