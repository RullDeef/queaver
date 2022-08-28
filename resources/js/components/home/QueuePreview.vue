<template>
    <div class="card">
        <div class="card-header">Queues</div>
        <div class="card-body" style="overflow: scroll">

            <div class="container-fluid">
                <div class="row flex-row flex-nowrap">

                    <div class="text-center" v-if="queues.length === 0">
                        <h4>No queues yet!<br>
                            <span v-if="canCreate">create a new one with a button below</span>
                            <span v-else>ask a moderator to create new one</span>
                        </h4>
                    </div>

                    <div class="col-3 container" v-for="queue in queues">
                        <div class="card">
                            <div class="card-header"></div>
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ queue.name }}</h5>
                            </div>
                            <div class="card-footer">
                                <div>6/20 people</div>
                                <div>04:39:15 for you</div>
                                <div>00:20:10 for everyone</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <button class="btn btn-primary" v-if="queues.length !== 0">my places</button>

            <a class="btn btn-primary mx-3" v-if="canCreate" href="queue/create">create new</a>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        queues: {
            type: Array,
            default: []
        },
        canCreate: {
            type: Boolean,
            default: false
        }
    }
}
</script>

<style lang="scss" scoped>
</style>
