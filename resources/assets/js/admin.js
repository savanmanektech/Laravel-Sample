import Vue from 'vue'
import VueMask from 'v-mask'
import VueRouter from 'vue-router'
import VueResource from 'vue-resource'
import VeeValidate from 'vee-validate';

import Dashboard from './components/Dashboard.vue'


import Patients from './components/Patients.vue'
import PatientHistory from './components/PatientHistory.vue'
import PatientButton from './components/PatientButton.vue'
import PatientsList from './components/PatientsList.vue'
import PrescriptionsList from './components/PrescriptionsList.vue'

import PrescriptionEdit from './components/PrescriptionEdit.vue'
import PatientAdd from './components/PatientAdd.vue'
import PrescriptionAdd from './components/PrescriptionAdd.vue'
import PatientView from './components/PatientView.vue'
import PatientDetail from './components/PatientDetail.vue'
import PrescriptionView from './components/PrescriptionView.vue'
import Illnesses from './components/Illnesses.vue'
import Allergies from './components/Allergies.vue'
import Notes from './components/Notes.vue'
import Prescriptions from './components/Prescriptions.vue'
import Diagnostics from './components/Diagnostics.vue'
import Tests from './components/Tests.vue'
import TechnicianAdd from './components/TechnicianAdd.vue'
import TechniciansList from './components/TechniciansList.vue'
import TechnicianView from './components/TechnicianView.vue'
import TechnicianEdit from './components/TechnicianEdit.vue'
import Technicians from './components/Technicians.vue'
import TechniciansClosed from './components/TechniciansClosed.vue'
import TechnicianViewDiagnostic from './components/TechnicianViewDiagnostic.vue'
import PharmacistsList from './components/PharmacistsList.vue'
import PharmacistAdd from './components/PharmacistAdd.vue'
import PharmacistEdit from './components/PharmacistEdit.vue'
import PharmacistView from './components/PharmacistView.vue'
import DisbursementsList from './components/DisbursementsList.vue'
import Notifications from './components/Notifications.vue'


import DiagnosticAdd from './components/DiagnosticAdd.vue'
import DiagnosticView from './components/DiagnosticView.vue'
import DiagnosticsList from './components/DiagnosticsList.vue'
import DiagnosticTestResult from './components/DiagnosticTestResult.vue'

import PharmacistPrescriptions from './components/PharmacistPrescriptions.vue'
import PharmacistPrescriptionView from './components/PharmacistPrescriptionView.vue'

import RadioProfile from './components/RadioProfile.vue'
import PhysicianProfile from './components/PhysicianProfile.vue'

Vue.use(VueMask).use(VueRouter).use(VeeValidate).use(VueResource)

Vue.component(
    'radio-profile',
    RadioProfile
)
Vue.component(
    'physician-profile',
    PhysicianProfile
)
Vue.component(
    'notifications',
    Notifications
)
Vue.component(
    'patients',
    Patients
)

Vue.component(
    'patients-list',
    PatientsList
)
Vue.component(
    'patient-history',
    PatientHistory
)
Vue.component(
    'patient-button',
    PatientButton
)
Vue.component(
    'technician-add',
    TechnicianAdd
)
Vue.component(
    'technician-edit',
    TechnicianEdit
)
Vue.component(
    'technicians-list',
    TechniciansList
)
Vue.component(
    'technicians',
    Technicians
)
Vue.component(
    'diagnostics-list',
    DiagnosticsList
)
Vue.component(
    'diagnostic-add',
    DiagnosticAdd 
)
Vue.component(
    'diagnostic-view',
    DiagnosticView 
)
Vue.component(
    'diagnostic-test-result',
    DiagnosticTestResult 
)
Vue.component(
    'tests',
    Tests 
)

Vue.component(
    'test1',
    {       
          props: ['diagnostic_id'],   
    },Tests
)

Vue.component(
    'patient-add',
    PatientAdd
)

Vue.component(
    'patient-view',
    PatientView
)
Vue.component(
    'patient-detail',
    PatientDetail
)

Vue.component(
    'prescription-view',
    PrescriptionView
)

