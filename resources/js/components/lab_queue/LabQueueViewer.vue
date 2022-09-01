<template>
    <div class="container">
        <div class="row">
            <div class="offset-3 col-3">
                <h1>{{ queue.name }}</h1>
            </div>
        </div>

        <div class="row">
            <div class="offset-1 col-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Filters:</h5>
                        <p class="card-text">
                        <ul>
                            <li>Status: {{ queue.status }}</li>
                            <li>Priority: {{ queue.priority }}</li>
                            <li>Created at: {{ queue.created_at }}</li>
                            <li>Updated at: {{ queue.updated_at }}</li>
                        </ul>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <!-- show big green sumbit button to complete task when user is first in queue -->
                <div class="alert alert-success" role="alert">
                    <strong>You are the first no this queue!</strong>
                    <p>To mark your lab completed click on the button below</p>
                    <a class="btn btn-success" href="#">complete lab</a>
                </div>

                <user-place-list :userPlaces="queue.user_places" :me="me" />
            </div>

            <div class="col-4">
                <lab-queue-info class="mb-3" :queue="queue" />
                <lab-task-list :tasks="queue.tasks" :tasksDone="tasksDone" :tasksPending="tasksPending"
                    :can-create="canCreateLabTasks" />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        queue: {
            type: Object,
            required: true
        },
        me: {
            type: Object,
            required: true
        },
        /* states for labs on current query for current user only */
        myTaskStates: {
            type: Array,
            required: true
        },
        canCreateLabTasks: {
            type: Boolean,
            default: false
        }
    },
    computed: {
        myPlaces() {
            return this.queue.user_places.filter(up => up.user_id === this.me.id);
        },
        tasksPending() {
            return this.myPlaces.map(t => this.queue.tasks.find(l => t.lab_task_id === l.id)).map(t => t.id);
        },
        tasksDone() {
            return this.myTaskStates.filter(t => t.state === 'COMPLETED').map(t => t.id);
        }
    },
}
</script>

<style lang="scss" scoped>
</style>
