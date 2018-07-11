<template xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div>
        <!-- Modal -->
        <div class="modal fade" id="disableJobModal" tabindex="-1" role="dialog" aria-labelledby="disableJobModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content text-left">
                    <div class="modal-header">
                        <span class="fs-18 bold">Are you sure to disable this job?</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" v-on:click="disable">Disable</button>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#disableJobModal">Disable job</button>
    </div>
</template>
<script>
    import axios from 'axios';

    export default {
        props: ['jobId'],
        methods: {
            disable() {
                axios.delete('/ajax/jobs/' + this.jobId)
                    .then(function () {
                        window.location.href = '/jobs';
                    }, function (error) {
                        for (let key in error.response.data.errors) {
                            this.$notify({
                                group: 'errors',
                                type: 'error',
                                title: key.toUpperCase(),
                                text: error.response.data.errors[key][0]
                            });
                        }
                    })
            }
        }
    }
</script>
