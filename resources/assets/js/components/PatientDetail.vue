<template>	
    <div class="panel overflow-hidden no-b profile p15">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-md-3">
                        <h4 class="mb0 profile-name"><a href="#">{{patient.first_name}} {{patient.last_name}}</a></h4>
                    </div>
                    <div class="col-md-3">
                        <span class="_age">{{patient.age}}</span>
                        <span> Y/O </span>
                        <span v-if="patient.gender_id == '1'" class="_gender">M</span>
                        <span v-else class="_gender">F</span>
                    </div>
                    <div class="col-md-6 profile-contacts">
                        <div class="col-md-6">
                            <span><b>Address</b></span>sdsdsd{{patient.address_street_1}}
                        </div>
                        <div class="col-md-6">
                            <span><b>Contact</b></span>sdsdsd{{patient.email_primary}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>		
</template>
<script>
    export default {

        data: function() {
            return {
                patient: [{
                    allergy_name: [],
					common_allergies: []
                }]
            }
        },
        mounted: function() {
            this.fetchPatient()
        },
   
        methods: {
            fetchPatient: function() {
               this.$http.get('/service/v1/patients/' + this.$route.params.id).then(response => this.patient = response.data.data);
            }
        }
    }
</script>