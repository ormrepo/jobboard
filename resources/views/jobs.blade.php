@extends ('layouts.master')

@section('meta-title', 'Latest Jobs')

@section('content')

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
        <p class="lead">Are you interested in.....
            <button @click="createJob()" class="btn btn-primary">Adding a new job?</button>
        </p>



    </div><!-- /#app -->

    <template id="template-job-raw">
        <tr>
            <td>
                @{{ job.id }}
            </td>
            <td>
                @{{ job.reference }}
            </td>
            <td>
                <input v-if="job.editing" v-model="job.title" class="form-control">
                </input>
                <span v-else>
                @{{ job.title }}
            </span>

            </td>
            <td>
                <input v-if="job.editing" v-model="job.type" class="form-control">
                </input>
                <span v-else>
                 @{{ job.type }}
            </span>

            </td>
            <td>
                <input v-if="job.editing" v-model="job.description" class="form-control">
                </input>
                <span v-else>
                 @{{ job.description }}
            </span>

            </td>
            <td>
                <input v-if="job.editing" v-model="job.location" class="form-control">
                </input>
                <span v-else>
                @{{ job.location }}
            </span>
            </td>
            <td>
                <input v-if="job.editing" v-model="job.employer" class="form-control">
                </input>
                <span v-else>
                @{{ job.employer }}
            </span>
            </td>
            <td>
                <input v-if="job.editing" v-model="job.salary" class="form-control">
                </input>
                <span v-else>
                @{{ job.salary }}
            </span>
            </td>
            <td>
                <input v-if="job.editing" v-model="job.post_date" class="form-control">
                </input>
                <span v-else>
                @{{ job.post_date }}
            </span>

            </td>

            <td>
                <div class="btn-group" v-if="!job.editing">
                    <button @click="editJob(job)" class="btn btn-default">Edit</button>
                    <button @click="deleteJob(job)" class="btn btn-danger">Delete</button>
                </div>
                <div class="btn-group" v-else>
                    <button v-if="job.id" class="btn btn-primary" @click="updateJob(job)">Update</button>
                    <button v-else class="btn btn-success" @click="storeJob(job)">Save</button>
                    <button @click="job.editing=false" class="btn btn-default">Cancel</button>
                </div>


            </td>


        </tr>

    </template><!-- /#template-job-raw -->
@endsection



