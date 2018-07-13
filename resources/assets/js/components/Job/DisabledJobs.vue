<template xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div>
        <!-- Modal -->
        <div class="modal fade" id="activateJobModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content text-left">
                    <div class="modal-header">
                        <span class="fs-18 bold">Are you sure to activate this job?</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal" v-on:click="activate">Activate</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-10 col-md-offset-1">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card-header font-weight-bold" data-background-color="blue"
                         style="font-size: 12px">

                    </div>
                    <div class="card-body">
                        <div class="col-md-3" v-for="job in jobs">
                            <div class="activate-job text-center col-md-12">
                                <button class="btn btn-success" v-on:click="select($event, job.id)"
                                        data-toggle="modal" data-target="#activateJobModal">Activate</button>
                            </div>
                            <div class="card card-profile closed">
                                <div class="text-left" style="height: 20px">
                                    <img src="/images/pin.png"
                                         style="width: 80px; position: relative; top: -35px; left: -15px;">
                                </div>

                                <div class="content" style="padding-bottom: 10px">
                                    <h4 class="category text-gray">{{ job.work_time_name.toUpperCase() }}</h4>
                                    <h4 class="alert card-title">{{ job.position }}</h4>
                                    <div>
                                        <p>County: {{ job.country_name }}</p>
                                        <p>City: {{ job.city }}</p>
                                        <p>Created at: {{ job.created_at.date.substr(0, 10) }}</p>
                                        <p class="category text-gray">Candidates: {{ job.candidates_count }}</p>
                                        <p class="category text-gray">Best Candidates: {{ job.candidates_with_high_result_count }}</p>
                                    </div>

                                    <span class="btn btn-round btn-show-text" data-background-color="red">Closed</span>
                                </div>
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
        props: ['jobs'],
        data() {
            return {
                selectedJobId: 0
            }
        },
        methods: {
            select(event, id) {
                this.selectedId = id;
            },
            activate() {
                axios.patch('/ajax/jobs/' + this.selectedId + '/activate', {
                    job_id: this.selectedId
                })
                    .then(function () {
                        window.location.href = '/jobs/disabled';
                    }, function (error) {
                        for (let key in error.response.data.errors) {
                            this.$notify({
                                group: 'errors',
                                type: 'error',
                                title: key.toUpperCase(),
                                text: error.response.data.errors[key][0]
                            });
                        }
                    });
            }
        }
    }
</script>
