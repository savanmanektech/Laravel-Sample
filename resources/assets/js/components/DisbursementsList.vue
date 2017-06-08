<template>
    <section class="panel">
        <div class="panel-heading">
            <h5><b>disbursements</b></h5>
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
                Loading disbursements
            </li>
             <li class="list-group-item" v-if="disbursements.length > 0">
                <div class="row">
                    <div class="col-md-4">
                       Annotation
                    </div>
                    <div class="col-md-2">
                       Date
                    </div>
                    <div class="col-md-2">
                       name
                    </div>
                     <div class="col-md-2">
                        Pharmacy
                    </div>
                    
                    
                </div>
            </li>
            
            <li class="list-group-item" v-if="disbursements.length > 0" v-for="disbursement in disbursements">
                <div class="row">
                    <div class="col-md-4">
                        {{disbursement.annotation}}
                    </div>
                    <div class="col-md-2">
                        {{disbursement.created_at}}
                    </div>
                    <div class="col-md-2">
                        {{disbursement.pharmacist.first_name}} {{disbursement.pharmacist.last_name}}
                    </div>
                     <div class="col-md-2">
                        {{disbursement.pharmacy.name}}
                    </div>
                    
                    
                </div>
            </li>
            <li class="list-group-item" v-else>
                No disbursements
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
                disbursements: [],
				search: ''
            }
        },
        mounted: function() {
            this.fetchPatientList()
        },
        methods: {
            fetchPatientList: function() {
                this.loading = true
                axios.get('/service/v1/disbursements')
                    .then(response => {
                        this.loading = false
                        this.disbursements = response.data.data
                    })
            },
			handleSubmit: function() {
				this.loading = true
				axios.get('/service/v1/disbursements/?q='+this.search)
						.then(response => {
							this.loading = false
							this.disbursements = response.data.data
						})
				
			}
        }
    }
</script>
