

<template>
    <div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <patient-detail/>
                <!-- profile information sidebar -->
                <div class="panel overflow-hidden no-b profile p15">
                    <div class="row mb25">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="_field-wrap">
                                        <div class="_header">
                                            <h3>
                                                Results received from:
                                            </h3>
                                        </div>
                                        <div class="_inner-content">
                                            <div class="_content">
                                                <div class="_review">
                                                    <div class="_block">
                                                        <span class="_title">
                                                        Created on
                                                        </span>
                                                        <span>
                                                        {{prescription.created_at}}
                                                        </span>
                                                    </div>
                                                    <div class="_block">
                                                        <span class="_title">
                                                        Laboratory
                                                        </span>
                                                        <div class="_contact-info">
                                                            <div>{{prescription.laboratory.name}} </div>
                                                            <div>{{prescription.laboratory.address_street_1}} </div>
                                                            <div>{{prescription.laboratory.address_street_2}}</div>
                                                            <div>{{prescription.laboratory.address_municipality}}</div>
                                                            <div>{{prescription.laboratory.address_territory}}</div>
                                                            <div> {{prescription.laboratory.phone_primary}},  {{prescription.laboratory.email_primary}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="_header">
                                                <div class="_wrap">
                                                    <span class="_identifier">REQUEST #{{prescription.identifier}}</span>
                                                    <span class="_items">
                                                    {{prescription.tests_count}} Test
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="section">
                                                <div class="_body">
                                                    <tests/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row inline-list">
                                        <div class="col-md-9">
                                            <div class="_header">
                                                <div class="_wrap">
                                                    <span class="_identifier">RESULTS FOR #{{prescription.identifier}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <a v-if="prescription.messages_count > 0" v-on:click="message_popup(prescription.id)" class="waiting-on-dr _notification _block clickable" data-target="#dg-messages" data-toggle="modal" data-url="/physician/messages/96?type=diagnostic">
                                            <span class="_msg-count _circle">
                                            {{prescription.messages_count}}
                                            </span>
                                            <span>Message</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="section">
                                                <div class="_body">
                                                    <ul class="list-unstyled">
                                                        <li v-for="(item,index) in prescription.attachments">
                                                            <a target="_blank" :href="'/test-results/'+item.file_file_name">{{item.file_file_name}}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span v-on:click="archive">Send to Archive </span>
                <span v-on:click="reviewed">Mark as Reviewed </span>
            </div>
        </div>
        
        <div class="modal-backdrop" v-on:click="hideModal" v-bind:class="{in : showModal}" v-if="showModal == true"></div>
        <div class="modal fade _persistent" v-bind:class="{in : showModal}" v-if="showModal == true" v-bind:style="{display : display}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div v-if="prescription.length == null">
                        <div  id="pharm-prescription-template" class="_template">
                            <div class="_header">
                                <div class="_controls">
                                    <a v-on:click="activeTab = 0" class="back fa fa-arrow-left" tabindex="-1"></a>
                                </div>
                                <div class="_title">
                                    RX # {{prescription.identifier}} 
                                </div>
                                <div class="_sub-title">
                                    {{prescription.created_at}}
                                </div>
                                <div class="pull-right">
                                    <div class="_controls">
                                        <a v-on:click="active_tab_ = 'pharm-prescription-template',showModal = false" class="exit fa fa-close" data-dismiss="modal" tabindex="-1"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="_contents">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!--<div class="profile-info section">
                                            <h3>
                                            <span class="bold-tx">To:</span>
                                            {{prescription.physician.first_name}} {{prescription.physician.last_name}}
                                            </h3>
                                            <p>
                                            <span class="bold-txt">Contact:</span>
                                            {{prescription.physician.phone_primary}} 
                                            </p>
                                            </div> -->
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="section">
                                            <div class="_body">
                                                <div class="_notes">
                                                    <ul>
                                                        <li v-for="message in prescription.messages">
                                                            <div class="row">
                                                                <div class="col-md-8 col-sm-8">
                                                                    <div class="_meta _title">{{message.user.first_name}} {{message.user.last_name}}</div>
                                                                </div>
                                                                <div class="col-md-4 col-md-4">
                                                                    <div class="_meta">{{message.created_at}}</div>
                                                                </div>
                                                            </div>
                                                            <p class="_content _small">
                                                                {{message.body}}
                                                            </p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="hide-if-resolved">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="section">
                                                <div class="_body">
                                                    <div class="input-container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label class="_full-input">
                                                                <textarea v-model = "message" class="required ds-radio ds-valid" placeholder="Enter your response here." name="message[body]" id="message_body"></textarea>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="input-container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label class="checkbox pull-right">
                                                                <span class="name">Mark as resolved?</span>
                                                                <input name="message[mark_as_resolved]" value="0" type="hidden"><input class="ds-radio" value="1" name="message[mark_as_resolved]" id="message_mark_as_resolved" type="checkbox">
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hide-if-resolved">
                                <div class="_footer">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a class="action _large _submit pr" id="send_message" tabindex="0" v-on:click="send_message(prescription.id)">SEND</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    var querystring = require('querystring');
    import axios from 'axios'
    export default {
        data: function() {
            return {
                prescription: [{messages : []}], 
                activeTab : 0,
                showModal : false,
                message : '',
                asset_type : 'Diagnostic'
            }
        },
        mounted: function() {
            this.fetchDiagnostic();
        },
        methods: {
            fetchDiagnostic: function() {                   
                this.$http.get('/service/v1/patients/' + this.$route.params.id + '/test-result/' + this.$route.params.p_id).then(response => this.prescription = response.data.data);
            }, archive: function() {                   
                this.$http.get('/service/v1/patients/' + this.$route.params.id + '/diagnostics/' + this.$route.params.p_id+'/archive').then(response =>  this.$router.push('/admin/diagnostics'));
            }, reviewed: function() {                   
                this.$http.get('/service/v1/patients/' + this.$route.params.id + '/diagnostics/' + this.$route.params.p_id+'/reviewed').then(response =>  this.$router.push('/admin/diagnostics'));
            },
             message_popup: function(index) {    
                this.showModal = true
                this.display = 'block'
                var that = this;
                setInterval(function(){
                     if(that.showModal == true){
                     axios.get('/service/v1/physician/diagnostics/'+index+'/messages')  
                        .then(response => {
                            that.prescription.messages = response.data.data;
                           
                        } ) 
                    }                    
                }, 3000);                     
             },  
             send_message: function(index) {
              
                axios.post('/service/v1/physician/diagnostics/'+index+'/message',{'message':this.message,'asset_type' : this.asset_type})
                    .then(response => {
                             
                          this.prescription.messages = response.data.data;
                            this.message = '';                          
                    })
            
            
            },                
        }
    }
</script>