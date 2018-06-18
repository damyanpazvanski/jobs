<template xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div class="card">
        <div class="card-header" data-background-color="blue">Example Component</div>

        <div class="card-body">
            <div class="col-md-6 col-md-offset-3">
                <input type="text" class="form-control">
                <button class="btn btn-block btn-lg btn-info" v-on:click="verify">VERIFY</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        methods: {
            verify() {
                this.$emit('verifyEmail');
            }
        }
    }
</script>
