<template>
	<div class="_suggest">
        <form role="form" v-on:submit.prevent="handleSubmitNotes">                      
            <textarea id='1'  type="text" v-model="note" class="form-control" placeholder="Note"/>
            <div class="pull-right"><button class="btn btn-success" type="submit">Save Note</button></div>
            <div class="clearfix"></div>
            <li  v-for="note in patient.patient_notes">
                   <span class="_note_update_date">{{note.updated_at}} </span>	 
                   <span class="_note_title">{{note.note}}</span>						  					
            </li> 
        </form>	
    </div>
</template>		
					
<script>
	var querystring = require('querystring');
    import axios from 'axios'
	import Autocomplete from 'vue2-autocomplete-js'
    export default {
        data: function() {
            return {
                patient: [{
                    patient_notes:[]
                }],				
            }
        },
        mounted: function() {
            this.fetchTaskList();
        },        
        methods: {   				
            fetchTaskList: function() {
              axios.get('/service/v1/patients/' + this.$route.params.id).then(response => this.patient = response.data.data);
            },       
            handleSubmitNotes : function(event) {          
                axios.post('/service/v1/patients/' + this.$route.params.id+'/create_note', {note:this.note})
                    .then(response => {
                            this.patient.patient_notes = response.data.data;
                            this.note = '';                        
                    })
            }
        }
    }
</script>