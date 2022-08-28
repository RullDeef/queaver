<template>
    <div class="card">
        <div class="card-header">Groupmates list</div>
        <div class="card-body">
            <div class="d-flex justify-content-between border-top" v-for="mate in groupmates">
                <span>{{ mate.name + ' ' + mate.name.substr(0, 1) + '.' }}</span>
                <span class="text-success" v-if="mate.online">Online</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        groupmates: {
            type: Array,
            required: true
        }
    }
}
</script>

<style lang="scss" scoped>
</style>
