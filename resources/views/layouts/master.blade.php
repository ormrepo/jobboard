<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Board</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>

<body>

@yield('content')


<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript">
    Vue.prototype.$http = axios;

    Vue.component('job' , {
        template: "#template-job-raw",
        props:  ['job' ],
        methods: {
            createJob: function () {
                var newJob = {
                    reference: "",
                    employer: "",
                    title: "",
                    location: "",
                    salary: 0,
                    post_date: "",
                    type: "",
                    description: "",
                    editing: true
                };
                this.jobs.push(newJob);
            },


            deleteJob: function (job) {
                var index = this.$parent.jobs.indexOf(job);
                this.$parent.jobs.splice(index, 1)
                axios.delete('/api/jobs/' + job.id)
            },

            editJob: function (job) {
                job.editing = true;
            },

            updateJob: function (job) {
                axios.put('/api/jobs/' + job.id, job)
                //Set editing to false to show actions again and hide the inputs
                job.editing = false;
            },

            storeJob: function (job) {
                axios.post('/api/jobs/', job).then(function (response) {
                    /*
                    After the the new job is stored in the database fetch again all jobs with
                    vm.fetchJobs();
                    Or Better, update the id of the created job
                    */
                    Vue.set(job, 'id', response.data.id);

                    //Set editing to false to show actions again and hide the inputs
                    job.editing = false;
                });
            },
        }
    })

    new Vue({
        el: '#app' ,
        data:  {
            jobs: [],
            job: {}
        },
        mounted: function (){
            this.fetchJobs()
        },

        fetchJobs: function() {
            var vm = this;
            this.axios.get('/api/jobs')
                .then(function (response) {
                    // set data on vm
                    var jobsReady = response.data.map(function (job) {
                        job.editing = false;
                        return job
                    })
                    Vue.set(vm, 'jobs', jobsReady)
                });
            }


    });


</script>



</body>
</html>



