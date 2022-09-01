<template>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">User places:</h5>
            <p class="card-text container">
                <div class="row border-bottom" v-for="(userPlace, key) in userPlaces">
                    <div class="col-auto text-success" v-if="userPlace.owner.id === me.id">{{ key + 1 }}</div>
                    <div class="col-auto" v-else>{{ key + 1 }}</div>
                    <div class="col-auto text-success" v-if="userPlace.owner.id === me.id">{{ userPlace.owner.fullGroupIndex }}</div>
                    <div class="col-auto" v-else>{{ userPlace.owner.fullGroupIndex }}</div>
                    <div class="col text-success" v-if="userPlace.owner.id === me.id">{{ userPlace.owner.surname + ' ' + userPlace.owner.name }}</div>
                    <div class="col" v-else>{{ userPlace.owner.surname + ' ' + userPlace.owner.name }}</div>
                    <div class="col-auto text-success" v-if="userPlace.owner.id === me.id">Lab №{{ userPlace.lab_task.index }}</div>
                    <div class="col-auto" v-else>Lab №{{ userPlace.lab_task.index }}</div>
                </div>
            </p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        userPlaces: {
            type: Array,
            required: true
        },
        me: {
            type: Object,
            required: true
        }
    }
}
</script>

<style lang="scss" scoped>
</style>
