<template>
	<div class="row">
		<div class="col-md-8 left-content">
			<!-- profile information sidebar -->
			<patient-detail/>
			<div class="panel overflow-hidden no-b profile p15">
				<div class="row mb25">
					<patient-button/>
                 
				</div>
			</div>
		</div>
		<patient-history/>
           <notifications/>
	</div>
</template>

<script>

	import VueTypeahead from 'vue-typeahead'

    export default {

		extends: VueTypeahead,

        data: function() {
            return {
                patient: [{
                    allergy_name: [],
					common_allergies: []
                }],
                allergy_name: '',
                illnesses: [],
                note: '',
				suggestions: [],
				current: 0,
				activeTab: 'Background',
				common_allergies: ''
            }
        },
        mounted: function() {
            this.fetchPatient()
        },
        computed: {
            formData() {
                return {
                    first_name: this.first_name,
                    last_name: this.last_name,
                    gender_id: this.gender_id,
                    date_of_birth: this.date_of_birth,
                    address: this.address
                }
            },
            formDataa() {
                return {
                    allergy_name: this.allergy_name,
                    'checkedNames[]' : this.checkedNames

                }
            }
        },
        methods: {
            fetchPatient: function() {
              // this.$http.get('/service/v1/patients/' + this.$route.params.id).then(response => this.patient = response.data.data);
            },
			tabSelectorCheck:function(index){
				return index == this.activeTab;
			},
			tabSelector:function(index) {
				this.activeTab = index;
			},
        }
    }
</script>
