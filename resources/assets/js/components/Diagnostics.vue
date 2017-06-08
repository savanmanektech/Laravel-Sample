<template>
    <div class="_suggest">
        <span class="name"> Diagnostics </span>
        <div  class="_P-detail" v-for="diagnostic in diagnostics">
            <router-link :to="'/admin/patients/'+diagnostic.patient_id+'/diagnostics/'+diagnostic.id" >
                <div class="_title"> {{diagnostic.identifier}}</div> 
                {{diagnostic.created_at}}               
                <div class="" v-for="(value, key, index) in diagnostic.tests" >
                    <div class="">
                        <strong>{{key}}</strong>
                        <div>
                            <span class="" v-for="(test, i) in value" >
                                <span>{{test}}</span><span v-if="i+1 < value.length">, </span>                                   
                           </span>
                        </div>
                    </div>
                </div>
            </router-link>
        </div>
    </div>
</template>
<script>
    export default {
        mounted: function() {
            this.fetchDiagnostics()
        },
        data() {
            return {
                diagnostics: []
            }
        },
        methods: {
            fetchDiagnostics: function() {
                this.$http.get('/service/v1/patients/' + this.$route.params.id + '/diagnostics').then(response => this.diagnostics = response.data.data);
            }
        }        
    }
</script>
