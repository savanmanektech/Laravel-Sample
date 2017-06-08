<template>	
    <div class="col-xs-12 mt25 text-center">
        <div class="_button-ui col-md-12">
            <router-link :to="'/admin/patients/'+this.$route.params.id+'/prescriptions/new'" class='default-btn _button _small'> New Prescription</router-link>
            <router-link :to="'/admin/patients/'+this.$route.params.id+'/diagnostics/new'" class='default-btn _button _small'> New Lab Request</router-link>
            <router-link :to="'/admin/patients/'+this.$route.params.id+'/diagnostics/new'" class='default-btn _button _small'> New Radiology</router-link>
        </div>  
    </div>				
</template>