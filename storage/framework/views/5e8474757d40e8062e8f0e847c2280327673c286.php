<?php $__env->startSection('meta-title', 'Latest Jobs'); ?>

<?php $__env->startSection('content'); ?>

    <div id="app">
        <h1>Job Board</h1>
        <table class="table table-striped">
            <tr>
                <th>#</th>
                <th>Reference</th>
                <th>Title</th>
                <th>Type</th>
                <th>Description</th>
                <th>Employer</th>
                <th>Location</th>
                <th>Salary</th>
                <th>Post Date</th>
            </tr>
            <tr v-for="job in jobs" is="job" :job="job"></tr>
        </table><!-- /.table -->


    </div><!-- /#app -->

    <template id="template-job-raw">
        <tr>
            <td>
                {{job.id}}
            </td>
            <td>
                {{ job.reference }}
            </td>
            <td>
                {{ job.title }}
            </td>
            <td>
                {{ job.type }}
            </td>
            <td>
                {{ job.description }}
            </td>
            <td>
                {{ job.location }}
            </td>
            <td>
                {{ job.employer }}
            </td>
            <td>
                {{ job.salary }}
            </td>
            <td>
                {{ job.post_date }}
            </td>
            <td>
                <div class="btn-group" v-if="!job.editing">
                    <button @click="editJob(job)" class="btn btn-default">Edit</button>
                    <button @click="deleteJob(job)" class="btn btn-danger">Delete</button>
                </div>
            </td>


        </tr>

    </template><!-- /#template-job-raw -->
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>