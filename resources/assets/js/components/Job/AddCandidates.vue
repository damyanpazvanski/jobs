<template xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div>
        <!-- Modal -->
        <div class="modal fade" id="addCandidatesModal" tabindex="-1" role="dialog" aria-labelledby="addCandidatesModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content text-left">
                    <div class="modal-header">
                        <label>Add Candidates</label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>Write the emails on the candidates</h5>
                        <textarea v-model="candidates" name="candidates" placeholder="john@gmail.com, ema@gmail.com"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-info" data-dismiss="modal" v-on:click="addCandidates">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-outline-info btn-block" data-toggle="modal" data-target="#addCandidatesModal">ADD CANDIDATES</button>
    </div>
</template>
<script>
    import axios from 'axios';

    export default {
        props: ['jobId'],
        data() {
            return {
                candidates: ''
            }
        },
        methods: {
            addCandidates() {
                let self = this;

                axios.post('/ajax/jobs/' + this.jobId + '/candidates', {
                    candidates: this.candidates
                })
                    .then(function (response) {
                        window.location.href = '/jobs/' + self.jobId;
                    }, function (error) {
                        for (let key in error.response.data.errors) {
                            self.error(key.toUpperCase(), error.response.data.errors[key][0]);
                        }
                    });
            },
            error(title, message) {
                this.$notify({
                    group: 'errors',
                    type: 'error',
                    title: title,
                    text: message
                });
            }
        }
    }
</script>
<style>
    textarea {
        max-width: 100%;
        min-width: 100%;
        min-height: 100px;
        max-height: 100px;
        border: 1px solid #808080;
    }
    h5 {
        margin: 10px 0;
    }
</style>
