<template>
    <div class="card">
        <div class="card-header font-weight-bold" data-background-color="blue">
            <h3 class="title">Choose plan</h3>
        </div>

        <div class="card-body">

            <div class="custom-controls-stacked">
                <label class="custom-control custom-radio">
                    <input id="radioStacked1" name="radio-stacked" type="radio" class="custom-control-input" checked>
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Try it for FREE</span>
                </label>
                <label class="custom-control custom-radio">
                    <input id="radioStacked2" name="radio-stacked" type="radio" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Pay now</span>
                </label>
            </div>

        </div>
    </div>
</template>
<script>
    export default {

    }
</script>