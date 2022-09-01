<template>
    <h4>Labs on this queue</h4>
    <div class="card mb-3 py-2 container">
        <div class="row border-bottom" v-for="task in sortedTasks" :key="task.index">
            <div class="col-auto">
                <svg width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                    <g v-if="taskIsDone(task)">
                        <path
                            d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                        <path
                            d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
                    </g>
                    <g v-else-if="taskIsPending(task)">
                        <path
                            d="M2 1.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1-.5-.5zm2.5.5v1a3.5 3.5 0 0 0 1.989 3.158c.533.256 1.011.791 1.011 1.491v.702c0 .7-.478 1.235-1.011 1.491A3.5 3.5 0 0 0 4.5 13v1h7v-1a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351v-.702c0-.7.478-1.235 1.011-1.491A3.5 3.5 0 0 0 11.5 3V2h-7z" />
                    </g>
                    <g v-else>
                    </g>
                </svg>
                <a class="text-decoration-none" :href="`/task/${task.id}`">
                    Lab #{{  task.index  }}
                </a>
            </div>
            <div class="col">
            </div>
            <div class="col-auto">
                <span class="text-secondary" v-if="task.deadline !== null">
                    {{  new Date(task.deadline).toDateString()  }}
                </span>
            </div>
        </div>
    </div>

    <div class="row" v-if="canCreate">
        <div class="col"></div>
        <div class="col-auto">
            <a class="btn btn-primary" href="/task/create">
                Create new
            </a>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        tasks: {
            type: Array,
            required: true
        },
        /* id of tasks that are marked as completed by current user */
        tasksDone: {
            type: Array,
            default: []
        },
        /* id of tasks that are in queue for current user */
        tasksPending: {
            type: Array,
            default: []
        },
        canCreate: {
            type: Boolean,
            required: true
        }
    },
    computed: {
        sortedTasks() {
            return this.tasks.sort((t1, t2) => t1.index - t2.index);
        }
    },
    methods: {
        taskIsDone(task) {
            return this.tasksDone.includes(task.id);
        },
        taskIsPending(task) {
            return this.tasksPending.includes(task.id);
        }
    }
}
</script>

<style lang="scss" scoped>
</style>
