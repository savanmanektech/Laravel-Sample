<template>
    <div class="col-md-4 mb25 message_panel" v-bind:class="{active : isNotificationOn}">
        <div class="sidebar-wapper" v-bind:class="{active : isNotificationOn}"></div>
        <div class="panel overflow-hidden no-b profile p15  _right-panel">
            <div class="_suggest">
                <span class="name">Notifications</span>
                <span class="message-count" v-on:click="isNotificationChange">{{notifications.length}}</span>
                <div class="_target">
                    <div class="_selected">  
                        <div v-for="notification in notifications" class="_P-detail">
                            <a v-on:click="message_popup(notification.asset_id)" class="">
                                <div class="_title"> {{notification.user.first_name}} {{notification.user.lst_name}}</div> {{notification.created_at}}
                                <div class="_p-content">
                                   {{notification.body}}   
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        {{prescription.length}}
        <div class="modal-backdrop" v-on:click="hideModal" v-bind:class="{in : showModal}" v-if="showModal == true"></div>
        <div class="modal fade _persistent" v-bind:class="{in : showModal}" v-if="showModal == true" v-bind:style="{display : display}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div>
                        <div  id="pharm-prescription-template" class="_template">
                            <div class="_header">
                                
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
    export default {
        mounted: function() {
          this.fetchConditions()
        },
        data () {
            return {
                notifications: [],
                isNotificationOn : false, 
                activeTab : 0,
                showModal : false,
                message : '',
                asset_type : 'Diagnostic',  
                prescription: [{messages : []}], 
            }
        },
        methods: {
            fetchConditions: function() {
                this.$http.get('/service/v1/physician/notifications').then(response => this.notifications = response.data.data);
            },
            isNotificationChange: function() {
              this.isNotificationOn = (this.isNotificationOn == true)?false:true;
            },
           message_popup: function(index) {    
                this.showModal = true
                this.display = 'block'
                var that = this;
              
              
                    this.$http.get('/service/v1/physician/diagnostics/' + index).then(response => {
                    this.prescription = response.data.data;  
                    this.showModal = true
                    this.display = 'block'
                            this.$http.get('/service/v1/technicians/diagnostics/'+response.data.data.id+'/messages')  
                            .then(response => this.prescription.messages = response.data.data )    
                    });
                    
                    
               
                             
             },  
             send_message: function(index) {
              
                this.$http.post('/service/v1/physician/diagnostics/'+index+'/message',{'message':this.message,'asset_type' : this.asset_type})
                    .then(response => {
                             
                          this.prescription.messages = response.data.data;
                            this.message = '';                          
                    })
            
            
            }, 
            
        }
    }
</script>