<template>
    <span>
        <!-- Modal -->
        <div class="modal fade" id="sendEmailsmodal" tabindex="-1" role="dialog" aria-labelledby="sendEmailsmodalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content text-left">
                    <div class="modal-header">
                        <label>Dou you want to send emails</label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        You are going to send emails to all of the candidates without already sent invitations
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-info" data-dismiss="modal" v-on:click="markEmails">Send</button>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-outline-info btn-block" data-toggle="modal" data-target="#sendEmailsmodal">SEND EMAILS</button>
    </span>
</template>
<script>
    import axios from 'axios';

    export default {
        props: ['jobId'],
        methods: {
            markEmails() {
                axios.post(`/ajax/job/${this.jobId}/send-tests`, {})
                    .then(function (response) {
                        console.log(response);
                    }, function (error) {
                        console.log(error);
                    });
            }
        }
    }
</script>