Vue.component(
    'technician-view',
    TechnicianView
)
Vue.component(
    'technician-view-diagnostic',
    TechnicianViewDiagnostic
)

Vue.component(
    'illnesses',
    Illnesses
)

Vue.component(
    'allergies',
    Allergies
)

Vue.component(
    'notes',
    Notes
)

Vue.component(
    'prescriptions',
    Prescriptions
)
Vue.component(
    'diagnostics',
    Diagnostics
)
Vue.component(
    'pharmacists-list',
    PharmacistsList
)
Vue.component(
    'pharmacist-add',
    PharmacistAdd
)
Vue.component(
    'pharmacist-edit',
    PharmacistEdit
)
Vue.component(
    'pharmacist-view',
    PharmacistView
)

Vue.component(
    'prescriptions-add',
    PrescriptionAdd
)
Vue.component(
    'prescriptions-edit',
    PrescriptionEdit
)

Vue.component(
    'prescriptions-list',
    PrescriptionsList
)

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
)

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
)

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
)



const router = new VueRouter({
    mode: 'history',
    routes: [{
        path: '/admin',
        component: Dashboard
    }, {
        path: '/admin/patients',
        component: Patients
    }, {
        path: '/admin/patients-list',
        component: PatientsList,
    },{
        path: '/admin/patients/:id',
        component: PatientView,
        name: 'patient'
    }, {
        path: '/admin/prescriptions-list',
        component: PrescriptionsList
    }, {
        path: '/admin/prescriptions',
        component: PrescriptionsList
    }, {
        path: '/admin/patients/:id/prescriptions/new',
        component: PrescriptionAdd
    }, {
        path: '/admin/patients/:id/prescriptions/:p_id',
        component: PrescriptionView
    }, {
        path: '/admin/patients/:id/prescriptions/:p_id/edit',
        component: PrescriptionEdit
    }, {
        path: '/admin/diagnostics', 
        component: DiagnosticsList
    }, {
        path: '/admin/patients/:id/diagnostics/new', 
        component: DiagnosticAdd
    }, {
        path: '/admin/patients/:id/diagnostics/:p_id', 
        component: DiagnosticView
    }, {
        path: '/admin/patients/:id/diagnostics/:p_id/edit', 
        component: PrescriptionEdit
    }, {
        path: '/admin/patients/:id/test-result/:p_id', 
        component: DiagnosticTestResult
    }, 
    {
        path: '/test-center/technicians/add', 
        component: TechnicianAdd
    },
    {
        path: '/test-center/technicians/', 
        component: TechniciansList
    },    
    {
        path: '/test-center/profile', 
        component: RadioProfile
    },    
    {
        path: '/physician/profile', 
        component: PhysicianProfile
    },
    {
        path: '/technician', 
        component: Technicians
    },
    {
        path: '/test-center/technicians/:technician_id', 
        component: TechnicianView
    },
    {
        path: '/test-center/technicians/:technician_id/edit', 
        component: TechnicianEdit
    },{
        path: '/technician/diagnostics', 
        component: Technicians
    },   
    {
        path: '/technician/diagnostics/closed', 
        component: TechniciansClosed
    },   
    {
        path: '/technician/diagnostics/:p_id', 
        component: TechnicianViewDiagnostic
    },   
    {
        path: '/pharmacy/pharmacists', 
        component: PharmacistsList
    },   
    {
        path: '/pharmacy/pharmacists/new', 
        component: PharmacistAdd
    }, {
        path: '/pharmacy/pharmacists/:pharmacist_id', 
        component: PharmacistView
    },   
    {
        path: '/pharmacy/pharmacists/:pharmacist_id/edit', 
        component: PharmacistEdit
    },    
    {
        path: '/pharmacy/disbursements', 
        component: DisbursementsList
    }, 
     {
        path: '/pharmacist', 
        component: PharmacistPrescriptions
    }, 
    {
        path: '/pharmacist/prescriptions/:p_id', 
        component: PharmacistPrescriptionView
    } 
   ]
})

const app = new Vue({
    el: '#app',
    router,
})
