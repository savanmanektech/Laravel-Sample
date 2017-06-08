<template>
    <section class="panel">
        <div class="panel-heading">
            <h5><b>Diagnostics</b></h5>
        </div>
        <form role="form" v-on:submit.prevent="handleSubmit" v-on:keyup.prevent="handleSubmit">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" v-model="search" class="form-control" placeholder="Search">
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                </div>
            </div>
            <hr>
        </form>
        <ul class="list-group">
            <li class="list-group-item" v-if="loading">
                Loading Diagnostics
            </li>
            <li class="list-group-item" v-else-if="prescriptions.length > 0" v-for="prescription in prescriptions">
                <div class="row">
                    <div class="col-md-3">
                        <router-link :to="'/admin/patients/'+prescription.patient_id+'/test-result/' + prescription.id">REQ #{{prescription.identifier}}</router-link>					
                    </div>
                    <div class="col-md-3">
                        {{prescription.patient.first_name}} {{prescription.patient.last_name}}
                    </div>
                    <div class="col-md-3">
                    {{prescription.patient.created_at}}
                    </div> 
					<div class="col-md-3" v-if="prescription.drugs_count != '0'">
                     <span v-if="prescription.laboratory"><strong>{{prescription.laboratory.name}} </strong></span>
                    </div>
                </div>
            </li>
            <li class="list-group-item" v-else>
                No new results have been created. 
            </li>
        </ul>
    </section>
</template>

<script>

    import axios from 'axios'
    export default {
        data: function() {
            return {
                loading: true,
                prescriptions: [],
                search: ''
            }
        },
        mounted: function() {
            this.fetchPatientList()
        },
        methods: {
            fetchPatientList: function() {
                this.loading = true
                axios.get('/service/v1/diagnostics')
                    .then(response => {
                        this.loading = false
                        this.prescriptions = response.data.data
                    })
            },
            handleSubmit: function(event) {
                this.loading = true
                axios.get('/service/v1/diagnostics/?q='+this.search)
                    .then(response => {
                        this.loading = false
                        this.prescriptions = response.data.data
                    })
            }
        }
    }
</script>
