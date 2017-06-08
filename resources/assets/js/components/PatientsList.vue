<template>
    <section class="panel">
        <div class="panel-heading">
            <h5><b>Patients</b></h5>
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
                Loading patients
            </li>
            <li class="list-group-item" v-else-if="patients.length > 0" v-for="patient in patients">
                <div class="row">
                    <div class="col-md-3">
                        <router-link :to="{ name: 'patient', params: { id: patient.id }}">{{patient.first_name}} {{patient.last_name}}</router-link>
                    </div>
                    <div class="col-md-3">
                        {{patient.gender_id === 1 ? 'Male' : 'Female'}}
                    </div>
                    <div class="col-md-3">
                        {{patient.age}}
                    </div>
                </div>
            </li>
            <li class="list-group-item" v-else>
                No patients
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
                patients: [],
				search: ''
            }
        },
        mounted: function() {
            this.fetchPatientList()
        },
        methods: {
            fetchPatientList: function() {
                this.loading = true
                axios.get('/service/v1/patients')
                    .then(response => {
                        this.loading = false
                        this.patients = response.data.data
                    })
            },
			handleSubmit: function() {
				this.loading = true
				axios.get('/service/v1/patients/?q='+this.search)
						.then(response => {
							this.loading = false
							this.patients = response.data.data
						})
				
			}
        }
    }
</script>
