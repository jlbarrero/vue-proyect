import Vue from 'vue';
import VueRouter from 'vue-router';
import New from "../components/CRUDPerson/New";
import Edit from '../components/CRUDPerson/Edit'
import ListPersons from "../components/CRUDPerson/ListPersons";

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',
    routes: [
        {path: '/', component: ListPersons},
        {path: '*', redirect: '/', component:ListPersons},
        {
            path: '/persona/new', name: 'New', component: New
        },
        {
            path: '/persona/list', name: 'ListPerson', component: ListPersons
        },
        {
            path:'/persona/edit', name:'Edit',component: Edit
        }
    ],
});