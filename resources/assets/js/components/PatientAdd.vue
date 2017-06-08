<template>
    <section class="panel">
        <header class="panel-heading">
            <h5><b>Add</b></h5>
        </header>
        <div class="panel-body">
            <form role="form" v-on:submit.prevent="handleSubmit">
                <div class="row">
                <div class="col-md-2">
                    <input type="text"
                       
                        name = "first_name"
                        class="form-control"
                        placeholder="First Name"
                        v-validate="'required'"
                        autocomplete="off"
                        v-model="query"
                        @keydown.down="down"
                        @keydown.up="up"
                        @keydown.enter="hit"
                        @keydown.esc="reset"                        
                        @blur="val"               
                        @input="update"/>
                    <ul v-show="hasItems">
                        <li v-for="(item, $item) in items" :class="activeClass($item)" @mousedown="hit" @mousemove="setActive($item)">
                           {{item.first_name}} {{item.last_name}} 
                            <div class="col-md-1">
                            <div class="row">
                                <div class="col-md-6">
                                    <a class="btn-primary btn btn-block" ><span v-if="item.gender_id == 1">M</span><span v-else>F </span></a>
                                </div> 
                                                              
                            </div>
                            </div>{{item.age}}  {{item.phone_primary}} {{item.phone_primary}}
                        </li>
                    </ul>
                    <span class="text-danger" v-show="errors.has('first_name')"> Please enter the patient's first name. </span>

                    </div>
                  
                    <div class="col-md-2">
                        <input name="last_name" v-validate="'required'" type="text" v-model="last_name" class="form-control" placeholder="Last Name">
                        <span class="text-danger" v-show="errors.has('last_name')">Please enter the patient's last name.</span>
                    </div>
                    <div class="col-md-1">
                        <div class="row">
                            <div class="col-md-6">
                                <a v-bind:class="[gender_id === 1 ? 'btn-primary' : 'btn-default', 'btn', 'btn-block']" v-on:click="gender_id = 1">M</a>
                            </div>
                            <div class="col-md-6">
                                <a v-bind:class="[gender_id === 2 ? 'btn-primary' : 'btn-default', 'btn', 'btn-block']" v-on:click="gender_id = 2">F</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <masked-input name="date_of_birth" class="form-control" v-validate="'required'" v-model="date_of_birth" mask="1111/11/11" placeholder="D.O.B" />
                        <span class="text-danger" v-show="errors.has('date_of_birth')"> dd/mm/yyyy </span>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="address" v-model="address_street_1"  v-validate="'required'" class="form-control" placeholder="Address">
                        <span class="text-danger" v-show="errors.has('address')"> Please enter the patient's address. </span>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-block btn-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</template>
<script>
    import axios from 'axios'
    import MaskedInput from 'vue-masked-input'
     import VueTypeahead from 'vue-typeahead'
  
    export default {
        extends: VueTypeahead, // vue@1.0.22+
        data() {
            return {
                first_name: '',
                last_name: '',
                gender_id: 1,
                date_of_birth: '',
                address: '',
                
                  src: '/service/v1/patients',

          // The data that would be sent by request
          // (optional)
          data: {},

          // Limit the number of items which is shown at the list
          // (optional)
          limit: 5,

          // The minimum character length needed before triggering
          // (optional)
          minChars: 3,

          // Highlight the first item in the list
          // (optional)
          selectFirst: false,
          
            }
        }, components: {
			MaskedInput
		},
        computed: {
            formData() {
                return {
                    first_name: this.first_name,
                    last_name: this.last_name,
                    gender_id: this.gender_id,
                    date_of_birth: this.date_of_birth,
                    address_street_1: this.address_street_1
                }
            }
        },
        methods: {
            handleSubmit: function(event) {
			    var that = this;
			    this.$validator.validateAll().then(success => {
			        axios.post('/service/v1/patients', this.formData)
                    .then(response => {
    		            this.$router.push('/admin/patients/' + response.data.data.id)
    	            }).catch(function (error) {
    		            that.errors = error.response.data;
    	            })
                })
            },
            
             // The callback function which is triggered when the user hits on an item
        onHit (item) {
            this.$router.push('/admin/patients/' +item.id)
        }, 
        val (item) {         
           this.first_name =  this.query;           
        },

        // The callback function which is triggered when the response data are received.
        prepareResponseData (response) {
          return response.data
        }
        
        
        
        }
    }
</script>
