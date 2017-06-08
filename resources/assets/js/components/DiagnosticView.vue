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
                               <div class="col-md-6">
                                    <h4 class="mb0">REQUEST # {{prescription.identifier}}</h4>
                                    {{prescription.tests_count}} Tests<br>
                                    {{prescription.created_at}}
                                    <tests/>         
                              
                                
                                
                                
                               
                                      </div>


                                <div class="col-md-6">
                                
                                 <div class="_field-wrap">
                                    <div class="_header">
                                    <h3>
                                    Request sent to:
                                    </h3>
                                    </div>
                                    <div class="_inner-content">
                                    <div class="_content">
                                    <div class="_review">
                                    <div class="_block">
                                    <span class="_title">
                                    Radiology
                                    </span>
                                    <div class="_contact-info">
                                    <div>  {{prescription.laboratory.name}}</div>
                                    <div> {{prescription.laboratory.phone_primary}}</div>
                                    <div> {{prescription.laboratory.email_primary}}</div>
                                    </div>
                                    </div>
                                    <div class="_block">
                                    <span class="_title">
                                    Verification Pin
                                    </span>
                                    <span>
                                    {{prescription.verification_pin}}
                                    </span>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>                               
                                    
                                  
                                </div>                               
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row mb25">
                        <patient-button/>
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
                prescription: [],
            }
        },
        mounted: function() {
            this.fetchDiagnostic();
        },
        methods: {
            fetchDiagnostic: function() {                   
                this.$http.get('/service/v1/patients/' + this.$route.params.id + '/diagnostics/' + this.$route.params.p_id).then(response => this.prescription = response.data.data);
            }
        }
    }
</script>