import Vue from 'vue'
import Vuex  from 'vuex'
import Axios from 'axios'

import {LIST_PERSON,NEW_PERSON,EDIT_PERSON,GET_PERSON,DEL_PERSON,SEARCH_PERSON} from './mutation-person'


Vue.use(Vuex);
let store;
store = new Vuex.Store({
    state: {
        persons: [],
        person: {
            id: '',
            nombres: '',
            apellidos: '',
            sexo: '',
            fechaNac: '',
            edad: '',
            noId: '',
            cantHijos: '',
            cargo: '',
            salario: '',
            raza: ''
        }
    },
    actions: {
        listPerson: function ({commit}) {
            Axios.get('/persona/list').then((response) => {
                commit(LIST_PERSON, {person: response.data})
            }, (err) => {
                console.log(err)
            })
        },
        newPerson: function ({commit, state}, {person}) {
            Axios.post('/persona/new', person).then((response) => {
                if (response.status === 200) {
                    commit([NEW_PERSON], {person: person})
                }
            }, (err) => {
                console.log(err)
            })
        },
        editPerson: function ({commit, state}, {person}) {
            Axios.post('/persona/edit/' + person.id, person).then((response) => {
                console.log(response);
                if (response.status === 200) {
                    commit([EDIT_PERSON], {person: response.data.person})
                }
            }, (err) => {
                console.log(err)
            })
        },
        getPerson:function ({commit, state}, {id}) {
            Axios.get('/persona/getperson/' + id).then((response) => {
                console.log(response.data);
                commit(GET_PERSON, {person: response.data[0]})
            }, (err) => {
                console.log(err)
            })
        },
        delPerson: function ({commit, state}, {person}) {
            Axios.delete('/persona/delPerson/' + person.id, person).then((response) => {
                if (response.status === 200) {
                    commit(DEL_PERSON, {person: response.data})
                }
            }, (err) => {
                console.log(err)
            })
        },
        searchPerson:function({commit, state},{nombre}){
            commit(SEARCH_PERSON,{nombre:nombre})
        }
    },
    mutations: {
        [LIST_PERSON]: (state, {person}) => {
            console.log(person);
            state.persons = person
        },
        [NEW_PERSON]: (state, {person}) => {
            state.persons.push(person)
        },
        [EDIT_PERSON]: (state, {person}) => {
            let idP = state.persons.map(p=>p.id).indexOf(person.id);
            state.persons.splice(idP,1,person)
        },
        GET_PERSON:(state, {person}) => {
            console.log(person);
            state.person = person
        },
        DEL_PERSON: (state, {person}) => {
            let idP = state.persons.map(p => p.id).indexOf(person.id);
            state.persons.splice(idP, 1)
        },
        SEARCH_PERSON:(state, {nombre}) => {
            let id = state.persons.map(p => p.nombres).indexOf(nombre);
        }
    },
    getters: {

    }
});

export default store