<template>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">About this queue</h5>
            <p class="card-text">Content</p>
            <p class="card-text">Content</p>
            <p class="card-text">Content</p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        queue: {
            type: Object,
            required: true
        }
    }
}
</script>

<style lang="scss" scoped>
</style>
