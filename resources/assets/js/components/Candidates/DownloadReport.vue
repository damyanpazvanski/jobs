<template>
    <div class="text-left card">
        <div class="card-content">
            <div class="col-md-3 form-group form-info">
                <label class="mt-0 mb-0">Add the filters</label>
                <select name="filters" class="form-control select mt-0 mb-0" @change="addFilters">
                    <option value="1" selected>Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="col-md-3 form-group form-info">
                <label class="mt-0 mb-0">How much rows</label>
                <select name="rows" class="form-control select mt-0 mb-0" @change="addRows">
                    <option value="" selected>Select rows (default 10)</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col-md-3">
                <a :href="csvFinalUrl + '&filters=' + filters + '&rows=' + rows">
                    <button class="btn btn-secondary btn-lg btn-block">DOWNLOAD CSV</button>
                </a>
            </div>
            <div class="col-md-3 mb-2 text-right">
                <a :href="pdfFinalUrl + '&filters=' + filters + '&rows=' + rows">
                    <button class="btn btn-success btn-lg btn-block">DOWNLOAD PDF</button>
                </a>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['csvUrl', 'pdfUrl'],
        data() {
            return {
                loading: false,
                csvFinalUrl: '',
                pdfFinalUrl: '',
                filters: 1,
                rows: 10
            }
        },
        methods: {
            addFilters(event) {
                this.filters = event.target.value;
            },
            addRows(event) {
                this.rows = event.target.value;
            }
        },
        mounted() {
            this.csvFinalUrl = this.csvUrl + (this.csvUrl.indexOf('?') === -1 ? '?' : '');
            this.pdfFinalUrl = this.pdfUrl + (this.pdfUrl.indexOf('?') === -1 ? '?' : '');
        }
    }
</script>
