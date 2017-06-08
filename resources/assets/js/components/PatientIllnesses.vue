<template>
	<label class="_suggest">
		<span class="name"> Conditions </span>
		<div class="_target">
			<div class="_selected">
				<form role="form" v-on:submit.prevent="handleSubmitIllness">                      
					<div class="vc" v-for="illness in patient.common_illnesses" >
						<div class="vl">
							{{illness.name}} 
							<span v-on:click="remove_illness(illness.id)">
								<i class="ti-close"></i>
							</span>
						</div>
					</div>						
					<autocomplete
						url="/service/v1/illnesses"
						anchor="name"
						label="writer"
						type="common_allergies"
						class-name="form-control"
						:on-select="getDataIllness" :on-input="getData1Illness" >
					</autocomplete>
					<!-- <input type="text" v-model="common_illnesses" class="form-control" placeholder="Add Illness"> -->
				 </form>
			</div>
		</div>
	</label>
</template>				
					
<script>
	var querystring = require('querystring');
    import axios from 'axios'
	import Autocomplete from 'vue2-autocomplete-js'
    export default {
        data: function() {
            return {
                patient: [{
                    common_illnesses:[]
                }],
				common_allergies:''
            }
        },
        mounted: function() {
            this.fetchTaskList();
        },components: { Autocomplete },
         
        methods: {   
			getDataIllness: function(index){
				this.common_illnesses = index.name;
				this.handleSubmitIllness();
			},	
				getData1Illness: function(index){
				this.common_illnesses = index;
			},		
            fetchTaskList: function() {
               axios.get('/service/v1/patients/' + this.$route.params.id).then(response => this.patient = response.data.data);
            },
       
            allergy_names_get: function () {
                 return this.allergy_name;
            },
      
            handleSubmitIllness : function(event) {          
                axios.post('/service/v1/patients/' + this.$route.params.id, {method:'add',illness:this.common_illnesses})
                    .then(response => {
                            this.patient.common_illnesses = response.data.data.common_illnesses;
                            this.common_illnesses = '';  
							this.text = '';  							
                    })
            },           
            remove_illness :function(index){  
                axios.post('/service/v1/patients/' + this.$route.params.id, {method:'remove',illness:index})
                    .then(response => {
                            this.patient.common_illnesses = response.data.data.common_illnesses;                        
                    })
            },                
        }
    }
</script>