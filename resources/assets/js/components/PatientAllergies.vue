<template>
    <label class="_suggest">
        <span class="name"> Allergies </span>
        <div class="_target">
            <div class="_selected">
                <form role="form" v-on:submit.prevent="handleSubmit">                      
                    <div class="vc" v-for="allergie in patient.common_allergies" type="button">
                        <div class="vl">{{allergie.name}} <span v-on:click="remove_allergy(allergie.id)"><i class="ti-close"></i></span></div>
                    </div> 
                    
                 <div class="Typeahead">
    <i class="fa fa-spinner fa-spin" v-if="loading"></i>
    <template v-else>
      <i class="fa fa-search" v-show="isEmpty"></i>
      <i class="fa fa-times" v-show="isDirty" @click="reset"></i>
    </template>

    <input type="text"
           class="Typeahead__input"
           placeholder="Search twitter user"
           autocomplete="off"
           v-model="query"
           @keydown.down="down"
           @keydown.up="up"
           @keydown.enter="hit"
           @keydown.esc="reset"
           @blur="reset"
           @input="update"/>

    <ul v-show="hasItems">
      <li v-for="(item, $item) in items" :class="activeClass($item)" @mousedown="hit" @mousemove="setActive($item)">
        <span class="name" v-text="item.name"></span>
        <span class="screen-name" v-text="item.screen_name"></span>
      </li>
    </ul>
  </div>

  
  
  
                    <autocomplete
                        url="/service/v1/allergies"
                        anchor="name"
                        label="writer"
                        type="common_allergies"
                        class-name="form-control"
                        :on-select="getData" :on-input="getData1" >        
                    </autocomplete>                                  
                </form>   
            </div>                 
        </div>
    </label>	
</template>				
					
<script>
	var querystring = require('querystring');
    import VueTypeahead from 'vue-typeahead'    
    import axios from 'axios'
	import Autocomplete from 'vue2-autocomplete-js'
    export default {
        extends: VueTypeahead,
        data: function() {
            return {
                patient: [{
                    common_allergies:[]
                }],
				common_allergies:'',
                
                src: 'https://typeahead-js-twitter-api-proxy.herokuapp.com/demo/search',
                  limit: 5,
                  minChars: 3
                
            }
        },
        mounted: function() {
            this.fetchTaskList();
        },
        components: { Autocomplete },
         
        methods: { 
            onHit (item) {
              window.location.href = 'http://twitter.com/' + item.screen_name
            } ,
            fetchTaskList: function() {
               axios.get('/service/v1/patients/' + this.$route.params.id).then(response => this.patient = response.data.data);
            },
            getData: function(index){
            this.common_allergies = index.name;
            this.handleSubmit();
            },	
            getData1: function(index){
            this.common_allergies = index;
            },		
            
       
            allergy_names_get: function () {
                 return this.allergy_name;
            },
      
                 handleSubmit: function(event) {          
                axios.post('/service/v1/patients/' + this.$route.params.id, {method:'add',allergy:this.common_allergies})
                    .then(response => {
                            this.patient.common_allergies = response.data.data.common_allergies;
                            this.common_allergies = '';                        
                    })
            },
            remove_allergy :function(index){  
                axios.post('/service/v1/patients/' + this.$route.params.id, {method:'remove',allergy:index})
                    .then(response => {
                            this.patient = response.data.data;                        
                    })
            },         
        }
    }
</script>