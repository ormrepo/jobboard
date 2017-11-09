<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Board</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>

<body>

<?php echo $__env->yieldContent('content'); ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript">
    Vue.component('job' , {
        template: "#template-job-raw",
        props:  ['job' ]
    });

    var  vm = new  Vue({
        el: '#app' ,
        data:  {
            jobs:  []
        },
        mounted: function (){
            this.fetchJobs()
        },
        methods: {
            fetchJobs: function() {
                var vm = this;
                axios.get('/api/jobs')
                    .then(function (response) {
                        // set data on vm
                        var jobsReady = response.data.map(function (job) {
                            job.editing = false;
                            return job
                        })
                        Vue.set(vm, 'jobs', jobsReady)
                    });
            }

        }
    })
</script>



</body>
</html>



