<template>
    <div class="row">
        <form role="form" v-on:submit.prevent="handleSubmit">
        <div class="col-md-8 left-content">
            <patient-detail/>
            <div class="panel overflow-hidden no-b profile p15">
               
                    <div class="_right-panel"> 
                        <div class="tabs" >        
                            <li v-for="(a,index) in tests" v-on:click="tabSelectorTest(a.name)" v-bind:class="{ active: tabSelectorCheckTest(a.name) }">{{a.name}}</li>        
                        </div>
                        
                         <div class="tabs" >  
                            <div v-for="(te,i) in tests" style="margin-bottom:20px;">
                            <div v-if="activeTab == te.name"><div>{{te.name}}</div>
                                <li v-for="(a,index) in te.testtag" v-on:click="tabSelector(a.name)" v-bind:class="{ active: tabSelectorCheck(a.name) }">{{a.name}}</li>  
                            </div>
                           </div>
                        </div>
                    </div>        
                    <div class="row">
                        <div v-for="(test,index) in tests">   
                            <div v-for="(a,index) in test.testtag">                            
                                <div v-if="activeTest == a.name">
                                    <div class="col-md-3" v-for="option in a.tests">
                                        <input  type="checkbox" v-on:click="toggle_val(option)" v-bind:value="option.id" v-model="diagnostic.selected_tests">{{option.name}}
                                    </div>
                                    <div class="clearfix"></div>
                                </div>     
                            </div>
                        </div>
                        <hr>
                         <div class="col-md-12">
                            <label>Diagnosis </label>
                            <input name="diagnosis" v-validate="'required'" type="text" v-model="diagnostic.diagnosis" class="form-control" placeholder="Diagnosis">
                            <span class="text-danger" v-show="errors.has('diagnosis')">{{ errors.first('diagnosis') }}</span>
                        </div>                         
                        <div class="col-md-12">
                            <label>Notes  </label>
                            <textarea name="notes" v-validate.initial="'required'" type="text"  v-model="diagnostic.notes" class="form-control" placeholder="Notes" />
                            <span class="text-danger" v-show="errors.has('notes')">{{ errors.first('notes') }}</span>
                        </div>
                       
                        
                     </div>
                           
               
            </div>
        </div>
        <div class="col-md-4 mb25">
            <div class="sidebar-wapper"></div>
            <div class="panel overflow-hidden no-b profile p15 _right-panel">
                        <div v-for="(test,index) in tests">   
                            <div v-for="(a,index) in test.testtag">                            
                                <div>
                                
                                <div class="_suggest">
<div class="_target">
<div class="_selected">



                                    <div  v-on:click="toggle_val(option)" class="vc" v-for="option in a.tests" v-if = "option.selected == 1">
                                        
                                        
                                       
<div class="vl" >
{{option.name}}
<span>
<i class="ti-close"></i>
</span>
</div>



                                    
                                       
                                   </div>
                                   
                                   </div>
</div>
</div>
                                    <div class="clearfix"></div>
                                </div>     
                            </div>
                        </div>
                All Done? Send this request.
                Send to Test Center                  
                <autocomplete
                     url="/service/v1/locations/"
                     anchor="name"
                     label="address_street_1"
                     :on-select="selectLab"                                             
                     placeholder=""	
                     :custom-params="{ _test_ids: diagnostic.selected_tests }"
                     class-name="form-control"
                     >
                </autocomplete>                                          
                <input type="hidden" name="laboratory" :value="'diagnostic.laboratory_id'"  v-validate="'required'"  v-model="diagnostic.laboratory_id" />
                <span class="text-danger" v-show="errors.has('laboratory')">
Please select a laboratory or send this to the patient.
</span>   
                <button type="submit" class="btn btn-block btn-success">Save</button>
            </div>
        </div>
         </form>       
    </div>
</template>
<script>
    import axios from 'axios'
    import MaskedInput from 'vue-masked-input'
     import Autocomplete from 'vue2-autocomplete-js'
   
    export default {
     data() {
            return {
             
                diagnostic:{ 
                    selected_tests : [],laboratory_id:'' ,diagnosis:'',notes:''
                },
               tests : [],
                activeTab : 0,
                activeTest : 0
            }
        }, components: {
			Autocomplete
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
            }
        },
        mounted: function() {
           this.fetchAllIllness()
        },
        methods: {
        fetchAllIllness : function(){
                axios.get('/service/v1/tests').then(response => this.tests = response.data);
        },
        toggle_val: function(index){
        index.selected =  ! index.selected;
        }
        ,
            handleSubmit: function(event) {
                    this.$validator.validateAll().then(success => {
                      if(this.diagnostic.selected_tests == undefined){                      
                            alert("Ooops,You haven't added any tests to this request.");
                            return false;
                        }
                    var that = this;
                    axios.post('/service/v1/patients/'+this.$route.params.id+'/diagnostics/add', this.diagnostic)
                    .then(response => {
                        this.$router.push('/admin/patients/'+this.$route.params.id+'/diagnostics/'+response.data.data.id);
                    })
                })              
            },
            
            selectLab: function(index){
                this.diagnostic.laboratory_id = index.id;
            },                     
            tabSelectorCheck:function(index){
				return index == this.activeTest;
			},
			tabSelector:function(index) {
				this.activeTest = index;               
			},  
            tabSelectorCheckTest:function(index){
				return index == this.activeTab;
			},
			tabSelectorTest:function(index) {
                this.diagnostic.selected_tests = [];
                this.activeTest = 0;
				this.activeTab = index;
               
			},
        }
    }
</script>